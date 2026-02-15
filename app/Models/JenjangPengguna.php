<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenjangPengguna extends Model
{
    protected $table = 'jenjang_pengguna';

    protected $fillable = [
        'user_id', 'kurikulum_id', 'semester_aktif', 'status',
        'jurusan', 'ipk', 'wali_user_id', 'perlu_pengawasan',
    ];

    protected $casts = [
        'perlu_pengawasan' => 'boolean',
    ];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'wali_user_id');
    }

    public function hitungIpk()
    {
        $nilai = Nilai::where('user_id', $this->user_id)
            ->whereHas('mataPelajaran', fn($q) => $q->where('kurikulum_id', $this->kurikulum_id))
            ->where('status', 'final')
            ->get();

        if ($nilai->isEmpty()) return 0;

        $totalBobot = 0;
        $totalSks = 0;
        foreach ($nilai as $n) {
            $sks = $n->mataPelajaran->sks ?? 0;
            $totalBobot += ($n->bobot_mutu ?? 0) * $sks;
            $totalSks += $sks;
        }

        $this->ipk = $totalSks > 0 ? round($totalBobot / $totalSks, 2) : 0;
        $this->save();
        return $this->ipk;
    }
}
