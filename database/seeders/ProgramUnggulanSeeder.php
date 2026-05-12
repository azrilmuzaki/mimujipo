<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class ProgramUnggulanSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            ['judul' => 'Tahfidz Al-Quran',           'deskripsi' => 'Program hafalan Al-Quran dengan target minimal 2 juz selama 6 tahun belajar, dibimbing oleh guru tahfidz berpengalaman.', 'icon' => '📖', 'warna' => '#16a34a', 'urutan' => 1],
            ['judul' => 'Pembiasaan Sholat Dhuha',     'deskripsi' => 'Setiap pagi siswa melaksanakan sholat dhuha berjamaah untuk membentuk karakter Islami yang kuat.',                      'icon' => '🕌', 'warna' => '#0f766e', 'urutan' => 2],
            ['judul' => 'Bahasa Arab Aktif',            'deskripsi' => 'Pembelajaran Bahasa Arab komunikatif dengan metode modern sehingga siswa mampu berkomunikasi dalam bahasa Arab.',       'icon' => '🌙', 'warna' => '#1d4ed8', 'urutan' => 3],
            ['judul' => 'Kurikulum Merdeka Terintegrasi','deskripsi' => 'Mengintegrasikan Kurikulum Merdeka Belajar dengan nilai-nilai keislaman untuk pembelajaran yang komprehensif.',        'icon' => '🎓', 'warna' => '#7e22ce', 'urutan' => 4],
            ['judul' => 'Ekstrakulikuler Islami',       'deskripsi' => 'Berbagai kegiatan ekstrakulikuler bernuansa Islami: pramuka, kaligrafi, hadroh, dan olahraga Islami.',                'icon' => '⭐', 'warna' => '#b45309', 'urutan' => 5],
            ['judul' => 'Parenting Islami',             'deskripsi' => 'Program keterlibatan orang tua dalam pendidikan anak melalui kajian rutin dan konsultasi pendidikan.',                 'icon' => '👨‍👩‍👧', 'warna' => '#be185d', 'urutan' => 6],
        ];
        foreach ($programs as $p) {
            ProgramUnggulan::create(array_merge($p, ['gambar' => null, 'is_active' => true]));
        }
    }
}
