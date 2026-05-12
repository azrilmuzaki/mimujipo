<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class KategoriBerita extends Model
{
    use HasSlug;

    protected $table = 'kategori_berita';

    protected $fillable = ['nama', 'slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }
}
