<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = ['album_id', 'gambar', 'caption', 'urutan'];

    public function album()
    {
        return $this->belongsTo(AlbumGaleri::class, 'album_id');
    }

    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar && file_exists(public_path('storage/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }
        return asset('images/no-image.jpg');
    }
}
