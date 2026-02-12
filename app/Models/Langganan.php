<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langganan extends Model
{
    protected $table = 'langganan';

    protected $fillable = [
        'user_id',
        'paket_id',
        'mulai_pada',
        'berakhir_pada',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'mulai_pada' => 'datetime',
            'berakhir_pada' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(PaketEksklusif::class, 'paket_id');
    }

    public function masihAktif(): bool
    {
        return $this->status === 'aktif' && $this->berakhir_pada->isFuture();
    }
}
