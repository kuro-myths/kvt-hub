<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KarakterCerita extends Model
{
    protected $table = 'karakter_cerita';

    protected $fillable = [
        'karakter',
        'chapter',
        'judul',
        'judul_asing',
        'slug',
        'ikon',
        'warna',
        'warna_hex',
        'ringkasan',
        'konten',
        'gambar',
        'aliansi',
        'jenjang',
        'status',
        'urutan',
    ];

    protected $casts = [
        'chapter' => 'integer',
        'urutan'  => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->karakter . '-' . $model->judul . '-ch' . $model->chapter);
            }
        });
    }

    // ===== SCOPES =====

    public function scopeKarakter($query, string $karakter)
    {
        return $query->where('karakter', $karakter);
    }

    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit');
    }

    public function scopeUrutChapter($query)
    {
        return $query->orderBy('chapter', 'asc');
    }

    // ===== HELPERS =====

    /**
     * Ambil semua cerita terbit untuk karakter tertentu
     */
    public static function ceritaKarakter(string $karakter)
    {
        return static::karakter($karakter)->terbit()->urutChapter()->get();
    }
}
