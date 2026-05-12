<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AlbumGaleri;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $albums = AlbumGaleri::withCount('foto')->latest()->paginate(12);
        return view('frontend.galeri.index', compact('albums'));
    }

    public function album($id)
    {
        $album = AlbumGaleri::with('foto')->findOrFail($id);
        return view('frontend.galeri.album', compact('album'));
    }
}
