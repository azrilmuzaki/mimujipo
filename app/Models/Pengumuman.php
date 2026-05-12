<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul', 'konten', 'file_lampiran',
        'tanggal_mulai', 'tanggal_selesai', 'is_active'
    ];

    protected $casts = [
        'is_active'      => 'boolean',
        'tanggal_mulai'  => 'date',
        'tanggal_selesai'=> 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
