@extends('admin.layouts.admin')
@section('title', isset($strukturOrg) ? 'Edit Anggota' : 'Tambah Anggota Struktur')
@section('page_title', isset($strukturOrg) ? 'Edit Anggota Struktur' : 'Tambah Anggota Struktur')
@section('breadcrumb', 'Struktur Org / ' . (isset($strukturOrg) ? 'Edit' : 'Tambah'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.struktur-org.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>

<div class="admin-card">
    <form action="{{ isset($strukturOrg) ? route('admin.struktur-org.update', $strukturOrg) : route('admin.struktur-org.store') }}"
          method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @if(isset($strukturOrg)) @method('PUT') @endif

        <div>
            <label class="form-label">Nama Lengkap *</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $strukturOrg->nama ?? '') }}"
                   class="form-input @error('nama') border-red-400 @enderror"
                   required placeholder="Contoh: H. Ahmad Fauzi, S.Pd.I">
            @error('nama')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="form-label">Jabatan *</label>
            <input type="text" name="jabatan"
                   value="{{ old('jabatan', $strukturOrg->jabatan ?? '') }}"
                   class="form-input @error('jabatan') border-red-400 @enderror"
                   required placeholder="Contoh: Kepala Madrasah">
            @error('jabatan')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="urutan"
                   value="{{ old('urutan', $strukturOrg->urutan ?? 1) }}"
                   min="1" class="form-input w-32">
            <p class="text-xs text-gray-400 mt-1">Angka lebih kecil = tampil lebih awal</p>
        </div>

        <div>
            <label class="form-label">Foto</label>
            @if(isset($strukturOrg) && $strukturOrg->foto && file_exists(public_path('storage/'.$strukturOrg->foto)))
            <div class="mb-2 flex items-center gap-3">
                <img src="{{ asset('storage/'.$strukturOrg->foto) }}" alt="{{ $strukturOrg->nama }}"
                     class="h-16 w-16 rounded-full object-cover border-2 border-green-200">
                <p class="text-xs text-gray-400">Foto saat ini</p>
            </div>
            @endif
            <input type="file" name="foto" accept="image/*" class="form-input">
            <p class="text-xs text-gray-400 mt-1">Rekomendasi: foto portrait 400×400px. Max 2MB.</p>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">
                💾 {{ isset($strukturOrg) ? 'Update Data' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.struktur-org.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
</div>
@endsection
