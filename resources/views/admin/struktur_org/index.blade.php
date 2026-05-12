@extends('admin.layouts.admin')
@section('title', 'Struktur Organisasi')
@section('page_title', 'Struktur Organisasi')
@section('breadcrumb', 'Struktur Org')
@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Susunan kepengurusan dan organisasi madrasah</p>
    <a href="{{ route('admin.struktur-org.create') }}" class="btn-primary">➕ Tambah Anggota</a>
</div>

<div class="admin-card">
    @if($struktors->count())
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 p-2">
        @foreach($struktors as $s)
        <div class="border border-gray-100 rounded-2xl p-4 text-center hover:border-green-200 hover:shadow-md transition group">
            {{-- Foto --}}
            <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center text-2xl mb-3 overflow-hidden border-2 border-green-100 group-hover:border-green-300 transition">
                @if($s->foto && file_exists(public_path('storage/'.$s->foto)))
                <img src="{{ asset('storage/'.$s->foto) }}" alt="{{ $s->nama }}" class="w-full h-full object-cover">
                @else
                <span>👤</span>
                @endif
            </div>

            {{-- Info --}}
            <p class="font-semibold text-gray-800 text-sm leading-tight">{{ $s->nama }}</p>
            <p class="text-green-600 text-xs mt-1 font-medium">{{ $s->jabatan }}</p>
            <p class="text-gray-300 text-xs mt-0.5">Urutan #{{ $s->urutan }}</p>

            {{-- Aksi --}}
            <div class="flex justify-center gap-2 mt-3">
                <a href="{{ route('admin.struktur-org.edit', $s) }}"
                   class="text-xs bg-green-50 hover:bg-green-100 text-green-700 px-3 py-1.5 rounded-lg transition font-medium">
                    ✏️ Edit
                </a>
                <form action="{{ route('admin.struktur-org.destroy', $s) }}" method="POST"
                      onsubmit="return confirm('Hapus anggota ini?')">
                    @csrf @method('DELETE')
                    <button class="text-xs bg-red-50 hover:bg-red-100 text-red-500 px-3 py-1.5 rounded-lg transition">
                        🗑️
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="p-4 border-t border-gray-50">{{ $struktors->links() }}</div>
    @else
    <div class="text-center py-16 text-gray-400">
        <div class="text-5xl mb-3">🏢</div>
        <p class="font-medium">Belum ada data struktur organisasi</p>
        <p class="text-sm mt-1">Tambahkan anggota struktur organisasi madrasah</p>
        <a href="{{ route('admin.struktur-org.create') }}" class="btn-primary mt-4 inline-flex">➕ Tambah Anggota</a>
    </div>
    @endif
</div>
@endsection
