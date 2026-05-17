<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="@yield('meta_description', 'Website resmi Madrasah Ibtidaiyah Miftahul Ulum Jipo, Kepohbaru, Bojonegoro - Madrasah Ibtidaiyah berkualitas berbasis nilai-nilai Islam')">
    <title>@yield('title', 'MI Miftahul Ulum') | Madrasah Ibtidaiyah Miftahul Ulum</title>
    @include('partials.favicon')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <!-- AOS JS - load in head so it's ready when app.js runs -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- ===== NAVBAR ===== --}}
    <nav id="navbar" class="fixed top-0 w-full z-50 hero-gradient transition-all duration-300">
        @php
            $isProfilMenuActive = request()->routeIs('profil') || request()->routeIs('guru');
            $isInformasiMenuActive = request()->routeIs('akademik')
                || request()->routeIs('berita*')
                || request()->routeIs('galeri*')
                || request()->routeIs('prestasi*');
        @endphp
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 bg-white/20 rounded-full flex items-center justify-center text-2xl group-hover:bg-white/30 transition">
                        🏫
                    </div>
                    <div>
                        <div class="text-white font-bold text-sm md:text-base leading-tight">MI Miftahul Ulum</div>
                        <div class="text-green-200 text-xs">Jipo &middot; Kepohbaru &middot; Bojonegoro</div>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-3 xl:gap-4">
                    <div class="flex items-center gap-1 xl:gap-2">
                        <a href="{{ route('home') }}"
                            class="rounded-xl px-3 py-2 text-sm xl:text-[15px] transition-all duration-300 {{ request()->routeIs('home') ? 'bg-white/15 text-white font-semibold shadow-sm' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                            Beranda
                        </a>

                        <div class="relative group">
                            <button type="button"
                                class="inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm xl:text-[15px] transition-all duration-300 focus:outline-none {{ $isProfilMenuActive ? 'bg-white/15 text-white font-semibold shadow-sm' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                                <span>Profil</span>
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180 group-focus-within:rotate-180"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="pointer-events-none invisible absolute left-0 top-full z-20 pt-3 opacity-0 -translate-y-2 transition-all duration-300 group-hover:pointer-events-auto group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:pointer-events-auto group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                                <div class="w-56 rounded-2xl border border-green-100/90 bg-white/95 p-2 shadow-2xl backdrop-blur-xl">
                                    <a href="{{ route('profil') }}"
                                        class="flex rounded-xl px-4 py-3 text-sm transition {{ request()->routeIs('profil') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                                        Profil Madrasah
                                    </a>
                                    <a href="{{ route('guru') }}"
                                        class="mt-1 flex rounded-xl px-4 py-3 text-sm transition {{ request()->routeIs('guru') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                                        Guru &amp; Staff
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="relative group">
                            <button type="button"
                                class="inline-flex items-center gap-2 rounded-xl px-3 py-2 text-sm xl:text-[15px] transition-all duration-300 focus:outline-none {{ $isInformasiMenuActive ? 'bg-white/15 text-white font-semibold shadow-sm' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                                <span>Informasi</span>
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180 group-focus-within:rotate-180"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="pointer-events-none invisible absolute left-0 top-full z-20 pt-3 opacity-0 -translate-y-2 transition-all duration-300 group-hover:pointer-events-auto group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:pointer-events-auto group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                                <div class="w-56 rounded-2xl border border-green-100/90 bg-white/95 p-2 shadow-2xl backdrop-blur-xl">
                                    <a href="{{ route('akademik') }}"
                                        class="flex rounded-xl px-4 py-3 text-sm transition {{ request()->routeIs('akademik') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                                        Akademik
                                    </a>
                                    <a href="{{ route('berita.index') }}"
                                        class="mt-1 flex rounded-xl px-4 py-3 text-sm transition {{ request()->routeIs('berita*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                                        Berita
                                    </a>
                                    <a href="{{ route('galeri.index') }}"
                                        class="mt-1 flex rounded-xl px-4 py-3 text-sm transition {{ request()->routeIs('galeri*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                                        Galeri
                                    </a>
                                    <a href="{{ route('prestasi.index') }}"
                                        class="mt-1 flex rounded-xl px-4 py-3 text-sm transition {{ request()->routeIs('prestasi*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                                        Prestasi
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('kontak.index') }}"
                            class="rounded-xl px-3 py-2 text-sm xl:text-[15px] transition-all duration-300 {{ request()->routeIs('kontak*') ? 'bg-white/15 text-white font-semibold shadow-sm' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                            Kontak
                        </a>
                    </div>

                    <div class="ml-2 flex items-center gap-3">
                        <a href="{{ route('admin.login') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-green-500 bg-white px-5 py-2.5 text-sm font-semibold text-green-700 shadow-sm transition-all duration-300 hover:border-green-600 hover:bg-green-600 hover:text-white">
                            Login
                        </a>
                        <a href="{{ route('ppdb.index') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-green-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-green-950/20 transition-all duration-300 hover:bg-green-400 {{ request()->routeIs('ppdb*') ? 'ring-2 ring-white/30 ring-offset-0' : '' }}">
                            Daftar PPDB
                        </a>
                    </div>
                </div>

                <!-- Mobile Toggle -->
                <button id="mobile-menu-btn" aria-controls="mobile-menu" aria-expanded="false"
                    aria-label="Toggle navigation"
                    class="lg:hidden text-white p-2 hover:bg-white/10 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t border-white/20 pt-4">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}"
                        class="rounded-xl px-4 py-3 text-sm transition-all duration-300 {{ request()->routeIs('home') ? 'bg-white/15 text-white font-semibold shadow-sm' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                        Beranda
                    </a>

                    <details class="group overflow-hidden rounded-2xl bg-white/5 {{ $isProfilMenuActive ? 'ring-1 ring-white/20' : '' }}">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between px-4 py-3 text-sm transition-all duration-300 [&::-webkit-details-marker]:hidden {{ $isProfilMenuActive ? 'bg-white/10 text-white font-semibold' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                            <span>Profil</span>
                            <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="grid grid-rows-[0fr] transition-all duration-300 group-open:grid-rows-[1fr]">
                            <div class="overflow-hidden">
                                <div class="space-y-1 px-2 pb-2">
                                    <a href="{{ route('profil') }}"
                                        class="block rounded-xl px-4 py-2.5 text-sm transition {{ request()->routeIs('profil') ? 'bg-white/15 text-white font-semibold' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                                        Profil Madrasah
                                    </a>
                                    <a href="{{ route('guru') }}"
                                        class="block rounded-xl px-4 py-2.5 text-sm transition {{ request()->routeIs('guru') ? 'bg-white/15 text-white font-semibold' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                                        Guru &amp; Staff
                                    </a>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details
                        class="group overflow-hidden rounded-2xl bg-white/5 {{ $isInformasiMenuActive ? 'ring-1 ring-white/20' : '' }}">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between px-4 py-3 text-sm transition-all duration-300 [&::-webkit-details-marker]:hidden {{ $isInformasiMenuActive ? 'bg-white/10 text-white font-semibold' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                            <span>Informasi</span>
                            <svg class="w-4 h-4 transition-transform duration-300 group-open:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="grid grid-rows-[0fr] transition-all duration-300 group-open:grid-rows-[1fr]">
                            <div class="overflow-hidden">
                                <div class="space-y-1 px-2 pb-2">
                                    <a href="{{ route('akademik') }}"
                                        class="block rounded-xl px-4 py-2.5 text-sm transition {{ request()->routeIs('akademik') ? 'bg-white/15 text-white font-semibold' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                                        Akademik
                                    </a>
                                    <a href="{{ route('berita.index') }}"
                                        class="block rounded-xl px-4 py-2.5 text-sm transition {{ request()->routeIs('berita*') ? 'bg-white/15 text-white font-semibold' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                                        Berita
                                    </a>
                                    <a href="{{ route('galeri.index') }}"
                                        class="block rounded-xl px-4 py-2.5 text-sm transition {{ request()->routeIs('galeri*') ? 'bg-white/15 text-white font-semibold' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                                        Galeri
                                    </a>
                                    <a href="{{ route('prestasi.index') }}"
                                        class="block rounded-xl px-4 py-2.5 text-sm transition {{ request()->routeIs('prestasi*') ? 'bg-white/15 text-white font-semibold' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                                        Prestasi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </details>

                    <a href="{{ route('kontak.index') }}"
                        class="rounded-xl px-4 py-3 text-sm transition-all duration-300 {{ request()->routeIs('kontak*') ? 'bg-white/15 text-white font-semibold shadow-sm' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
                        Kontak
                    </a>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <a href="{{ route('admin.login') }}"
                            class="inline-flex items-center justify-center rounded-xl border border-green-500 bg-white px-4 py-3 text-sm font-semibold text-green-700 shadow-sm transition-all duration-300 hover:border-green-600 hover:bg-green-600 hover:text-white">
                            Login
                        </a>
                        <a href="{{ route('ppdb.index') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-green-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-green-950/20 transition-all duration-300 hover:bg-green-400 {{ request()->routeIs('ppdb*') ? 'ring-2 ring-white/30 ring-offset-0' : '' }}">
                            Daftar PPDB
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- ===== FLASH MESSAGES ===== --}}
    @if(session('success'))
        <div
            class="auto-dismiss fixed top-20 right-4 z-[9999] bg-green-500 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 max-w-sm">
            <span class="text-2xl">?</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div
            class="auto-dismiss fixed top-20 right-4 z-[9999] bg-red-500 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 max-w-sm">
            <span class="text-2xl">?</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- ===== MAIN CONTENT ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="hero-gradient text-white">
        <!-- Main Footer -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- About -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="text-4xl">🏫</div>
                        <div>
                            <h3 class="font-bold text-xl">MI Miftahul Ulum</h3>
                            <p class="text-green-300 text-sm">Jipo &middot; Kepohbaru &middot; Bojonegoro</p>
                        </div>
                    </div>
                    <p class="text-green-100 text-sm leading-relaxed mb-5">
                        Madrasah Ibtidaiyah Miftahul Ulum berkomitmen memberikan pendidikan Islam berkualitas
                        yang memadukan ilmu pengetahuan dengan nilai-nilai keislaman sejak tahun 1978.
                    </p>
                    {{-- <div class="flex gap-3">
                        <a href="#"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">📘</a>
                        <a href="#"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">📸</a>
                        <a href="#"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">▶️</a>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">💬</a>
                    </div> --}}
                </div>

                <!-- Links -->
                <div>
                    <h4 class="font-semibold text-white mb-4 text-base">Navigasi</h4>
                    <ul class="space-y-2 text-sm text-green-200">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">🏠 Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="hover:text-white transition">🏫 Profil Madrasah</a>
                        </li>
                        <li><a href="{{ route('akademik') }}" class="hover:text-white transition">📚 Akademik</a></li>
                        <li><a href="{{ route('guru') }}" class="hover:text-white transition">👩‍🏫 Guru & Staff</a>
                        </li>
                        <li><a href="{{ route('berita.index') }}" class="hover:text-white transition">📰 Berita</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="hover:text-white transition">🖼️ Galeri</a>
                        </li>
                        <li><a href="{{ route('prestasi.index') }}" class="hover:text-white transition">🏆 Prestasi</a>
                        </li>
                        <li><a href="{{ route('ppdb.index') }}" class="hover:text-white transition">📝 PPDB</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold text-white mb-4 text-base">Kontak</h4>
                    <ul class="space-y-3 text-sm text-green-200">
                        <li class="flex items-start gap-2">
                            <span class="mt-0.5">📍</span>
                            <span>Jipo, Kepohbaru, Bojonegoro, Jawa Timur</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>📞</span>
                            <a href="tel:+6285779248641" class="hover:text-white transition">085779248641</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>✉️</span>
                            <a href="mailto:info@mimiftahululum.sch.id"
                                class="hover:text-white transition">mimiftahululumjipo@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>💬</span>
                            <a href="https://wa.me/+6285779248641" target="_blank"
                                class="hover:text-white transition">WhatsApp Admin</a>
                        </li>
                    </ul>
                    <div class="mt-5">
                        <a href="{{ route('ppdb.index') }}"
                            class="btn-white !py-2.5 !px-5 text-sm w-full justify-center">
                            📝 Daftar PPDB Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="rounded-2xl overflow-hidden h-48">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.5623778759054!2d112.12402507405412!3d-7.17647699282846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7789b703827779%3A0xc2c32e598f9b99b7!2sMI%20MIFTAHUL%20ULUM%20JIPO!5e0!3m2!1sid!2sid!4v1778389252385!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10 py-5">
            <div class="max-w-7xl mx-auto px-4 text-center text-green-300 text-sm">
                <p>© {{ date('Y') }} Madrasah Ibtidaiyah Miftahul Ulum Jipo. All rights reserved.</p>
                <p class="mt-1 text-xs text-green-400">NPSN: 60718084 | Akreditasi: B</p>
            </div>
        </div>
    </footer>

    {{-- Back to Top --}}
    <button id="back-to-top"
        class="fixed bottom-6 right-6 z-50 w-11 h-11 bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 hover:bg-green-700 hover:-translate-y-1">
        ↑
    </button>

    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>

</html>
