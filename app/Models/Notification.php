<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diperbarui_pada';

    protected $fillable = [
        'tipe',
        'judul',
        'pesan',
        'ikon',
        'warna',
        'bg_warna',
        'url',
        'aktif',
        'mulai_pada',
        'berakhir_pada',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'mulai_pada' => 'datetime',
        'berakhir_pada' => 'datetime',
        'dibuat_pada' => 'datetime',
        'diperbarui_pada' => 'datetime',
    ];

    // Notification types
    const TIPE_FITUR = 'fitur_baru';
    const TIPE_UPDATE = 'pembaruan';
    const TIPE_INFO = 'informasi';
    const TIPE_PROMO = 'promosi';
    const TIPE_SISTEM = 'sistem';
    const TIPE_EVENT = 'event';

    /**
     * Scope: only active notifications
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    /**
     * Scope: currently valid (within date range)
     */
    public function scopeBerlaku($query)
    {
        return $query->aktif()
            ->where(function ($q) {
                $q->whereNull('mulai_pada')
                    ->orWhere('mulai_pada', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('berakhir_pada')
                    ->orWhere('berakhir_pada', '>=', now());
            });
    }
}
