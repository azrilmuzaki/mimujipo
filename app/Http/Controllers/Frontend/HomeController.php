<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Slider;
use App\Models\Pengumuman;
use App\Models\Guru;
use App\Models\AlbumGaleri;
use App\Models\ProgramUnggulan;
use App\Models\Pengaturan;

class HomeController extends Controller
{
    public function index()
    {
        $sliders     = Slider::active()->get();
        $programs    = ProgramUnggulan::active()->take(6)->get();
        $berita      = Berita::published()->with('kategori')->latest('published_at')->take(4)->get();
        $pengumuman  = Pengumuman::active()->latest()->take(3)->get();
        $albums      = AlbumGaleri::with('foto')->latest()->take(4)->get();
        $setting     = Pengaturan::pluck('value', 'key');

        return view('frontend.home', compact(
            'sliders', 'programs', 'berita', 'pengumuman', 'albums', 'setting'
        ));
    }
}
