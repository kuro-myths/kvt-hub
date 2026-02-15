<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = [
        'user_id', 'mata_pelajaran_id', 'krs_id',
        'tugas', 'uts', 'uas', 'praktik', 'partisipasi',
        'nilai_akhir', 'huruf_mutu', 'bobot_mutu', 'status', 'catatan',
    ];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function krs()
    {
        return $this->belongsTo(Krs::class);
    }

    public function hitungNilaiAkhir($bobotTugas = 20, $bobotUts = 25, $bobotUas = 35, $bobotPraktik = 10, $bobotPartisipasi = 10)
    {
        $total = 0;
        $total += ($this->tugas ?? 0) * ($bobotTugas / 100);
        $total += ($this->uts ?? 0) * ($bobotUts / 100);
        $total += ($this->uas ?? 0) * ($bobotUas / 100);
        $total += ($this->praktik ?? 0) * ($bobotPraktik / 100);
        $total += ($this->partisipasi ?? 0) * ($bobotPartisipasi / 100);

        $this->nilai_akhir = round($total, 2);

        $bobot = BobotNilai::konversi(
            $this->mataPelajaran->kurikulum_id,
            $this->nilai_akhir
        );

        if ($bobot) {
            $this->huruf_mutu = $bobot->huruf;
            $this->bobot_mutu = $bobot->bobot;
        }

        $this->save();
        return $this->nilai_akhir;
    }
}
