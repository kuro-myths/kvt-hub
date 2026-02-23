<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Silabus;
use App\Models\JurnalMengajar;
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
            'total_silabus' => Silabus::where('guru_id', $user->id)->count(),
            'silabus_aktif' => Silabus::where('guru_id', $user->id)->where('status', 'aktif')->count(),
            'total_jurnal' => JurnalMengajar::where('guru_id', $user->id)->count(),
            'jurnal_bulan_ini' => JurnalMengajar::where('guru_id', $user->id)->whereMonth('tanggal', now()->month)->count(),
        ];

        return view('akun.pengajar.dasbor', compact('user', 'kelasAktif', 'statistik'));
    }
}
