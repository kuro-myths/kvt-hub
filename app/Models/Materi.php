<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'konten',
        'kelas_id',
        'guru_id',
        'tipe',
        'video_url',
        'video_platform',
        'durasi_menit',
        'xp_reward',
        'urutan',
        'status',
        'eksklusif',
    ];

    protected function casts(): array
    {
        return [
            'eksklusif' => 'boolean',
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

    public function kuis()
    {
        return $this->hasMany(Kuis::class);
    }

    public function progres()
    {
        return $this->hasMany(MateriProgres::class);
    }

    public function getYoutubeIdAttribute(): ?string
    {
        if (!$this->video_url) return null;
        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $matches);
        return $matches[1] ?? null;
    }
}
