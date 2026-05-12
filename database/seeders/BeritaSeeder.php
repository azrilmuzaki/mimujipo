<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul'        => 'Peringatan Maulid Nabi Muhammad SAW 1446H Berlangsung Meriah',
                'konten'       => '<p>Madrasah Ibtidaiyah Miftahul Ulum menggelar peringatan Maulid Nabi Muhammad SAW 1446H dengan penuh suka cita. Kegiatan ini dihadiri oleh seluruh siswa, guru, dan wali murid yang antusias mengikuti berbagai rangkaian acara.</p><p>Dalam acara tersebut, ditampilkan berbagai kesenian Islami seperti pembacaan sholawat, puisi islami, dan ceramah agama yang disampaikan oleh ustadz tamu dari Bojonegoro.</p>',
                'kategori_id'  => 1,
                'user_id'      => 1,
                'is_featured'  => true,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'judul'        => 'Siswa MI Miftahul Ulum Raih Juara 1 MTQ Tingkat Kabupaten',
                'konten'       => '<p>Membanggakan! Salah satu siswa MI Miftahul Ulum berhasil meraih Juara 1 MTQ Tingkat Kabupaten Bojonegoro. Siswa tersebut adalah Muhammad Farhan kelas VI yang telah berlatih intensif selama beberapa bulan di bawah bimbingan guru tahfidz madrasah.</p>',
                'kategori_id'  => 4,
                'user_id'      => 1,
                'is_featured'  => true,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'judul'        => 'Kegiatan Pesantren Ramadhan 1446H: Mempererat Ukhuwah Islamiyah',
                'konten'       => '<p>MI Miftahul Ulum kembali menggelar kegiatan Pesantren Ramadhan 1446H selama 3 hari penuh. Kegiatan ini bertujuan untuk memperdalam ilmu agama dan mempererat tali silaturahmi antar siswa.</p>',
                'kategori_id'  => 2,
                'user_id'      => 1,
                'is_featured'  => false,
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'judul'        => 'Penerimaan Peserta Didik Baru Tahun Ajaran 2025/2026 Dibuka',
                'konten'       => '<p>MI Miftahul Ulum membuka PPDB untuk tahun ajaran 2025/2026. Pendaftaran dibuka mulai tanggal 1 Juni hingga 31 Juli 2025. Calon siswa baru harus berusia minimal 6 tahun dan membawa kelengkapan dokumen yang diperlukan.</p>',
                'kategori_id'  => 3,
                'user_id'      => 1,
                'is_featured'  => false,
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
            [
                'judul'        => 'Workshop Peningkatan Kompetensi Guru: Implementasi Kurikulum Merdeka',
                'konten'       => '<p>Dalam rangka meningkatkan kualitas pembelajaran, MI Miftahul Ulum mengadakan workshop peningkatan kompetensi guru dengan tema "Implementasi Kurikulum Merdeka di Madrasah Ibtidaiyah".</p>',
                'kategori_id'  => 5,
                'user_id'      => 1,
                'is_featured'  => false,
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];
        foreach ($beritas as $b) {
            Berita::create($b);
        }
    }
}
