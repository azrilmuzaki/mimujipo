@extends('frontend.layouts.app')
@section('title', 'Kontak Kami')
@section('content')

<div class="page-hero">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block bg-white/20 text-yellow-300 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">📞 Hubungi Kami</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-3">Kontak</h1>
        <p class="text-green-200">Kami siap membantu Anda</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        {{-- Form --}}
        <div data-aos="fade-right">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">✉️ Kirim Pesan</h2>

            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-3 mb-5">✅ {{ session('success') }}</div>
            @endif

            <form action="{{ route('kontak.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-input" required>
                        @error('nama')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input" required>
                    </div>
                </div>
                <div>
                    <label class="form-label">No. Telepon</label>
                    <input type="tel" name="telepon" value="{{ old('telepon') }}" class="form-input" placeholder="Opsional">
                </div>
                <div>
                    <label class="form-label">Subjek</label>
                    <input type="text" name="subjek" value="{{ old('subjek') }}" class="form-input" placeholder="Opsional">
                </div>
                <div>
                    <label class="form-label">Pesan *</label>
                    <textarea name="pesan" rows="5" class="form-input" required>{{ old('pesan') }}</textarea>
                </div>
                <button type="submit" class="btn-primary w-full justify-center !py-4 text-base">
                    📨 Kirim Pesan
                </button>
            </form>
        </div>

        {{-- Info --}}
        <div class="space-y-6" data-aos="fade-left">
            <div class="card-islamic p-6">
                <h3 class="font-bold text-gray-800 mb-4 text-lg">📍 Informasi Kontak</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">📍</div>
                        <div>
                            <div class="font-semibold text-gray-800 text-sm">Alamat</div>
                            <div class="text-gray-500 text-sm">{{ $setting['alamat'] ?? 'Jipo, Kepohbaru, Bojonegoro, Jawa Timur' }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">📞</div>
                        <div>
                            <div class="font-semibold text-gray-800 text-sm">Telepon</div>
                            <a href="tel:{{ $setting['telepon'] ?? '' }}" class="text-green-600 text-sm hover:text-green-800 transition">{{ $setting['telepon'] ?? '-' }}</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">💬</div>
                        <div>
                            <div class="font-semibold text-gray-800 text-sm">WhatsApp</div>
                            <a href="https://wa.me/{{ $setting['whatsapp'] ?? '' }}" target="_blank" class="text-green-600 text-sm hover:text-green-800 transition">
                                Hubungi via WhatsApp →
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">✉️</div>
                        <div>
                            <div class="font-semibold text-gray-800 text-sm">Email</div>
                            <a href="mailto:{{ $setting['email'] ?? '' }}" class="text-green-600 text-sm hover:text-green-800 transition">{{ $setting['email'] ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Maps --}}
            <div class="rounded-2xl overflow-hidden shadow-md h-64">
                <iframe
                    src="{{ $setting['maps_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4!2d111.88!3d-7.22' }}"
                    width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
                </iframe>
            </div>

            {{-- Social --}}
            <div class="card-islamic p-5">
                <h3 class="font-semibold text-gray-800 mb-3">🌐 Media Sosial</h3>
                <div class="flex gap-3">
                    @if($setting['facebook'] ?? '')
                    <a href="{{ $setting['facebook'] }}" target="_blank" class="flex items-center gap-2 bg-blue-50 text-blue-600 hover:bg-blue-100 px-4 py-2 rounded-xl text-sm transition">📘 Facebook</a>
                    @endif
                    @if($setting['instagram'] ?? '')
                    <a href="{{ $setting['instagram'] }}" target="_blank" class="flex items-center gap-2 bg-pink-50 text-pink-600 hover:bg-pink-100 px-4 py-2 rounded-xl text-sm transition">📸 Instagram</a>
                    @endif
                    @if($setting['youtube'] ?? '')
                    <a href="{{ $setting['youtube'] }}" target="_blank" class="flex items-center gap-2 bg-red-50 text-red-600 hover:bg-red-100 px-4 py-2 rounded-xl text-sm transition">▶️ YouTube</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
