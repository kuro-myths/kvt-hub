<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JurnalMengajar extends Model
{
    use HasFactory;

    protected $table = 'jurnal_mengajar';

    protected $fillable = [
        'tanggal',
        'pertemuan_ke',
        'topik',
        'kelas_id',
        'guru_id',
        'jam_mulai',
        'jam_selesai',
        'jumlah_hadir',
        'jumlah_siswa',
        'metode',
        'materi_dibahas',
        'catatan',
        'kendala',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
