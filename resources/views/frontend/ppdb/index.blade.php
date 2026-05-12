?@extends('frontend.layouts.app')
@section('title', 'PPDB 2025/2026')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">📝 Pendaftaran</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">PPDB 2025/2026</h1>
        <p class="text-green-200">Penerimaan Peserta Didik Baru MI Miftahul Ulum</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    {{-- Info Section --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-12">
        @php $infos = [
            ['icon'=>'📅','title'=>'Pendaftaran','desc'=>'1 Juni - 31 Juli 2025'],
            ['icon'=>'📋','title'=>'Seleksi','desc'=>'1 - 10 Agustus 2025'],
            ['icon'=>'📢','title'=>'Pengumuman','desc'=>'15 Agustus 2025'],
        ]; @endphp
        @foreach($infos as $info)
        <div class="card text-center p-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="text-4xl mb-3">{{ $info['icon'] }}</div>
            <h3 class="font-bold text-gray-800 mb-1">{{ $info['title'] }}</h3>
            <p class="text-green-600 text-sm font-semibold">{{ $info['desc'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Syarat --}}
    <div class="card-islamic p-8 mb-10" data-aos="fade-up">
        <h2 class="text-2xl font-bold text-gray-800 mb-5">📋 Syarat Pendaftaran</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach(['Berusia minimal 6 tahun per 1 Juli 2025','Sehat jasmani dan rohani','Fotokopi Kartu Keluarga (KK)','Fotokopi Akta Kelahiran','Foto terbaru ukuran 3x4 (2 lembar)','Surat keterangan sehat dari dokter','Mengisi formulir pendaftaran online','Bersedia mengikuti tata tertib madrasah'] as $syarat)
            <div class="flex items-center gap-3 text-gray-600 text-sm">
                <span class="w-5 h-5 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xs flex-shrink-0">✓</span>
                {{ $syarat }}
            </div>
            @endforeach
        </div>
    </div>

    {{-- Form --}}
    <div class="card p-8" data-aos="fade-up">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">📝 Formulir Pendaftaran Online</h2>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl px-5 py-4 mb-6">
            <ul class="text-red-600 text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="form-label">Nama Lengkap Siswa *</label>
                    <input type="text" name="nama_siswa" value="{{ old('nama_siswa') }}" class="form-input @error('nama_siswa') border-red-400 @enderror" required>
                    @error('nama_siswa')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="form-label">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" class="form-input" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="form-label">Tempat Lahir *</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Tanggal Lahir *</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Asal Sekolah (TK/RA)</label>
                    <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-input">
                </div>

                <div>
                    <label class="form-label">Nama Ayah *</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Nama Ibu *</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-input" required>
                </div>

                <div>
                    <label class="form-label">Nomor Telepon *</label>
                    <input type="tel" name="telepon" value="{{ old('telepon') }}" class="form-input" placeholder="08xx-xxxx-xxxx" required>
                </div>

                <div>
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="opsional">
                </div>

                <div class="md:col-span-2">
                    <label class="form-label">Alamat Lengkap *</label>
                    <textarea name="alamat" rows="3" class="form-input" required>{{ old('alamat') }}</textarea>
                </div>

                <div>
                    <label class="form-label">Foto Siswa (JPG/PNG, max 2MB)</label>
                    <input type="file" name="foto" accept="image/*" class="form-input">
                </div>
            </div>

            <button type="submit" class="btn-primary w-full justify-center !py-4 text-base">
                📝 Kirim Pendaftaran
            </button>
        </form>
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('ppdb.cek') }}" class="btn-outline">🔍 Sudah Daftar? Cek Status Pendaftaran</a>
    </div>
</div>
@endsection
