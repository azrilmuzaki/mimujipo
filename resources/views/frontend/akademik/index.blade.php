?@extends('frontend.layouts.app')
@section('title', 'Akademik')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">📚 Pendidikan</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">Akademik</h1>
        <p class="text-green-200">Kurikulum, mata pelajaran, dan kegiatan akademik</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

    {{-- Kurikulum --}}
    <section data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">📋 Kurikulum</span>
            <h2 class="section-title">Kurikulum yang Diterapkan</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="card p-6">
                <div class="text-4xl mb-3">🎓</div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Kurikulum Merdeka</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Menerapkan Kurikulum Merdeka Belajar sesuai kebijakan Kemdikbudristek yang diintegrasikan dengan nilai-nilai keislaman dan kurikulum Kementerian Agama.</p>
            </div>
            <div class="card p-6">
                <div class="text-4xl mb-3">🌙</div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Muatan Lokal Agama</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Muatan lokal agama Islam meliputi Tahfidz Al-Quran, Bahasa Arab, Kaligrafi, dan pembiasaan ibadah harian untuk membentuk karakter Islami.</p>
            </div>
        </div>
    </section>

    {{-- Mata Pelajaran --}}
    <section data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">📖 Pelajaran</span>
            <h2 class="section-title">Mata Pelajaran</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="card-islamic p-6">
                <h3 class="font-bold text-green-700 text-lg mb-4">📚 Pelajaran Umum</h3>
                <ul class="space-y-2">
                    @foreach(['Pendidikan Pancasila','Bahasa Indonesia','Matematika','Ilmu Pengetahuan Alam & Sosial (IPAS)','Seni Budaya','Pendidikan Jasmani & Olahraga','Bahasa Inggris (Mulok)'] as $mp)
                    <li class="flex items-center gap-2 text-gray-600 text-sm"><span class="text-green-500">✓</span> {{ $mp }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card-islamic p-6">
                <h3 class="font-bold text-green-700 text-lg mb-4">🌙 Pelajaran Agama & Karakter</h3>
                <ul class="space-y-2">
                    @foreach(['Al-Quran Hadits','Akidah Akhlak','Fiqih','Sejarah Kebudayaan Islam (SKI)','Bahasa Arab','Tahfidz Al-Quran','BTQ (Baca Tulis Al-Quran)'] as $mp)
                    <li class="flex items-center gap-2 text-gray-600 text-sm"><span class="text-green-500">✓</span> {{ $mp }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Ekskul --}}
    @if($ekskuls->count())
    <section data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">🎯 Pengembangan Diri</span>
            <h2 class="section-title">Kegiatan Ekstrakurikuler</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($ekskuls as $ekskul)
            <div class="card text-center p-5" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="text-4xl mb-3">🎯</div>
                <h3 class="font-semibold text-gray-800 text-sm mb-1">{{ $ekskul->nama }}</h3>
                @if($ekskul->pembina)<p class="text-xs text-gray-400">Pembina: {{ $ekskul->pembina }}</p>@endif
                @if($ekskul->jadwal)<p class="text-xs text-green-600 mt-1">🗓️ {{ $ekskul->jadwal }}</p>@endif
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Jadwal Harian --}}
    <section data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">🕐 Jadwal</span>
            <h2 class="section-title">Jadwal Kegiatan Harian</h2>
        </div>
        <div class="max-w-2xl mx-auto card overflow-hidden">
            <table class="w-full text-sm">
                <thead class="hero-gradient text-white">
                    <tr>
                        <th class="px-5 py-3 text-left">Waktu</th>
                        <th class="px-5 py-3 text-left">Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                        ['06.30 - 07.00','Persiapan & Sholat Dhuha Berjamaah'],
                        ['07.00 - 07.15','Pembacaan Al-Quran & Doa Bersama'],
                        ['07.15 - 09.30','Kegiatan Belajar Mengajar (Sesi 1)'],
                        ['09.30 - 09.45','Istirahat & Sholat Dhuha'],
                        ['09.45 - 12.00','Kegiatan Belajar Mengajar (Sesi 2)'],
                        ['12.00 - 12.45','Sholat Dzuhur Berjamaah & Istirahat'],
                        ['12.45 - 14.00','Kegiatan Belajar Mengajar (Sesi 3) / Ekskul'],
                        ['14.00','Pulang'],
                    ] as $i => $jadwal)
                    <tr class="{{ $i%2==0 ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-5 py-3 text-green-700 font-medium">{{ $jadwal[0] }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $jadwal[1] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
