<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrg extends Model
{
    protected $table = 'struktur_org';

    protected $fillable = ['nama', 'jabatan', 'foto', 'urutan'];

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path('storage/' . $this->foto))) {
            return asset('storage/' . $this->foto);
        }
        return asset('images/avatar-default.jpg');
    }
}
