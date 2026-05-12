?@extends('frontend.layouts.app')
@section('title', 'Galeri Foto')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">🖼️ Dokumentasi</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">Galeri Foto</h1>
        <p class="text-green-200">Koleksi foto kegiatan MI Miftahul Ulum</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($albums->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($albums as $album)
        <a href="{{ route('galeri.album', $album->id) }}"
           class="card group overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
            <div class="relative h-52 bg-green-100 overflow-hidden">
                @if($album->foto->first())
                <img src="{{ asset('storage/'.$album->foto->first()->gambar) }}" alt="{{ $album->nama }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                <div class="w-full h-full flex items-center justify-center text-6xl text-green-200">🖼️</div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent flex items-end p-4">
                    <div>
                        <h3 class="text-white font-bold">{{ $album->nama }}</h3>
                        <p class="text-green-200 text-xs">{{ $album->foto_count ?? 0 }} foto</p>
                    </div>
                </div>
            </div>
            @if($album->deskripsi)
            <div class="p-4">
                <p class="text-gray-500 text-sm">{{ Str::limit($album->deskripsi, 80) }}</p>
                @if($album->tanggal)
                <p class="text-green-600 text-xs mt-1">📅 {{ $album->tanggal->format('d M Y') }}</p>
                @endif
            </div>
            @endif
        </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $albums->links() }}</div>
    @else
    <div class="text-center py-20 text-gray-400">
        <div class="text-6xl mb-3">📷</div>
        <p>Belum ada foto yang ditambahkan.</p>
    </div>
    @endif
</div>
@endsection
