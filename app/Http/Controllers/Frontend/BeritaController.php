<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas   = Berita::published()->with('kategori')->latest('published_at')->paginate(9);
        $kategoris = KategoriBerita::withCount('berita')->get();
        $terbaru   = Berita::published()->latest('published_at')->take(5)->get();
        return view('frontend.berita.index', compact('beritas', 'kategoris', 'terbaru'));
    }

    public function kategori($slug)
    {
        $kategori  = KategoriBerita::where('slug', $slug)->firstOrFail();
        $beritas   = Berita::published()->where('kategori_id', $kategori->id)->with('kategori')->latest('published_at')->paginate(9);
        $kategoris = KategoriBerita::withCount('berita')->get();
        $terbaru   = Berita::published()->latest('published_at')->take(5)->get();
        return view('frontend.berita.index', compact('beritas', 'kategoris', 'terbaru', 'kategori'));
    }

    public function show($slug)
    {
        $berita = Berita::published()->where('slug', $slug)->with('kategori', 'user')->firstOrFail();
        $berita->increment('views');
        $related = Berita::published()
            ->where('kategori_id', $berita->kategori_id)
            ->where('id', '!=', $berita->id)
            ->latest('published_at')->take(3)->get();
        return view('frontend.berita.show', compact('berita', 'related'));
    }
}
