<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Organisasi extends Model
{
    protected $table = 'organisasi';

    protected $fillable = [
        'nama',
        'singkatan',
        'deskripsi',
        'tentang',
        'visi',
        'misi',
        'tujuan',
        'logo',
        'gambar_struktur',
        'tipe',
        'kategori',
        'website',
        'kontak',
        'email',
        'telepon',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'tiktok',
        'alamat',
        'google_maps_embed',
        'jumlah_anggota',
        'unggulan',
        'aktif',
        'tahun_berdiri',
        'periode_kepengurusan',
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

    /**
     * Generate slug dari nama untuk URL.
     */
    public function getSlugAttribute(): string
    {
        return Str::slug($this->nama);
    }

    /**
     * Relasi ke anggota (pivot).
     */
    public function anggota()
    {
        return $this->belongsToMany(User::class, 'organisasi_anggota')
            ->withPivot('jabatan', 'bergabung_pada', 'berakhir_pada', 'aktif')
            ->withTimestamps();
    }

    /**
     * Relasi ke kegiatan organisasi.
     */
    public function kegiatan()
    {
        return $this->hasMany(OrganisasiKegiatan::class);
    }

    /**
     * Relasi ke pengurus organisasi.
     */
    public function pengurus()
    {
        return $this->hasMany(OrganisasiPengurus::class)->orderBy('urutan');
    }

    /**
     * Relasi ke galeri organisasi.
     */
    public function galeri()
    {
        return $this->hasMany(OrganisasiGaleri::class);
    }
}
