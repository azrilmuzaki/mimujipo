@extends('admin.layouts.admin')
@section('title', 'Edit Pengumuman')
@section('page_title', 'Edit Pengumuman')
@section('breadcrumb', 'Pengumuman / Edit')
@section('content')
<div class="max-w-3xl">
<a href="{{ route('admin.pengumuman.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ route('admin.pengumuman.update', $pengumuman) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf @method('PUT')
    <div>
        <label class="form-label">Judul Pengumuman *</label>
        <input type="text" name="judul" value="{{ old('judul', $pengumuman->judul) }}" class="form-input" required>
    </div>
    <div>
        <label class="form-label">Isi Pengumuman *</label>
        <textarea name="konten" rows="6" class="form-input" required>{{ old('konten', $pengumuman->konten) }}</textarea>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div>
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $pengumuman->tanggal_mulai?->format('Y-m-d')) }}" class="form-input">
        </div>
        <div>
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $pengumuman->tanggal_selesai?->format('Y-m-d')) }}" class="form-input">
        </div>
    </div>
    <div>
        <label class="form-label">Ganti Lampiran (opsional)</label>
        @if($pengumuman->file_lampiran)
        <p class="text-xs text-blue-600 mb-1">📎 Lampiran saat ini: {{ basename($pengumuman->file_lampiran) }}</p>
        @endif
        <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx" class="form-input">
    </div>
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1" {{ $pengumuman->is_active ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded">
        <label class="text-sm font-medium text-gray-700">Aktif</label>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 Update</button>
        <a href="{{ route('admin.pengumuman.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
