@extends('admin.layouts.admin')
@section('title', isset($album) ? 'Edit Album' : 'Tambah Album Galeri')
@section('page_title', isset($album) ? 'Edit Album' : 'Tambah Album Galeri')
@section('breadcrumb', 'Album Galeri / ' . (isset($album) ? 'Edit' : 'Tambah'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.album.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali ke Album</a>

<div class="admin-card">
    <form action="{{ isset($album) ? route('admin.album.update', $album) : route('admin.album.store') }}"
          method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @if(isset($album)) @method('PUT') @endif

        <div>
            <label class="form-label">Nama Album *</label>
            <input type="text" name="nama" value="{{ old('nama', $album->nama ?? '') }}"
                   class="form-input @error('nama') border-red-400 @enderror" required
                   placeholder="Contoh: Pensi Akhir Tahun 2024">
            @error('nama')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="form-input"
                      placeholder="Keterangan singkat tentang album ini">{{ old('deskripsi', $album->deskripsi ?? '') }}</textarea>
        </div>

        <div>
            <label class="form-label">Tanggal Kegiatan</label>
            <input type="date" name="tanggal"
                   value="{{ old('tanggal', isset($album) ? $album->tanggal?->format('Y-m-d') : '') }}"
                   class="form-input">
        </div>

        <div>
            <label class="form-label">Foto Cover Album</label>
            @if(isset($album) && $album->cover && file_exists(public_path('storage/'.$album->cover)))
            <div class="mb-2">
                <img src="{{ asset('storage/'.$album->cover) }}" alt="Cover"
                     class="h-28 w-48 object-cover rounded-xl border border-gray-200">
                <p class="text-xs text-gray-400 mt-1">Cover saat ini</p>
            </div>
            @endif
            <input type="file" name="cover" accept="image/*" class="form-input">
            <p class="text-xs text-gray-400 mt-1">Rekomendasi: landscape 800×500px. Max 2MB.</p>
        </div>

        @if(isset($album) && $album->foto->count() > 0)
        <div class="bg-green-50 rounded-xl p-4">
            <p class="text-sm font-medium text-green-800">
                📷 Album ini memiliki <strong>{{ $album->foto->count() }}</strong> foto.
                Untuk upload/hapus foto, gunakan menu <strong>Foto Galeri</strong>.
            </p>
        </div>
        @endif

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">
                💾 {{ isset($album) ? 'Update Album' : 'Buat Album' }}
            </button>
            <a href="{{ route('admin.album.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
</div>
@endsection
