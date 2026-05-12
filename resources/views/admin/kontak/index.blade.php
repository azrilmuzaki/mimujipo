@extends('admin.layouts.admin')
@section('title', 'Pesan Kontak')
@section('page_title', 'Inbox Pesan Kontak')
@section('breadcrumb', 'Kontak')
@section('content')
<div class="admin-card">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-4 py-3 text-gray-600">Pengirim</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden md:table-cell">Subjek / Pesan</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden lg:table-cell">Waktu</th>
                <th class="text-left px-4 py-3 text-gray-600">Status</th>
                <th class="text-right px-4 py-3 text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pesans as $p)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition {{ !$p->is_read ? 'bg-green-50/50' : '' }}">
                <td class="px-4 py-3">
                    <div class="font-medium text-gray-800 {{ !$p->is_read ? 'font-bold' : '' }}">{{ $p->nama }}</div>
                    <div class="text-xs text-gray-400">{{ $p->email }}</div>
                </td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <div class="text-gray-800 font-medium text-xs">{{ $p->subjek ?? 'Tidak ada subjek' }}</div>
                    <div class="text-gray-400 text-xs truncate max-w-xs">{{ Str::limit($p->pesan, 80) }}</div>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-400 text-xs">{{ $p->created_at->diffForHumans() }}</td>
                <td class="px-4 py-3">
                    @if($p->is_read)<span class="badge-diterima">Dibaca</span>@else<span class="badge-pending">Baru</span>@endif
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.kontak.show', $p) }}" class="text-green-600 text-xs font-medium">👁️ Lihat</a>
                        <form action="{{ route('admin.kontak.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 text-xs">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-12 text-gray-400">Belum ada pesan</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $pesans->links() }}</div>
</div>
@endsection
