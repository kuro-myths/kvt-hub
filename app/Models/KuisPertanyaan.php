<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisPertanyaan extends Model
{
    protected $table = 'kuis_pertanyaan';

    protected $fillable = [
        'kuis_id',
        'pertanyaan',
        'pilihan',
        'jawaban_benar',
        'poin',
        'urutan',
    ];

    protected function casts(): array
    {
        return ['pilihan' => 'array'];
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
}
