<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakPesan extends Model
{
    protected $table = 'kontak_pesan';

    protected $fillable = [
        'nama', 'email', 'telepon', 'subjek', 'pesan', 'is_read', 'read_at'
    ];

    protected $casts = [
        'is_read'  => 'boolean',
        'read_at'  => 'datetime',
    ];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function markAsRead(): void
    {
        $this->update(['is_read' => true, 'read_at' => now()]);
    }
}
