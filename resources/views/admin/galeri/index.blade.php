@extends('admin.layouts.admin')
@section('title', 'Foto Galeri')
@section('page_title', 'Foto Galeri')
@section('breadcrumb', 'Foto Galeri')
@section('content')

{{-- Filter & Tombol --}}
<div class="flex flex-col sm:flex-row gap-3 items-start sm:items-center justify-between mb-6">
    <form method="GET" class="flex gap-2 items-center">
        <select name="album_id" class="form-input !py-2 w-auto" onchange="this.form.submit()">
            <option value="">Semua Album</option>
            @foreach($albums as $a)
            <option value="{{ $a->id }}" {{ request('album_id') == $a->id ? 'selected' : '' }}>
                {{ $a->nama }}
            </option>
            @endforeach
        </select>
        @if(request('album_id'))
        <a href="{{ route('admin.galeri.index') }}" class="text-xs text-gray-400 hover:text-red-500">✕ Reset</a>
        @endif
    </form>
    <a href="{{ route('admin.galeri.create') }}" class="btn-primary whitespace-nowrap">➕ Upload Foto</a>
</div>

<div class="admin-card p-4">
    @forelse($galeris as $foto)
    @if($loop->first)
    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-8 gap-3">
    @endif

    <div class="relative group rounded-xl overflow-hidden aspect-square bg-gray-100 border border-gray-100">
        @if(file_exists(public_path('storage/'.$foto->gambar)))
        <img src="{{ asset('storage/'.$foto->gambar) }}" alt="{{ $foto->caption }}"
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
        <div class="w-full h-full flex items-center justify-center text-3xl text-gray-300">🖼️</div>
        @endif

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-200
                    flex flex-col items-center justify-center gap-1 p-2">
            @if($foto->caption)
            <p class="text-white text-xs text-center line-clamp-2 mb-1">{{ $foto->caption }}</p>
            @endif
            <p class="text-gray-300 text-xs">{{ $foto->album->nama ?? '-' }}</p>
            <div class="flex gap-2 mt-1">
                <a href="{{ route('admin.galeri.edit', $foto) }}"
                   class="text-xs bg-white/20 hover:bg-white/40 text-white px-2 py-1 rounded-lg transition">
                    ✏️
                </a>
                <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST"
                      onsubmit="return confirm('Hapus foto ini?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="text-xs bg-red-500/80 hover:bg-red-500 text-white px-2 py-1 rounded-lg transition">
                        🗑️
                    </button>
                </form>
            </div>
        </div>
    </div>

    @if($loop->last)</div>@endif
    @empty
    <div class="text-center py-16 text-gray-400">
        <div class="text-5xl mb-3">📷</div>
        <p class="font-medium">Belum ada foto</p>
        @if(request('album_id'))
        <p class="text-sm mt-1">Album ini belum memiliki foto. <a href="{{ route('admin.galeri.create') }}" class="text-green-600 hover:underline">Upload sekarang</a></p>
        @else
        <p class="text-sm mt-1">Klik "Upload Foto" untuk menambahkan foto galeri</p>
        @endif
    </div>
    @endforelse

    {{-- Pagination --}}
    @if($galeris->hasPages())
    <div class="mt-4 border-t border-gray-50 pt-4">{{ $galeris->appends(request()->query())->links() }}</div>
    @endif
</div>

{{-- Info jumlah foto --}}
@if($galeris->count())
<p class="text-xs text-gray-400 mt-2 text-right">
    Menampilkan {{ $galeris->count() }} dari {{ $galeris->total() }} foto
</p>
@endif
@endsection
