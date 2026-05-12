@extends('admin.layouts.admin')
@section('title', isset($program) ? 'Edit Program' : 'Tambah Program')
@section('page_title', isset($program) ? 'Edit Program Unggulan' : 'Tambah Program Unggulan')
@section('breadcrumb', 'Program / ' . (isset($program) ? 'Edit' : 'Tambah'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.program.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ isset($program) ? route('admin.program.update', $program) : route('admin.program.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @if(isset($program)) @method('PUT') @endif
    <div><label class="form-label">Judul Program *</label><input type="text" name="judul" value="{{ old('judul', $program->judul ?? '') }}" class="form-input" required></div>
    <div><label class="form-label">Deskripsi *</label><textarea name="deskripsi" rows="4" class="form-input" required>{{ old('deskripsi', $program->deskripsi ?? '') }}</textarea></div>
    <div class="grid grid-cols-3 gap-5">
        <div><label class="form-label">Icon (Emoji)</label><input type="text" name="icon" value="{{ old('icon', $program->icon ?? '⭐') }}" class="form-input text-center text-2xl" placeholder="⭐"></div>
        <div><label class="form-label">Warna (Hex)</label><input type="text" name="warna" value="{{ old('warna', $program->warna ?? '#16a34a') }}" class="form-input" placeholder="#16a34a"></div>
        <div><label class="form-label">Urutan</label><input type="number" name="urutan" value="{{ old('urutan', $program->urutan ?? 1) }}" min="1" class="form-input"></div>
    </div>
    <div>
        <label class="form-label">Gambar (opsional)</label>
        @if(isset($program) && $program->gambar)
        <img src="{{ asset('storage/'.$program->gambar) }}" class="h-16 rounded-xl mb-2">
        @endif
        <input type="file" name="gambar" accept="image/*" class="form-input">
    </div>
    <div class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded"><label class="text-sm font-medium text-gray-700">Aktif</label></div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 {{ isset($program) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('admin.program.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
