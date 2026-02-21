<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EdukasiGratis extends Model
{
    protected $table = 'edukasi_gratis';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'langkah',
        'kategori',
        'platform',
        'url_resmi',
        'gambar',
        'ikon',
        'warna',
        'aktif',
        'unggulan',
        'urutan',
        'dilihat',
        'dibuat_oleh',
    ];

    protected function casts(): array
    {
        return [
            'aktif' => 'boolean',
            'unggulan' => 'boolean',
        ];
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    // Auto-generate slug
    protected static function booted(): void
    {
        static::creating(function (EdukasiGratis $edukasi) {
            if (empty($edukasi->slug)) {
                $edukasi->slug = Str::slug($edukasi->judul);
                $count = static::where('slug', 'like', $edukasi->slug . '%')->count();
                if ($count > 0) {
                    $edukasi->slug .= '-' . ($count + 1);
                }
            }
        });
    }

    // Scopes
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeUnggulan($query)
    {
        return $query->where('unggulan', true);
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Kategori list
    public static function daftarKategori(): array
    {
        return [
            'tools' => 'Developer Tools',
            'cloud' => 'Cloud & Hosting',
            'design' => 'Desain & Kreativitas',
            'dev' => 'Pengembangan Software',
            'ai' => 'AI & Machine Learning',
            'pendidikan' => 'Platform Pendidikan',
            'produktivitas' => 'Produktivitas',
            'sertifikasi' => 'Sertifikasi',
            'database' => 'Database & Storage',
            'keamanan' => 'Keamanan & Privacy',
        ];
    }
}
