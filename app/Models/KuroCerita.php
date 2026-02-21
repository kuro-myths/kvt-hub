<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KuroCerita extends Model
{
    protected $table = 'kuro_cerita';

    protected $fillable = [
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

    protected function casts(): array
    {
        return [
            'chapter' => 'integer',
            'urutan'  => 'integer',
        ];
    }

    // Auto-generate slug saat simpan
    protected static function booted(): void
    {
        static::creating(function ($cerita) {
            if (empty($cerita->slug)) {
                $cerita->slug = Str::slug($cerita->judul) . '-ch' . $cerita->chapter;
            }
            if (empty($cerita->urutan)) {
                $cerita->urutan = $cerita->chapter;
            }
        });
    }

    // Scope: hanya yang terbit
    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit');
    }

    // Scope: urut chapter
    public function scopeUrutChapter($query)
    {
        return $query->orderBy('chapter', 'asc');
    }

    // Label aliansi lengkap
    public function getLabelAliansiAttribute(): ?string
    {
        return match ($this->aliansi) {
            'VTA' => 'VTA — Vanguard Titan Alliance',
            'VTI' => 'VTI — Vigilant Thunder Initiative',
            'VTU' => 'VTU — Valiant Truth Union',
            'VTE' => 'VTE — Vital Terra Enclave',
            'VTO' => 'VTO — Venerable Tempest Order',
            default => $this->aliansi,
        };
    }
}
