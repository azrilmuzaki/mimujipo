@extends('admin.layouts.admin')
@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan')
@section('breadcrumb', 'Kontak / Detail')
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.kontak.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali ke Inbox</a>
<div class="admin-card">
    <div class="flex items-start justify-between mb-5 pb-4 border-b">
        <div>
            <h2 class="font-bold text-gray-800 text-lg">{{ $kontak->subjek ?? 'Tidak ada subjek' }}</h2>
            <p class="text-gray-400 text-sm mt-1">{{ $kontak->created_at->format('d M Y, H:i') }}</p>
        </div>
        <span class="{{ $kontak->is_read ? 'badge-diterima' : 'badge-pending' }}">{{ $kontak->is_read ? 'Dibaca' : 'Baru' }}</span>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-5 text-sm">
        <div class="bg-gray-50 rounded-xl p-3">
            <div class="text-gray-400 text-xs mb-1">Nama</div>
            <div class="font-semibold">{{ $kontak->nama }}</div>
        </div>
        <div class="bg-gray-50 rounded-xl p-3">
            <div class="text-gray-400 text-xs mb-1">Email</div>
            <a href="mailto:{{ $kontak->email }}" class="text-green-600 font-semibold hover:underline">{{ $kontak->email }}</a>
        </div>
        @if($kontak->telepon)
        <div class="bg-gray-50 rounded-xl p-3">
            <div class="text-gray-400 text-xs mb-1">Telepon</div>
            <a href="tel:{{ $kontak->telepon }}" class="font-semibold">{{ $kontak->telepon }}</a>
        </div>
        @endif
    </div>

    <div class="bg-green-50 border border-green-100 rounded-2xl p-5">
        <p class="text-gray-700 leading-relaxed">{{ $kontak->pesan }}</p>
    </div>

    <div class="flex gap-3 mt-5">
        <a href="mailto:{{ $kontak->email }}?subject=Re: {{ $kontak->subjek }}" class="btn-primary">↩️ Balas via Email</a>
        @if($kontak->telepon)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontak->telepon) }}" target="_blank" class="btn-outline">💬 WhatsApp</a>
        @endif
        <form action="{{ route('admin.kontak.destroy', $kontak) }}" method="POST" onsubmit="return confirm('Hapus pesan?')" class="ml-auto">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">🗑️ Hapus</button>
        </form>
    </div>
</div>
</div>
@endsection
