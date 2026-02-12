<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = 'kuis';

    protected $fillable = [
        'judul',
        'deskripsi',
        'materi_id',
        'waktu_tampil',
        'xp_reward',
        'durasi_detik',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function pertanyaan()
    {
        return $this->hasMany(KuisPertanyaan::class)->orderBy('urutan');
    }

    public function hasil()
    {
        return $this->hasMany(KuisHasil::class);
    }
}
