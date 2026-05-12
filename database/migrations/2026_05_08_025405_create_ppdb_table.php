<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->unique();
            $table->string('nama_siswa');
            $table->string('jenis_kelamin')->nullable(); // L / P
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('foto')->nullable();
            $table->string('dokumen_kk')->nullable(); // file KK
            $table->string('dokumen_akta')->nullable(); // file akta
            $table->enum('status', ['pending', 'diterima', 'ditolak', 'proses'])->default('pending');
            $table->text('catatan')->nullable();
            $table->year('tahun_ajaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb');
    }
};
