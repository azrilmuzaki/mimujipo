@extends('frontend.layouts.app')
@section('title', 'Profil Madrasah')
@section('content')

{{-- Page Header --}}
<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">🏫 Tentang Kami</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">Profil Madrasah</h1>
        <p class="text-green-200">Mengenal lebih dalam MI Miftahul Ulum Jipo</p>
    </div>
</div>

{{-- Tab Navigation --}}
<div class="bg-white sticky top-16 md:top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex gap-0 overflow-x-auto scrollbar-hide">
            @foreach([['#sejarah','📜 Sejarah'],['#visi-misi','🎯 Visi & Misi'],['#tujuan','🚀 Tujuan'],['#struktur','👥 Struktur Org'],['#akreditasi','🏅 Akreditasi']] as $tab)
            <a href="{{ $tab[0] }}" class="flex-shrink-0 px-5 py-4 text-sm font-medium text-gray-600 hover:text-green-700 border-b-2 border-transparent hover:border-green-500 transition-all whitespace-nowrap">
                {{ $tab[1] }}
            </a>
            @endforeach
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-20">

    {{-- Sejarah --}}
    <section id="sejarah" data-aos="fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="section-badge">📜 Sejarah</span>
                <h2 class="section-title">Sejarah Madrasah</h2>
                <div class="prose prose-green max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($setting['sejarah'] ?? '')) !!}
                </div>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-10 text-center">
                <!-- <div class="text-8xl mb-4">🏫</div> -->
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-white rounded-2xl p-4 shadow-sm">
                        <div class="text-2xl font-bold text-green-700">{{ $setting['tahun_berdiri'] ?? '1978' }}</div>
                        <div class="text-xs text-gray-500 mt-1">Tahun Berdiri</div>
                    </div>
                    <div class="bg-white rounded-2xl p-4 shadow-sm">
                        <div class="text-2xl font-bold text-green-700">{{ $setting['npsn'] ?? '-' }}</div>
                        <div class="text-xs text-gray-500 mt-1">NPSN</div>
                    </div>
                    <div class="bg-white rounded-2xl p-4 shadow-sm col-span-2">
                        <div class="text-2xl font-bold text-yellow-600">Akreditasi {{ $setting['akreditasi'] ?? 'B' }}</div>
                        <div class="text-xs text-gray-500 mt-1">Status Akreditasi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Visi & Misi --}}
    <section id="visi-misi" data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">🎯 Arah Tujuan</span>
            <h2 class="section-title">Visi & Misi</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-green-700 to-green-900 text-white rounded-3xl p-8 shadow-xl">
                <div class="text-5xl mb-4">🎯</div>
                <h3 class="text-xl font-bold text-yellow-300 mb-4">Visi</h3>
                <p class="leading-relaxed text-green-100">{{ $setting['visi'] ?? '' }}</p>
            </div>
            <div class="bg-white border-2 border-green-100 rounded-3xl p-8 shadow-md">
                <div class="text-5xl mb-4">🚀</div>
                <h3 class="text-xl font-bold text-green-700 mb-4">Misi</h3>
                <div class="whitespace-pre-line text-gray-600 leading-relaxed text-sm">{{ $setting['misi'] ?? '' }}</div>
            </div>
        </div>
    </section>

    {{-- Tujuan --}}
    <section id="tujuan" data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">🚀 Target</span>
            <h2 class="section-title">Tujuan Madrasah</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @php $tujuans = [
                ['icon'=>'📖','text'=>'Menghasilkan lulusan yang hafal minimal 2 juz Al-Quran'],
                ['icon'=>'🎓','text'=>'Mencapai rata-rata nilai akademik di atas standar nasional'],
                ['icon'=>'🌙','text'=>'Membentuk karakter Islami yang kuat pada setiap siswa'],
                ['icon'=>'🌍','text'=>'Mengembangkan bakat dan minat siswa secara optimal'],
                ['icon'=>'🤝','text'=>'Membangun kerjasama yang harmonis antara madrasah dan orang tua'],
                ['icon'=>'💡','text'=>'Menerapkan teknologi dalam pembelajaran secara bijaksana'],
            ]; @endphp
            @foreach($tujuans as $i => $t)
            <div class="flex items-start gap-4 bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:border-green-200 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="text-3xl">{{ $t['icon'] }}</div>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $t['text'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Struktur Organisasi --}}
    <section id="struktur" data-aos="fade-up">
        <div class="text-center mb-10">
            <span class="section-badge">👥 Tim Kami</span>
            <h2 class="section-title">Struktur Organisasi</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($struktur as $s)
            <div class="text-center card p-5" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center text-4xl mb-3">
                    @if($s->foto && file_exists(public_path('storage/'.$s->foto)))
                    <img src="{{ asset('storage/'.$s->foto) }}" alt="{{ $s->nama }}" class="w-full h-full rounded-full object-cover">
                    @else
                    👤
                    @endif
                </div>
                <div class="font-semibold text-gray-800 text-sm">{{ $s->nama }}</div>
                <div class="text-xs text-green-600 mt-1 font-medium">{{ $s->jabatan }}</div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Akreditasi --}}
    <section id="akreditasi" data-aos="fade-up">
        <div class="bg-gradient-to-br from-yellow-50 to-amber-50 border border-yellow-200 rounded-3xl p-10">
            <div class="text-center mb-8">
                <span class="section-badge">🏅 Legalitas</span>
                <h2 class="section-title">Akreditasi & Legalitas</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                    <div class="text-5xl font-bold text-yellow-500 mb-2">{{ $setting['akreditasi'] ?? 'B' }}</div>
                    <div class="font-semibold text-gray-800">Status Akreditasi</div>
                    <div class="text-xs text-gray-500 mt-1">BAN-S/M Kementerian Agama</div>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                    <div class="text-3xl font-bold text-green-700 mb-2">{{ $setting['npsn'] ?? '60718084' }}</div>
                    <div class="font-semibold text-gray-800">NPSN</div>
                    <div class="text-xs text-gray-500 mt-1">Nomor Pokok Sekolah Nasional</div>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm">
                    <div class="text-3xl font-bold text-green-700 mb-2">{{ $setting['tahun_berdiri'] ?? '1978' }}</div>
                    <div class="font-semibold text-gray-800">Tahun Berdiri</div>
                    <div class="text-xs text-gray-500 mt-1">Beroperasi selama {{ date('Y') - (int)($setting['tahun_berdiri'] ?? 1978) }} tahun</div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
