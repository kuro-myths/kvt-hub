<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\KuisHasil;
use App\Models\Kehadiran;
use App\Models\MateriProgres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DasborController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->adalahGuru()) {
            return $this->dasborGuru();
        }

        return $this->dasborSiswa();
    }

    private function dasborSiswa()
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

        return view('dasbor.siswa', compact('user', 'kelasAktif', 'materiTerakhir', 'kuisHasilTerakhir', 'statistik'));
    }

    private function dasborGuru()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelasAktif = $user->kelasYangDiajar()
            ->where('status', 'aktif')
            ->withCount(['anggota' => fn($q) => $q->where('kelas_anggota.status', 'aktif')])
            ->get();

        $statistik = [
            'total_kelas' => $kelasAktif->count(),
            'total_siswa' => $kelasAktif->sum('anggota_count'),
            'total_materi' => Materi::where('guru_id', $user->id)->count(),
            'materi_terbit' => Materi::where('guru_id', $user->id)->where('status', 'terbit')->count(),
        ];

        return view('dasbor.guru', compact('user', 'kelasAktif', 'statistik'));
    }
}
