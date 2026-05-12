<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('urutan')->paginate(15);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption'      => 'required|string|max:200',
            'subketerangan'=> 'nullable|string|max:300',
            'link'         => 'nullable|string|max:200',
            'urutan'       => 'nullable|integer',
            'is_active'    => 'boolean',
            'image'        => 'required|image|max:3072',
        ]);
        $validated['image']     = $request->file('image')->store('sliders', 'public');
        $validated['is_active'] = $request->boolean('is_active');
        Slider::create($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'caption'      => 'required|string|max:200',
            'subketerangan'=> 'nullable|string|max:300',
            'link'         => 'nullable|string|max:200',
            'urutan'       => 'nullable|integer',
            'is_active'    => 'boolean',
            'image'        => 'nullable|image|max:3072',
        ]);
        if ($request->hasFile('image')) {
            if ($slider->image) Storage::disk('public')->delete($slider->image);
            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');
        $slider->update($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil diperbarui.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) Storage::disk('public')->delete($slider->image);
        $slider->delete();
        return back()->with('success', 'Slider berhasil dihapus.');
    }
}
