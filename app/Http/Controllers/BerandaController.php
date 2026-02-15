<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\MateriProgres;
use App\Models\KuisHasil;
use App\Models\Pencapaian;
use App\Models\PaketEksklusif;
use App\Models\Berita;
use App\Models\KerjaSama;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $statistik = [
            'total_siswa' => User::where('peran', 'pengguna')->count(),
            'total_guru' => User::where('peran', 'tim')->count(),
            'total_kelas' => Kelas::where('status', 'aktif')->count(),
            'total_materi' => Materi::where('status', 'terbit')->count(),
            'pengunjung_hari_ini' => Pengunjung::hariIni(),
            'pengunjung_online' => Pengunjung::onlineSekarang(),
            'total_pengunjung' => Pengunjung::totalSemua(),
        ];

        $kelasPopuler = Kelas::where('status', 'aktif')
            ->withCount(['anggota' => function ($q) {
                $q->where('kelas_anggota.status', 'aktif');
            }])
            ->orderBy('anggota_count', 'desc')
            ->take(6)
            ->get();

        $beritaTerbaru = Berita::terbit()->latest('terbit_pada')->take(3)->get();

        // If user is authenticated, show personalized beranda
        if (Auth::check()) {
            $user = Auth::user();

            $kelasAktif = $user->kelas()
                ->where('kelas.status', 'aktif')
                ->withPivot('progres')
                ->take(6)
                ->get();

            $kelasSaya = $user->kelas()->count();
            $materiSelesai = MateriProgres::where('pengguna_id', $user->id)->where('selesai', true)->count();
            $kuisDikerjakan = KuisHasil::where('pengguna_id', $user->id)->count();
            $totalPencapaian = Pencapaian::where('pengguna_id', $user->id)->count();

            return view('beranda-pengguna', compact(
                'statistik',
                'kelasPopuler',
                'beritaTerbaru',
                'kelasAktif',
                'kelasSaya',
                'materiSelesai',
                'kuisDikerjakan',
                'totalPencapaian'
            ));
        }

        // Guest view
        $paketEksklusif = PaketEksklusif::where('aktif', true)->take(3)->get();
        $mitraTampil = KerjaSama::aktif()->tampilBeranda()->orderBy('urutan')->get();

        return view('beranda', compact('statistik', 'kelasPopuler', 'paketEksklusif', 'beritaTerbaru', 'mitraTampil'));
    }
}
