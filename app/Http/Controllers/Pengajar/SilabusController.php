<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Silabus;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SilabusController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelas = Kelas::where('guru_id', $user->id)->get();

        $query = Silabus::where('guru_id', $user->id)->with('kelas')->latest();

        if (request('kelas_id')) {
            $query->where('kelas_id', request('kelas_id'));
        }
        if (request('semester')) {
            $query->where('semester', request('semester'));
        }
        if (request('cari')) {
            $query->where('judul', 'ilike', '%' . request('cari') . '%');
        }

        $silabus = $query->paginate(12);

        return view('akun.pengajar.silabus.index', compact('silabus', 'kelas'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'semester' => 'required|in:ganjil,genap',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Verify ownership of the kelas
        $kelas = Kelas::where('id', $request->kelas_id)->where('guru_id', $user->id)->firstOrFail();

        $pertemuan = [];
        if ($request->has('pertemuan_minggu')) {
            foreach ($request->pertemuan_minggu as $i => $minggu) {
                $pertemuan[] = [
                    'minggu' => $minggu,
                    'topik' => $request->pertemuan_topik[$i] ?? '',
                    'sub_topik' => $request->pertemuan_sub_topik[$i] ?? '',
                    'metode' => $request->pertemuan_metode[$i] ?? '',
                    'media' => $request->pertemuan_media[$i] ?? '',
                    'penilaian' => $request->pertemuan_penilaian[$i] ?? '',
                ];
            }
        }

        $data = [
            'judul' => $request->judul,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $user->id,
            'semester' => $request->semester,
            'deskripsi' => $request->deskripsi,
            'kompetensi_dasar' => $request->kompetensi_dasar,
            'indikator' => $request->indikator,
            'metode' => $request->metode,
            'pertemuan' => $pertemuan,
            'status' => $request->status ?? 'draft',
        ];

        if ($request->id) {
            $silabus = Silabus::where('id', $request->id)->where('guru_id', $user->id)->firstOrFail();
            $silabus->update($data);
            $pesan = 'Silabus berhasil diperbarui!';
        } else {
            Silabus::create($data);
            $pesan = 'Silabus berhasil dibuat!';
        }

        return redirect()->route('pengajar.silabus.index')->with('sukses', $pesan);
    }

    public function hapus($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $silabus = Silabus::where('id', $id)->where('guru_id', $user->id)->firstOrFail();
        $silabus->delete();

        return redirect()->route('pengajar.silabus.index')->with('sukses', 'Silabus berhasil dihapus!');
    }

    public function ekspor(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $format = $request->get('format', 'csv');

        $query = Silabus::where('guru_id', $user->id)->with('kelas');
        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }
        $data = $query->get();

        if ($format === 'csv') {
            $filename = 'silabus_' . date('Y-m-d') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ];

            $callback = function () use ($data) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['No', 'Judul', 'Kelas', 'Semester', 'Status', 'K.Dasar', 'Indikator', 'Metode', 'Jml Pertemuan']);
                foreach ($data as $i => $s) {
                    fputcsv($file, [
                        $i + 1,
                        $s->judul,
                        $s->kelas->nama ?? '-',
                        $s->semester,
                        $s->status,
                        $s->kompetensi_dasar,
                        $s->indikator,
                        $s->metode,
                        is_array($s->pertemuan) ? count($s->pertemuan) : 0,
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        // Fallback: return JSON for other formats (Excel/Word handled via JS or package)
        return response()->json($data);
    }

    public function impor(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt,xlsx|max:5120',
        ]);

        // Simple CSV import
        $file = $request->file('file');
        $rows = array_map('str_getcsv', file($file->getPathname()));
        $header = array_shift($rows);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $imported = 0;

        foreach ($rows as $row) {
            if (count($row) < 4) continue;

            $kelas = Kelas::where('nama', 'ilike', '%' . trim($row[2]) . '%')
                ->where('guru_id', $user->id)->first();

            if (!$kelas) continue;

            Silabus::create([
                'judul' => $row[1] ?? $row[0],
                'kelas_id' => $kelas->id,
                'guru_id' => $user->id,
                'semester' => str_contains(strtolower($row[3] ?? ''), 'genap') ? 'genap' : 'ganjil',
                'status' => 'draft',
                'kompetensi_dasar' => $row[5] ?? null,
                'indikator' => $row[6] ?? null,
                'metode' => $row[7] ?? null,
            ]);
            $imported++;
        }

        return response()->json(['message' => "Berhasil mengimpor {$imported} silabus."]);
    }
}
