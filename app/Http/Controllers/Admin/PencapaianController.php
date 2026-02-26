<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pencapaian;
use App\Models\User;
use Illuminate\Http\Request;

class PencapaianController extends Controller
{
    public function index(Request $request)
    {
        $query = Pencapaian::query();

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where('nama', 'ilike', "%{$cari}%")
                ->orWhere('deskripsi', 'ilike', "%{$cari}%");
        }

        $pencapaian = $query->latest()->paginate(15)->withQueryString();

        return view('akun.admin.pencapaian', compact('pencapaian'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:pencapaian',
            'deskripsi' => 'nullable|string',
            'ikon' => 'nullable|string|max:100',
            'warna' => 'nullable|string|max:50',
            'xp_syarat' => 'required|integer|min:0',
            'level_syarat' => 'nullable|integer|min:1',
        ]);

        Pencapaian::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ikon' => $request->ikon ?? 'fa-star',
            'warna' => $request->warna ?? '#FFD700',
            'xp_syarat' => $request->xp_syarat,
            'level_syarat' => $request->level_syarat,
        ]);

        return back()->with('sukses', 'Pencapaian berhasil dibuat!');
    }

    public function detail(Pencapaian $pencapaian)
    {
        $pencapaian->load('pengguna');
        return view('akun.admin.pencapaian-detail', compact('pencapaian'));
    }

    public function update(Request $request, Pencapaian $pencapaian)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:pencapaian,nama,' . $pencapaian->id,
            'deskripsi' => 'nullable|string',
            'ikon' => 'nullable|string|max:100',
            'warna' => 'nullable|string|max:50',
            'xp_syarat' => 'required|integer|min:0',
            'level_syarat' => 'nullable|integer|min:1',
        ]);

        $pencapaian->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ikon' => $request->ikon ?? 'fa-star',
            'warna' => $request->warna ?? '#FFD700',
            'xp_syarat' => $request->xp_syarat,
            'level_syarat' => $request->level_syarat,
        ]);

        return back()->with('sukses', 'Pencapaian berhasil diperbarui!');
    }

    public function hapus(Pencapaian $pencapaian)
    {
        $pencapaian->delete();
        return back()->with('sukses', 'Pencapaian berhasil dihapus!');
    }

    // ========== PENGGUNA PENCAPAIAN ==========

    public function berikanKepada(Request $request, Pencapaian $pencapaian)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        // Attach jika belum ada
        if (!$user->pencapaian()->where('pencapaian_id', $pencapaian->id)->exists()) {
            $user->pencapaian()->attach($pencapaian->id, ['diraih_pada' => now()]);
            return back()->with('sukses', 'Pencapaian berhasil diberikan kepada ' . $user->name . '!');
        }

        return back()->with('info', $user->name . ' sudah memiliki pencapaian ini!');
    }

    public function lepaskan(Pencapaian $pencapaian, User $user)
    {
        $user->pencapaian()->detach($pencapaian->id);
        return back()->with('sukses', 'Pencapaian berhasil dilepaskan!');
    }

    public function statistik()
    {
        $pencapaian = Pencapaian::withCount('pengguna')
            ->orderByDesc('pengguna_count')
            ->get();

        $penerimaTerbanyak = $pencapaian->first();
        $totalPencapaian = $pencapaian->count();
        $totalTeraihkan = 0;

        foreach ($pencapaian as $p) {
            $totalTeraihkan += $p->pengguna_count;
        }

        return view('akun.admin.pencapaian-statistik', compact(
            'pencapaian',
            'penerimaTerbanyak',
            'totalPencapaian',
            'totalTeraihkan'
        ));
    }
}
