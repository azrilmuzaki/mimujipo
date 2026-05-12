@extends('admin.layouts.admin')
@section('title', isset($ekskul) ? 'Edit Ekskul' : 'Tambah Ekskul')
@section('page_title', isset($ekskul) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')
@section('breadcrumb', 'Ekskul / ' . (isset($ekskul) ? 'Edit' : 'Tambah'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.ekskul.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ isset($ekskul) ? route('admin.ekskul.update', $ekskul) : route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @if(isset($ekskul)) @method('PUT') @endif
    <div><label class="form-label">Nama Ekskul *</label><input type="text" name="nama" value="{{ old('nama', $ekskul->nama ?? '') }}" class="form-input" required></div>
    <div><label class="form-label">Deskripsi</label><textarea name="deskripsi" rows="3" class="form-input">{{ old('deskripsi', $ekskul->deskripsi ?? '') }}</textarea></div>
    <div class="grid grid-cols-2 gap-5">
        <div><label class="form-label">Pembina</label><input type="text" name="pembina" value="{{ old('pembina', $ekskul->pembina ?? '') }}" class="form-input"></div>
        <div><label class="form-label">Jadwal</label><input type="text" name="jadwal" value="{{ old('jadwal', $ekskul->jadwal ?? '') }}" class="form-input" placeholder="Rabu, 14.00-16.00"></div>
    </div>
    <div>
        <label class="form-label">Foto</label>
        @if(isset($ekskul) && $ekskul->foto)<img src="{{ asset('storage/'.$ekskul->foto) }}" class="h-16 rounded-xl mb-2">@endif
        <input type="file" name="foto" accept="image/*" class="form-input">
    </div>
    <div class="flex items-center gap-2"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $ekskul->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded"><label class="text-sm font-medium text-gray-700">Aktif</label></div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 {{ isset($ekskul) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('admin.ekskul.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
