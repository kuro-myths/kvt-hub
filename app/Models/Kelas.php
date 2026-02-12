<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'guru_id',
        'kode_kelas',
        'status',
        'maks_siswa',
        'kategori',
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function anggota()
    {
        return $this->belongsToMany(User::class, 'kelas_anggota')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function materi()
    {
        return $this->hasMany(Materi::class)->orderBy('urutan');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function jumlahSiswa(): int
    {
        return $this->anggota()->where('kelas_anggota.status', 'aktif')->count();
    }
}
