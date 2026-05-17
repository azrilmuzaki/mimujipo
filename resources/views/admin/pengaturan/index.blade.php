@extends('admin.layouts.admin')
@section('title', 'Pengaturan Website')
@section('page_title', 'Pengaturan Website')
@section('breadcrumb', 'Pengaturan')
@section('content')
<div class="max-w-4xl">
<div class="admin-card">
    <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Informasi Umum --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">🏫 Informasi Umum</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach([
                    ['nama_sekolah','Nama Madrasah','text'],
                    ['singkatan','Singkatan','text'],
                    ['npsn','NPSN','text'],
                    ['akreditasi','Status Akreditasi','text'],
                    ['tahun_berdiri','Tahun Berdiri','text'],
                    ['kepala_madrasah','Kepala Madrasah','text'],
                ] as $f)
                <div>
                    <label class="form-label">{{ $f[1] }}</label>
                    <input type="{{ $f[2] }}" name="{{ $f[0] }}" value="{{ $settings[$f[0]] ?? '' }}" class="form-input">
                </div>
                @endforeach
            </div>
        </div>

        {{-- Kontak --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">📞 Kontak</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach([
                    ['alamat','Alamat Lengkap'],
                    ['telepon','Telepon'],
                    ['whatsapp','WhatsApp (format: 62xxx)'],
                    ['email','Email'],
                ] as $f)
                <div>
                    <label class="form-label">{{ $f[1] }}</label>
                    <input type="text" name="{{ $f[0] }}" value="{{ $settings[$f[0]] ?? '' }}" class="form-input">
                </div>
                @endforeach
            </div>
        </div>

        {{-- Media Sosial --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">🌐 Media Sosial</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach([['facebook','Facebook URL'],['instagram','Instagram URL'],['youtube','YouTube URL']] as $f)
                <div>
                    <label class="form-label">{{ $f[1] }}</label>
                    <input type="url" name="{{ $f[0] }}" value="{{ $settings[$f[0]] ?? '' }}" class="form-input">
                </div>
                @endforeach
            </div>
        </div>

        {{-- Statistik --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">📊 Statistik Beranda</h3>
            <div class="grid grid-cols-3 gap-5">
                @foreach([['jumlah_siswa','Jumlah Siswa'],['jumlah_guru','Jumlah Guru'],['jumlah_prestasi','Jumlah Prestasi']] as $f)
                <div>
                    <label class="form-label">{{ $f[1] }}</label>
                    <input type="number" name="{{ $f[0] }}" value="{{ $settings[$f[0]] ?? '' }}" class="form-input">
                </div>
                @endforeach
            </div>
        </div>

        {{-- Visi Misi --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">🎯 Visi & Misi</h3>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Visi</label>
                    <textarea name="visi" rows="3" class="form-input">{{ $settings['visi'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="form-label">Misi (satu per baris)</label>
                    <textarea name="misi" rows="6" class="form-input">{{ $settings['misi'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="form-label">Sambutan Kepala Madrasah</label>
                    <textarea name="sambutan_kepsek" rows="4" class="form-input">{{ $settings['sambutan_kepsek'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="form-label">Sejarah Madrasah</label>
                    <textarea name="sejarah" rows="5" class="form-input">{{ $settings['sejarah'] ?? '' }}</textarea>
                    <p class="text-xs text-gray-500 mt-2">Jika tahun berdiri diubah, pastikan teks sejarah di bawah ini ikut disesuaikan agar tidak berbeda.</p>
                </div>
            </div>
        </div>

        {{-- Maps --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">🗺️ Google Maps</h3>
            <div>
                <label class="form-label">Embed URL Google Maps</label>
                <textarea name="maps_embed" rows="3" class="form-input font-mono text-xs">{{ $settings['maps_embed'] ?? '' }}</textarea>
            </div>
        </div>

        {{-- Logo --}}
        <div>
            <h3 class="font-bold text-gray-800 text-base mb-4 pb-2 border-b">🖼️ Logo & Favicon</h3>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="form-label">Logo Madrasah</label>
                    @if($settings['logo'] ?? '')<img src="{{ asset('storage/'.$settings['logo']) }}" alt="" class="h-12 mb-2">@endif
                    <input type="file" name="logo_file" accept="image/*" class="form-input">
                </div>
                <div>
                    <label class="form-label">Favicon</label>
                    @if($settings['favicon'] ?? '')<img src="{{ asset('storage/'.$settings['favicon']) }}" alt="" class="h-10 w-10 mb-2 rounded">@endif
                    <input type="file" name="favicon_file" accept="image/*" class="form-input">
                    <p class="text-xs text-gray-500 mt-2">Jika favicon baru belum berubah di browser, lakukan refresh paksa dengan Ctrl+F5 atau buka tab baru karena favicon biasanya tersimpan di cache browser.</p>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-primary !px-8 !py-3 text-base">💾 Simpan Semua Pengaturan</button>
    </form>
</div>
</div>
@endsection
