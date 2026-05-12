<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramUnggulan extends Model
{
    protected $table = 'program_unggulan';

    protected $fillable = [
        'judul', 'deskripsi', 'icon', 'gambar', 'warna', 'urutan', 'is_active'
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('urutan');
    }
}
