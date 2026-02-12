<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketEksklusif extends Model
{
    protected $table = 'paket_eksklusif';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'harga',
        'fitur',
        'durasi_hari',
        'xp_bonus',
        'aktif',
    ];

    protected function casts(): array
    {
        return [
            'aktif' => 'boolean',
            'harga' => 'decimal:2',
        ];
    }

    public function langganan()
    {
        return $this->hasMany(Langganan::class, 'paket_id');
    }
}
