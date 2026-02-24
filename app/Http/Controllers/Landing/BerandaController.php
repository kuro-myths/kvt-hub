<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KerjaSama;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\PaketEksklusif;
use App\Models\Pengunjung;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MateriProgres;
use App\Models\KuisHasil;
use App\Models\Pencapaian;

class BerandaController extends Controller
{
    public function index()
    {
        $statistik = [
            'total_siswa' => User::where('peran', 'pengguna')->count(),
            'total_guru' => User::whereIn('peran', ['pengajar', 'staff'])->count(),
            'total_kelas' => Kelas::where('status', 'aktif')->count(),
            'total_materi' => Materi::where('status', 'terbit')->count(),
            'pengunjung_hari_ini' => Pengunjung::hariIni(),
            'pengunjung_online' => Pengunjung::onlineSekarang(),
            'total_pengunjung' => Pengunjung::totalSemua(),
        ];

        $kelasPopuler = Kelas::where('status', 'aktif')
            ->withCount(['anggota' => fn($q) => $q->where('kelas_anggota.status', 'aktif')])
            ->orderBy('anggota_count', 'desc')
            ->take(6)
            ->get();

        $beritaTerbaru = Berita::terbit()->latest('terbit_pada')->take(3)->get();

        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $kelasAktif = $user->kelasYangDiikuti()
                ->where('kelas.status', 'aktif')
                ->withPivot('status')
                ->take(6)
                ->get();

            $kelasSaya = $user->kelasYangDiikuti()->count();
            $materiSelesai = MateriProgres::where('user_id', $user->id)->where('status', 'selesai')->count();
            $kuisDikerjakan = KuisHasil::where('user_id', $user->id)->count();
            $totalPencapaian = $user->pencapaian()->count();

            return view('beranda.pengguna', compact(
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

        $paketEksklusif = PaketEksklusif::where('aktif', true)->take(3)->get();
        $mitraTampil = KerjaSama::aktif()->tampilBeranda()->orderBy('urutan')->get();

        return view('beranda.index', compact('statistik', 'kelasPopuler', 'paketEksklusif', 'beritaTerbaru', 'mitraTampil'));
    }
}
