<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $query = Ppdb::query();
        if ($request->filled('status'))       $query->where('status', $request->status);
        if ($request->filled('tahun_ajaran')) $query->where('tahun_ajaran', $request->tahun_ajaran);
        if ($request->filled('search'))       $query->where('nama_siswa', 'like', '%'.$request->search.'%');
        $ppdb_list = $query->latest()->paginate(15);
        $tahuns    = Ppdb::select('tahun_ajaran')->distinct()->orderByDesc('tahun_ajaran')->pluck('tahun_ajaran');
        return view('admin.ppdb.index', compact('ppdb_list', 'tahuns'));
    }

    public function show(Ppdb $ppdb)
    {
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function updateStatus(Request $request, Ppdb $ppdb)
    {
        $request->validate(['status' => 'required|in:pending,proses,diterima,ditolak', 'catatan' => 'nullable|string']);
        $ppdb->update(['status' => $request->status, 'catatan' => $request->catatan]);
        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function exportExcel(Request $request)
    {
        $ppdb_list = Ppdb::query()
            ->when($request->filled('tahun_ajaran'), fn($q) => $q->where('tahun_ajaran', $request->tahun_ajaran))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data PPDB');

        $headers = ['No', 'No. Pendaftaran', 'Nama Siswa', 'JK', 'TTL', 'Nama Ayah', 'Nama Ibu', 'Telepon', 'Asal Sekolah', 'Status', 'Tanggal Daftar'];
        foreach ($headers as $col => $header) {
            $sheet->setCellValueByColumnAndRow($col + 1, 1, $header);
        }

        foreach ($ppdb_list as $i => $p) {
            $row = $i + 2;
            $sheet->setCellValueByColumnAndRow(1,  $row, $i + 1);
            $sheet->setCellValueByColumnAndRow(2,  $row, $p->no_pendaftaran);
            $sheet->setCellValueByColumnAndRow(3,  $row, $p->nama_siswa);
            $sheet->setCellValueByColumnAndRow(4,  $row, $p->jenis_kelamin);
            $sheet->setCellValueByColumnAndRow(5,  $row, $p->tempat_lahir . ', ' . ($p->tanggal_lahir ? $p->tanggal_lahir->format('d/m/Y') : ''));
            $sheet->setCellValueByColumnAndRow(6,  $row, $p->nama_ayah);
            $sheet->setCellValueByColumnAndRow(7,  $row, $p->nama_ibu);
            $sheet->setCellValueByColumnAndRow(8,  $row, $p->telepon);
            $sheet->setCellValueByColumnAndRow(9,  $row, $p->asal_sekolah);
            $sheet->setCellValueByColumnAndRow(10, $row, $p->status);
            $sheet->setCellValueByColumnAndRow(11, $row, $p->created_at->format('d/m/Y'));
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_ppdb_' . date('Ymd') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $writer->save('php://output');
        exit;
    }

    public function exportPdf(Request $request)
    {
        $ppdb_list = Ppdb::query()
            ->when($request->filled('tahun_ajaran'), fn($q) => $q->where('tahun_ajaran', $request->tahun_ajaran))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->get();

        $pdf = Pdf::loadView('admin.ppdb.export_pdf', compact('ppdb_list'))->setPaper('a4', 'landscape');
        return $pdf->download('data_ppdb_' . date('Ymd') . '.pdf');
    }
}
