<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencapaian extends Model
{
    protected $table = 'pencapaian';

    protected $fillable = [
        'nama',
        'deskripsi',
        'ikon',
        'warna',
        'xp_syarat',
        'level_syarat',
    ];

    public function pengguna()
    {
        return $this->belongsToMany(User::class, 'pencapaian_pengguna')
            ->withPivot('diraih_pada')
            ->withTimestamps();
    }
}
