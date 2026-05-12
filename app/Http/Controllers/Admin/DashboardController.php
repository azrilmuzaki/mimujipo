<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Ppdb;
use App\Models\KontakPesan;
use App\Models\AlbumGaleri;
use App\Models\Pengaturan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'siswa'     => (int) Pengaturan::getValue('jumlah_siswa', '0'),
            'guru'      => Guru::active()->count(),
            'berita'    => Berita::count(),
            'ppdb'      => Ppdb::count(),
            'ppdb_baru' => Ppdb::where('status', 'pending')->count(),
            'pesan_baru'=> KontakPesan::unread()->count(),
        ];

        $ppdb_terbaru  = Ppdb::latest()->take(5)->get();
        $pesan_terbaru = KontakPesan::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'ppdb_terbaru', 'pesan_terbaru'));
    }
}
