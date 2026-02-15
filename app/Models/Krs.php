<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'user_id', 'kurikulum_id', 'semester', 'tahun_ajaran',
        'status', 'total_sks', 'catatan_pembimbing',
        'disetujui_oleh', 'disetujui_pada',
    ];

    protected $casts = [
        'disetujui_pada' => 'datetime',
    ];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function detail()
    {
        return $this->hasMany(KrsDetail::class);
    }

    public function penyetuju()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function hitungTotalSks()
    {
        $total = 0;
        foreach ($this->detail as $d) {
            if ($d->status === 'aktif') {
                $total += $d->mataPelajaran->sks ?? 0;
            }
        }
        $this->update(['total_sks' => $total]);
        return $total;
    }
}
