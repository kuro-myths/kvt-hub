<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KuisHasil;
use App\Models\MateriProgres;
use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;

class DasborController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelasAktif = $user->kelasYangDiikuti()
            ->wherePivot('status', 'aktif')
            ->with('guru')
            ->get();

        $materiTerakhir = MateriProgres::where('user_id', $user->id)
            ->where('status', '!=', 'selesai')
            ->with('materi.kelas')
            ->latest()
            ->take(5)
            ->get();

        $kuisHasilTerakhir = KuisHasil::where('user_id', $user->id)
            ->with('kuis.materi')
            ->latest()
            ->take(5)
            ->get();

        $kehadiranBulanIni = Kehadiran::where('user_id', $user->id)
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->get();

        $statistik = [
            'total_kelas' => $kelasAktif->count(),
            'materi_selesai' => MateriProgres::where('user_id', $user->id)->where('status', 'selesai')->count(),
            'kuis_selesai' => KuisHasil::where('user_id', $user->id)->count(),
            'hadir_bulan_ini' => $kehadiranBulanIni->where('status', 'hadir')->count(),
        ];

        return view('akun.pengguna.dasbor', compact('user', 'kelasAktif', 'materiTerakhir', 'kuisHasilTerakhir', 'statistik'));
    }
}
