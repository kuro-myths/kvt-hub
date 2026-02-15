<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KrsDetail extends Model
{
    protected $table = 'krs_detail';

    protected $fillable = [
        'krs_id',
        'mata_pelajaran_id',
        'status',
    ];

    public function krs()
    {
        return $this->belongsTo(Krs::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}
