@extends('admin.layouts.admin')
@section('title', isset($galeri) ? 'Edit Foto' : 'Upload Foto Galeri')
@section('page_title', isset($galeri) ? 'Edit Foto' : 'Upload Foto Galeri')
@section('breadcrumb', 'Foto Galeri / ' . (isset($galeri) ? 'Edit' : 'Upload'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.galeri.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali ke Foto Galeri</a>

<div class="admin-card">
    <form action="{{ isset($galeri) ? route('admin.galeri.update', $galeri) : route('admin.galeri.store') }}"
          method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @if(isset($galeri)) @method('PUT') @endif

        {{-- Pilih Album --}}
        <div>
            <label class="form-label">Album *</label>
            <select name="{{ isset($galeri) ? 'album_id' : 'album_id' }}" class="form-input @error('album_id') border-red-400 @enderror" required>
                <option value="">-- Pilih Album --</option>
                @foreach($albums as $a)
                <option value="{{ $a->id }}"
                    {{ old('album_id', $galeri->album_id ?? '') == $a->id ? 'selected' : '' }}>
                    {{ $a->nama }}
                </option>
                @endforeach
            </select>
            @error('album_id')<p class="form-error">{{ $message }}</p>@enderror
            <p class="text-xs text-gray-400 mt-1">
                Belum ada album?
                <a href="{{ route('admin.album.create') }}" target="_blank" class="text-green-600 hover:underline">Buat album baru ↗</a>
            </p>
        </div>

        {{-- Upload Foto --}}
        @if(!isset($galeri))
        <div>
            <label class="form-label">Pilih Foto * <span class="text-gray-400 font-normal">(bisa pilih beberapa sekaligus)</span></label>
            <input type="file" name="gambar[]" accept="image/*" multiple
                   class="form-input @error('gambar') border-red-400 @enderror" required>
            @error('gambar')<p class="form-error">{{ $message }}</p>@enderror
            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, WebP. Max 3MB per foto.</p>
        </div>
        @else
        <div>
            <label class="form-label">Ganti Foto (opsional)</label>
            @if(file_exists(public_path('storage/'.$galeri->gambar)))
            <div class="mb-2">
                <img src="{{ asset('storage/'.$galeri->gambar) }}" alt=""
                     class="h-28 w-44 object-cover rounded-xl border border-gray-200">
                <p class="text-xs text-gray-400 mt-1">Foto saat ini</p>
            </div>
            @endif
            <input type="file" name="gambar" accept="image/*" class="form-input">
        </div>
        @endif

        {{-- Caption --}}
        <div>
            <label class="form-label">Caption / Keterangan</label>
            <input type="text" name="caption"
                   value="{{ old('caption', $galeri->caption ?? '') }}"
                   class="form-input" placeholder="Keterangan singkat foto (opsional)">
        </div>

        {{-- Urutan (hanya edit) --}}
        @if(isset($galeri))
        <div>
            <label class="form-label">Urutan</label>
            <input type="number" name="urutan" value="{{ old('urutan', $galeri->urutan ?? 0) }}"
                   min="0" class="form-input w-32">
        </div>
        @endif

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary">
                {{ isset($galeri) ? '💾 Update' : '📤 Upload Foto' }}
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
</div>
@endsection
