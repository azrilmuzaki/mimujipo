<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::latest()->paginate(15);
        return view('admin.ekskul.index', compact('ekskuls'));
    }

    public function create()
    {
        return view('admin.ekskul.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'pembina'   => 'nullable|string|max:100',
            'jadwal'    => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'foto'      => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('ekskul', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        Ekskul::create($validated);
        return redirect()->route('admin.ekskul.index')->with('success', 'Ekskul berhasil ditambahkan.');
    }

    public function edit(Ekskul $ekskul)
    {
        return view('admin.ekskul.edit', compact('ekskul'));
    }

    public function update(Request $request, Ekskul $ekskul)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'pembina'   => 'nullable|string|max:100',
            'jadwal'    => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'foto'      => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            if ($ekskul->foto) Storage::disk('public')->delete($ekskul->foto);
            $validated['foto'] = $request->file('foto')->store('ekskul', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        $ekskul->update($validated);
        return redirect()->route('admin.ekskul.index')->with('success', 'Ekskul berhasil diperbarui.');
    }

    public function destroy(Ekskul $ekskul)
    {
        if ($ekskul->foto) Storage::disk('public')->delete($ekskul->foto);
        $ekskul->delete();
        return back()->with('success', 'Ekskul berhasil dihapus.');
    }
}
