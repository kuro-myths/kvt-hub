<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'kurikulum_id',
        'sks',
        'semester',
        'tipe',
        'kategori',
        'prasyarat_ids',
        'jam_per_minggu',
        'capaian_pembelajaran',
        'aktif',
    ];

    protected $casts = [
        'prasyarat_ids' => 'array',
        'capaian_pembelajaran' => 'array',
        'aktif' => 'boolean',
    ];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function krsDetail()
    {
        return $this->hasMany(KrsDetail::class);
    }

    public function prasyarat()
    {
        $ids = $this->prasyarat_ids ?? [];
        return self::whereIn('id', $ids)->get();
    }
}
