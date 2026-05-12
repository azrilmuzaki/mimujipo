@extends('admin.layouts.admin')
@section('title', 'Tambah Guru')
@section('page_title', 'Tambah Guru/Staff')
@section('breadcrumb', 'Guru / Tambah')
@section('content')
<div class="max-w-3xl">
<a href="{{ route('admin.guru.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="md:col-span-2"><label class="form-label">Nama Lengkap *</label><input type="text" name="nama" value="{{ old('nama') }}" class="form-input" required></div>
        <div><label class="form-label">Jabatan *</label><input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-input" required></div>
        <div><label class="form-label">NIP</label><input type="text" name="nip" value="{{ old('nip') }}" class="form-input"></div>
        <div><label class="form-label">Mata Pelajaran</label><input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}" class="form-input"></div>
        <div><label class="form-label">Pendidikan Terakhir</label><input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="form-input" placeholder="S1 PGMI ..."></div>
        <div><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email') }}" class="form-input"></div>
        <div><label class="form-label">Foto</label><input type="file" name="foto" accept="image/*" class="form-input"></div>
        <div class="md:col-span-2"><label class="form-label">Biodata Singkat</label><textarea name="bio" rows="3" class="form-input">{{ old('bio') }}</textarea></div>
        <div class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-green-600 rounded"><label class="text-sm font-medium text-gray-700">Aktif</label></div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 Simpan</button>
        <a href="{{ route('admin.guru.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
