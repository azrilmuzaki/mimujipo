<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\StrukturOrg;
use App\Models\Prestasi;
use App\Models\ProgramUnggulan;
use App\Models\Ekskul;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $gurus = [
            ['nama' => 'Moh Azril Muzaki', 'jabatan' => 'Kepala Madrasah', 'mata_pelajaran' => 'Quran Hadits', 'pendidikan' => 'S2 PAI UIN Sunan Ampel'],
            ['nama' => 'Hj. Siti Maimunah, S.Pd.I', 'jabatan' => 'Wakil Kepala Madrasah', 'mata_pelajaran' => 'Akidah Akhlak', 'pendidikan' => 'S1 PAI IAIN Tulungagung'],
            ['nama' => 'Muhammad Fathoni, S.Pd', 'jabatan' => 'Guru Kelas VI', 'mata_pelajaran' => 'Matematika, IPA', 'pendidikan' => 'S1 PGMI UNISDA Lamongan'],
            ['nama' => 'Nur Aini Rahmawati, S.Pd.I', 'jabatan' => 'Guru Kelas V', 'mata_pelajaran' => 'Bahasa Indonesia, IPS', 'pendidikan' => 'S1 PGMI UNISDA Lamongan'],
            ['nama' => 'Ahmad Zainuri, S.Pd.I', 'jabatan' => 'Guru Kelas IV', 'mata_pelajaran' => 'Fiqih, SKI', 'pendidikan' => 'S1 PAI IAIN Tulungagung'],
            ['nama' => 'Fatimah Zahra, S.Pd', 'jabatan' => 'Guru Kelas III', 'mata_pelajaran' => 'Bahasa Arab, Tahfidz', 'pendidikan' => 'S1 PBA UIN Malang'],
            ['nama' => 'Khoirul Anwar, S.Pd', 'jabatan' => 'Guru Kelas II', 'mata_pelajaran' => 'PJOK, Seni Budaya', 'pendidikan' => 'S1 PJKR UNESA Surabaya'],
            ['nama' => 'Umi Kulsum, S.Pd.I', 'jabatan' => 'Guru Kelas I', 'mata_pelajaran' => 'Tematik, BTQ', 'pendidikan' => 'S1 PGMI UIL Lamongan'],
            ['nama' => 'Bambang Suprianto', 'jabatan' => 'Staf Tata Usaha', 'mata_pelajaran' => null, 'pendidikan' => 'SMA'],
        ];
        foreach ($gurus as $g) {
            Guru::create(array_merge($g, ['foto' => null, 'nip' => null, 'is_active' => true]));
        }
    }
}
