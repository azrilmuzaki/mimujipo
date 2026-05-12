<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::query();
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%'.$request->search.'%')
                  ->orWhere('jabatan', 'like', '%'.$request->search.'%');
        }
        $gurus = $query->orderBy('jabatan')->paginate(15);
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:150',
            'nip'            => 'nullable|string|max:30',
            'jabatan'        => 'required|string|max:100',
            'mata_pelajaran' => 'nullable|string|max:200',
            'pendidikan'     => 'nullable|string|max:150',
            'email'          => 'nullable|email',
            'bio'            => 'nullable|string',
            'foto'           => 'nullable|image|max:2048',
            'is_active'      => 'boolean',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        Guru::create($validated);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:150',
            'nip'            => 'nullable|string|max:30',
            'jabatan'        => 'required|string|max:100',
            'mata_pelajaran' => 'nullable|string|max:200',
            'pendidikan'     => 'nullable|string|max:150',
            'email'          => 'nullable|email',
            'bio'            => 'nullable|string',
            'foto'           => 'nullable|image|max:2048',
            'is_active'      => 'boolean',
        ]);
        if ($request->hasFile('foto')) {
            if ($guru->foto) Storage::disk('public')->delete($guru->foto);
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        $guru->update($validated);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) Storage::disk('public')->delete($guru->foto);
        $guru->delete();
        return back()->with('success', 'Data guru berhasil dihapus.');
    }
}
