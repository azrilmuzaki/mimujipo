?@extends('frontend.layouts.app')
@section('title', $album->nama)
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4">
        <a href="{{ route('galeri.index') }}" class="text-green-200 hover:text-white text-sm transition block mb-4">← Kembali ke Galeri</a>
        <h1 class="text-4xl font-bold mb-2">{{ $album->nama }}</h1>
        @if($album->deskripsi)<p class="text-green-200">{{ $album->deskripsi }}</p>@endif
        @if($album->tanggal)<p class="text-green-300 text-sm mt-1">📅 {{ $album->tanggal->format('d M Y') }}</p>@endif
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($album->foto->count())
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
        @foreach($album->foto as $foto)
        <a href="{{ asset('storage/'.$foto->gambar) }}"
           class="glightbox block relative aspect-square overflow-hidden rounded-xl bg-green-100 group shadow-md"
           data-gallery="album-{{ $album->id }}"
           data-description="{{ $foto->caption }}">
            <img src="{{ asset('storage/'.$foto->gambar) }}" alt="{{ $foto->caption }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <span class="text-white text-2xl">🔍</span>
            </div>
        </a>
        @endforeach
    </div>
    @else
    <div class="text-center py-20 text-gray-400">
        <div class="text-6xl mb-3">📷</div>
        <p>Album ini belum memiliki foto.</p>
    </div>
    @endif
</div>
@endsection
