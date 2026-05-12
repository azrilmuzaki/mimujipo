<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlbumGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = AlbumGaleri::withCount('foto')->latest()->paginate(15);
        return view('admin.galeri.album_index', compact('albums'));
    }

    public function create()
    {
        return view('admin.galeri.album_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'tanggal'   => 'nullable|date',
            'cover'     => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('galeri/covers', 'public');
        }
        AlbumGaleri::create($validated);
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil ditambahkan.');
    }

    public function edit(AlbumGaleri $album)
    {
        return view('admin.galeri.album_edit', compact('album'));
    }

    public function update(Request $request, AlbumGaleri $album)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'tanggal'   => 'nullable|date',
            'cover'     => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            if ($album->cover) Storage::disk('public')->delete($album->cover);
            $validated['cover'] = $request->file('cover')->store('galeri/covers', 'public');
        }
        $album->update($validated);
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy(AlbumGaleri $album)
    {
        $album->foto->each(fn($f) => Storage::disk('public')->delete($f->gambar));
        if ($album->cover) Storage::disk('public')->delete($album->cover);
        $album->delete();
        return back()->with('success', 'Album berhasil dihapus.');
    }
}
