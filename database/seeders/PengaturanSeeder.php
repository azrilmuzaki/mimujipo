<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaturan;

class PengaturanSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'nama_sekolah' => 'Madrasah Ibtidaiyah Miftahul Ulum',
            'singkatan' => 'MI Miftahul Ulum',
            'alamat' => 'Jipo, Kepohbaru, Bojonegoro, Jawa Timur',
            'telepon' => '(0353) 123456',
            'whatsapp' => '6281234567890',
            'email' => 'info@mimiftahululum.sch.id',
            'tahun_berdiri' => '1978',
            'npsn' => '60718084',
            'akreditasi' => 'B',
            'kepala_madrasah' => 'Moh Azril Muzaki',
            'facebook' => 'https://facebook.com/mimiftahululum',
            'instagram' => 'https://instagram.com/mimiftahululum',
            'youtube' => 'https://youtube.com/@mimiftahululum',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4!2d111.88!3d-7.22!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTMnMTIuMCJTIDExMcKwNTInNDguMCJF!5e0!3m2!1sen!2sid!4v1234567890',
            'visi' => 'Terwujudnya insan yang beriman, bertaqwa, berakhlak mulia, cerdas, terampil, dan mandiri berlandaskan nilai-nilai Islam.',
            'misi' => "1. Menyelenggarakan pendidikan Islam yang berkualitas\n2. Membentuk karakter Islami pada setiap peserta didik\n3. Mengembangkan potensi akademik dan non-akademik siswa\n4. Membangun lingkungan madrasah yang kondusif dan Islami\n5. Menjalin kerjasama dengan orang tua dan masyarakat",
            'sejarah' => 'Madrasah Ibtidaiyah Miftahul Ulum berdiri pada tahun 1978 atas prakarsa tokoh-tokoh masyarakat dan ulama di Desa Jipo, Kecamatan Kepohbaru, Kabupaten Bojonegoro. Madrasah ini didirikan dengan tujuan untuk memberikan pendidikan Islam yang berkualitas kepada putra-putri masyarakat sekitar.',
            'sambutan_kepsek' => 'Assalamualaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi Madrasah Ibtidaiyah Miftahul Ulum Jipo. Kami berkomitmen untuk memberikan pendidikan terbaik yang memadukan ilmu pengetahuan umum dengan nilai-nilai keislaman.',
            'jumlah_siswa' => '320',
            'jumlah_guru' => '18',
            'jumlah_prestasi' => '45',
            'logo' => '',
            'favicon' => '',
        ];

        foreach ($settings as $key => $value) {
            Pengaturan::create(['key' => $key, 'value' => $value]);
        }
    }
}
