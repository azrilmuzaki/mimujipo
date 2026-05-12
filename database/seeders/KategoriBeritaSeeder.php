<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use App\Models\Berita;

class KategoriBeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Berita Madrasah',
            'Kegiatan Siswa',
            'Pengumuman',
            'Prestasi',
            'Akademik',
        ];
        foreach ($kategoris as $nama) {
            KategoriBerita::create(['nama' => $nama]);
        }
    }
}
