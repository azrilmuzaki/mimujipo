@extends('admin.layouts.admin')
@section('title', 'Edit Slide')
@section('page_title', 'Edit Slide/Banner')
@section('breadcrumb', 'Slider / Edit')
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.slider.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ route('admin.slider.update', $slider) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf @method('PUT')
    <div><label class="form-label">Caption *</label><input type="text" name="caption" value="{{ old('caption', $slider->caption) }}" class="form-input" required></div>
    <div><label class="form-label">Sub Keterangan</label><input type="text" name="subketerangan" value="{{ old('subketerangan', $slider->subketerangan) }}" class="form-input"></div>
    <div><label class="form-label">Link URL</label><input type="text" name="link" value="{{ old('link', $slider->link) }}" class="form-input"></div>
    <div class="grid grid-cols-2 gap-5">
        <div><label class="form-label">Urutan</label><input type="number" name="urutan" value="{{ old('urutan', $slider->urutan) }}" min="1" class="form-input"></div>
        <div class="flex items-center gap-2 mt-6"><input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded"><label class="text-sm font-medium text-gray-700">Aktif</label></div>
    </div>
    <div>
        <label class="form-label">Ganti Gambar</label>
        @if($slider->image && file_exists(public_path('storage/'.$slider->image)))
        <img src="{{ asset('storage/'.$slider->image) }}" class="h-24 rounded-xl mb-2 object-cover" alt="">
        @endif
        <input type="file" name="image" accept="image/*" class="form-input">
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 Update</button>
        <a href="{{ route('admin.slider.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
