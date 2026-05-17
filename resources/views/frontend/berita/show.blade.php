@extends('frontend.layouts.app')
@section('title', $berita->judul)
@section('content')

<div class="page-hero pt-28 pb-12 text-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="mb-3">
            <a href="{{ route('berita.index') }}" class="text-green-200 hover:text-white text-sm transition">← Kembali ke Berita</a>
        </div>
        <span class="inline-block bg-white/20 text-yellow-300 text-xs font-semibold px-3 py-1 rounded-full mb-3">
            {{ $berita->kategori->nama ?? 'Berita' }}
        </span>
        <h1 class="text-2xl md:text-4xl font-bold text-white leading-tight mb-4">{{ $berita->judul }}</h1>
        <div class="flex items-center gap-4 text-green-200 text-sm">
            <span>📅 {{ $berita->published_at?->format('d M Y, H:i') }}</span>
            <span>👁️ {{ number_format($berita->views) }} kali dibaca</span>
            <span>✍️ {{ $berita->user->name ?? 'Admin' }}</span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    @if($berita->gambar && file_exists(public_path('storage/'.$berita->gambar)))
    <div class="rounded-3xl overflow-hidden mb-8 shadow-xl">
        <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full max-h-96 object-cover">
    </div>
    @endif

    <div class="prose prose-lg max-w-none prose-headings:text-green-800 prose-a:text-green-600 text-gray-700 leading-relaxed">
        {!! $berita->konten !!}
    </div>

    {{-- Share --}}
    <div class="mt-10 pt-6 border-t border-gray-100 flex items-center gap-3">
        <span class="text-sm text-gray-500 font-medium">Bagikan:</span>
        <a href="https://wa.me/?text={{ urlencode($berita->judul.' '.request()->url()) }}" target="_blank"
           class="bg-green-500 text-white px-4 py-2 rounded-xl text-sm hover:bg-green-600 transition">💬 WhatsApp</a>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm hover:bg-blue-700 transition">📘 Facebook</a>
    </div>

    {{-- Related --}}
    @if($related->count())
    <div class="mt-12">
        <h3 class="text-xl font-bold text-gray-800 mb-5">📰 Berita Terkait</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            @foreach($related as $r)
            <a href="{{ route('berita.show', $r->slug) }}" class="card group p-4">
                <div class="text-xs text-gray-400 mb-1">{{ $r->published_at?->format('d M Y') }}</div>
                <h4 class="font-semibold text-gray-800 text-sm group-hover:text-green-700 transition">{{ Str::limit($r->judul, 60) }}</h4>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
