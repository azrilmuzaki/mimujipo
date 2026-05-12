<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    public function index()
    {
        $setting = Pengaturan::pluck('value', 'key');
        return view('frontend.ppdb.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa'     => 'required|string|max:100',
            'jenis_kelamin'  => 'required|in:L,P',
            'tanggal_lahir'  => 'required|date',
            'tempat_lahir'   => 'required|string|max:100',
            'nama_ayah'      => 'required|string|max:100',
            'nama_ibu'       => 'required|string|max:100',
            'alamat'         => 'required|string',
            'telepon'        => 'required|string|max:20',
            'email'          => 'nullable|email',
            'asal_sekolah'   => 'nullable|string|max:100',
            'foto'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('ppdb/foto', 'public');
        }

        $validated['no_pendaftaran'] = Ppdb::generateNomor();
        $validated['tahun_ajaran']   = date('Y');
        $validated['status']         = 'pending';

        $ppdb = Ppdb::create($validated);

        return redirect()->route('ppdb.cek')->with('success', 'Pendaftaran berhasil! Nomor Pendaftaran Anda: ' . $ppdb->no_pendaftaran);
    }

    public function cek()
    {
        return view('frontend.ppdb.cek');
    }

    public function cekStatus(Request $request)
    {
        $request->validate(['no_pendaftaran' => 'required|string']);
        $ppdb = Ppdb::where('no_pendaftaran', $request->no_pendaftaran)->first();
        return view('frontend.ppdb.cek', compact('ppdb'));
    }
}
