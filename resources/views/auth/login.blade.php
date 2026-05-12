<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | MI Miftahul Ulum</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="hero-gradient hero-pattern min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md" data-aos="fade-up">
    <!-- Card -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="hero-gradient p-8 text-center">
            <div class="text-6xl mb-3">🏫</div>
            <h1 class="text-2xl font-bold text-white">MI Miftahul Ulum</h1>
            <p class="text-green-200 text-sm mt-1">Panel Administrasi</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Masuk ke Dashboard</h2>

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl px-4 py-3 mb-5 text-sm">
                ❌ {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="form-input @error('email') border-red-400 @enderror"
                           placeholder="admin@madrasah.sch.id">
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input type="password" name="password" required
                           class="form-input"
                           placeholder="••••••••">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-green-600 rounded">
                    <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                </div>
                <button type="submit" class="btn-primary w-full justify-center !py-3.5 text-base">
                    🔑 Masuk Dashboard
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-green-600 transition">
                    ← Kembali ke Website
                </a>
            </div>
        </div>
    </div>

    <p class="text-center text-green-200 text-xs mt-5">
        © {{ date('Y') }} MI Miftahul Ulum. All rights reserved.
    </p>
</div>
</body>
</html>
