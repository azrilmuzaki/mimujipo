<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengumuman;
use App\Models\AlbumGaleri;
use App\Models\Guru;
use App\Models\StrukturOrg;
use App\Models\Prestasi;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['judul' => 'Jadwal Ujian Akhir Semester Genap 2024/2025', 'konten' => '<p>Ujian Akhir Semester Genap dilaksanakan pada tanggal <strong>9-14 Juni 2025</strong>. Siswa diharap hadir tepat waktu.</p>', 'tanggal_mulai' => now()->addDays(5)->format('Y-m-d'), 'tanggal_selesai' => now()->addDays(30)->format('Y-m-d'), 'is_active' => true],
            ['judul' => 'Libur Hari Raya Idul Adha 1446H', 'konten' => '<p>Madrasah diliburkan pada 6-8 Juni 2025. Kegiatan normal kembali 9 Juni 2025.</p>', 'tanggal_mulai' => now()->addDays(10)->format('Y-m-d'), 'tanggal_selesai' => now()->addDays(15)->format('Y-m-d'), 'is_active' => true],
            ['judul' => 'PPDB 2025/2026 Dibuka - Daftarkan Segera!', 'konten' => '<p>Pendaftaran Peserta Didik Baru tahun ajaran 2025/2026 telah dibuka. Hubungi madrasah untuk informasi lebih lanjut.</p>', 'tanggal_mulai' => now()->format('Y-m-d'), 'tanggal_selesai' => now()->addDays(60)->format('Y-m-d'), 'is_active' => true],
        ];
        foreach ($items as $item) {
            Pengumuman::create($item);
        }
    }
}
