@extends('admin.layouts.admin')
@section('title', 'Guru & Staff')
@section('page_title', 'Guru & Staff')
@section('breadcrumb', 'Guru')

@section('content')
<div class="flex items-center justify-between mb-6">
    <form method="GET" class="flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/jabatan..." class="form-input !py-2 w-56">
        <button class="btn-primary !py-2 !px-4 text-sm">🔍</button>
    </form>
    <a href="{{ route('admin.guru.create') }}" class="btn-primary">➕ Tambah Guru</a>
</div>

<div class="admin-card">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-2">
        @forelse($gurus as $guru)
        <div class="border border-gray-100 rounded-2xl p-4 hover:border-green-200 hover:shadow-md transition text-center">
            <div class="w-16 h-16 mx-auto rounded-full bg-green-100 flex items-center justify-center text-3xl mb-3 overflow-hidden">
                @if($guru->foto && file_exists(public_path('storage/'.$guru->foto)))
                <img src="{{ asset('storage/'.$guru->foto) }}" class="w-full h-full object-cover">
                @else 👤 @endif
            </div>
            <h3 class="font-semibold text-gray-800 text-sm">{{ $guru->nama }}</h3>
            <p class="text-green-600 text-xs mt-0.5">{{ $guru->jabatan }}</p>
            @if($guru->mata_pelajaran)<p class="text-gray-400 text-xs mt-0.5">{{ $guru->mata_pelajaran }}</p>@endif
            <div class="mt-3 flex justify-center gap-2">
                <a href="{{ route('admin.guru.edit', $guru) }}" class="text-green-600 hover:text-green-800 text-xs font-medium">✏️ Edit</a>
                <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST" onsubmit="return confirm('Hapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs">🗑️</button>
                </form>
            </div>
            @if(!$guru->is_active)<span class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">Nonaktif</span>@endif
        </div>
        @empty
        <div class="col-span-4 text-center py-12 text-gray-400">Belum ada data guru</div>
        @endforelse
    </div>
    <div class="p-4">{{ $gurus->links() }}</div>
</div>
@endsection
