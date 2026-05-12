<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();
        if ($request->filled('tahun'))    $query->where('tahun', $request->tahun);
        if ($request->filled('kategori')) $query->where('kategori', $request->kategori);
        $prestasis = $query->latest()->paginate(15);
        $tahuns    = Prestasi::select('tahun')->distinct()->orderByDesc('tahun')->pluck('tahun');
        return view('admin.prestasi.index', compact('prestasis', 'tahuns'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori'      => 'required|in:akademik,non-akademik',
            'tingkat'       => 'required|in:kecamatan,kabupaten,provinsi,nasional,internasional',
            'tahun'         => 'required|digits:4',
            'keterangan'    => 'nullable|string',
            'penyelenggara' => 'nullable|string|max:200',
            'foto'          => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('prestasi', 'public');
        }
        Prestasi::create($validated);
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori'      => 'required|in:akademik,non-akademik',
            'tingkat'       => 'required|in:kecamatan,kabupaten,provinsi,nasional,internasional',
            'tahun'         => 'required|digits:4',
            'keterangan'    => 'nullable|string',
            'penyelenggara' => 'nullable|string|max:200',
            'foto'          => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            if ($prestasi->foto) Storage::disk('public')->delete($prestasi->foto);
            $validated['foto'] = $request->file('foto')->store('prestasi', 'public');
        }
        $prestasi->update($validated);
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto) Storage::disk('public')->delete($prestasi->foto);
        $prestasi->delete();
        return back()->with('success', 'Prestasi berhasil dihapus.');
    }
}
