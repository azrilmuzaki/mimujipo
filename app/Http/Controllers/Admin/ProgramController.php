<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramUnggulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = ProgramUnggulan::orderBy('urutan')->paginate(15);
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'icon'      => 'nullable|string|max:10',
            'warna'     => 'nullable|string|max:10',
            'urutan'    => 'nullable|integer',
            'is_active' => 'boolean',
            'gambar'    => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('program', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        ProgramUnggulan::create($validated);
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(ProgramUnggulan $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, ProgramUnggulan $program)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'icon'      => 'nullable|string|max:10',
            'warna'     => 'nullable|string|max:10',
            'urutan'    => 'nullable|integer',
            'is_active' => 'boolean',
            'gambar'    => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            if ($program->gambar) Storage::disk('public')->delete($program->gambar);
            $validated['gambar'] = $request->file('gambar')->store('program', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        $program->update($validated);
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(ProgramUnggulan $program)
    {
        if ($program->gambar) Storage::disk('public')->delete($program->gambar);
        $program->delete();
        return back()->with('success', 'Program berhasil dihapus.');
    }
}
