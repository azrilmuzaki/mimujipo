@extends('admin.layouts.admin')
@section('title', 'Manajemen Prestasi')
@section('page_title', 'Data Prestasi')
@section('breadcrumb', 'Prestasi')
@section('content')
<div class="flex justify-between items-center mb-6">
    <form method="GET" class="flex gap-2">
        <select name="kategori" class="form-input !py-2 w-auto" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            <option value="akademik" {{ request('kategori')=='akademik'?'selected':'' }}>Akademik</option>
            <option value="non-akademik" {{ request('kategori')=='non-akademik'?'selected':'' }}>Non-Akademik</option>
        </select>
        <select name="tahun" class="form-input !py-2 w-auto" onchange="this.form.submit()">
            <option value="">Semua Tahun</option>
            @foreach(range(date('Y'), 2015) as $y)
            <option value="{{ $y }}" {{ request('tahun')==$y?'selected':'' }}>{{ $y }}</option>
            @endforeach
        </select>
    </form>
    <a href="{{ route('admin.prestasi.create') }}" class="btn-primary">➕ Tambah Prestasi</a>
</div>
<div class="admin-card">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-4 py-3 text-gray-600">Nama Prestasi</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden md:table-cell">Kategori</th>
                <th class="text-left px-4 py-3 text-gray-600 hidden lg:table-cell">Tingkat</th>
                <th class="text-left px-4 py-3 text-gray-600">Tahun</th>
                <th class="text-right px-4 py-3 text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($prestasis as $p)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">🏆</span>
                        <span class="font-medium text-gray-800">{{ $p->nama_prestasi }}</span>
                    </div>
                    @if($p->penyelenggara)<div class="text-xs text-gray-400 ml-8">{{ $p->penyelenggara }}</div>@endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell"><span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">{{ ucfirst($p->kategori) }}</span></td>
                <td class="px-4 py-3 hidden lg:table-cell"><span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">{{ $p->tingkat_label }}</span></td>
                <td class="px-4 py-3 text-gray-500">{{ $p->tahun }}</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.prestasi.edit', $p) }}" class="text-green-600 text-xs font-medium">✏️ Edit</a>
                        <form action="{{ route('admin.prestasi.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 text-xs">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-10 text-gray-400">Belum ada data prestasi</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $prestasis->links() }}</div>
</div>
@endsection
