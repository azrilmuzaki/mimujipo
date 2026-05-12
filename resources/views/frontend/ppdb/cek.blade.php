?@extends('frontend.layouts.app')
@section('title', 'Cek Status PPDB')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">Cek Status Pendaftaran</h1>
        <p class="text-green-200">Masukkan nomor pendaftaran Anda</p>
    </div>
</div>

<div class="max-w-2xl mx-auto px-4 py-16">
    <div class="card p-8">
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-3 mb-6">✅ {{ session('success') }}</div>
        @endif

        <form action="{{ route('ppdb.cek.status') }}" method="POST" class="mb-8">
            @csrf
            <label class="form-label">Nomor Pendaftaran</label>
            <div class="flex gap-3">
                <input type="text" name="no_pendaftaran" placeholder="Contoh: PPDB-2025-0001" class="form-input flex-1" required>
                <button type="submit" class="btn-primary flex-shrink-0">🔍 Cek</button>
            </div>
        </form>

        @if(isset($ppdb))
            @if($ppdb)
            <div class="border-t pt-6">
                <h3 class="font-bold text-gray-800 text-lg mb-4">Hasil Pencarian</h3>
                <div class="bg-gray-50 rounded-2xl p-6 space-y-3">
                    <div class="flex justify-between items-center border-b pb-3">
                        <span class="text-gray-500 text-sm">No. Pendaftaran</span>
                        <span class="font-bold text-green-700">{{ $ppdb->no_pendaftaran }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 text-sm">Nama Siswa</span>
                        <span class="font-semibold">{{ $ppdb->nama_siswa }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 text-sm">Tanggal Daftar</span>
                        <span>{{ $ppdb->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="text-gray-500 text-sm">Status</span>
                        <span class="badge-{{ $ppdb->status }} text-base px-4 py-1.5">{{ $ppdb->status_label }}</span>
                    </div>
                    @if($ppdb->catatan)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mt-2">
                        <p class="text-yellow-800 text-sm font-semibold mb-1">📝 Catatan Admin:</p>
                        <p class="text-yellow-700 text-sm">{{ $ppdb->catatan }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="text-center py-8 text-gray-400 border-t">
                <div class="text-4xl mb-2">❌</div>
                <p class="font-medium">Nomor pendaftaran tidak ditemukan.</p>
                <p class="text-sm mt-1">Pastikan nomor yang Anda masukkan benar.</p>
            </div>
            @endif
        @endif
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('ppdb.index') }}" class="btn-outline">← Kembali ke Form Pendaftaran</a>
    </div>
</div>
@endsection
