@extends('admin.layouts.admin')
@section('title', 'Tambah Slide')
@section('page_title', 'Tambah Slide/Banner')
@section('breadcrumb', 'Slider / Tambah')
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.slider.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    <div><label class="form-label">Caption / Judul *</label><input type="text" name="caption" value="{{ old('caption') }}" class="form-input" required></div>
    <div><label class="form-label">Sub Keterangan</label><input type="text" name="subketerangan" value="{{ old('subketerangan') }}" class="form-input" placeholder="Tagline atau deskripsi singkat"></div>
    <div><label class="form-label">Link URL (opsional)</label><input type="text" name="link" value="{{ old('link') }}" class="form-input" placeholder="https://..."></div>
    <div class="grid grid-cols-2 gap-5">
        <div><label class="form-label">Urutan</label><input type="number" name="urutan" value="{{ old('urutan', 1) }}" min="1" class="form-input"></div>
        <div class="flex items-center gap-2 mt-6"><input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-green-600 rounded"><label class="text-sm font-medium text-gray-700">Aktif</label></div>
    </div>
    <div>
        <label class="form-label">Gambar Slide *</label>
        <input type="file" name="image" accept="image/*" class="form-input" required>
        <p class="text-xs text-gray-400 mt-1">Rekomendasi ukuran: 1920×800px. Max 5MB.</p>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 Simpan</button>
        <a href="{{ route('admin.slider.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
