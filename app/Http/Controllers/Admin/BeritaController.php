<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori', 'user');
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        $beritas = $query->latest()->paginate(15);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategoris = KategoriBerita::all();
        return view('admin.berita.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'konten'       => 'required|string',
            'kategori_id'  => 'required|exists:kategori_berita,id',
            'gambar'       => 'nullable|image|max:2048',
            'is_featured'  => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        $validated['user_id']      = auth()->id();
        $validated['is_featured']  = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        Berita::create($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        $kategoris = KategoriBerita::all();
        return view('admin.berita.edit', compact('berita', 'kategoris'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'konten'       => 'required|string',
            'kategori_id'  => 'required|exists:kategori_berita,id',
            'gambar'       => 'nullable|image|max:2048',
            'is_featured'  => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        $validated['is_featured']  = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published');

        $berita->update($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
