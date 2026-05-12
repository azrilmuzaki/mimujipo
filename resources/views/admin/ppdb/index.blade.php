@extends('admin.layouts.admin')
@section('title', 'Data PPDB')
@section('page_title', 'Data PPDB')
@section('breadcrumb', 'PPDB')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <form method="GET" class="flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..." class="form-input !py-2 w-44">
        <select name="status" class="form-input !py-2 w-auto" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
            <option value="proses" {{ request('status')=='proses'?'selected':'' }}>Proses</option>
            <option value="diterima" {{ request('status')=='diterima'?'selected':'' }}>Diterima</option>
            <option value="ditolak" {{ request('status')=='ditolak'?'selected':'' }}>Ditolak</option>
        </select>
        <select name="tahun_ajaran" class="form-input !py-2 w-auto" onchange="this.form.submit()">
            <option value="">Semua Tahun</option>
            @foreach($tahuns as $t)<option value="{{ $t }}" {{ request('tahun_ajaran')==$t?'selected':'' }}>{{ $t }}</option>@endforeach
        </select>
        <button type="submit" class="btn-primary !py-2 !px-4 text-sm">🔍</button>
    </form>
    <div class="flex gap-2">
        <a href="{{ route('admin.ppdb.export.excel') }}?{{ http_build_query(request()->all()) }}" class="btn-outline !py-2 !px-4 text-sm">📊 Export Excel</a>
        <a href="{{ route('admin.ppdb.export.pdf') }}?{{ http_build_query(request()->all()) }}" class="btn-outline !py-2 !px-4 text-sm">📄 Export PDF</a>
    </div>
</div>

<div class="admin-card">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-4 py-3 text-gray-600">No. Daftar</th>
                <th class="text-left px-4 py-3 text-gray-600">Nama Siswa</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden md:table-cell">Orang Tua</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden lg:table-cell">Telepon</th>
                <th class="text-left px-4 py-3 text-gray-600">Status</th>
                <th class="text-right px-4 py-3 text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ppdb_list as $p)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                <td class="px-4 py-3 font-mono text-xs text-green-700">{{ $p->no_pendaftaran }}</td>
                <td class="px-4 py-3">
                    <div class="font-medium text-gray-800">{{ $p->nama_siswa }}</div>
                    <div class="text-xs text-gray-400">{{ $p->jenis_kelamin == 'L' ? '♂ Laki-laki' : '♀ Perempuan' }}</div>
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500 text-xs">{{ $p->nama_ayah }} / {{ $p->nama_ibu }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500">{{ $p->telepon }}</td>
                <td class="px-4 py-3"><span class="badge-{{ $p->status }}">{{ $p->status_label }}</span></td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('admin.ppdb.show', $p) }}" class="text-green-600 hover:text-green-800 text-xs font-medium">👁️ Detail</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-10 text-gray-400">Belum ada data pendaftar</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4 px-4">{{ $ppdb_list->links() }}</div>
</div>
@endsection
