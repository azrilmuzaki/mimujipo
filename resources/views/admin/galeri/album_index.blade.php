@extends('admin.layouts.admin')
@section('title', 'Album Galeri')
@section('page_title', 'Album Galeri')
@section('breadcrumb', 'Album Galeri')
@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Kelola album foto galeri madrasah</p>
    <a href="{{ route('admin.album.create') }}" class="btn-primary">➕ Tambah Album</a>
</div>

<div class="admin-card">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-2">
        @forelse($albums as $album)
        <div class="border border-gray-100 rounded-2xl overflow-hidden hover:border-green-200 hover:shadow-md transition group">
            {{-- Cover --}}
            <div class="relative h-36 bg-green-50 overflow-hidden">
                @if($album->cover && file_exists(public_path('storage/'.$album->cover)))
                <img src="{{ asset('storage/'.$album->cover) }}" alt="{{ $album->nama }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @elseif($album->foto->first())
                <img src="{{ asset('storage/'.$album->foto->first()->gambar) }}" alt="{{ $album->nama }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                <div class="w-full h-full flex items-center justify-center text-5xl text-green-200">📷</div>
                @endif
                <div class="absolute top-2 right-2">
                    <span class="bg-green-600 text-white text-xs px-2 py-0.5 rounded-full">
                        {{ $album->foto_count ?? 0 }} foto
                    </span>
                </div>
            </div>

            {{-- Info --}}
            <div class="p-3">
                <h3 class="font-semibold text-gray-800 text-sm truncate">{{ $album->nama }}</h3>
                @if($album->tanggal)
                <p class="text-gray-400 text-xs mt-0.5">📅 {{ $album->tanggal->format('d M Y') }}</p>
                @endif
                @if($album->deskripsi)
                <p class="text-gray-500 text-xs mt-1 line-clamp-2">{{ $album->deskripsi }}</p>
                @endif

                <div class="flex items-center gap-2 mt-3">
                    <a href="{{ route('admin.album.edit', $album) }}"
                       class="flex-1 text-center text-xs bg-green-50 hover:bg-green-100 text-green-700 py-1.5 rounded-lg transition font-medium">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('admin.album.destroy', $album) }}" method="POST"
                          onsubmit="return confirm('Hapus album dan semua fotonya?')">
                        @csrf @method('DELETE')
                        <button class="text-red-400 hover:text-red-600 text-xs px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                            🗑️
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center py-16 text-gray-400">
            <div class="text-5xl mb-3">📷</div>
            <p class="font-medium">Belum ada album galeri</p>
            <p class="text-sm mt-1">Klik "Tambah Album" untuk membuat album pertama</p>
        </div>
        @endforelse
    </div>
    @if(method_exists($albums, 'links'))
    <div class="p-4 border-t border-gray-50">{{ $albums->links() }}</div>
    @endif
</div>
@endsection
