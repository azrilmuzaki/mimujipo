@extends('admin.layouts.admin')
@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita Baru')
@section('breadcrumb', 'Berita / Tambah')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.berita.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali ke Daftar Berita</a>

    <div class="admin-card">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 js-berita-form">
            @csrf

            <div>
                <label class="form-label">Judul Berita *</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="form-input @error('judul') border-red-400 @enderror" required>
                @error('judul')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="form-label">Kategori *</label>
                    <select name="kategori_id" class="form-input" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $k)
                        <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Tanggal Publish</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Gambar Cover</label>
                <input type="file" name="gambar" accept="image/*" class="form-input">
                <p class="text-xs text-gray-400 mt-1">Max 2MB. Format: JPG, PNG, WebP</p>
            </div>

            <div>
                <label class="form-label">Konten Berita *</label>
                <textarea name="konten" id="editor" rows="12" class="form-input">{{ old('konten') }}</textarea>
                @error('konten')<p class="form-error">{{ $message }}</p>@enderror
                <p class="text-xs text-gray-400 mt-1">Jika toolbar editor tidak muncul, konten tetap bisa diketik langsung di area ini.</p>
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded">
                    <span class="text-sm font-medium text-gray-700">Publikasikan sekarang</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 text-yellow-500 rounded">
                    <span class="text-sm font-medium text-gray-700">⭐ Jadikan Featured</span>
                </label>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary">💾 Simpan Berita</button>
                <a href="{{ route('admin.berita.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@include('admin.berita._editor_scripts')
