<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::where('status', 'aktif')
            ->with('guru')
            ->withCount(['anggota' => fn($q) => $q->where('kelas_anggota.status', 'aktif')])
            ->paginate(12);

        return view('kelas.index', compact('kelas'));
    }

    public function tampilkan(Kelas $kelas)
    {
        $kelas->load(['guru', 'materi' => fn($q) => $q->where('status', 'terbit'), 'anggota']);

        $sudahGabung = false;
        if (auth()->check()) {
            $sudahGabung = $kelas->anggota()->where('user_id', auth()->id())->exists();
        }

        return view('kelas.tampilkan', compact('kelas', 'sudahGabung'));
    }

    public function gabung(Kelas $kelas)
    {
        $user = auth()->user();

        if ($kelas->jumlahSiswa() >= $kelas->maks_siswa) {
            return back()->with('error', 'Kelas sudah penuh.');
        }

        $kelas->anggota()->syncWithoutDetaching([
            $user->id => ['status' => 'aktif']
        ]);

        $user->tambahXP(20);

        return back()->with('sukses', 'Berhasil bergabung ke kelas!');
    }

    public function buat()
    {
        return view('kelas.buat');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'maks_siswa' => 'nullable|integer|min:1|max:500',
        ]);

        $kelas = Kelas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'guru_id' => auth()->id(),
            'kode_kelas' => strtoupper(Str::random(8)),
            'kategori' => $request->kategori,
            'maks_siswa' => $request->maks_siswa ?? 50,
        ]);

        return redirect()->route('kelas.tampilkan', $kelas)->with('sukses', 'Kelas berhasil dibuat!');
    }
}
