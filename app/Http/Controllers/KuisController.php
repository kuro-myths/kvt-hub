<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\KuisHasil;
use App\Models\KuisPertanyaan;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function mulai(Kuis $kuis)
    {
        $kuis->load('pertanyaan', 'materi');

        return view('kuis.mulai', compact('kuis'));
    }

    public function kirim(Request $request, Kuis $kuis)
    {
        $kuis->load('pertanyaan');
        $user = auth()->user();

        $benar = 0;
        $totalPoin = 0;

        foreach ($kuis->pertanyaan as $pertanyaan) {
            $jawaban = $request->input("jawaban.{$pertanyaan->id}");
            $adalahBenar = $jawaban === $pertanyaan->jawaban_benar;

            if ($adalahBenar) {
                $benar++;
                $totalPoin += $pertanyaan->poin;
            }
        }

        $skor = $kuis->pertanyaan->count() > 0
            ? round(($benar / $kuis->pertanyaan->count()) * 100)
            : 0;

        $xpDidapat = $skor >= 70 ? $kuis->xp_reward : intval($kuis->xp_reward * 0.3);

        $hasil = KuisHasil::create([
            'user_id' => $user->id,
            'kuis_id' => $kuis->id,
            'skor' => $skor,
            'total_pertanyaan' => $kuis->pertanyaan->count(),
            'jawaban_benar_count' => $benar,
            'xp_didapat' => $xpDidapat,
        ]);

        $user->tambahXP($xpDidapat);

        return view('kuis.hasil', compact('hasil', 'kuis', 'benar'));
    }
}
