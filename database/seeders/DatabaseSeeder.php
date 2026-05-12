<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengaturan;
use App\Models\Slider;
use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\AlbumGaleri;
use App\Models\Guru;
use App\Models\StrukturOrg;
use App\Models\Prestasi;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PengaturanSeeder::class,
            SliderSeeder::class,
            KategoriBeritaSeeder::class,
            BeritaSeeder::class,
            PengumumanSeeder::class,
            AlbumGaleriSeeder::class,
            GuruSeeder::class,
            StrukturOrgSeeder::class,
            PrestasiSeeder::class,
            ProgramUnggulanSeeder::class,
            EkskulSeeder::class,
        ]);
    }
}
