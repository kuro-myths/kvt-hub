<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuis;
use App\Models\Materi;
use App\Models\KuisPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KuisController extends Controller
{
    public function index(Request $request)
    {
        $query = Kuis::with('materi');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'ilike', "%{$cari}%")
                    ->orWhere('deskripsi', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('materi_id')) {
            $query->where('materi_id', $request->materi_id);
        }

        $kuis = $query->withCount('pertanyaan', 'hasil')->latest()->paginate(15)->withQueryString();
        $materis = Materi::orderBy('judul')->get();

        return view('akun.admin.kuis', compact('kuis', 'materis'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'materi_id' => 'required|exists:materi,id',
            'durasi_detik' => 'required|integer|min:10',
            'xp_reward' => 'required|integer|min:1',
            'waktu_tampil' => 'nullable|integer|min:0',
        ]);

        Kuis::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'materi_id' => $request->materi_id,
            'durasi_detik' => $request->durasi_detik,
            'xp_reward' => $request->xp_reward,
            'waktu_tampil' => $request->waktu_tampil ?? 0,
        ]);

        return back()->with('sukses', 'Kuis berhasil dibuat!');
    }

    public function detail(Kuis $kuis)
    {
        $kuis->load('pertanyaan', 'materi');
        return view('akun.admin.kuis-detail', compact('kuis'));
    }

    public function update(Request $request, Kuis $kuis)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'materi_id' => 'required|exists:materi,id',
            'durasi_detik' => 'required|integer|min:10',
            'xp_reward' => 'required|integer|min:1',
            'waktu_tampil' => 'nullable|integer|min:0',
        ]);

        $kuis->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'materi_id' => $request->materi_id,
            'durasi_detik' => $request->durasi_detik,
            'xp_reward' => $request->xp_reward,
            'waktu_tampil' => $request->waktu_tampil ?? 0,
        ]);

        return back()->with('sukses', 'Kuis berhasil diperbarui!');
    }

    public function hapus(Kuis $kuis)
    {
        $kuis->delete();
        return back()->with('sukses', 'Kuis berhasil dihapus!');
    }

    // ========== PERTANYAAN MANAGEMENT ==========

    public function simpanPertanyaan(Request $request, Kuis $kuis)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan' => 'required|array|min:2',
            'pilihan.*' => 'required|string|max:500',
            'jawaban_benar' => 'required|string',
            'poin' => 'required|integer|min:1',
        ]);

        $urutan = $kuis->pertanyaan()->max('urutan') + 1 ?? 1;

        KuisPertanyaan::create([
            'kuis_id' => $kuis->id,
            'pertanyaan' => $request->pertanyaan,
            'pilihan' => $request->pilihan,
            'jawaban_benar' => $request->jawaban_benar,
            'poin' => $request->poin,
            'urutan' => $urutan,
        ]);

        return back()->with('sukses', 'Pertanyaan berhasil ditambahkan!');
    }

    public function ubahPertanyaan(Request $request, Kuis $kuis, KuisPertanyaan $pertanyaan)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan' => 'required|array|min:2',
            'pilihan.*' => 'required|string|max:500',
            'jawaban_benar' => 'required|string',
            'poin' => 'required|integer|min:1',
        ]);

        $pertanyaan->update([
            'pertanyaan' => $request->pertanyaan,
            'pilihan' => $request->pilihan,
            'jawaban_benar' => $request->jawaban_benar,
            'poin' => $request->poin,
        ]);

        return back()->with('sukses', 'Pertanyaan berhasil diperbarui!');
    }

    public function hapusPertanyaan(Kuis $kuis, KuisPertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        return back()->with('sukses', 'Pertanyaan berhasil dihapus!');
    }

    public function urutPertanyaan(Request $request, Kuis $kuis)
    {
        $request->validate([
            'urutan' => 'required|array',
            'urutan.*' => 'integer',
        ]);

        foreach ($request->urutan as $urut => $pertanyaanId) {
            KuisPertanyaan::where('kuis_id', $kuis->id)
                ->where('id', $pertanyaanId)
                ->update(['urutan' => $urut + 1]);
        }

        return response()->json(['sukses' => true]);
    }
}
