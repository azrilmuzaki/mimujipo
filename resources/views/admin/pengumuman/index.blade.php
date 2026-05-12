@extends('admin.layouts.admin')
@section('title', 'Manajemen Pengumuman')
@section('page_title', 'Manajemen Pengumuman')
@section('breadcrumb', 'Pengumuman')
@section('content')

<div class="flex items-center justify-between mb-6">
    <form method="GET" class="flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pengumuman..." class="form-input !py-2 w-56">
        <select name="status" class="form-input !py-2 w-auto" onchange="this.form.submit()">
            <option value="">Semua</option>
            <option value="1" {{ request('status')==='1'?'selected':'' }}>Aktif</option>
            <option value="0" {{ request('status')==='0'?'selected':'' }}>Nonaktif</option>
        </select>
        <button type="submit" class="btn-primary !py-2 !px-4 text-sm">🔍</button>
    </form>
    <a href="{{ route('admin.pengumuman.create') }}" class="btn-primary">➕ Tambah Pengumuman</a>
</div>

<div class="admin-card">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-4 py-3 text-gray-600">Judul</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden md:table-cell">Periode</th>
                <th class="text-left px-4 py-3 text-gray-600">Status</th>
                <th class="text-right px-4 py-3 text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengumumans as $p)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                <td class="px-4 py-3">
                    <div class="font-medium text-gray-800 max-w-xs">{{ $p->judul }}</div>
                    @if($p->file_lampiran)
                    <span class="text-xs text-blue-500">📎 Ada lampiran</span>
                    @endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500 text-xs">
                    @if($p->tanggal_mulai)
                        {{ $p->tanggal_mulai->format('d M Y') }}
                        @if($p->tanggal_selesai) — {{ $p->tanggal_selesai->format('d M Y') }} @endif
                    @else — @endif
                </td>
                <td class="px-4 py-3">
                    @if($p->is_active)<span class="badge-diterima">Aktif</span>
                    @else<span class="badge-ditolak">Nonaktif</span>@endif
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.pengumuman.edit', $p) }}" class="text-green-600 hover:text-green-800 text-xs font-medium">✏️ Edit</a>
                        <form action="{{ route('admin.pengumuman.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-xs">🗑️ Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center py-10 text-gray-400">Belum ada pengumuman</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $pengumumans->links() }}</div>
</div>
@endsection
