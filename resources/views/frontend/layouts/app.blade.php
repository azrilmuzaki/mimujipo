<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="@yield('meta_description', 'Website resmi Madrasah Ibtidaiyah Miftahul Ulum Jipo, Kepohbaru, Bojonegoro - Madrasah Ibtidaiyah berkualitas berbasis nilai-nilai Islam')">
    <title>@yield('title', 'MI Miftahul Ulum') | Madrasah Ibtidaiyah Miftahul Ulum</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

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
                <div class="hidden lg:flex items-center gap-6 xl:gap-8">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Beranda</a>
                    <a href="{{ route('profil') }}"
                        class="nav-link {{ request()->routeIs('profil') ? 'nav-link-active' : '' }}">Profil</a>
                    <a href="{{ route('akademik') }}"
                        class="nav-link {{ request()->routeIs('akademik') ? 'nav-link-active' : '' }}">Akademik</a>
                    <a href="{{ route('guru') }}"
                        class="nav-link {{ request()->routeIs('guru') ? 'nav-link-active' : '' }}">Guru & Staff</a>
                    <a href="{{ route('berita.index') }}"
                        class="nav-link {{ request()->routeIs('berita*') ? 'nav-link-active' : '' }}">Berita</a>
                    <a href="{{ route('galeri.index') }}"
                        class="nav-link {{ request()->routeIs('galeri*') ? 'nav-link-active' : '' }}">Galeri</a>
                    <a href="{{ route('prestasi.index') }}"
                        class="nav-link {{ request()->routeIs('prestasi*') ? 'nav-link-active' : '' }}">Prestasi</a>
                    <a href="{{ route('kontak.index') }}"
                        class="nav-link {{ request()->routeIs('kontak*') ? 'nav-link-active' : '' }}">Kontak</a>
                    <a href="{{ route('ppdb.index') }}" class="btn-white !py-2 !px-5 text-sm">
                        📝 Daftar PPDB
                    </a>
                </div>

                <!-- Mobile Toggle -->
                <button id="mobile-menu-btn" class="lg:hidden text-white p-2 hover:bg-white/10 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t border-white/20 pt-4">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}" class="nav-link py-2">Beranda</a>
                    <a href="{{ route('profil') }}" class="nav-link py-2">Profil</a>
                    <a href="{{ route('akademik') }}" class="nav-link py-2">Akademik</a>
                    <a href="{{ route('guru') }}" class="nav-link py-2">Guru & Staff</a>
                    <a href="{{ route('berita.index') }}" class="nav-link py-2">Berita</a>
                    <a href="{{ route('galeri.index') }}" class="nav-link py-2">Galeri</a>
                    <a href="{{ route('prestasi.index') }}" class="nav-link py-2">Prestasi</a>
                    <a href="{{ route('kontak.index') }}" class="nav-link py-2">Kontak</a>
                    <a href="{{ route('ppdb.index') }}" class="btn-white !py-2 !px-5 text-sm self-start mt-2">📝 Daftar
                        PPDB</a>
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
                    <div class="flex gap-3">
                        <a href="#"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">📘</a>
                        <a href="#"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">📸</a>
                        <a href="#"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">▶️</a>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition text-sm">💬</a>
                    </div>
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
                            <a href="tel:+62353123456" class="hover:text-white transition">(0353) 123456</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>✉️</span>
                            <a href="mailto:info@mimiftahululum.sch.id"
                                class="hover:text-white transition">info@mimiftahululum.sch.id</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>💬</span>
                            <a href="https://wa.me/6281234567890" target="_blank"
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