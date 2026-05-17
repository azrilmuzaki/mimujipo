@extends('frontend.layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Selamat datang di website resmi MI Miftahul Ulum Jipo, Kepohbaru, Bojonegoro. Madrasah Ibtidaiyah terbaik dengan pendidikan Islam berkualitas.')

@section('content')

    {{-- ===== HERO / SLIDER ===== --}}
    <section class="relative h-screen min-h-[600px] overflow-hidden">
        <div class="swiper hero-swiper h-full">
            <div class="swiper-wrapper">
                @forelse($sliders as $slider)
                    <div class="swiper-slide relative">
                        @if($slider->image && file_exists(public_path('storage/' . $slider->image)))
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->caption }}"
                                class="absolute inset-0 w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-black/50"></div>
                        <div class="relative h-full flex items-center justify-center text-center px-4">
                            <div data-aos="fade-up">
                                <div
                                    class="inline-block bg-white/20 backdrop-blur-sm text-yellow-300 text-sm font-semibold px-4 py-2 rounded-full mb-6 border border-white/30">
                                    Madrasah Ibtidaiyah Miftahul Ulum
                                </div>
                                <h1
                                    class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 text-shadow leading-tight">
                                    {{ $slider->caption }}
                                </h1>
                                @if($slider->subketerangan)
                                    <p class="text-green-100 text-lg md:text-xl mb-8 max-w-2xl mx-auto">
                                        {{ $slider->subketerangan }}
                                    </p>
                                @endif
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    <a href="{{ route('ppdb.index') }}" class="btn-white">
                                        📝 Daftar PPDB Sekarang
                                    </a>
                                    <a href="{{ route('profil') }}"
                                        class="btn-outline !border-white !text-white hover:!bg-white hover:!text-green-800">
                                        🏫 Pelajari Lebih Lanjut
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="absolute inset-0 page-hero"></div>
                        <div class="relative h-full flex items-center justify-center text-center px-4">
                            <div data-aos="fade-up">
                                <div
                                    class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-2 rounded-full mb-6">
                                    ✨ Madrasah Ibtidaiyah Miftahul Ulum
                                </div>
                                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 text-shadow">
                                    Selamat Datang di<br>MI Miftahul Ulum
                                </h1>
                                <p class="text-green-100 text-xl mb-8">Jipo, Kepohbaru, Bojonegoro, Jawa Timur</p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    <a href="{{ route('ppdb.index') }}" class="btn-white">📝 Daftar PPDB</a>
                                    <a href="{{ route('profil') }}"
                                        class="btn-outline !border-white !text-white hover:!bg-white hover:!text-green-800">🏫
                                        Profil Madrasah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next !text-white !w-10 !h-10 !bg-white/20 rounded-full after:!text-sm"></div>
            <div class="swiper-button-prev !text-white !w-10 !h-10 !bg-white/20 rounded-full after:!text-sm"></div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    {{-- ===== STATISTICS ===== --}}
    <section class="bg-white py-12 shadow-sm relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $stats = [
                        ['value' => $setting['jumlah_siswa'] ?? '320', 'label' => 'Siswa Aktif', 'icon' => '👨‍🎓', 'suffix' => '+'],
                        ['value' => $setting['jumlah_guru'] ?? '18', 'label' => 'Guru & Staff', 'icon' => '👩‍🏫', 'suffix' => ''],
                        ['value' => $setting['jumlah_prestasi'] ?? '45', 'label' => 'Total Prestasi', 'icon' => '🏆', 'suffix' => '+'],
                        ['value' => date('Y') - (int) ($setting['tahun_berdiri'] ?? 1978), 'label' => 'Tahun Berdiri', 'icon' => '🕌', 'suffix' => ' th'],
                    ];
                @endphp
                @foreach($stats as $stat)
                    <div class="text-center p-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="text-3xl mb-2">{{ $stat['icon'] }}</div>
                        <div class="text-3xl md:text-4xl font-bold text-green-700">
                            <span data-counter="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}
                        </div>
                        <div class="text-gray-500 text-sm mt-1">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== SAMBUTAN KEPALA MADRASAH ===== --}}
    <section class="py-20 bg-gradient-to-br from-green-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <div class="relative">
                        <div class="w-80 h-[450px] mx-auto overflow-hidden rounded-2xl shadow-2xl bg-gray-100">
                            <img src="{{ asset('images/kepsek3.jpeg') }}" alt="Kepala Madrasah"
                                class="w-full h-full object-cover">
                        </div>

                        <!-- <div class="absolute -bottom-4 -right-4 bg-yellow-400 text-yellow-900 px-4 py-2 rounded-xl font-semibold text-sm shadow-lg z-10">
                Akreditasi A ⭐
            </div> -->
                    </div>
                </div>
                <div data-aos="fade-left">
                    <span class="section-badge">🎙️ Sambutan</span>
                    <h2 class="section-title">Kepala Madrasah</h2>
                    <h3 class="text-green-600 font-semibold text-lg mb-4">
                        {{ $setting['kepala_madrasah'] ?? 'Kepala Madrasah' }}</h3>
                    <div class="text-5xl text-green-300 font-serif mb-2">"</div>
                    <p class="text-gray-600 leading-relaxed text-base mb-6">
                        {{ $setting['sambutan_kepsek'] ?? 'Selamat datang di website resmi Madrasah Ibtidaiyah Miftahul Ulum.' }}
                    </p>
                    <a href="{{ route('profil') }}" class="btn-outline">
                        📖 Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== VISI MISI ===== --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span
                    class="text-3xl md:text-4xl font-bold text-gray-900 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">Visi
                    & Misi</span>
                <!-- <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Landasan Kami</h2> -->
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card Visi -->
                <div class="bg-white border border-gray-100 shadow-lg rounded-2xl p-8" data-aos="fade-right">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold text-green-700 mb-4">Visi Madrasah</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $setting['visi'] ?? '' }}</p>
                </div>
                <!-- Card Misi -->
                <div class="bg-white border border-gray-100 shadow-lg rounded-2xl p-8" data-aos="fade-left">
                    <div class="text-4xl mb-4">🚀</div>
                    <h3 class="text-xl font-bold text-green-700 mb-4">Misi Madrasah</h3>
                    <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $setting['misi'] ?? '' }}</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== PROGRAM UNGGULAN ===== --}}
    @if($programs->count())
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center" data-aos="fade-up">
                    <span class="section-badge">⭐ Keunggulan</span>
                    <h2 class="section-title">Program Unggulan</h2>
                    <p class="section-subtitle">Program-program pilihan yang menjadi keunggulan MI Miftahul Ulum</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($programs as $program)
                        <div class="card group p-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition-transform"
                                style="background-color: {{ $program->warna }}20;">
                                {{ $program->icon }}
                            </div>
                            <h3 class="font-bold text-gray-800 text-lg mb-2">{{ $program->judul }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ Str::limit($program->deskripsi, 100) }}</p>
                            <div class="mt-4 h-1 w-10 rounded-full group-hover:w-full transition-all duration-500"
                                style="background-color: {{ $program->warna }}"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== BERITA TERBARU ===== --}}
    @if($berita->count())
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-10" data-aos="fade-up">
                    <div>
                        <span class="section-badge">📰 Update Terbaru</span>
                        <h2 class="section-title !mb-0">Berita & Pengumuman</h2>
                    </div>
                    <a href="{{ route('berita.index') }}" class="btn-outline mt-4 md:mt-0">Lihat Semua →</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($berita as $item)
                        <article class="card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                            <div class="relative overflow-hidden h-44 bg-gradient-to-br from-green-100 to-green-200">
                                @if($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-6xl text-green-300">📰</div>
                                @endif
                                @if($item->is_featured)
                                    <div
                                        class="absolute top-3 left-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-full">
                                        ⭐ Featured</div>
                                @endif
                                <div class="absolute bottom-0 inset-x-0">
                                    <span class="inline-block bg-green-600 text-white text-xs px-3 py-1 m-2 rounded-full">
                                        {{ $item->kategori->nama ?? 'Berita' }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                <p class="text-gray-400 text-xs mb-2">{{ $item->published_at?->format('d M Y') }}</p>
                                <h3 class="font-bold text-gray-800 text-sm leading-snug mb-3 group-hover:text-green-700 transition">
                                    {{ Str::limit($item->judul, 70) }}
                                </h3>
                                <a href="{{ route('berita.show', $item->slug) }}"
                                    class="text-green-600 text-xs font-semibold hover:text-green-800 transition">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== PENGUMUMAN ===== --}}
    @if($pengumuman->count())
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10" data-aos="fade-up">
                    <span class="section-badge">📢 Penting</span>
                    <h2 class="section-title">Pengumuman</h2>
                </div>
                <div class="space-y-4 max-w-4xl mx-auto">
                    @foreach($pengumuman as $item)
                        <div class="card-islamic p-5 flex items-start gap-4" data-aos="fade-up"
                            data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                                📢</div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-800 mb-1">{{ $item->judul }}</h3>
                                <div class="text-gray-500 text-sm">{!! Str::limit(strip_tags($item->konten), 120) !!}</div>
                                @if($item->tanggal_mulai)
                                    <div class="text-xs text-green-600 mt-1">🗓️ {{ $item->tanggal_mulai->format('d M Y') }} -
                                        {{ $item->tanggal_selesai?->format('d M Y') }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== GALERI TERBARU ===== --}}
    @if($albums->count())
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-10" data-aos="fade-up">
                    <div>
                        <span class="section-badge">🖼️ Dokumentasi</span>
                        <h2 class="section-title !mb-0">Galeri Kegiatan</h2>
                    </div>
                    <a href="{{ route('galeri.index') }}" class="btn-outline mt-4 md:mt-0">Lihat Semua →</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($albums as $album)
                        <a href="{{ route('galeri.album', $album->id) }}"
                            class="group relative overflow-hidden rounded-2xl bg-green-100 aspect-square shadow-md hover:shadow-xl transition-all duration-300 block"
                            data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                            @if($album->foto->first())
                                <img src="{{ asset('storage/' . $album->foto->first()->gambar) }}" alt="{{ $album->nama }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl text-green-300">🖼️</div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <div>
                                    <div class="text-white font-semibold text-sm">{{ $album->nama }}</div>
                                    <div class="text-green-300 text-xs">{{ $album->foto_count ?? 0 }} foto</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== CTA PPDB ===== --}}
    <section class="py-20 bg-green-50">
        <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
            <div class="text-6xl mb-6 animate-bounce">📝</div>
            <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">
                Penerimaan Peserta Didik Baru
            </h2>
            <p class="text-green-600 text-lg mb-8">
                Daftarkan putra-putri Anda sekarang dan jadikan mereka generasi Islam yang cerdas dan berakhlak mulia.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <!-- Tombol Primary -->
                <a href="{{ route('ppdb.index') }}"
                    class="bg-green-700 text-white hover:bg-green-800 text-base px-8 py-4 rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all duration-300">
                    Daftar Sekarang
                </a>
                <!-- Tombol Secondary -->
                <a href="{{ route('ppdb.cek') }}"
                    class="bg-white text-green-700 border-2 border-green-700 hover:bg-green-50 text-base px-8 py-4 rounded-lg font-semibold transition-all duration-300">
                    Cek Status Pendaftaran
                </a>
            </div>
            <p class="text-green-600 text-sm mt-6">
                💡 Hubungi kami di <strong class="text-green-800">WhatsApp (0812-3456-7890)</strong> untuk informasi lebih
                lanjut
            </p>
        </div>
    </section>

@endsection
