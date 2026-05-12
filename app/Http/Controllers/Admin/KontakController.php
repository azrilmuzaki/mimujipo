<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakPesan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $pesans = KontakPesan::latest()->paginate(15);
        return view('admin.kontak.index', compact('pesans'));
    }

    public function show(KontakPesan $kontak)
    {
        $kontak->markAsRead();
        return view('admin.kontak.show', compact('kontak'));
    }

    public function markRead(KontakPesan $kontak)
    {
        $kontak->markAsRead();
        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroy(KontakPesan $kontak)
    {
        $kontak->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
