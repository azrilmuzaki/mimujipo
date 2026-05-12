@extends('admin.layouts.admin')
@section('title', 'Tambah Pengumuman')
@section('page_title', 'Tambah Pengumuman')
@section('breadcrumb', 'Pengumuman / Tambah')
@section('content')
<div class="max-w-3xl">
<a href="{{ route('admin.pengumuman.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    <div>
        <label class="form-label">Judul Pengumuman *</label>
        <input type="text" name="judul" value="{{ old('judul') }}" class="form-input" required>
    </div>
    <div>
        <label class="form-label">Isi Pengumuman *</label>
        <textarea name="konten" rows="6" class="form-input" required>{{ old('konten') }}</textarea>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div>
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" class="form-input">
        </div>
        <div>
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="form-input">
        </div>
    </div>
    <div>
        <label class="form-label">File Lampiran (PDF/DOC)</label>
        <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx" class="form-input">
    </div>
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-green-600 rounded">
        <label class="text-sm font-medium text-gray-700">Aktifkan Pengumuman</label>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 Simpan</button>
        <a href="{{ route('admin.pengumuman.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
