<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KuisHasil;
use App\Models\Kuis;
use App\Models\User;
use Illuminate\Http\Request;

class KuisHasilController extends Controller
{
    public function index(Request $request)
    {
        $query = KuisHasil::with('user', 'kuis');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->whereHas('user', function ($q) use ($cari) {
                $q->where('name', 'ilike', "%{$cari}%")
                    ->orWhere('email', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('kuis_id')) {
            $query->where('kuis_id', $request->kuis_id);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('skor_min')) {
            $query->where('skor', '>=', $request->skor_min);
        }

        if ($request->filled('skor_max')) {
            $query->where('skor', '<=', $request->skor_max);
        }

        $hasil = $query->latest()->paginate(20)->withQueryString();
        $kuis = Kuis::orderBy('judul')->get();
        $users = User::where('peran', '!=', 'admin')->orderBy('name')->get();

        return view('akun.admin.kuis-hasil', compact('hasil', 'kuis', 'users'));
    }

    public function tampilkan(KuisHasil $kuisHasil)
    {
        $kuisHasil->load('user', 'kuis.pertanyaan');
        
        // Load jawaban user
        $jawaban = [];
        // Bisa di-enhance dengan relasi jawaban jika ada
        
        return view('akun.admin.kuis-hasil-detail', compact('kuisHasil', 'jawaban'));
    }

    public function statistik(Request $request)
    {
        $query = KuisHasil::with('kuis');

        if ($request->filled('kuis_id')) {
            $query->where('kuis_id', $request->kuis_id);
        }

        $hasil = $query->get();

        $kuis = Kuis::orderBy('judul')->get();

        // Statistik per kuis
        $statistikPerKuis = [];
        foreach ($kuis as $k) {
            $kuisHasil = KuisHasil::where('kuis_id', $k->id)->get();
            if ($kuisHasil->count() > 0) {
                $statistikPerKuis[] = [
                    'kuis_id' => $k->id,
                    'judul' => $k->judul,
                    'total_taker' => $kuisHasil->count(),
                    'rata_skor' => round($kuisHasil->avg('skor'), 2),
                    'skor_tertinggi' => $kuisHasil->max('skor'),
                    'skor_terendah' => $kuisHasil->min('skor'),
                    'lulus' => $kuisHasil->where('skor', '>=', 70)->count(),
                    'tidak_lulus' => $kuisHasil->where('skor', '<', 70)->count(),
                ];
            }
        }

        return view('akun.admin.kuis-statistik', compact('statistikPerKuis'));
    }

    public function hapus(KuisHasil $kuisHasil)
    {
        $kuisHasil->delete();
        return back()->with('sukses', 'Hasil kuis berhasil dihapus!');
    }

    public function hapusByKuis(Request $request, Kuis $kuis)
    {
        $request->validate([
            'konfirmasi' => 'required',
        ]);

        KuisHasil::where('kuis_id', $kuis->id)->delete();
        return back()->with('sukses', 'Semua hasil kuis ' . $kuis->judul . ' berhasil dihapus!');
    }
}
