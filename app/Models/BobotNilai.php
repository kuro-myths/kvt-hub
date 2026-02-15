<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotNilai extends Model
{
    protected $table = 'bobot_nilai';

    protected $fillable = [
        'kurikulum_id', 'huruf', 'bobot', 'batas_bawah', 'batas_atas', 'keterangan',
    ];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public static function konversi($kurikulumId, $nilaiAkhir)
    {
        return self::where('kurikulum_id', $kurikulumId)
            ->where('batas_bawah', '<=', $nilaiAkhir)
            ->where('batas_atas', '>=', $nilaiAkhir)
            ->first();
    }
}
