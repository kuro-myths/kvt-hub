<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanAkademik extends Model
{
    protected $table = 'laporan_akademik';

    protected $fillable = [
        'judul', 'deskripsi', 'tipe', 'kurikulum_id',
        'dibuat_oleh', 'filter', 'data', 'file_path', 'format', 'status',
    ];

    protected $casts = [
        'filter' => 'array',
        'data' => 'array',
    ];

    public const TIPE = [
        'transkrip' => 'Transkrip Nilai',
        'rekap_nilai' => 'Rekap Nilai',
        'khs' => 'Kartu Hasil Studi (KHS)',
        'daftar_hadir' => 'Daftar Hadir',
        'capaian_kurikulum' => 'Capaian Kurikulum',
        'statistik_kelulusan' => 'Statistik Kelulusan',
        'akreditasi' => 'Laporan Akreditasi',
        'custom' => 'Custom Report',
    ];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
}
