# Peta Edit Konten

Panduan cepat untuk mengetahui konten website harus diedit dari mana.

## Aturan cepat

1. Jika teks ditulis langsung di file Blade, edit di file `resources/views/...`.
2. Jika Blade memakai `$setting['...']`, edit lewat menu admin `Pengaturan Web` atau tabel `pengaturan`.
3. Jika halaman menampilkan data dari loop seperti `$berita`, `$programs`, `$gurus`, `$albums`, edit lewat menu admin modul terkait.
4. Jika gambar memakai `asset('images/...')`, file gambar harus ada di `public/images/`.
5. Jika gambar memakai `asset('storage/...')`, gambar berasal dari upload admin dan file fisiknya ada di `storage/app/public/...` lalu tampil lewat `public/storage/...`.

## Catatan penting

- Homepage aktif saat ini adalah `resources/views/frontend/home.blade.php`.
- File `resources/views/frontend/home_fixed.blade.php` ada, tetapi tidak dipakai oleh route `/`.
- Nilai `tahun_berdiri` dan isi teks `sejarah` adalah dua data yang berbeda. Jika tahun diubah, cek juga narasi sejarah agar tidak bentrok.
- Navbar dan footer frontend masih banyak yang hardcode di layout, jadi tidak semua teks global berasal dari pengaturan.

## Peta per halaman

### 1. Beranda `/`

- View aktif: `resources/views/frontend/home.blade.php`
- Controller: `app/Http/Controllers/Frontend/HomeController.php`

Sumber konten:

- Hero slider: admin `Slider / Banner` (`/admin/slider`)
- Statistik:
  - `jumlah_siswa`, `jumlah_guru`, `jumlah_prestasi`, `tahun_berdiri`
  - Edit di admin `Pengaturan Web` (`/admin/pengaturan`)
- Sambutan kepala madrasah:
  - `kepala_madrasah`, `sambutan_kepsek`
  - Edit di admin `Pengaturan Web`
- Foto kepala madrasah:
  - Saat ini hardcode di Blade: `asset('images/kepsek2.jpg')`
  - File ada di `public/images/kepsek2.jpg`
- Visi dan misi:
  - `visi`, `misi`
  - Edit di admin `Pengaturan Web`
- Program unggulan:
  - Admin `Program Unggulan` (`/admin/program`)
- Berita terbaru:
  - Admin `Berita` (`/admin/berita`)
  - Kategori di `Kategori Berita` (`/admin/kategori-berita`)
- Pengumuman:
  - Admin `Pengumuman` (`/admin/pengumuman`)
- Galeri terbaru:
  - Album di `Album Galeri` (`/admin/album`)
  - Foto di `Foto Galeri` (`/admin/galeri`)

Biasanya edit langsung di Blade untuk:

- Judul section seperti `Program Unggulan`, `Berita & Pengumuman`, `Kepala Madrasah`
- Label tombol seperti `Daftar PPDB Sekarang`, `Pelajari Lebih Lanjut`
- Teks fallback saat data kosong

### 2. Profil `/profil`

- View: `resources/views/frontend/profil/index.blade.php`
- Controller: `app/Http/Controllers/Frontend/ProfilController.php`

Sumber konten:

- Sejarah madrasah: `sejarah` di admin `Pengaturan Web`
- Tahun berdiri: `tahun_berdiri` di admin `Pengaturan Web`
- NPSN: `npsn` di admin `Pengaturan Web`
- Akreditasi: `akreditasi` di admin `Pengaturan Web`
- Visi dan misi: admin `Pengaturan Web`
- Struktur organisasi:
  - Admin `Struktur Org` (`/admin/struktur-org`)

Biasanya edit langsung di Blade untuk:

- Nama tab seperti `Sejarah`, `Visi & Misi`, `Tujuan`, `Struktur Org`, `Akreditasi`
- Daftar tujuan madrasah yang masih hardcode di view

### 3. Akademik `/akademik`

- View: `resources/views/frontend/akademik/index.blade.php`
- Controller: `app/Http/Controllers/Frontend/AkademikController.php`

Sumber konten:

- Data ekskul: admin `Ekskul` (`/admin/ekskul`)

Biasanya edit langsung di Blade untuk:

- Judul halaman
- Intro section
- Teks statis di luar data ekskul

### 4. Guru dan Staff `/guru`

- View: `resources/views/frontend/guru/index.blade.php`
- Controller: `app/Http/Controllers/Frontend/GuruController.php`

Sumber konten:

- Nama, jabatan, foto, deskripsi, status guru:
  - Admin `Guru & Staff` (`/admin/guru`)

Biasanya edit langsung di Blade untuk:

- Judul halaman
- Label section
- Teks statis di luar data guru

### 5. Berita `/berita`

- View daftar: `resources/views/frontend/berita/index.blade.php`
- View detail: `resources/views/frontend/berita/show.blade.php`
- Controller: `app/Http/Controllers/Frontend/BeritaController.php`

