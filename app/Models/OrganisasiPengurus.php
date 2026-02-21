<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisasiPengurus extends Model
{
    protected $table = 'organisasi_pengurus';

    protected $fillable = [
        'organisasi_id',
        'nama',
        'jabatan',
        'foto',
        'urutan',
        'periode',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
