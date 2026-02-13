<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'gambar',
        'kategori',
        'status',
        'tampil_ticker',
        'tampil_popup',
        'unggulan',
        'penulis_id',
        'dilihat',
        'terbit_pada',
    ];

    protected function casts(): array
    {
        return [
            'tampil_ticker' => 'boolean',
            'tampil_popup' => 'boolean',
            'unggulan' => 'boolean',
            'terbit_pada' => 'datetime',
        ];
    }

    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }

    // Auto-generate slug
    protected static function booted(): void
    {
        static::creating(function (Berita $berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
                $count = static::where('slug', 'like', $berita->slug . '%')->count();
                if ($count > 0) {
                    $berita->slug .= '-' . ($count + 1);
                }
            }
        });
    }

    // Scopes
    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit')
            ->where(function ($q) {
                $q->whereNull('terbit_pada')
                    ->orWhere('terbit_pada', '<=', now());
            });
    }

    public function scopeUntukTicker($query)
    {
        return $query->terbit()->where('tampil_ticker', true);
    }

    public function scopeUntukPopup($query)
    {
        return $query->terbit()->where('tampil_popup', true);
    }

    public function scopeUnggulan($query)
    {
        return $query->terbit()->where('unggulan', true);
    }

    // Increment view count
    public function tambahDilihat(): void
    {
        $this->increment('dilihat');
    }

    // Get route key
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Kategori tersedia
    public static function kategoriList(): array
    {
        return [
            'umum' => 'Umum',
            'akademik' => 'Akademik',
            'teknologi' => 'Teknologi',
            'riset' => 'Riset & Inovasi',
            'karir' => 'Karir & Industri',
            'keamanan' => 'Keamanan',
            'event' => 'Event & Kegiatan',
            'prestasi' => 'Prestasi',
            'pengumuman' => 'Pengumuman',
        ];
    }
}
