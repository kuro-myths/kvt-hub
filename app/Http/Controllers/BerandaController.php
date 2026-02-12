<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\PaketEksklusif;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $statistik = [
            'total_siswa' => User::where('peran', 'siswa')->count(),
            'total_guru' => User::where('peran', 'guru')->count(),
            'total_kelas' => Kelas::where('status', 'aktif')->count(),
            'total_materi' => Materi::where('status', 'terbit')->count(),
        ];

        $kelasPopuler = Kelas::where('status', 'aktif')
            ->withCount(['anggota' => function ($q) {
                $q->where('kelas_anggota.status', 'aktif');
            }])
            ->orderBy('anggota_count', 'desc')
            ->take(6)
            ->get();

        $paketEksklusif = PaketEksklusif::where('aktif', true)->take(3)->get();

        return view('beranda', compact('statistik', 'kelasPopuler', 'paketEksklusif'));
    }
}
