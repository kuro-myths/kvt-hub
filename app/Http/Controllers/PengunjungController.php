<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    // API: Statistik real-time untuk footer/beranda
    public function statistikRealtime()
    {
        return response()->json([
            'hari_ini' => Pengunjung::hariIni(),
            'online' => Pengunjung::onlineSekarang(),
            'total' => Pengunjung::totalSemua(),
            'total_unik' => Pengunjung::totalUnik(),
        ]);
    }

    // API: Flag counter (pengunjung per negara)
    public function flagCounter()
    {
        $negara = Pengunjung::perNegara(12);
        $total = Pengunjung::totalSemua();

        return response()->json([
            'negara' => $negara,
            'total' => $total,
            'pageviews' => $total,
        ]);
    }

    // API: Grafik mingguan
    public function grafikMingguan()
    {
        return response()->json(Pengunjung::mingguIni());
    }

    // API: Grafik per jam
    public function grafikPerJam()
    {
        return response()->json(Pengunjung::perJamHariIni());
    }

    // API: Halaman populer
    public function halamanPopuler()
    {
        return response()->json(Pengunjung::halamanPopuler());
    }

    // Admin: Dashboard pengunjung
    public function adminDashboard()
    {
        $statistik = [
            'hari_ini' => Pengunjung::hariIni(),
            'online' => Pengunjung::onlineSekarang(),
            'total' => Pengunjung::totalSemua(),
            'total_unik' => Pengunjung::totalUnik(),
        ];

        $perNegara = Pengunjung::perNegara(20);
        $mingguan = Pengunjung::mingguIni();
        $perJam = Pengunjung::perJamHariIni();
        $halamanPopuler = Pengunjung::halamanPopuler(15);

        $pengunjungTerbaru = Pengunjung::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('admin.pengunjung', compact(
            'statistik', 'perNegara', 'mingguan', 'perJam',
            'halamanPopuler', 'pengunjungTerbaru'
        ));
    }
}
