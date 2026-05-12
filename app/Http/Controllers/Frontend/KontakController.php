<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KontakPesan;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $setting = Pengaturan::pluck('value', 'key');
        return view('frontend.kontak.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email',
            'telepon' => 'nullable|string|max:20',
            'subjek'  => 'nullable|string|max:150',
            'pesan'   => 'required|string|max:2000',
        ]);

        KontakPesan::create($validated);

        return back()->with('success', 'Pesan Anda telah terkirim. Kami akan segera merespon.');
    }
}
