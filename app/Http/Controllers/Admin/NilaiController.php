<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\Krs;
use App\Models\BobotNilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Nilai::with(['pengguna', 'mataPelajaran', 'krs']);

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->whereHas('pengguna', fn($q2) => $q2->where('name', 'ilike', "%{$cari}%"))
                    ->orWhereHas('mataPelajaran', fn($q2) => $q2->where('nama', 'ilike', "%{$cari}%"));
            });
        }

        $nilai = $query->latest()->paginate(15)->withQueryString();
        $mataPelajaran = MataPelajaran::where('aktif', true)->orderBy('nama')->get();
        $pengguna = User::where('peran', 'pengguna')->orderBy('name')->get();

        return view('akun.admin.nilai', compact('nilai', 'mataPelajaran', 'pengguna'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'krs_id' => 'nullable|exists:krs,id',
            'tugas' => 'nullable|numeric|min:0|max:100',
            'uts' => 'nullable|numeric|min:0|max:100',
            'uas' => 'nullable|numeric|min:0|max:100',
            'praktik' => 'nullable|numeric|min:0|max:100',
            'partisipasi' => 'nullable|numeric|min:0|max:100',
        ]);

        $nilaiAkhir = $this->hitungNilaiAkhir($request);
        $hurufMutu = $this->tentukanHurufMutu($nilaiAkhir, $request->krs_id);

        Nilai::updateOrCreate(
            ['user_id' => $request->user_id, 'mata_pelajaran_id' => $request->mata_pelajaran_id],
            [
                'krs_id' => $request->krs_id,
                'tugas' => $request->tugas ?? 0,
                'uts' => $request->uts ?? 0,
                'uas' => $request->uas ?? 0,
                'praktik' => $request->praktik ?? 0,
                'partisipasi' => $request->partisipasi ?? 0,
                'nilai_akhir' => $nilaiAkhir,
                'huruf_mutu' => $hurufMutu['huruf'] ?? '-',
                'bobot_mutu' => $hurufMutu['bobot'] ?? 0,
                'status' => 'final',
                'catatan' => $request->catatan,
            ]
        );

        return back()->with('sukses', 'Nilai berhasil disimpan!');
    }

    public function hapus(Nilai $nilai)
    {
        $nilai->delete();
        return back()->with('sukses', 'Nilai berhasil dihapus!');
    }

    private function hitungNilaiAkhir(Request $request): float
    {
        $tugas = $request->tugas ?? 0;
        $uts = $request->uts ?? 0;
        $uas = $request->uas ?? 0;
        $praktik = $request->praktik ?? 0;
        $partisipasi = $request->partisipasi ?? 0;

        return round(($tugas * 0.2) + ($uts * 0.25) + ($uas * 0.3) + ($praktik * 0.15) + ($partisipasi * 0.1), 2);
    }

    private function tentukanHurufMutu(float $nilaiAkhir, $krsId = null): array
    {
        $kurikulumId = null;
        if ($krsId) {
            $kurikulumId = Krs::find($krsId)?->kurikulum_id;
        }

        if ($kurikulumId) {
            $bobot = BobotNilai::where('kurikulum_id', $kurikulumId)
                ->where('batas_bawah', '<=', $nilaiAkhir)
                ->where('batas_atas', '>=', $nilaiAkhir)
                ->first();

            if ($bobot) {
                return ['huruf' => $bobot->huruf, 'bobot' => $bobot->bobot];
            }
        }

        // Default grading
        if ($nilaiAkhir >= 85) return ['huruf' => 'A', 'bobot' => 4.0];
        if ($nilaiAkhir >= 80) return ['huruf' => 'A-', 'bobot' => 3.7];
        if ($nilaiAkhir >= 75) return ['huruf' => 'B+', 'bobot' => 3.3];
        if ($nilaiAkhir >= 70) return ['huruf' => 'B', 'bobot' => 3.0];
        if ($nilaiAkhir >= 65) return ['huruf' => 'B-', 'bobot' => 2.7];
        if ($nilaiAkhir >= 60) return ['huruf' => 'C+', 'bobot' => 2.3];
        if ($nilaiAkhir >= 55) return ['huruf' => 'C', 'bobot' => 2.0];
        if ($nilaiAkhir >= 40) return ['huruf' => 'D', 'bobot' => 1.0];
        return ['huruf' => 'E', 'bobot' => 0.0];
    }
}
