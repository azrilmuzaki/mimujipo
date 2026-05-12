@extends('admin.layouts.admin')
@section('title', 'Ekstrakurikuler')
@section('page_title', 'Manajemen Ekstrakurikuler')
@section('breadcrumb', 'Ekskul')
@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Daftar kegiatan ekstrakurikuler madrasah</p>
    <a href="{{ route('admin.ekskul.create') }}" class="btn-primary">➕ Tambah Ekskul</a>
</div>
<div class="admin-card">
    <table class="w-full text-sm">
        <thead><tr class="border-b border-gray-100">
            <th class="text-left px-4 py-3 text-gray-600">Nama Ekskul</th>
            <th class="text-left px-4 py-3 text-gray-600 hidden md:table-cell">Pembina</th>
            <th class="text-left px-4 py-3 text-gray-600 hidden lg:table-cell">Jadwal</th>
            <th class="text-left px-4 py-3 text-gray-600">Status</th>
            <th class="text-right px-4 py-3 text-gray-600">Aksi</th>
        </tr></thead>
        <tbody>
            @forelse($ekskuls as $e)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xl">🎯</span>
                        <span class="font-medium text-gray-800">{{ $e->nama }}</span>
                    </div>
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500">{{ $e->pembina ?? '-' }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500">{{ $e->jadwal ?? '-' }}</td>
                <td class="px-4 py-3">@if($e->is_active)<span class="badge-diterima">Aktif</span>@else<span class="badge-ditolak">Nonaktif</span>@endif</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.ekskul.edit', $e) }}" class="text-green-600 text-xs font-medium">✏️ Edit</a>
                        <form action="{{ route('admin.ekskul.destroy', $e) }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 text-xs">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-10 text-gray-400">Belum ada data ekskul</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $ekskuls->links() }}</div>
</div>
@endsection
