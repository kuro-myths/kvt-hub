<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;

class DasborController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelasAktif = $user->kelasYangDiajar()
            ->where('status', 'aktif')
            ->withCount(['anggota' => fn($q) => $q->where('kelas_anggota.status', 'aktif')])
            ->get();

        $statistik = [
            'total_kelas' => $kelasAktif->count(),
            'total_pengguna' => $kelasAktif->sum('anggota_count'),
            'total_materi' => Materi::where('guru_id', $user->id)->count(),
            'materi_terbit' => Materi::where('guru_id', $user->id)->where('status', 'terbit')->count(),
        ];

        return view('akun.pengajar.dasbor', compact('user', 'kelasAktif', 'statistik'));
    }
}
