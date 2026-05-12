<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->filled('tingkat')) {
            $query->where('tingkat', $request->tingkat);
        }

        $prestasis = $query->latest()->paginate(12);
        $tahuns    = Prestasi::select('tahun')->distinct()->orderByDesc('tahun')->pluck('tahun');

        return view('frontend.prestasi.index', compact('prestasis', 'tahuns'));
    }
}
