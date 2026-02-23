<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Silabus extends Model
{
    use HasFactory;

    protected $table = 'silabus';

    protected $fillable = [
        'judul',
        'kelas_id',
        'guru_id',
        'semester',
        'deskripsi',
        'kompetensi_dasar',
        'indikator',
        'metode',
        'pertemuan',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'pertemuan' => 'array',
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
