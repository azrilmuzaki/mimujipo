<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $settings = Pengaturan::pluck('value', 'key');
        return view('admin.pengaturan.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method', 'logo_file', 'favicon_file']);

        foreach ($data as $key => $value) {
            Pengaturan::setValue($key, $value ?? '');
        }

        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('settings', 'public');
            Pengaturan::setValue('logo', $path);
        }
        if ($request->hasFile('favicon_file')) {
            $path = $request->file('favicon_file')->store('settings', 'public');
            Pengaturan::setValue('favicon', $path);
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
