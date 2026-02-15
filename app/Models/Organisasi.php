<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasi';

    protected $fillable = [
        'nama',
        'deskripsi',
        'logo',
        'tipe',
        'kategori',
        'website',
        'kontak',
        'jumlah_anggota',
        'unggulan',
        'aktif',
    ];

    protected $casts = [
        'unggulan' => 'boolean',
        'aktif' => 'boolean',
    ];

    public const TIPE = [
        'internal' => 'Internal',
        'eksternal' => 'Eksternal',
        'nasional' => 'Nasional',
        'internasional' => 'Internasional',
    ];

    public const KATEGORI = [
        'akademik' => 'Akademik',
        'olahraga' => 'Olahraga',
        'seni_budaya' => 'Seni & Budaya',
        'teknologi' => 'Teknologi',
        'keagamaan' => 'Keagamaan',
        'sosial' => 'Sosial',
        'lingkungan' => 'Lingkungan',
        'kewirausahaan' => 'Kewirausahaan',
        'lainnya' => 'Lainnya',
    ];

    public function anggota()
    {
        return $this->belongsToMany(User::class, 'organisasi_anggota')
            ->withPivot('jabatan', 'bergabung_pada', 'berakhir_pada', 'aktif')
            ->withTimestamps();
    }
}
