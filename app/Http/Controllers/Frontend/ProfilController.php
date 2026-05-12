<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use App\Models\Guru;
use App\Models\StrukturOrg;

class ProfilController extends Controller
{
    public function index()
    {
        $setting  = Pengaturan::pluck('value', 'key');
        $struktur = StrukturOrg::orderBy('urutan')->get();
        return view('frontend.profil.index', compact('setting', 'struktur'));
    }
}
