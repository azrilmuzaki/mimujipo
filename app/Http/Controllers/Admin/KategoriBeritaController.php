<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategoris = KategoriBerita::withCount('berita')->latest()->paginate(15);
        return view('admin.kategori_berita.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori_berita.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:100|unique:kategori_berita,nama']);
        KategoriBerita::create(['nama' => $request->nama]);
        return redirect()->route('admin.kategori-berita.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(KategoriBerita $kategoriBerita)
    {
        return view('admin.kategori_berita.edit', compact('kategoriBerita'));
    }

    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        $request->validate(['nama' => 'required|string|max:100|unique:kategori_berita,nama,' . $kategoriBerita->id]);
        $kategoriBerita->update(['nama' => $request->nama]);
        return redirect()->route('admin.kategori-berita.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
