<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'nama_prestasi', 'kategori', 'tingkat',
        'tahun', 'keterangan', 'foto', 'penyelenggara'
    ];

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path('storage/' . $this->foto))) {
            return asset('storage/' . $this->foto);
        }
        return asset('images/prestasi-default.jpg');
    }

    public function getTingkatLabelAttribute(): string
    {
        return match($this->tingkat) {
            'kecamatan' => 'Tingkat Kecamatan',
            'kabupaten' => 'Tingkat Kabupaten',
            'provinsi'  => 'Tingkat Provinsi',
            'nasional'  => 'Tingkat Nasional',
            'internasional' => 'Tingkat Internasional',
            default     => ucfirst($this->tingkat),
        };
    }
}
