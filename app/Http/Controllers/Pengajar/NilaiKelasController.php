<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\BobotNilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiKelasController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelas = Kelas::where('guru_id', $user->id)
            ->withCount(['anggota' => fn($q) => $q->where('kelas_anggota.status', 'aktif')])
            ->get();

        $kelasAktif = null;
        $siswa = collect();
        $nilaiData = collect();
        $rataRata = 0;
        $bobot = ['tugas' => 20, 'uts' => 25, 'uas' => 30, 'praktik' => 15, 'partisipasi' => 10];

        if (request('kelas_id')) {
            $kelasAktif = Kelas::where('id', request('kelas_id'))
                ->where('guru_id', $user->id)
                ->first();

            if ($kelasAktif) {
                $siswa = $kelasAktif->anggota()
                    ->where('kelas_anggota.status', 'aktif')
                    ->orderBy('name')
                    ->get();

                // Get existing nilai for this kelas's students
                $nilaiData = Nilai::whereIn('user_id', $siswa->pluck('id'))
                    ->get()
                    ->keyBy('user_id');

                // Calculate average
                $nilaiDenganAkhir = $nilaiData->filter(fn($n) => $n->nilai_akhir > 0);
                $rataRata = $nilaiDenganAkhir->count() > 0
                    ? $nilaiDenganAkhir->avg('nilai_akhir')
                    : 0;

                // Load bobot_nilai if exists
                $bobotDb = BobotNilai::first();
                if ($bobotDb) {
                    // Use default weights, bobot_nilai stores grade boundaries not weights
                }
            }
        }

        return view('akun.pengajar.nilai.index', compact(
            'kelas', 'kelasAktif', 'siswa', 'nilaiData', 'rataRata', 'bobot'
        ));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nilai' => 'required|array',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Verify ownership
        $kelas = Kelas::where('id', $request->kelas_id)->where('guru_id', $user->id)->firstOrFail();

        $bobotTugas = 20;
        $bobotUts = 25;
        $bobotUas = 30;
        $bobotPraktik = 15;
        $bobotPartisipasi = 10;

        foreach ($request->nilai as $item) {
            $tugas = $item['tugas'] !== null ? (float) $item['tugas'] : null;
            $uts = $item['uts'] !== null ? (float) $item['uts'] : null;
            $uas = $item['uas'] !== null ? (float) $item['uas'] : null;
            $praktik = $item['praktik'] !== null ? (float) $item['praktik'] : null;
            $partisipasi = $item['partisipasi'] !== null ? (float) $item['partisipasi'] : null;

            // Calculate nilai_akhir
            $nilaiAkhir = (
                ($tugas ?? 0) * $bobotTugas +
                ($uts ?? 0) * $bobotUts +
                ($uas ?? 0) * $bobotUas +
                ($praktik ?? 0) * $bobotPraktik +
                ($partisipasi ?? 0) * $bobotPartisipasi
            ) / 100;

            // Determine huruf_mutu
            $huruf = 'E';
            $bobotMutu = 0.0;
            if ($nilaiAkhir >= 85) { $huruf = 'A'; $bobotMutu = 4.0; }
            elseif ($nilaiAkhir >= 70) { $huruf = 'B'; $bobotMutu = 3.0; }
            elseif ($nilaiAkhir >= 55) { $huruf = 'C'; $bobotMutu = 2.0; }
            elseif ($nilaiAkhir >= 40) { $huruf = 'D'; $bobotMutu = 1.0; }

            Nilai::updateOrCreate(
                [
                    'user_id' => $item['user_id'],
                    'mata_pelajaran_id' => 1, // Default, will be updated when mata_pelajaran is linked
                ],
                [
                    'tugas' => $tugas,
                    'uts' => $uts,
                    'uas' => $uas,
                    'praktik' => $praktik,
                    'partisipasi' => $partisipasi,
                    'nilai_akhir' => round($nilaiAkhir, 2),
                    'huruf_mutu' => $huruf,
                    'bobot_mutu' => $bobotMutu,
                    'status' => $item['status'] ?? 'proses',
                    'catatan' => $item['catatan'] ?? null,
                ]
            );
        }

        return response()->json(['message' => 'Nilai berhasil disimpan!']);
    }

    public function ekspor(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelasId = $request->kelas_id;
        $kelas = Kelas::where('id', $kelasId)->where('guru_id', $user->id)->firstOrFail();

        $siswa = $kelas->anggota()->where('kelas_anggota.status', 'aktif')->orderBy('name')->get();
        $nilaiData = Nilai::whereIn('user_id', $siswa->pluck('id'))->get()->keyBy('user_id');

        $filename = 'nilai_' . str_replace(' ', '_', $kelas->nama) . '_' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($siswa, $nilaiData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'Nama Siswa', 'Tugas', 'UTS', 'UAS', 'Praktik', 'Partisipasi', 'Nilai Akhir', 'Huruf Mutu', 'Status', 'Catatan']);
            foreach ($siswa as $i => $s) {
                $n = $nilaiData->get($s->id);
                fputcsv($file, [
                    $i + 1,
                    $s->name,
                    $n->tugas ?? '',
                    $n->uts ?? '',
                    $n->uas ?? '',
                    $n->praktik ?? '',
                    $n->partisipasi ?? '',
                    $n->nilai_akhir ?? '',
                    $n->huruf_mutu ?? '',
                    $n->status ?? '',
                    $n->catatan ?? '',
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function impor(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt,xlsx|max:5120',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        Kelas::where('id', $request->kelas_id)->where('guru_id', $user->id)->firstOrFail();

        $file = $request->file('file');
        $rows = array_map('str_getcsv', file($file->getPathname()));
        array_shift($rows);

        $imported = 0;
        foreach ($rows as $row) {
            if (count($row) < 8) continue;

            $siswa = User::where('name', 'ilike', '%' . trim($row[1]) . '%')->first();
            if (!$siswa) continue;

            $nilaiAkhir = (float) ($row[7] ?? 0);
            $huruf = 'E';
            $bobotMutu = 0.0;
            if ($nilaiAkhir >= 85) { $huruf = 'A'; $bobotMutu = 4.0; }
            elseif ($nilaiAkhir >= 70) { $huruf = 'B'; $bobotMutu = 3.0; }
            elseif ($nilaiAkhir >= 55) { $huruf = 'C'; $bobotMutu = 2.0; }
            elseif ($nilaiAkhir >= 40) { $huruf = 'D'; $bobotMutu = 1.0; }

            Nilai::updateOrCreate(
                ['user_id' => $siswa->id, 'mata_pelajaran_id' => 1],
                [
                    'tugas' => $row[2] !== '' ? (float) $row[2] : null,
                    'uts' => $row[3] !== '' ? (float) $row[3] : null,
                    'uas' => $row[4] !== '' ? (float) $row[4] : null,
                    'praktik' => $row[5] !== '' ? (float) $row[5] : null,
                    'partisipasi' => $row[6] !== '' ? (float) $row[6] : null,
                    'nilai_akhir' => $nilaiAkhir,
                    'huruf_mutu' => $row[8] ?? $huruf,
                    'bobot_mutu' => $bobotMutu,
                    'status' => $row[9] ?? 'proses',
                    'catatan' => $row[10] ?? null,
                ]
            );
            $imported++;
        }

        return response()->json(['message' => "Berhasil mengimpor {$imported} nilai."]);
    }
}
