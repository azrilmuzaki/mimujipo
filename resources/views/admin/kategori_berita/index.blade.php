@extends('admin.layouts.admin')
@section('title', 'Kategori Berita')
@section('page_title', 'Kategori Berita')
@section('breadcrumb', 'Kategori Berita')
@section('content')
<div class="max-w-3xl">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Form Tambah --}}
    <div class="admin-card">
        <h3 class="font-bold text-gray-800 mb-4">➕ Tambah Kategori</h3>
        <form action="{{ route('admin.kategori-berita.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="form-label">Nama Kategori *</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-input @error('nama') border-red-400 @enderror" required>
                @error('nama')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="2" class="form-input">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" class="btn-primary w-full justify-center">💾 Simpan</button>
        </form>
    </div>

    {{-- Daftar Kategori --}}
    <div class="admin-card">
        <h3 class="font-bold text-gray-800 mb-4">📋 Daftar Kategori</h3>
        <div class="space-y-2">
            @forelse($kategoris as $k)
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <div>
                    <span class="font-medium text-gray-800 text-sm">{{ $k->nama }}</span>
                    <span class="text-xs text-gray-400 ml-2">({{ $k->berita_count ?? 0 }} berita)</span>
                </div>
                <form action="{{ route('admin.kategori-berita.destroy', $k) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button class="text-red-400 hover:text-red-600 text-xs">🗑️</button>
                </form>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Belum ada kategori</p>
            @endforelse
        </div>
    </div>
</div>
</div>
@endsection
