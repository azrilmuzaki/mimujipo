@extends('admin.layouts.admin')
@section('title', 'Detail Pendaftar')
@section('page_title', 'Detail Pendaftar PPDB')
@section('breadcrumb', 'PPDB / Detail')

@section('content')
<a href="{{ route('admin.ppdb.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Profile Card --}}
    <div class="admin-card text-center">
        <div class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center text-5xl mb-3 overflow-hidden">
            @if($ppdb->foto && file_exists(public_path('storage/'.$ppdb->foto)))
            <img src="{{ asset('storage/'.$ppdb->foto) }}" alt="" class="w-full h-full object-cover">
            @else
            👤
            @endif
        </div>
        <h2 class="font-bold text-gray-800 text-lg">{{ $ppdb->nama_siswa }}</h2>
        <p class="text-gray-400 text-sm">{{ $ppdb->no_pendaftaran }}</p>
        <span class="badge-{{ $ppdb->status }} mt-3 inline-block text-sm">{{ $ppdb->status_label }}</span>

        {{-- Update Status --}}
        <form action="{{ route('admin.ppdb.status', $ppdb) }}" method="POST" class="mt-5 space-y-3 text-left">
            @csrf @method('PATCH')
            <div>
                <label class="form-label">Update Status</label>
                <select name="status" class="form-input">
                    <option value="pending" {{ $ppdb->status=='pending'?'selected':'' }}>Pending</option>
                    <option value="proses" {{ $ppdb->status=='proses'?'selected':'' }}>Proses</option>
                    <option value="diterima" {{ $ppdb->status=='diterima'?'selected':'' }}>Diterima</option>
                    <option value="ditolak" {{ $ppdb->status=='ditolak'?'selected':'' }}>Ditolak</option>
                </select>
            </div>
            <div>
                <label class="form-label">Catatan</label>
                <textarea name="catatan" rows="3" class="form-input">{{ $ppdb->catatan }}</textarea>
            </div>
            <button type="submit" class="btn-primary w-full justify-center">💾 Simpan Status</button>
        </form>
    </div>

    {{-- Detail Info --}}
    <div class="lg:col-span-2 admin-card">
        <h3 class="font-bold text-gray-800 mb-5 text-lg">📋 Data Pendaftar</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            @foreach([
                ['Nama Siswa', $ppdb->nama_siswa],
                ['Jenis Kelamin', $ppdb->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'],
                ['Tempat, Tgl Lahir', $ppdb->tempat_lahir.', '.($ppdb->tanggal_lahir?->format('d M Y') ?? '-')],
                ['Asal Sekolah', $ppdb->asal_sekolah ?? '-'],
                ['Nama Ayah', $ppdb->nama_ayah],
                ['Nama Ibu', $ppdb->nama_ibu],
                ['Telepon', $ppdb->telepon],
                ['Email', $ppdb->email ?? '-'],
                ['Tahun Ajaran', $ppdb->tahun_ajaran],
                ['Tanggal Daftar', $ppdb->created_at->format('d M Y, H:i')],
            ] as $row)
            <div class="bg-gray-50 rounded-xl p-3">
                <div class="text-gray-400 text-xs mb-1">{{ $row[0] }}</div>
                <div class="font-medium text-gray-800">{{ $row[1] }}</div>
            </div>
            @endforeach
            <div class="sm:col-span-2 bg-gray-50 rounded-xl p-3">
                <div class="text-gray-400 text-xs mb-1">Alamat</div>
                <div class="font-medium text-gray-800">{{ $ppdb->alamat }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
