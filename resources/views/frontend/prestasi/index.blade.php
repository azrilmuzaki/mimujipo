@extends('frontend.layouts.app')
@section('title', 'Prestasi Madrasah')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">🏆 Pencapaian</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">Prestasi Kami</h1>
        <p class="text-green-200">Daftar prestasi akademik dan non-akademik MI Miftahul Ulum</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    {{-- Filter --}}
    <form method="GET" class="flex flex-wrap gap-3 mb-10" data-aos="fade-up">
        <select name="tahun" class="form-input w-auto" onchange="this.form.submit()">
            <option value="">Semua Tahun</option>
            @foreach($tahuns as $t)
            <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        <select name="kategori" class="form-input w-auto" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            <option value="akademik" {{ request('kategori')=='akademik'?'selected':'' }}>Akademik</option>
            <option value="non-akademik" {{ request('kategori')=='non-akademik'?'selected':'' }}>Non-Akademik</option>
        </select>
        <select name="tingkat" class="form-input w-auto" onchange="this.form.submit()">
            <option value="">Semua Tingkat</option>
            @foreach(['kecamatan','kabupaten','provinsi','nasional','internasional'] as $t)
            <option value="{{ $t }}" {{ request('tingkat')==$t?'selected':'' }}>{{ ucfirst($t) }}</option>
            @endforeach
        </select>
        @if(request()->hasAny(['tahun','kategori','tingkat']))
        <a href="{{ route('prestasi.index') }}" class="btn-outline !py-2">Reset</a>
        @endif
    </form>

    @if($prestasis->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($prestasis as $p)
        <div class="card p-5" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">🏆</div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug mb-2">{{ $p->nama_prestasi }}</h3>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">{{ $p->tingkat_label }}</span>
                        <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">{{ ucfirst($p->kategori) }}</span>
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">{{ $p->tahun }}</span>
                    </div>
                    @if($p->penyelenggara)
                    <p class="text-xs text-gray-400 mt-2">📋 {{ $p->penyelenggara }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-8">{{ $prestasis->links() }}</div>
    @else
    <div class="text-center py-20 text-gray-400">
        <div class="text-5xl mb-3">🏆</div>
        <p>Belum ada data prestasi.</p>
    </div>
    @endif
</div>
@endsection
