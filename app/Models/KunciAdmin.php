<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KunciAdmin extends Model
{
    protected $table = 'kunci_admin';

    protected $fillable = [
        'kunci',
        'deskripsi',
        'digunakan',
        'digunakan_oleh',
        'digunakan_pada',
    ];

    protected function casts(): array
    {
        return [
            'digunakan' => 'boolean',
            'digunakan_pada' => 'datetime',
        ];
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'digunakan_oleh');
    }
}
