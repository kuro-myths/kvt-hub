<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataPelajaran;
use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Nilai;
use App\Models\JenjangPengguna;
use App\Models\PaketSemester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $jenjangAktif = JenjangPengguna::where('user_id', $user->id)
            ->where('status', 'aktif')
            ->with('kurikulum')
            ->get();

        $krsAktif = Krs::where('user_id', $user->id)
            ->with(['kurikulum', 'detail.mataPelajaran'])
            ->latest()
            ->get();

        return view('pengguna.krs.index', compact('user', 'jenjangAktif', 'krsAktif'));
    }

    public function buat(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $jenjangId = $request->get('jenjang_id');
        $jenjang = JenjangPengguna::where('user_id', $user->id)
            ->where('id', $jenjangId)
            ->with('kurikulum')
            ->firstOrFail();

        $mataPelajaran = MataPelajaran::where('kurikulum_id', $jenjang->kurikulum_id)
            ->where('semester', $jenjang->semester_aktif)
            ->where('aktif', true)
            ->get();

        $paketSemester = PaketSemester::where('kurikulum_id', $jenjang->kurikulum_id)
            ->where('semester', $jenjang->semester_aktif)
            ->get();

        // Mata pelajaran yang sudah lulus (tidak perlu diambil lagi)
        $mataPelajaranLulus = Nilai::where('user_id', $user->id)
            ->where('status', 'final')
            ->where('huruf_mutu', '!=', 'E')
            ->pluck('mata_pelajaran_id')
            ->toArray();

        return view('pengguna.krs.buat', compact(
            'user',
            'jenjang',
            'mataPelajaran',
            'paketSemester',
            'mataPelajaranLulus'
        ));
    }

    public function simpan(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'jenjang_id' => 'required|exists:jenjang_pengguna,id',
            'mata_pelajaran_ids' => 'required|array|min:1',
            'mata_pelajaran_ids.*' => 'exists:mata_pelajaran,id',
        ]);

        $jenjang = JenjangPengguna::where('user_id', $user->id)
            ->where('id', $request->jenjang_id)
            ->firstOrFail();

        $krs = Krs::create([
            'user_id' => $user->id,
            'kurikulum_id' => $jenjang->kurikulum_id,
            'semester' => $jenjang->semester_aktif,
            'tahun_ajaran' => date('Y') . '/' . (date('Y') + 1),
            'status' => 'diajukan',
        ]);

        $totalSks = 0;
        foreach ($request->mata_pelajaran_ids as $mpId) {
            KrsDetail::create([
                'krs_id' => $krs->id,
                'mata_pelajaran_id' => $mpId,
                'status' => 'aktif',
            ]);
            $mp = MataPelajaran::find($mpId);
            $totalSks += $mp->sks ?? 0;
        }

        $krs->update(['total_sks' => $totalSks]);

        return redirect()->route('pengguna.krs.index')
            ->with('sukses', 'KRS berhasil diajukan! Total ' . $totalSks . ' SKS.');
    }

    public function tampilkan(Krs $krs)
    {
        // Pastikan hanya pemilik KRS atau admin yang bisa melihat
        if ($krs->user_id !== Auth::id() && !Auth::user()->adalahAdmin()) {
            abort(403, 'Anda tidak memiliki akses untuk melihat KRS ini.');
        }

        $krs->load(['detail.mataPelajaran', 'kurikulum', 'penyetuju']);

        $nilai = Nilai::where('user_id', $krs->user_id)
            ->where('krs_id', $krs->id)
            ->get()
            ->keyBy('mata_pelajaran_id');

        return view('pengguna.krs.tampilkan', compact('krs', 'nilai'));
    }

    public function pilihJenjang()
    {
        $kurikulumList = Kurikulum::where('status', 'aktif')
            ->orderByRaw("FIELD(jenjang, 'tk_paud','sd_mi','smp_mts','sma_ma','smk','d1','d2','d3','d4','s1','s2','s3','profesi','post_doktoral')")
            ->get();

        return view('pengguna.krs.pilih-jenjang', compact('kurikulumList'));
    }

    public function daftarJenjang(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'jurusan' => 'nullable|string|max:255',
        ]);

        $kurikulum = Kurikulum::findOrFail($request->kurikulum_id);

        // Determine if needs parent supervision
        $perluPengawasan = in_array($kurikulum->jenjang, ['tk_paud', 'sd_mi', 'smp_mts', 'sma_ma', 'smk']);

        JenjangPengguna::create([
            'user_id' => $user->id,
            'kurikulum_id' => $kurikulum->id,
            'semester_aktif' => 1,
            'status' => 'aktif',
            'jurusan' => $request->jurusan,
            'perlu_pengawasan' => $perluPengawasan,
        ]);

        return redirect()->route('pengguna.krs.index')
            ->with('sukses', 'Berhasil mendaftar di ' . $kurikulum->nama . '!');
    }

    public function khs()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $nilaiSemua = Nilai::where('user_id', $user->id)
            ->where('status', 'final')
            ->with('mataPelajaran.kurikulum')
            ->get();

        $jenjangAktif = JenjangPengguna::where('user_id', $user->id)
            ->with('kurikulum')
            ->get();

        return view('pengguna.krs.khs', compact('user', 'nilaiSemua', 'jenjangAktif'));
    }
}
