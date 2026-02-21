<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AturanEdukasi extends Model
{
    protected $table = 'aturan_edukasi';

    protected $fillable = [
        'edukasi_gratis_id',
        'judul',
        'deskripsi',
        'tipe',
        'tingkat',
        'ikon',
        'urutan',
        'aktif',
        'berlaku_semua',
        'dibuat_oleh',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'berlaku_semua' => 'boolean',
    ];

    // ======================== RELASI ========================

    public function edukasiGratis()
    {
        return $this->belongsTo(EdukasiGratis::class);
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    // ======================== SCOPE ========================

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeUntukProgram($query, $edukasiGratisId)
    {
        return $query->where(function ($q) use ($edukasiGratisId) {
            $q->where('edukasi_gratis_id', $edukasiGratisId)
              ->orWhere('berlaku_semua', true);
        });
    }

    public function scopeTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    // ======================== HELPER ========================

    public static function daftarTipe(): array
    {
        return [
            'larangan' => ['label' => 'Larangan', 'warna' => 'red', 'ikon' => 'fas fa-ban'],
            'peringatan' => ['label' => 'Peringatan', 'warna' => 'yellow', 'ikon' => 'fas fa-exclamation-triangle'],
            'tips' => ['label' => 'Tips & Solusi', 'warna' => 'green', 'ikon' => 'fas fa-lightbulb'],
            'prosedur' => ['label' => 'Prosedur Aman', 'warna' => 'blue', 'ikon' => 'fas fa-shield-alt'],
        ];
    }

    public static function daftarTingkat(): array
    {
        return [
            'rendah' => ['label' => 'Rendah', 'warna' => 'gray'],
            'sedang' => ['label' => 'Sedang', 'warna' => 'yellow'],
            'tinggi' => ['label' => 'Tinggi', 'warna' => 'orange'],
            'kritis' => ['label' => 'Kritis', 'warna' => 'red'],
        ];
    }

    public function getTipeInfoAttribute(): array
    {
        return self::daftarTipe()[$this->tipe] ?? ['label' => $this->tipe, 'warna' => 'gray', 'ikon' => 'fas fa-info-circle'];
    }

    public function getTingkatInfoAttribute(): array
    {
        return self::daftarTingkat()[$this->tingkat] ?? ['label' => $this->tingkat, 'warna' => 'gray'];
    }
}
