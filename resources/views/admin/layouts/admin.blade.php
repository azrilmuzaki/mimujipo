<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin MI Miftahul Ulum</title>
    @include('partials.favicon')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen overflow-hidden">

    {{-- ===== SIDEBAR ===== --}}
    <aside id="sidebar" class="w-64 hero-gradient flex-shrink-0 flex flex-col overflow-y-auto transition-all duration-300">
        <!-- Logo -->
        <div class="px-5 py-6 border-b border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center text-xl">🕌</div>
                <div>
                    <div class="text-white font-bold text-sm">MI Miftahul Ulum</div>
                    <div class="text-green-300 text-xs">Panel Admin</div>
                </div>
            </a>
        </div>

        <!-- Admin Info -->
        <div class="px-5 py-4 border-b border-white/10 flex items-center gap-3">
            <div class="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center text-sm">👤</div>
            <div>
                <div class="text-white text-sm font-medium truncate max-w-[140px]">{{ auth()->user()->name ?? '' }}</div>
                <div class="text-green-300 text-xs capitalize">{{ auth()->user()->role ?? '' }}</div>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-3 py-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🏠</span> Dashboard
            </a>

            <div class="pt-3 pb-1 px-2 text-green-400 text-xs font-semibold uppercase tracking-wider">Konten</div>
            <a href="{{ route('admin.slider.index') }}" class="{{ request()->routeIs('admin.slider*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🖼️</span> Slider / Banner
            </a>
            <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>📰</span> Berita
            </a>
            <a href="{{ route('admin.kategori-berita.index') }}" class="{{ request()->routeIs('admin.kategori-berita*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🏷️</span> Kategori Berita
            </a>
            <a href="{{ route('admin.pengumuman.index') }}" class="{{ request()->routeIs('admin.pengumuman*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>📢</span> Pengumuman
            </a>
            <a href="{{ route('admin.album.index') }}" class="{{ request()->routeIs('admin.album*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>📸</span> Album Galeri
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🖼️</span> Foto Galeri
            </a>

            <div class="pt-3 pb-1 px-2 text-green-400 text-xs font-semibold uppercase tracking-wider">SDM</div>
            <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>👩‍🏫</span> Guru & Staff
            </a>
            <a href="{{ route('admin.struktur-org.index') }}" class="{{ request()->routeIs('admin.struktur-org*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🗂️</span> Struktur Org
            </a>

            <div class="pt-3 pb-1 px-2 text-green-400 text-xs font-semibold uppercase tracking-wider">Program</div>
            <a href="{{ route('admin.program.index') }}" class="{{ request()->routeIs('admin.program*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>⭐</span> Program Unggulan
            </a>
            <a href="{{ route('admin.ekskul.index') }}" class="{{ request()->routeIs('admin.ekskul*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🎯</span> Ekskul
            </a>
            <a href="{{ route('admin.prestasi.index') }}" class="{{ request()->routeIs('admin.prestasi*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>🏆</span> Prestasi
            </a>

            <div class="pt-3 pb-1 px-2 text-green-400 text-xs font-semibold uppercase tracking-wider">PPDB & Pesan</div>
            <a href="{{ route('admin.ppdb.index') }}" class="{{ request()->routeIs('admin.ppdb*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>📝</span> Data PPDB
                @php $ppdbBaru = \App\Models\Ppdb::where('status','pending')->count(); @endphp
                @if($ppdbBaru > 0)
                <span class="ml-auto bg-yellow-400 text-yellow-900 text-xs px-2 py-0.5 rounded-full">{{ $ppdbBaru }}</span>
                @endif
            </a>
            <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>✉️</span> Pesan Kontak
                @php $pesanBaru = \App\Models\KontakPesan::unread()->count(); @endphp
                @if($pesanBaru > 0)
                <span class="ml-auto bg-red-400 text-white text-xs px-2 py-0.5 rounded-full">{{ $pesanBaru }}</span>
                @endif
            </a>

            <div class="pt-3 pb-1 px-2 text-green-400 text-xs font-semibold uppercase tracking-wider">Pengaturan</div>
            <a href="{{ route('admin.pengaturan.index') }}" class="{{ request()->routeIs('admin.pengaturan*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>⚙️</span> Pengaturan Web
            </a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users*') ? 'sidebar-link-active' : 'sidebar-link' }}">
                <span>👥</span> Manajemen User
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-3 border-t border-white/10">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-link w-full text-left text-red-300 hover:text-red-200 hover:bg-red-500/20">
                    <span>🚪</span> Keluar
                </button>
            </form>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link mt-1">
                <span>🌐</span> Lihat Website
            </a>
        </div>
    </aside>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-bold text-gray-800">@yield('page_title', 'Dashboard')</h1>
                <nav class="text-xs text-gray-400">
                    Admin / @yield('breadcrumb', 'Dashboard')
                </nav>
            </div>
            <div class="flex items-center gap-3">
                @php $pesanBaru = \App\Models\KontakPesan::unread()->count(); @endphp
                @if($pesanBaru > 0)
                <a href="{{ route('admin.kontak.index') }}" class="relative w-9 h-9 bg-gray-100 rounded-xl flex items-center justify-center hover:bg-gray-200 transition">
                    ✉️
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">{{ $pesanBaru }}</span>
                </a>
                @endif
                <div class="text-sm text-gray-600">
                    Halo, <strong>{{ auth()->user()->name ?? '' }}</strong>
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="auto-dismiss mx-6 mt-4 bg-green-50 border border-green-200 text-green-700 px-5 py-3 rounded-xl flex items-center gap-3">
            ✅ {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="auto-dismiss mx-6 mt-4 bg-red-50 border border-red-200 text-red-700 px-5 py-3 rounded-xl flex items-center gap-3">
            ❌ {{ session('error') }}
        </div>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
