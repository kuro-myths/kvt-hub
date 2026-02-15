<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';

    protected $fillable = [
        'nama', 'jenjang', 'deskripsi', 'durasi_tahun', 'total_semester',
        'total_sks', 'capaian_lulusan', 'struktur_semester', 'status', 'akreditasi',
    ];

    protected $casts = [
        'capaian_lulusan' => 'array',
        'struktur_semester' => 'array',
    ];

    public const JENJANG = [
        'tk_paud' => 'TK / PAUD',
        'sd_mi' => 'SD / MI',
        'smp_mts' => 'SMP / MTs',
        'sma_ma' => 'SMA / MA',
        'smk' => 'SMK',
        'd1' => 'Diploma 1 (D1)',
        'd2' => 'Diploma 2 (D2)',
        'd3' => 'Diploma 3 (D3)',
        'd4' => 'Diploma 4 (D4)',
        's1' => 'Sarjana (S1)',
        's2' => 'Magister (S2)',
        's3' => 'Doktoral (S3)',
        'profesi' => 'Profesi',
        'post_doktoral' => 'Post-Doktoral',
    ];

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class);
    }

    public function paketSemester()
    {
        return $this->hasMany(PaketSemester::class);
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }

    public function bobotNilai()
    {
        return $this->hasMany(BobotNilai::class);
    }

    public function jenjangPengguna()
    {
        return $this->hasMany(JenjangPengguna::class);
    }

    public function getNamaJenjangAttribute()
    {
        return self::JENJANG[$this->jenjang] ?? $this->jenjang;
    }

    public function perluSks()
    {
        return in_array($this->jenjang, ['d1', 'd2', 'd3', 'd4', 's1', 's2', 's3', 'profesi', 'post_doktoral']);
    }
}
