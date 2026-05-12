<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\AlbumGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::with('album');
        if ($request->filled('album_id')) {
            $query->where('album_id', $request->album_id);
        }
        $galeris = $query->orderBy('urutan')->paginate(20);
        $albums  = AlbumGaleri::all();
        return view('admin.galeri.index', compact('galeris', 'albums'));
    }

    public function create()
    {
        $albums = AlbumGaleri::all();
        return view('admin.galeri.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:album_galeri,id',
            'gambar'   => 'required|array|min:1',
            'gambar.*' => 'image|max:3072',
            'caption'  => 'nullable|string',
        ]);
        foreach ($request->file('gambar') as $index => $file) {
            Galeri::create([
                'album_id' => $request->album_id,
                'gambar'   => $file->store('galeri', 'public'),
                'caption'  => $request->caption,
                'urutan'   => $index,
            ]);
        }
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diupload.');
    }

    public function edit(Galeri $galeri)
    {
        $albums = AlbumGaleri::all();
        return view('admin.galeri.edit', compact('galeri', 'albums'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:album_galeri,id',
            'caption'  => 'nullable|string',
            'urutan'   => 'nullable|integer',
            'gambar'   => 'nullable|image|max:3072',
        ]);
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($galeri->gambar);
            $validated['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }
        $galeri->update($validated);
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
