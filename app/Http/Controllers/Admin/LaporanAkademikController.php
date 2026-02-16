<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanAkademik;
use App\Models\Kurikulum;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Krs;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanAkademikController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanAkademik::with(['kurikulum', 'pembuat']);

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        $laporan = $query->latest()->paginate(15)->withQueryString();

        return view('akun.admin.laporan-akademik', compact('laporan'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:rekap_nilai,statistik_krs,performa_mahasiswa,distribusi_ipk',
            'kurikulum_id' => 'nullable|exists:kurikulum,id',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $this->generateData($request->tipe, $request->kurikulum_id);

        $laporan = LaporanAkademik::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'kurikulum_id' => $request->kurikulum_id,
            'dibuat_oleh' => Auth::id(),
            'filter' => ['tipe' => $request->tipe, 'kurikulum_id' => $request->kurikulum_id],
            'data' => $data,
            'format' => 'json',
            'status' => 'selesai',
        ]);

        return back()->with('sukses', "Laporan '{$laporan->judul}' berhasil di-generate!");
    }

    public function tampilkan(LaporanAkademik $laporan)
    {
        $laporan->load(['kurikulum', 'pembuat']);
        return view('akun.admin.laporan-akademik-detail', compact('laporan'));
    }

    public function hapus(LaporanAkademik $laporan)
    {
        $laporan->delete();
        return back()->with('sukses', 'Laporan berhasil dihapus!');
    }

    private function generateData(string $tipe, $kurikulumId = null): array
    {
        switch ($tipe) {
            case 'rekap_nilai':
                $query = Nilai::with(['pengguna', 'mataPelajaran']);
                if ($kurikulumId) {
                    $query->whereHas('mataPelajaran', fn($q) => $q->where('kurikulum_id', $kurikulumId));
                }
                $nilai = $query->get();
                return [
                    'total_data' => $nilai->count(),
                    'rata_rata' => round($nilai->avg('nilai_akhir'), 2),
                    'tertinggi' => $nilai->max('nilai_akhir'),
                    'terendah' => $nilai->min('nilai_akhir'),
                    'distribusi' => $nilai->groupBy('huruf_mutu')->map->count()->toArray(),
                    'detail' => $nilai->take(100)->map(fn($n) => [
                        'mahasiswa' => $n->pengguna->name ?? '-',
                        'mata_pelajaran' => $n->mataPelajaran->nama ?? '-',
                        'nilai_akhir' => $n->nilai_akhir,
                        'huruf' => $n->huruf_mutu,
                    ])->toArray(),
                ];

            case 'statistik_krs':
                $query = Krs::with('pengguna');
                if ($kurikulumId) {
                    $query->where('kurikulum_id', $kurikulumId);
                }
                $krs = $query->get();
                return [
                    'total_krs' => $krs->count(),
                    'per_status' => $krs->groupBy('status')->map->count()->toArray(),
                    'rata_sks' => round($krs->avg('total_sks'), 1),
                    'per_semester' => $krs->groupBy('semester')->map->count()->toArray(),
                ];

            case 'performa_mahasiswa':
                $mahasiswa = User::where('peran', 'pengguna')
                    ->withCount('krs')
                    ->with(['nilai' => fn($q) => $q->select('user_id', 'nilai_akhir', 'bobot_mutu')])
                    ->get();
                return [
                    'total_mahasiswa' => $mahasiswa->count(),
                    'detail' => $mahasiswa->take(50)->map(fn($m) => [
                        'nama' => $m->name,
                        'level' => $m->level,
                        'total_krs' => $m->krs_count,
                        'ipk' => $m->nilai->count() > 0 ? round($m->nilai->avg('bobot_mutu'), 2) : 0,
                        'rata_nilai' => $m->nilai->count() > 0 ? round($m->nilai->avg('nilai_akhir'), 2) : 0,
                    ])->toArray(),
                ];

            case 'distribusi_ipk':
                $mahasiswa = User::where('peran', 'pengguna')->with('nilai')->get();
                $ipkList = $mahasiswa->map(function ($m) {
                    return $m->nilai->count() > 0 ? round($m->nilai->avg('bobot_mutu'), 2) : 0;
                });
                return [
                    'total' => $mahasiswa->count(),
                    'rata_ipk' => round($ipkList->avg(), 2),
                    'distribusi' => [
                        'cumlaude' => $ipkList->filter(fn($v) => $v >= 3.5)->count(),
                        'sangat_memuaskan' => $ipkList->filter(fn($v) => $v >= 3.0 && $v < 3.5)->count(),
                        'memuaskan' => $ipkList->filter(fn($v) => $v >= 2.5 && $v < 3.0)->count(),
                        'cukup' => $ipkList->filter(fn($v) => $v >= 2.0 && $v < 2.5)->count(),
                        'kurang' => $ipkList->filter(fn($v) => $v < 2.0)->count(),
                    ],
                ];

            default:
                return [];
        }
    }
}
