<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AturanEdukasi;
use App\Models\EdukasiGratis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AturanEdukasiController extends Controller
{
    public function index(Request $request)
    {
        $query = AturanEdukasi::with('edukasiGratis')->latest();

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'ilike', '%' . $cari . '%')
                  ->orWhere('deskripsi', 'ilike', '%' . $cari . '%');
            });
        }
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }
        if ($request->filled('tingkat')) {
            $query->where('tingkat', $request->tingkat);
        }
        if ($request->filled('edukasi')) {
            if ($request->edukasi === 'semua') {
                $query->where('berlaku_semua', true);
            } else {
                $query->where('edukasi_gratis_id', $request->edukasi);
            }
        }

        $aturan = $query->paginate(15)->withQueryString();
        $tipeList = AturanEdukasi::daftarTipe();
        $tingkatList = AturanEdukasi::daftarTingkat();
        $edukasiList = EdukasiGratis::orderBy('judul')->get(['id', 'judul']);

        // Statistik
        $stats = [
            'total' => AturanEdukasi::count(),
            'larangan' => AturanEdukasi::where('tipe', 'larangan')->count(),
            'peringatan' => AturanEdukasi::where('tipe', 'peringatan')->count(),
            'tips' => AturanEdukasi::where('tipe', 'tips')->count(),
            'prosedur' => AturanEdukasi::where('tipe', 'prosedur')->count(),
        ];

        return view('akun.admin.aturan-edukasi', compact(
            'aturan', 'tipeList', 'tingkatList', 'edukasiList', 'stats'
        ));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tipe' => 'required|in:larangan,peringatan,tips,prosedur',
            'tingkat' => 'required|in:rendah,sedang,tinggi,kritis',
            'edukasi_gratis_id' => 'nullable|exists:edukasi_gratis,id',
            'ikon' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        AturanEdukasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'tingkat' => $request->tingkat,
            'edukasi_gratis_id' => $request->berlaku_semua ? null : $request->edukasi_gratis_id,
            'ikon' => $request->ikon,
            'urutan' => $request->input('urutan', 0),
            'aktif' => $request->has('aktif'),
            'berlaku_semua' => $request->has('berlaku_semua'),
            'dibuat_oleh' => $user->id,
        ]);

        return back()->with('sukses', 'Aturan edukasi berhasil ditambahkan!');
    }

    public function update(Request $request, AturanEdukasi $aturanEdukasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tipe' => 'required|in:larangan,peringatan,tips,prosedur',
            'tingkat' => 'required|in:rendah,sedang,tinggi,kritis',
            'edukasi_gratis_id' => 'nullable|exists:edukasi_gratis,id',
            'ikon' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
        ]);

        $aturanEdukasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'tingkat' => $request->tingkat,
            'edukasi_gratis_id' => $request->berlaku_semua ? null : $request->edukasi_gratis_id,
            'ikon' => $request->ikon,
            'urutan' => $request->input('urutan', 0),
            'aktif' => $request->has('aktif'),
            'berlaku_semua' => $request->has('berlaku_semua'),
        ]);

        return back()->with('sukses', 'Aturan edukasi berhasil diperbarui!');
    }

    public function hapus(AturanEdukasi $aturanEdukasi)
    {
        $aturanEdukasi->delete();
        return back()->with('sukses', 'Aturan edukasi berhasil dihapus!');
    }

    public function toggleAktif(AturanEdukasi $aturanEdukasi)
    {
        $aturanEdukasi->update(['aktif' => !$aturanEdukasi->aktif]);
        return back()->with('sukses', 'Status aturan berhasil diubah!');
    }
}
