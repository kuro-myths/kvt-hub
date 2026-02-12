<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisHasil extends Model
{
    protected $table = 'kuis_hasil';

    protected $fillable = [
        'user_id',
        'kuis_id',
        'skor',
        'total_pertanyaan',
        'jawaban_benar_count',
        'xp_didapat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
}
