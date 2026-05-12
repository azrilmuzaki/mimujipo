@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

{{-- Stats Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    @php
    $cards = [
        ['label'=>'Total Siswa',  'value'=>$stats['siswa'],      'icon'=>'👨‍🎓', 'color'=>'from-green-500 to-green-700'],
        ['label'=>'Guru & Staff', 'value'=>$stats['guru'],       'icon'=>'👩‍🏫', 'color'=>'from-teal-500 to-teal-700'],
        ['label'=>'Total Berita', 'value'=>$stats['berita'],     'icon'=>'📰',  'color'=>'from-blue-500 to-blue-700'],
        ['label'=>'Total PPDB',   'value'=>$stats['ppdb'],       'icon'=>'📝',  'color'=>'from-purple-500 to-purple-700'],
        ['label'=>'PPDB Baru',    'value'=>$stats['ppdb_baru'],  'icon'=>'🔔',  'color'=>'from-yellow-500 to-orange-500'],
        ['label'=>'Pesan Baru',   'value'=>$stats['pesan_baru'],'icon'=>'✉️',  'color'=>'from-red-500 to-red-700'],
    ];
    @endphp
    @foreach($cards as $card)
    <div class="bg-gradient-to-br {{ $card['color'] }} text-white rounded-2xl p-5 shadow-md">
        <div class="text-3xl mb-2">{{ $card['icon'] }}</div>
        <div class="text-2xl font-bold">{{ $card['value'] }}</div>
        <div class="text-white/80 text-xs mt-1">{{ $card['label'] }}</div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    {{-- PPDB Terbaru --}}
    <div class="admin-card">
        <div class="flex items-center justify-between mb-5">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">📝 Pendaftar PPDB Terbaru</h3>
            <a href="{{ route('admin.ppdb.index') }}" class="text-sm text-green-600 hover:text-green-800 font-medium">Lihat Semua →</a>
        </div>
        <div class="space-y-3">
            @forelse($ppdb_terbaru as $p)
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <div>
                    <div class="font-medium text-gray-800 text-sm">{{ $p->nama_siswa }}</div>
                    <div class="text-xs text-gray-400">{{ $p->no_pendaftaran }} · {{ $p->created_at->diffForHumans() }}</div>
                </div>
                <span class="badge-{{ $p->status }}">{{ $p->status_label }}</span>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Belum ada pendaftar</p>
            @endforelse
        </div>
    </div>

    {{-- Pesan Terbaru --}}
    <div class="admin-card">
        <div class="flex items-center justify-between mb-5">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">✉️ Pesan Masuk Terbaru</h3>
            <a href="{{ route('admin.kontak.index') }}" class="text-sm text-green-600 hover:text-green-800 font-medium">Lihat Semua →</a>
        </div>
        <div class="space-y-3">
            @forelse($pesan_terbaru as $p)
            <div class="flex items-start gap-3 py-2 border-b border-gray-50 last:border-0">
                <div class="w-9 h-9 bg-green-100 rounded-full flex items-center justify-center text-base flex-shrink-0">
                    {{ strtoupper(substr($p->nama, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-gray-800 text-sm">{{ $p->nama }}</span>
                        @if(!$p->is_read)<span class="w-2 h-2 bg-red-500 rounded-full inline-block"></span>@endif
                    </div>
                    <p class="text-xs text-gray-400 truncate">{{ Str::limit($p->pesan, 60) }}</p>
                    <div class="text-xs text-gray-300 mt-0.5">{{ $p->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Belum ada pesan</p>
            @endforelse
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="admin-card mt-6">
    <h3 class="font-bold text-gray-800 mb-5">⚡ Aksi Cepat</h3>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
        @php $actions = [
            ['href'=>route('admin.berita.create'),     'icon'=>'📰','label'=>'Tulis Berita'],
            ['href'=>route('admin.pengumuman.create'), 'icon'=>'📢','label'=>'Pengumuman'],
            ['href'=>route('admin.galeri.create'),     'icon'=>'📸','label'=>'Upload Foto'],
            ['href'=>route('admin.guru.create'),       'icon'=>'👩‍🏫','label'=>'Tambah Guru'],
            ['href'=>route('admin.ppdb.index'),        'icon'=>'📝','label'=>'Data PPDB'],
            ['href'=>route('admin.pengaturan.index'),  'icon'=>'⚙️','label'=>'Pengaturan'],
        ]; @endphp
        @foreach($actions as $action)
        <a href="{{ $action['href'] }}" class="flex flex-col items-center gap-2 p-4 bg-gray-50 hover:bg-green-50 hover:border-green-200 border border-transparent rounded-xl transition text-center group">
            <span class="text-2xl group-hover:scale-110 transition-transform">{{ $action['icon'] }}</span>
            <span class="text-xs font-medium text-gray-600 group-hover:text-green-700">{{ $action['label'] }}</span>
        </a>
        @endforeach
    </div>
</div>

@endsection
