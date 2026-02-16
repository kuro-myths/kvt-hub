<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\MataPelajaran;
use App\Models\JenjangPengguna;
use App\Models\Kurikulum;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $krs = $user->krs()->with('details.mataPelajaran')->latest()->get();
        $jenjangAktif = $user->jenjangAktif()->where('aktif', true)->first();

        return view('akun.pengguna.krs.index', compact('krs', 'jenjangAktif'));
    }

    public function pilihJenjang()
    {
        $jenjang = Kurikulum::where('aktif', true)->get()->groupBy('jenjang');
        return view('akun.pengguna.krs.pilih-jenjang', compact('jenjang'));
    }

    public function daftarJenjang(Request $request)
    {
        $request->validate([
            'kurikulum_id' => 'required|exists:kurikulum,id',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        JenjangPengguna::updateOrCreate(
            ['user_id' => $user->id],
            ['kurikulum_id' => $request->kurikulum_id, 'aktif' => true]
        );

        return redirect()->route('pengguna.krs.index')->with('sukses', 'Jenjang berhasil dipilih!');
    }

    public function buat()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $jenjangAktif = $user->jenjangAktif()->where('aktif', true)->first();

        if (!$jenjangAktif) {
            return redirect()->route('pengguna.krs.pilih-jenjang')->with('info', 'Pilih jenjang terlebih dahulu.');
        }

        $mataPelajaran = MataPelajaran::where('kurikulum_id', $jenjangAktif->kurikulum_id)->get();
        return view('akun.pengguna.krs.buat', compact('mataPelajaran', 'jenjangAktif'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'mata_pelajaran' => 'required|array|min:1',
            'mata_pelajaran.*' => 'exists:mata_pelajaran,id',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $krs = Krs::create([
            'user_id' => $user->id,
            'semester' => $request->semester ?? 'Ganjil',
            'tahun_ajaran' => $request->tahun_ajaran ?? date('Y') . '/' . (date('Y') + 1),
            'status' => 'menunggu',
        ]);

        foreach ($request->mata_pelajaran as $mapelId) {
            KrsDetail::create([
                'krs_id' => $krs->id,
                'mata_pelajaran_id' => $mapelId,
            ]);
        }

        return redirect()->route('pengguna.krs.index')->with('sukses', 'KRS berhasil diajukan!');
    }

    public function tampilkan(Krs $krs)
    {
        $this->authorize('view', $krs);
        $krs->load('details.mataPelajaran');
        return view('akun.pengguna.krs.tampilkan', compact('krs'));
    }

    public function khs()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $nilai = $user->nilai()->with('mataPelajaran')->get();
        return view('akun.pengguna.krs.khs', compact('nilai'));
    }
}
