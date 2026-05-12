@extends('admin.layouts.admin')
@section('title', isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi')
@section('page_title', isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi')
@section('breadcrumb', 'Prestasi / ' . (isset($prestasi) ? 'Edit' : 'Tambah'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.prestasi.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ isset($prestasi) ? route('admin.prestasi.update', $prestasi) : route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @if(isset($prestasi)) @method('PUT') @endif

    <div>
        <label class="form-label">Nama Prestasi *</label>
        <input type="text" name="nama_prestasi" value="{{ old('nama_prestasi', $prestasi->nama_prestasi ?? '') }}" class="form-input" required>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div>
            <label class="form-label">Kategori *</label>
            <select name="kategori" class="form-input" required>
                <option value="">-- Pilih --</option>
                <option value="akademik" {{ old('kategori', $prestasi->kategori ?? '') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                <option value="non-akademik" {{ old('kategori', $prestasi->kategori ?? '') == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
            </select>
        </div>
        <div>
            <label class="form-label">Tingkat *</label>
            <select name="tingkat" class="form-input" required>
                <option value="">-- Pilih --</option>
                @foreach(['kecamatan'=>'Kecamatan','kabupaten'=>'Kabupaten','provinsi'=>'Provinsi','nasional'=>'Nasional','internasional'=>'Internasional'] as $val => $label)
                <option value="{{ $val }}" {{ old('tingkat', $prestasi->tingkat ?? '') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="form-label">Tahun *</label>
            <input type="number" name="tahun" value="{{ old('tahun', $prestasi->tahun ?? date('Y')) }}" min="2000" max="2030" class="form-input" required>
        </div>
        <div>
            <label class="form-label">Penyelenggara</label>
            <input type="text" name="penyelenggara" value="{{ old('penyelenggara', $prestasi->penyelenggara ?? '') }}" class="form-input">
        </div>
    </div>
    <div>
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" rows="3" class="form-input">{{ old('keterangan', $prestasi->keterangan ?? '') }}</textarea>
    </div>
    <div>
        <label class="form-label">Foto Piala/Sertifikat</label>
        @if(isset($prestasi) && $prestasi->foto)
        <img src="{{ asset('storage/'.$prestasi->foto) }}" class="h-16 rounded-xl mb-2">
        @endif
        <input type="file" name="foto" accept="image/*" class="form-input">
    </div>
    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 {{ isset($prestasi) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('admin.prestasi.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
