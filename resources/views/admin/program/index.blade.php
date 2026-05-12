@extends('admin.layouts.admin')
@section('title', 'Program Unggulan')
@section('page_title', 'Program Unggulan')
@section('breadcrumb', 'Program')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Program-program unggulan yang ditampilkan di beranda</p>
    <a href="{{ route('admin.program.create') }}" class="btn-primary">➕ Tambah Program</a>
</div>
<div class="admin-card">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-2">
        @forelse($programs as $p)
        <div class="border border-gray-100 rounded-2xl p-4 hover:border-green-200 transition">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl"
                     style="background: {{ $p->warna ?? '#dcfce7' }}20; border: 2px solid {{ $p->warna ?? '#16a34a' }}40">
                    {{ $p->icon ?? '⭐' }}
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 text-sm">{{ $p->judul }}</h3>
                    <span class="text-xs {{ $p->is_active ? 'text-green-600' : 'text-gray-400' }}">
                        {{ $p->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                    </span>
                </div>
            </div>
            <p class="text-xs text-gray-500 line-clamp-2 mb-3">{{ Str::limit($p->deskripsi, 80) }}</p>
            <div class="flex gap-2 text-xs">
                <a href="{{ route('admin.program.edit', $p) }}" class="text-green-600 font-medium">✏️ Edit</a>
                <form action="{{ route('admin.program.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus?')">
                    @csrf @method('DELETE')
                    <button class="text-red-500">🗑️ Hapus</button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 text-gray-400">Belum ada program unggulan</div>
        @endforelse
    </div>
</div>
@endsection
