<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrg;
use App\Models\Prestasi;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class StrukturOrgSeeder extends Seeder
{
    public function run(): void
    {
        $struktors = [
            ['nama' => 'Moh Azril Muzaki', 'jabatan' => 'Kepala Madrasah', 'urutan' => 1],
            ['nama' => 'Hj. Siti Maimunah, S.Pd.I', 'jabatan' => 'Wakil Kepala Madrasah', 'urutan' => 2],
            ['nama' => 'Muhammad Fathoni, S.Pd', 'jabatan' => 'Ketua Komite', 'urutan' => 3],
            ['nama' => 'Nur Aini Rahmawati, S.Pd.I', 'jabatan' => 'Waka Kurikulum', 'urutan' => 4],
            ['nama' => 'Ahmad Zainuri, S.Pd.I', 'jabatan' => 'Waka Kesiswaan', 'urutan' => 5],
            ['nama' => 'Bambang Suprianto', 'jabatan' => 'Kepala Tata Usaha', 'urutan' => 6],
        ];
        foreach ($struktors as $s) {
            StrukturOrg::create(array_merge($s, ['foto' => null]));
        }
    }
}
