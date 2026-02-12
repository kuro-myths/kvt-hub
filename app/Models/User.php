<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'peran',
        'avatar',
        'provider',
        'provider_id',
        'level',
        'xp',
        'xp_total',
        'kelas',
        'bio',
        'aktif',
        'terakhir_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'terakhir_login' => 'datetime',
            'password' => 'hashed',
            'aktif' => 'boolean',
        ];
    }

    public function adalahAdmin(): bool
    {
        return $this->peran === 'admin';
    }

    public function adalahGuru(): bool
    {
        return $this->peran === 'guru';
    }

    public function adalahSiswa(): bool
    {
        return $this->peran === 'siswa';
    }

    public function kelasYangDiajar()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }

    public function kelasYangDiikuti()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_anggota')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function materiProgres()
    {
        return $this->hasMany(MateriProgres::class);
    }

    public function kuisHasil()
    {
        return $this->hasMany(KuisHasil::class);
    }

    public function pencapaian()
    {
        return $this->belongsToMany(Pencapaian::class, 'pencapaian_pengguna')
            ->withPivot('diraih_pada')
            ->withTimestamps();
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    public function langganan()
    {
        return $this->hasMany(Langganan::class);
    }

    // XP & Level System
    public function tambahXP(int $jumlah): void
    {
        $this->xp += $jumlah;
        $this->xp_total += $jumlah;

        // Hitung level baru (max 100)
        $levelBaru = min(100, floor($this->xp_total / 100) + 1);
        $this->level = $levelBaru;

        $this->save();
    }

    public function xpUntukLevelBerikutnya(): int
    {
        if ($this->level >= 100) return 0;
        return ($this->level * 100) - $this->xp_total;
    }

    public function persenLevel(): float
    {
        if ($this->level >= 100) return 100;
        $xpLevel = ($this->level - 1) * 100;
        $xpDiLevel = $this->xp_total - $xpLevel;
        return min(100, ($xpDiLevel / 100) * 100);
    }

    public function getRangString(): string
    {
        return match (true) {
            $this->level >= 90 => 'Grandmaster',
            $this->level >= 80 => 'Master',
            $this->level >= 70 => 'Diamond',
            $this->level >= 60 => 'Platinum',
            $this->level >= 50 => 'Gold',
            $this->level >= 40 => 'Silver',
            $this->level >= 30 => 'Bronze',
            $this->level >= 20 => 'Iron',
            $this->level >= 10 => 'Apprentice',
            default => 'Novice',
        };
    }
}
