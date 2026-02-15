<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketSemester extends Model
{
    protected $table = 'paket_semester';

    protected $fillable = [
        'kurikulum_id',
        'nama',
        'semester',
        'deskripsi',
        'mata_pelajaran_ids',
        'total_sks',
    ];

    protected $casts = [
        'mata_pelajaran_ids' => 'array',
    ];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function mataPelajaran()
    {
        $ids = $this->mata_pelajaran_ids ?? [];
        return MataPelajaran::whereIn('id', $ids)->get();
    }
}
