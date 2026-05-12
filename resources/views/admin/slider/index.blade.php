@extends('admin.layouts.admin')
@section('title', 'Manajemen Slider')
@section('page_title', 'Slider / Banner')
@section('breadcrumb', 'Slider')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Kelola gambar slider di halaman beranda</p>
    <a href="{{ route('admin.slider.create') }}" class="btn-primary">➕ Tambah Slide</a>
</div>
<div class="admin-card">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-2">
        @forelse($sliders as $s)
        <div class="border border-gray-100 rounded-2xl overflow-hidden hover:border-green-200 hover:shadow-md transition">
            <div class="relative h-36 bg-gray-100">
                @if($s->image && file_exists(public_path('storage/'.$s->image)))
                <img src="{{ asset('storage/'.$s->image) }}" alt="" class="w-full h-full object-cover">
                @else
                <div class="w-full h-full flex items-center justify-center text-5xl text-gray-200">🖼️</div>
                @endif
                <div class="absolute top-2 right-2 flex gap-1">
                    <span class="text-xs {{ $s->is_active ? 'bg-green-500' : 'bg-gray-400' }} text-white px-2 py-0.5 rounded-full">
                        {{ $s->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <span class="text-xs bg-blue-500 text-white px-2 py-0.5 rounded-full">#{{ $s->urutan }}</span>
                </div>
            </div>
            <div class="p-3">
                <h3 class="font-semibold text-gray-800 text-sm truncate">{{ $s->caption }}</h3>
                @if($s->subketerangan)<p class="text-xs text-gray-400 truncate mt-0.5">{{ $s->subketerangan }}</p>@endif
                <div class="flex gap-2 mt-3">
                    <a href="{{ route('admin.slider.edit', $s) }}" class="text-green-600 hover:text-green-800 text-xs font-medium">✏️ Edit</a>
                    <form action="{{ route('admin.slider.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:text-red-700 text-xs">🗑️ Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 text-gray-400">Belum ada slide</div>
        @endforelse
    </div>
</div>
@endsection
