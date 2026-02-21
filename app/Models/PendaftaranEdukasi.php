<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranEdukasi extends Model
{
    protected $table = 'pendaftaran_edukasi';

    protected $fillable = [
        'user_id',
        'edukasi_gratis_id',
        'nama_lengkap',
        'email',
        'telepon',
        'institusi',
        'jenjang',
        'motivasi',
        'prasyarat_status',
        'dokumen_identitas',
        'dokumen_pendukung',
        'foto_selfie',
        'lokasi_kota',
        'lokasi_provinsi',
        'lokasi_lat',
        'lokasi_lng',
        'status',
        'catatan_admin',
        'diverifikasi_pada',
        'diverifikasi_oleh',
        'notifikasi_terakhir',
    ];

    protected $casts = [
        'prasyarat_status' => 'array',
        'lokasi_lat' => 'decimal:7',
        'lokasi_lng' => 'decimal:7',
        'diverifikasi_pada' => 'datetime',
        'notifikasi_terakhir' => 'datetime',
    ];

    // ======================== RELASI ========================

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function edukasiGratis()
    {
        return $this->belongsTo(EdukasiGratis::class);
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'diverifikasi_oleh');
    }

    // ======================== SCOPE ========================

    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', 'disetujui');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }

    // ======================== HELPER ========================

    public static function daftarStatus(): array
    {
        return [
            'menunggu' => ['label' => 'Menunggu Verifikasi', 'warna' => 'yellow', 'ikon' => 'fas fa-clock'],
            'diverifikasi' => ['label' => 'Diverifikasi', 'warna' => 'blue', 'ikon' => 'fas fa-check-circle'],
            'disetujui' => ['label' => 'Disetujui', 'warna' => 'green', 'ikon' => 'fas fa-check-double'],
            'ditolak' => ['label' => 'Ditolak', 'warna' => 'red', 'ikon' => 'fas fa-times-circle'],
            'selesai' => ['label' => 'Selesai', 'warna' => 'purple', 'ikon' => 'fas fa-flag-checkered'],
        ];
    }

    public static function daftarJenjang(): array
    {
        return ['SD', 'SMP', 'SMA/SMK', 'D3', 'D4/S1', 'S2', 'S3', 'Umum'];
    }

    public function getStatusInfoAttribute(): array
    {
        return self::daftarStatus()[$this->status] ?? ['label' => 'Tidak Diketahui', 'warna' => 'gray', 'ikon' => 'fas fa-question'];
    }

    public function getLokasiLengkapAttribute(): ?string
    {
        if ($this->lokasi_kota && $this->lokasi_provinsi) {
            return $this->lokasi_kota . ', ' . $this->lokasi_provinsi;
        }
        return $this->lokasi_kota ?? $this->lokasi_provinsi;
    }
}
