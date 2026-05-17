@extends('frontend.layouts.app')
@section('title', 'Guru & Staff')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">👩‍🏫 Tim Pengajar</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">Guru & Staff</h1>
        <p class="text-green-200">Para pendidik berdedikasi di MI Miftahul Ulum</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($gurus->count())
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        @foreach($gurus as $guru)
        <div class="card text-center p-5 group" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center mb-3 overflow-hidden group-hover:shadow-lg transition">
                @if($guru->foto && file_exists(public_path('storage/'.$guru->foto)))
                <img src="{{ asset('storage/'.$guru->foto) }}" alt="{{ $guru->nama }}" class="w-full h-full object-cover">
                @else
                <span class="text-4xl">👤</span>
                @endif
            </div>
            <h3 class="font-semibold text-gray-800 text-sm leading-tight">{{ $guru->nama }}</h3>
            <p class="text-green-600 text-xs font-medium mt-1">{{ $guru->jabatan }}</p>
            @if($guru->mata_pelajaran)
            <p class="text-gray-400 text-xs mt-1">{{ $guru->mata_pelajaran }}</p>
            @endif
            @if($guru->pendidikan)
            <p class="text-gray-300 text-xs mt-1">{{ $guru->pendidikan }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-20 text-gray-400">
        <div class="text-6xl mb-3">👩‍🏫</div>
        <p>Data guru belum tersedia.</p>
    </div>
    @endif
</div>
@endsection
