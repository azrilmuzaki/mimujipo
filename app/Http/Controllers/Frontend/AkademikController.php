<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;

class AkademikController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::active()->get();
        return view('frontend.akademik.index', compact('ekskuls'));
    }
}
