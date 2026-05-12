<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlbumGaleri;
use App\Models\Guru;
use App\Models\StrukturOrg;
use App\Models\Prestasi;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class AlbumGaleriSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            ['nama' => 'Kegiatan Maulid Nabi 1446H', 'deskripsi' => 'Dokumentasi peringatan Maulid Nabi Muhammad SAW', 'tanggal' => now()->subMonths(2)->format('Y-m-d'), 'cover' => ''],
            ['nama' => 'Wisuda Tahfidz 2024', 'deskripsi' => 'Wisuda siswa hafidz Quran', 'tanggal' => now()->subMonths(4)->format('Y-m-d'), 'cover' => ''],
            ['nama' => 'Pentas Seni dan Budaya', 'deskripsi' => 'Kegiatan seni budaya tahunan', 'tanggal' => now()->subMonths(6)->format('Y-m-d'), 'cover' => ''],
        ];
        foreach ($albums as $album) {
            AlbumGaleri::create($album);
        }
    }
}
