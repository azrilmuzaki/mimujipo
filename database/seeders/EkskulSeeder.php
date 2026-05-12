<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekskul;

class EkskulSeeder extends Seeder
{
    public function run(): void
    {
        $ekskuls = [
            ['nama' => 'Pramuka',          'deskripsi' => 'Kegiatan kepanduan yang membentuk karakter mandiri, disiplin, dan cinta tanah air.',     'pembina' => 'Khoirul Anwar, S.Pd',      'jadwal' => 'Sabtu, 13.00-15.00'],
            ['nama' => 'Kaligrafi',         'deskripsi' => 'Seni menulis indah huruf Arab (kaligrafi) sebagai ekspresi seni Islami.',               'pembina' => 'Fatimah Zahra, S.Pd',      'jadwal' => 'Jumat, 13.00-15.00'],
            ['nama' => 'Hadroh/Rebana',     'deskripsi' => 'Kesenian musik Islami dengan rebana dan hadroh untuk mengembangkan bakat seni siswa.',  'pembina' => 'Ahmad Zainuri, S.Pd.I',    'jadwal' => 'Kamis, 13.00-15.00'],
            ['nama' => 'Tahfidz Intensif',  'deskripsi' => 'Program hafalan Al-Quran intensif bagi siswa berprestasi di bidang tahfidz.',           'pembina' => 'Hj. Siti Maimunah, S.Pd.I','jadwal' => 'Senin & Rabu, 13.00-14.30'],
            ['nama' => 'Futsal',            'deskripsi' => 'Olahraga futsal untuk mengembangkan fisik dan jiwa sportivitas siswa.',                 'pembina' => 'Khoirul Anwar, S.Pd',      'jadwal' => 'Sabtu, 15.00-17.00'],
        ];
        foreach ($ekskuls as $e) {
            Ekskul::create(array_merge($e, ['foto' => null, 'is_active' => true]));
        }
    }
}
