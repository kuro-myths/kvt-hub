<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisasiGaleri extends Model
{
    protected $table = 'organisasi_galeri';

    protected $fillable = [
        'organisasi_id',
        'judul',
        'gambar',
        'keterangan',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
