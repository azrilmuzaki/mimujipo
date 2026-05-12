<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumGaleri extends Model
{
    protected $table = 'album_galeri';

    protected $fillable = ['nama', 'deskripsi', 'cover', 'tanggal'];

    protected $casts = ['tanggal' => 'date'];

    public function foto()
    {
        return $this->hasMany(Galeri::class, 'album_id')->orderBy('urutan');
    }

    public function getCoverUrlAttribute(): string
    {
        if ($this->cover && file_exists(public_path('storage/' . $this->cover))) {
            return asset('storage/' . $this->cover);
        }
        // fallback: first photo
        $first = $this->foto()->first();
        if ($first) return asset('storage/' . $first->gambar);
        return asset('images/no-image.jpg');
    }
}
