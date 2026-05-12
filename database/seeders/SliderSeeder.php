<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\AlbumGaleri;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            ['caption' => 'Selamat Datang di MI Miftahul Ulum', 'subketerangan' => 'Madrasah Ibtidaiyah Terbaik di Kepohbaru, Bojonegoro', 'urutan' => 1],
            ['caption' => 'Pendidikan Islam Berkualitas', 'subketerangan' => 'Membentuk Generasi Qurani yang Cerdas dan Berakhlak Mulia', 'urutan' => 2],
            ['caption' => 'PPDB Tahun Ajaran 2025/2026', 'subketerangan' => 'Daftarkan Putra-Putri Anda Sekarang', 'link' => '/ppdb', 'urutan' => 3],
        ];
        foreach ($sliders as $s) {
            Slider::create(array_merge($s, ['image' => '', 'is_active' => true]));
        }
    }
}
