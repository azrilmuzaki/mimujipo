@extends('admin.layouts.admin')
@section('title', 'Manajemen Berita')
@section('page_title', 'Manajemen Berita')
@section('breadcrumb', 'Berita')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-3">
        <form action="" method="GET" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..." class="form-input !py-2 w-56">
            <button type="submit" class="btn-primary !py-2 !px-4 text-sm">Cari</button>
        </form>
    </div>
    <a href="{{ route('admin.berita.create') }}" class="btn-primary">➕ Tambah Berita</a>
</div>

<div class="admin-card">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-4 py-3 font-semibold text-gray-600">Judul</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-600 hidden md:table-cell">Kategori</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-600 hidden lg:table-cell">Tanggal</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                <th class="text-right px-4 py-3 font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beritas as $berita)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                <td class="px-4 py-3">
                    <div class="font-medium text-gray-800 max-w-xs truncate">{{ $berita->judul }}</div>
                    @if($berita->is_featured)<span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">⭐ Featured</span>@endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500">{{ $berita->kategori->nama ?? '-' }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500">{{ $berita->published_at?->format('d M Y') ?? '-' }}</td>
                <td class="px-4 py-3">
                    @if($berita->is_published)
                    <span class="badge-diterima">Aktif</span>
                    @else
                    <span class="badge-ditolak">Draft</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('berita.show', $berita->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-xs font-medium">👁️</a>
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="text-green-600 hover:text-green-800 text-xs font-medium">✏️ Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">🗑️ Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-10 text-gray-400">Belum ada berita</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4 px-4">{{ $beritas->links() }}</div>
</div>
@endsection
