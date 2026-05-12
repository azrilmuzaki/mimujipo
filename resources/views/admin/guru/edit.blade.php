@extends('admin.layouts.admin')
@section('title', 'Edit Guru')
@section('page_title', 'Edit Data Guru')
@section('breadcrumb', 'Guru / Edit')
@section('content')
<div class="max-w-3xl">
<a href="{{ route('admin.guru.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ route('admin.guru.update', $guru) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="md:col-span-2"><label class="form-label">Nama Lengkap *</label><input type="text" name="nama" value="{{ old('nama', $guru->nama) }}" class="form-input" required></div>
        <div><label class="form-label">Jabatan *</label><input type="text" name="jabatan" value="{{ old('jabatan', $guru->jabatan) }}" class="form-input" required></div>
        <div><label class="form-label">NIP</label><input type="text" name="nip" value="{{ old('nip', $guru->nip) }}" class="form-input"></div>
        <div><label class="form-label">Mata Pelajaran</label><input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}" class="form-input"></div>
        <div><label class="form-label">Pendidikan Terakhir</label><input type="text" name="pendidikan" value="{{ old('pendidikan', $guru->pendidikan) }}" class="form-input"></div>
        <div><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email', $guru->email) }}" class="form-input"></div>
        <div>
            <label class="form-label">Foto</label>
            @if($guru->foto && file_exists(public_path('storage/'.$guru->foto)))<img src="{{ asset('storage/'.$guru->foto) }}" alt="" class="h-16 rounded-xl mb-2">@endif
            <input type="file" name="foto" accept="image/*" class="form-input">
        </div>
        <div class="md:col-span-2"><label class="form-label">Biodata</label><textarea name="bio" rows="3" class="form-input">{{ old('bio', $guru->bio) }}</textarea></div>
        <div class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" {{ $guru->is_active ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded"><label class="text-sm font-medium text-gray-700">Aktif</label></div>
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 Update</button>
        <a href="{{ route('admin.guru.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
