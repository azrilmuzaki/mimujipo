<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $table = 'ppdb';

    protected $fillable = [
        'no_pendaftaran', 'nama_siswa', 'jenis_kelamin', 'tanggal_lahir',
        'tempat_lahir', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah',
        'pekerjaan_ibu', 'alamat', 'telepon', 'email', 'asal_sekolah',
        'foto', 'dokumen_kk', 'dokumen_akta', 'status', 'catatan', 'tahun_ajaran'
    ];

    protected $casts = ['tanggal_lahir' => 'date'];

    public static function generateNomor(): string
    {
        $tahun  = date('Y');
        $count  = self::whereYear('created_at', $tahun)->count() + 1;
        return 'PPDB-' . $tahun . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending'  => 'Menunggu Verifikasi',
            'proses'   => 'Sedang Diproses',
            'diterima' => 'Diterima',
            'ditolak'  => 'Ditolak',
            default    => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending'  => 'yellow',
            'proses'   => 'blue',
            'diterima' => 'green',
            'ditolak'  => 'red',
            default    => 'gray',
        };
    }

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path('storage/' . $this->foto))) {
            return asset('storage/' . $this->foto);
        }
        return asset('images/avatar-default.jpg');
    }
}
