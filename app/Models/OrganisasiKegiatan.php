<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisasiKegiatan extends Model
{
    protected $table = 'organisasi_kegiatan';

    protected $fillable = [
        'organisasi_id',
        'judul',
        'deskripsi',
        'tanggal',
        'lokasi',
        'gambar',
        'aktif',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'aktif' => 'boolean',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
