<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::active()->orderBy('jabatan')->get();
        return view('frontend.guru.index', compact('gurus'));
    }
}
