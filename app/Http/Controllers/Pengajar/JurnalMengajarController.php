<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\JurnalMengajar;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalMengajarController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $kelas = Kelas::where('guru_id', $user->id)->get();

        $query = JurnalMengajar::where('guru_id', $user->id)->with('kelas')->latest('tanggal');

        if (request('kelas_id')) {
            $query->where('kelas_id', request('kelas_id'));
        }
        if (request('bulan')) {
            $query->whereMonth('tanggal', request('bulan'));
        }
        if (request('cari')) {
            $query->where('topik', 'ilike', '%' . request('cari') . '%');
        }

        $jurnal = $query->paginate(20);

        return view('akun.pengajar.jurnal.index', compact('jurnal', 'kelas'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'pertemuan_ke' => 'required|integer|min:1',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Verify kelas ownership
        Kelas::where('id', $request->kelas_id)->where('guru_id', $user->id)->firstOrFail();

        $data = [
            'tanggal' => $request->tanggal,
            'pertemuan_ke' => $request->pertemuan_ke,
            'topik' => $request->topik,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $user->id,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'jumlah_hadir' => $request->jumlah_hadir ?? 0,
            'jumlah_siswa' => $request->jumlah_siswa ?? 0,
            'metode' => $request->metode,
            'materi_dibahas' => $request->materi_dibahas,
            'catatan' => $request->catatan,
            'kendala' => $request->kendala,
        ];

        if ($request->id) {
            $jurnal = JurnalMengajar::where('id', $request->id)->where('guru_id', $user->id)->firstOrFail();
            $jurnal->update($data);
            $pesan = 'Jurnal berhasil diperbarui!';
        } else {
            JurnalMengajar::create($data);
            $pesan = 'Jurnal mengajar berhasil dicatat!';
        }

        return redirect()->route('pengajar.jurnal.index')->with('sukses', $pesan);
    }

    public function hapus($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $jurnal = JurnalMengajar::where('id', $id)->where('guru_id', $user->id)->firstOrFail();
        $jurnal->delete();

        return redirect()->route('pengajar.jurnal.index')->with('sukses', 'Jurnal berhasil dihapus!');
    }

    public function ekspor(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $query = JurnalMengajar::where('guru_id', $user->id)->with('kelas')->orderBy('tanggal');
        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }
        $data = $query->get();

        $filename = 'jurnal_mengajar_' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'Tanggal', 'Pertemuan Ke', 'Topik', 'Kelas', 'Jam Mulai', 'Jam Selesai', 'Hadir', 'Total Siswa', 'Metode', 'Materi Dibahas', 'Catatan', 'Kendala']);
            foreach ($data as $i => $j) {
                fputcsv($file, [
                    $i + 1,
                    $j->tanggal->format('Y-m-d'),
                    $j->pertemuan_ke,
                    $j->topik,
                    $j->kelas->nama ?? '-',
                    $j->jam_mulai,
                    $j->jam_selesai,
                    $j->jumlah_hadir,
                    $j->jumlah_siswa,
                    $j->metode,
                    $j->materi_dibahas,
                    $j->catatan,
                    $j->kendala,
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
        ]);

        $file = $request->file('file');
        $rows = array_map('str_getcsv', file($file->getPathname()));
        array_shift($rows); // Remove header

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $imported = 0;

        foreach ($rows as $row) {
            if (count($row) < 5) continue;

            $kelas = Kelas::where('nama', 'ilike', '%' . trim($row[4]) . '%')
                ->where('guru_id', $user->id)->first();

            if (!$kelas) continue;

            JurnalMengajar::create([
                'tanggal' => $row[1] ?? now(),
                'pertemuan_ke' => (int) ($row[2] ?? 1),
                'topik' => $row[3] ?? 'Tanpa Topik',
                'kelas_id' => $kelas->id,
                'guru_id' => $user->id,
                'jam_mulai' => $row[5] ?? null,
                'jam_selesai' => $row[6] ?? null,
                'jumlah_hadir' => (int) ($row[7] ?? 0),
                'jumlah_siswa' => (int) ($row[8] ?? 0),
                'metode' => $row[9] ?? null,
                'materi_dibahas' => $row[10] ?? null,
                'catatan' => $row[11] ?? null,
                'kendala' => $row[12] ?? null,
            ]);
            $imported++;
        }

        return response()->json(['message' => "Berhasil mengimpor {$imported} jurnal mengajar."]);
    }
}
