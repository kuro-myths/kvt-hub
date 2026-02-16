<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $query = MataPelajaran::with('kurikulum');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'ilike', "%{$cari}%")
                    ->orWhere('kode', 'ilike', "%{$cari}%");
            });
        }
        if ($request->filled('kurikulum_id')) {
            $query->where('kurikulum_id', $request->kurikulum_id);
        }

        $mataPelajaran = $query->latest()->paginate(15)->withQueryString();
        $kurikulum = Kurikulum::where('status', 'aktif')->orderBy('nama')->get();

        return view('akun.admin.mata-pelajaran', compact('mataPelajaran', 'kurikulum'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:20|unique:mata_pelajaran,kode',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'sks' => 'required|integer|min:1|max:12',
            'semester' => 'required|integer|min:1|max:14',
            'tipe' => 'required|in:wajib,pilihan',
            'kategori' => 'nullable|string|max:100',
            'jam_per_minggu' => 'nullable|integer|min:1',
        ]);

        MataPelajaran::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kurikulum_id' => $request->kurikulum_id,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'jam_per_minggu' => $request->jam_per_minggu,
            'aktif' => $request->has('aktif'),
        ]);

        return back()->with('sukses', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $request->validate([
            'kode' => 'required|string|max:20|unique:mata_pelajaran,kode,' . $mataPelajaran->id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'sks' => 'required|integer|min:1|max:12',
            'semester' => 'required|integer|min:1|max:14',
            'tipe' => 'required|in:wajib,pilihan',
            'kategori' => 'nullable|string|max:100',
            'jam_per_minggu' => 'nullable|integer|min:1',
        ]);

        $mataPelajaran->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kurikulum_id' => $request->kurikulum_id,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'jam_per_minggu' => $request->jam_per_minggu,
            'aktif' => $request->has('aktif'),
        ]);

        return back()->with('sukses', 'Mata pelajaran berhasil diperbarui!');
    }

    public function hapus(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();
        return back()->with('sukses', 'Mata pelajaran berhasil dihapus!');
    }
}
