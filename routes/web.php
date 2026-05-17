<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BeritaController;
use App\Http\Controllers\Frontend\ProfilController;
use App\Http\Controllers\Frontend\AkademikController;
use App\Http\Controllers\Frontend\GuruController;
use App\Http\Controllers\Frontend\GaleriController;
use App\Http\Controllers\Frontend\PpdbController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\PrestasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\KategoriBeritaController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\StrukturOrgController;
use App\Http\Controllers\Admin\PrestasiController as AdminPrestasiController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/favicon.ico', function () {
    $faviconSetting = \App\Models\Pengaturan::where('key', 'favicon')->first();
    $storedFaviconPath = $faviconSetting?->value;
    $storedFaviconFile = $storedFaviconPath ? public_path('storage/' . $storedFaviconPath) : null;
    $fallbackFaviconFile = public_path('images/favicon2.png');

    $faviconFile = ($storedFaviconFile && file_exists($storedFaviconFile))
        ? $storedFaviconFile
        : $fallbackFaviconFile;

    abort_unless(file_exists($faviconFile), 404);

    $extension = strtolower(pathinfo($faviconFile, PATHINFO_EXTENSION));
    $contentType = match ($extension) {
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'jpg', 'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        default => 'image/png',
    };

    return response()->file($faviconFile, [
        'Content-Type' => $contentType,
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');
Route::get('/guru', [GuruController::class, 'index'])->name('guru');

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/kategori/{slug}', [BeritaController::class, 'kategori'])->name('kategori');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('show');
});

Route::prefix('galeri')->name('galeri.')->group(function () {
    Route::get('/', [GaleriController::class, 'index'])->name('index');
    Route::get('/{id}', [GaleriController::class, 'album'])->name('album');
});

Route::prefix('ppdb')->name('ppdb.')->group(function () {
    Route::get('/', [PpdbController::class, 'index'])->name('index');
    Route::post('/daftar', [PpdbController::class, 'store'])->name('store');
    Route::get('/cek', [PpdbController::class, 'cek'])->name('cek');
    Route::post('/cek', [PpdbController::class, 'cekStatus'])->name('cek.status');
});

Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/', [KontakController::class, 'index'])->name('index');
    Route::post('/kirim', [KontakController::class, 'store'])->name('store');
});

Route::prefix('prestasi')->name('prestasi.')->group(function () {
    Route::get('/', [PrestasiController::class, 'index'])->name('index');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin Protected Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Berita
        Route::resource('berita', AdminBeritaController::class)
            ->parameters(['berita' => 'berita'])
            ->except(['show']);
        Route::resource('kategori-berita', KategoriBeritaController::class)->except(['show']);

        // Pengumuman
        Route::resource('pengumuman', PengumumanController::class)->except(['show']);

        // Galeri
        Route::resource('album', AlbumController::class)->except(['show']);
        Route::resource('galeri', AdminGaleriController::class)->except(['show']);

        // SDM
        Route::resource('guru', AdminGuruController::class)->except(['show']);
        Route::resource('struktur-org', StrukturOrgController::class)->except(['show']);

        // Prestasi
        Route::resource('prestasi', AdminPrestasiController::class)->except(['show']);

        // PPDB
        Route::get('ppdb', [AdminPpdbController::class, 'index'])->name('ppdb.index');
        Route::get('ppdb/{ppdb}', [AdminPpdbController::class, 'show'])->name('ppdb.show');
        Route::patch('ppdb/{ppdb}/status', [AdminPpdbController::class, 'updateStatus'])->name('ppdb.status');
        Route::get('ppdb/export/excel', [AdminPpdbController::class, 'exportExcel'])->name('ppdb.export.excel');
        Route::get('ppdb/export/pdf', [AdminPpdbController::class, 'exportPdf'])->name('ppdb.export.pdf');

        // Kontak
        Route::get('kontak', [AdminKontakController::class, 'index'])->name('kontak.index');
        Route::get('kontak/{kontak}', [AdminKontakController::class, 'show'])->name('kontak.show');
        Route::patch('kontak/{kontak}/read', [AdminKontakController::class, 'markRead'])->name('kontak.read');
        Route::delete('kontak/{kontak}', [AdminKontakController::class, 'destroy'])->name('kontak.destroy');

        // Slider
        Route::resource('slider', SliderController::class)->except(['show']);

        // Program Unggulan
        Route::resource('program', ProgramController::class)->except(['show']);

        // Ekskul
        Route::resource('ekskul', EkskulController::class)->except(['show']);

        // Pengaturan
        Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::post('pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

        // Users
        Route::resource('users', UserController::class)->except(['show']);
    });
});
