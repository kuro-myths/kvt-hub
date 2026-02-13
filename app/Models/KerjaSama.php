<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KerjaSama extends Model
{
    protected $table = 'kerja_sama';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'logo',
        'website',
        'tipe',
        'tier',
        'nilai_kontrak',
        'mulai_pada',
        'berakhir_pada',
        'aktif',
        'tampil_beranda',
        'kontak_nama',
        'kontak_email',
        'kontak_telepon',
        'benefit',
        'urutan',
    ];

    protected function casts(): array
    {
        return [
            'aktif' => 'boolean',
            'tampil_beranda' => 'boolean',
            'nilai_kontrak' => 'decimal:2',
            'mulai_pada' => 'date',
            'berakhir_pada' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (KerjaSama $ks) {
            if (empty($ks->slug)) {
                $ks->slug = Str::slug($ks->nama);
                $count = static::where('slug', 'like', $ks->slug . '%')->count();
                if ($count > 0) {
                    $ks->slug .= '-' . ($count + 1);
                }
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Scopes
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeSponsor($query)
    {
        return $query->where('tipe', 'sponsor');
    }

    public function scopeMitraAkademik($query)
    {
        return $query->where('tipe', 'mitra_akademik');
    }

    public function scopeMitraIndustri($query)
    {
        return $query->where('tipe', 'mitra_industri');
    }

    public function scopeTampilBeranda($query)
    {
        return $query->aktif()->where('tampil_beranda', true)->orderBy('urutan');
    }

    // Tipe list
    public static function tipeList(): array
    {
        return [
            'sponsor' => 'Sponsor',
            'mitra_akademik' => 'Mitra Akademik',
            'mitra_industri' => 'Mitra Industri',
            'media_partner' => 'Media Partner',
            'komunitas' => 'Komunitas',
        ];
    }

    // Tier list
    public static function tierList(): array
    {
        return [
            'platinum' => 'Platinum',
            'gold' => 'Gold',
            'silver' => 'Silver',
            'bronze' => 'Bronze',
            'community' => 'Community',
        ];
    }

    // Tier color
    public function tierWarna(): string
    {
        return match ($this->tier) {
            'platinum' => 'from-gray-300 to-gray-100',
            'gold' => 'from-yellow-400 to-amber-300',
            'silver' => 'from-gray-400 to-gray-300',
            'bronze' => 'from-orange-400 to-amber-600',
            default => 'from-kvt-400 to-kvt-300',
        };
    }

    public function tierIkon(): string
    {
        return match ($this->tier) {
            'platinum' => 'fa-gem',
            'gold' => 'fa-crown',
            'silver' => 'fa-medal',
            'bronze' => 'fa-award',
            default => 'fa-handshake',
        };
    }
}
