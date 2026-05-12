<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasi;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $prestasis = [
            ['nama_prestasi' => 'Juara 1 MTQ Tingkat Kabupaten',           'kategori' => 'non-akademik', 'tingkat' => 'kabupaten', 'tahun' => 2024, 'penyelenggara' => 'Kemenag Kab. Bojonegoro'],
            ['nama_prestasi' => 'Juara 2 Olimpiade Matematika MI',          'kategori' => 'akademik',     'tingkat' => 'kabupaten', 'tahun' => 2024, 'penyelenggara' => 'Dinas Pendidikan'],
            ['nama_prestasi' => 'Juara 1 Lomba Kaligrafi Tingkat Kecamatan','kategori' => 'non-akademik', 'tingkat' => 'kecamatan', 'tahun' => 2024, 'penyelenggara' => 'Kemenag Kec. Kepohbaru'],
            ['nama_prestasi' => 'Juara 3 Lomba Sains MI Tingkat Provinsi',  'kategori' => 'akademik',     'tingkat' => 'provinsi',  'tahun' => 2023, 'penyelenggara' => 'Kanwil Kemenag Jatim'],
            ['nama_prestasi' => 'Juara 1 Pramuka Siaga Tingkat Kecamatan', 'kategori' => 'non-akademik', 'tingkat' => 'kecamatan', 'tahun' => 2023, 'penyelenggara' => 'Kwarcab Bojonegoro'],
        ];
        foreach ($prestasis as $p) {
            Prestasi::create(array_merge($p, ['foto' => null, 'keterangan' => null]));
        }
    }
}