Sumber konten:

- Judul berita, isi berita, gambar, status publish, featured:
  - Admin `Berita` (`/admin/berita`)
- Kategori:
  - Admin `Kategori Berita` (`/admin/kategori-berita`)

Biasanya edit langsung di Blade untuk:

- Judul sidebar
- Label seperti `Berita Terbaru`, `Baca Selengkapnya`
- Layout daftar dan detail

### 6. Galeri `/galeri`

- View daftar album: `resources/views/frontend/galeri/index.blade.php`
- View detail album: `resources/views/frontend/galeri/album.blade.php`
- Controller: `app/Http/Controllers/Frontend/GaleriController.php`

Sumber konten:

- Nama album: admin `Album Galeri` (`/admin/album`)
- Foto-foto tiap album: admin `Foto Galeri` (`/admin/galeri`)

Biasanya edit langsung di Blade untuk:

- Judul halaman
- Label tombol
- Teks statis saat album kosong

### 7. Prestasi `/prestasi`

- View: `resources/views/frontend/prestasi/index.blade.php`
- Controller: `app/Http/Controllers/Frontend/PrestasiController.php`

Sumber konten:

- Data prestasi:
  - Admin `Prestasi` (`/admin/prestasi`)

Biasanya edit langsung di Blade untuk:

- Judul halaman
- Label filter
- Teks statis presentasi data

### 8. Kontak `/kontak`

- View: `resources/views/frontend/kontak/index.blade.php`
- Controller: `app/Http/Controllers/Frontend/KontakController.php`

Sumber konten:

- Alamat, telepon, WhatsApp, email, maps:
  - Admin `Pengaturan Web`
- Pesan masuk dari form:
  - Tersimpan ke admin `Pesan Kontak` (`/admin/kontak`)

Biasanya edit langsung di Blade untuk:

- Judul halaman
- Label form
- Teks bantuan di form

### 9. PPDB `/ppdb`

- View formulir: `resources/views/frontend/ppdb/index.blade.php`
- View cek status: `resources/views/frontend/ppdb/cek.blade.php`
- Controller: `app/Http/Controllers/Frontend/PpdbController.php`

Sumber konten:

- Data kontak pendukung yang memakai `$setting`:
  - Admin `Pengaturan Web`
- Data pendaftaran yang dikirim user:
  - Masuk ke admin `Data PPDB` (`/admin/ppdb`)

Biasanya edit langsung di Blade untuk:

- Label field formulir
- Judul halaman
- Teks petunjuk pendaftaran
- Teks hasil cek status

## Layout global frontend

- File: `resources/views/frontend/layouts/app.blade.php`

Konten yang saat ini masih hardcode di layout:

- Nama brand di navbar
- Menu navbar
- Teks footer tentang madrasah
- Link sosial footer
- Alamat footer
- Telepon footer
- Email footer
- Link WhatsApp footer
- Embed Google Maps footer
- Baris copyright

Kalau kamu mengubah data profil sekolah tetapi footer tidak ikut berubah, besar kemungkinan sumbernya ada di file layout ini, bukan di `pengaturan`.

## Menu admin dan fungsi utamanya

- `/admin/pengaturan`: profil sekolah, kontak, statistik, visi, misi, sambutan, sejarah, maps, logo, favicon
- `/admin/slider`: slider homepage
- `/admin/program`: program unggulan homepage
- `/admin/berita`: berita
- `/admin/kategori-berita`: kategori berita
- `/admin/pengumuman`: pengumuman
- `/admin/album`: album galeri
- `/admin/galeri`: foto galeri
- `/admin/guru`: guru dan staff
- `/admin/struktur-org`: struktur organisasi
- `/admin/ekskul`: data ekskul halaman akademik
- `/admin/prestasi`: data prestasi
- `/admin/ppdb`: data pendaftaran PPDB
- `/admin/kontak`: pesan yang masuk dari form kontak

## Cara cepat menentukan harus edit di mana

### Jika kamu melihat kode seperti ini

`{{ $setting['visi'] }}`

Artinya edit di:

- Admin `Pengaturan Web`

`{{ $program->judul }}`

Artinya edit di:

- Admin `Program Unggulan`

`<img src="{{ asset('images/kepsek2.jpg') }}">`

Artinya edit di:

- Path gambar di Blade
- File fisik di `public/images/`

`<img src="{{ asset('storage/' . $slider->image) }}">`

Artinya edit di:

- Data upload melalui admin modul terkait

## Jika perubahan belum tampil

1. Pastikan file Blade yang diedit memang file yang aktif dipakai route.
2. Pastikan data yang tampil bukan berasal dari tabel `pengaturan` atau modul admin.
3. Jika mengganti gambar manual, cek nama file dan ekstensi harus persis sama.
4. Refresh browser dengan `Ctrl+F5`.
5. Jika perlu, jalankan `php artisan optimize:clear`.
