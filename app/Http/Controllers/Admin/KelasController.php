<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelas::with(['guru', 'anggota']);

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'ilike', "%{$cari}%")
                    ->orWhere('kode_kelas', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $kelas = $query->withCount('anggota')->latest()->paginate(15)->withQueryString();
        $pengajar = User::where('peran', 'pengajar')->orderBy('name')->get();

        return view('akun.admin.kelas', compact('kelas', 'pengajar'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'guru_id' => 'required|exists:users,id',
            'maks_siswa' => 'nullable|integer|min:1',
            'kategori' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,nonaktif,selesai',
        ]);

        Kelas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'guru_id' => $request->guru_id,
            'kode_kelas' => 'KLS-' . strtoupper(Str::random(6)),
            'maks_siswa' => $request->maks_siswa ?? 30,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ]);

        return back()->with('sukses', 'Kelas berhasil dibuat!');
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'guru_id' => 'required|exists:users,id',
            'maks_siswa' => 'nullable|integer|min:1',
            'kategori' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,nonaktif,selesai',
        ]);

        $kelas->update($request->only(['nama', 'deskripsi', 'guru_id', 'maks_siswa', 'kategori', 'status']));

        return back()->with('sukses', 'Kelas berhasil diperbarui!');
    }

    public function hapus(Kelas $kelas)
    {
        $kelas->delete();
        return back()->with('sukses', 'Kelas berhasil dihapus!');
    }
}
