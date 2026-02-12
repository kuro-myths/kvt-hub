<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriProgres extends Model
{
    protected $table = 'materi_progres';

    protected $fillable = [
        'user_id',
        'materi_id',
        'status',
        'progres_persen',
        'waktu_tonton',
        'selesai_pada',
    ];

    protected function casts(): array
    {
        return ['selesai_pada' => 'datetime'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
