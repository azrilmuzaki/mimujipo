<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrgController extends Controller
{
    public function index()
    {
        $struktors = StrukturOrg::orderBy('urutan')->paginate(15);
        return view('admin.struktur_org.index', compact('struktors'));
    }

    public function create()
    {
        return view('admin.struktur_org.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:150',
            'jabatan' => 'required|string|max:100',
            'urutan'  => 'nullable|integer',
            'foto'    => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }
        StrukturOrg::create($validated);
        return redirect()->route('admin.struktur-org.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(StrukturOrg $strukturOrg)
    {
        return view('admin.struktur_org.edit', compact('strukturOrg'));
    }

    public function update(Request $request, StrukturOrg $strukturOrg)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:150',
            'jabatan' => 'required|string|max:100',
            'urutan'  => 'nullable|integer',
            'foto'    => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            if ($strukturOrg->foto) Storage::disk('public')->delete($strukturOrg->foto);
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }
        $strukturOrg->update($validated);
        return redirect()->route('admin.struktur-org.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(StrukturOrg $strukturOrg)
    {
        if ($strukturOrg->foto) Storage::disk('public')->delete($strukturOrg->foto);
        $strukturOrg->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
