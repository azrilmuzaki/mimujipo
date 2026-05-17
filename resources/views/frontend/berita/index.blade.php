@extends('frontend.layouts.app')
@section('title', 'Berita & Pengumuman')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">📰 Informasi</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">{{ isset($kategori) ? $kategori->nama : 'Berita & Pengumuman' }}</h1>
        <p class="text-green-200">Update terkini dari MI Miftahul Ulum</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- Articles --}}
        <div class="lg:col-span-3">
            @if($beritas->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                @foreach($beritas as $berita)
                <article class="card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                    <div class="relative overflow-hidden h-44 bg-green-100">
                        @if($berita->gambar && file_exists(public_path('storage/'.$berita->gambar)))
                        <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-5xl text-green-200">📰</div>
                        @endif
                        <div class="absolute bottom-0 inset-x-0 p-2">
                            <span class="inline-block bg-green-600 text-white text-xs px-2 py-0.5 rounded-full">
                                {{ $berita->kategori->nama ?? 'Berita' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-gray-400 text-xs mb-1">{{ $berita->published_at?->format('d M Y') }}</p>
                        <h2 class="font-bold text-gray-800 text-sm leading-snug mb-3 group-hover:text-green-700 transition">
                            {{ Str::limit($berita->judul, 70) }}
                        </h2>
                        <a href="{{ route('berita.show', $berita->slug) }}" class="text-green-600 text-xs font-semibold hover:text-green-800 transition">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            {{ $beritas->links() }}
            @else
            <div class="text-center py-20 text-gray-400">
                <div class="text-5xl mb-3">📭</div>
                <p>Belum ada berita yang dipublikasikan.</p>
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <aside class="space-y-6" data-aos="fade-left">
            {{-- Search --}}
            <div class="card-islamic p-5">
                <h3 class="font-bold text-gray-800 mb-3">🔍 Kategori</h3>
                <div class="space-y-2">
                    <a href="{{ route('berita.index') }}" class="flex items-center justify-between py-2 border-b border-gray-100 text-sm text-gray-600 hover:text-green-700 transition">
                        <span>Semua Berita</span>
                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">{{ $beritas->total() }}</span>
                    </a>
                    @foreach($kategoris as $kat)
                    <a href="{{ route('berita.kategori', $kat->slug) }}"
                       class="flex items-center justify-between py-2 border-b border-gray-100 text-sm {{ isset($kategori) && $kategori->id == $kat->id ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }} transition">
                        <span>{{ $kat->nama }}</span>
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-0.5 rounded-full">{{ $kat->berita_count }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Latest --}}
            <div class="card-islamic p-5">
                <h3 class="font-bold text-gray-800 mb-3">🕒 Berita Terbaru</h3>
                <div class="space-y-3">
                    @foreach($terbaru as $t)
                    <a href="{{ route('berita.show', $t->slug) }}" class="flex gap-3 group">
                        <div class="w-14 h-14 rounded-xl bg-green-100 overflow-hidden flex-shrink-0">
                            @if($t->gambar && file_exists(public_path('storage/'.$t->gambar)))
                            <img src="{{ asset('storage/'.$t->gambar) }}" alt="" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-xl">📰</div>
                            @endif
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-700 group-hover:text-green-700 leading-snug transition">{{ Str::limit($t->judul, 50) }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $t->published_at?->format('d M Y') }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
