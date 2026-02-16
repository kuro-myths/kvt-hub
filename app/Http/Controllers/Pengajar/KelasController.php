<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $kelas = $user->kelasYangDiajar()->withCount('anggota')->latest()->paginate(12);
        return view('akun.pengajar.kelas.index', compact('kelas'));
    }

    public function buat()
    {
        return view('akun.pengajar.kelas.buat');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        Kelas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'guru_id' => $user->id,
            'status' => 'aktif',
        ]);

        return redirect()->route('pengajar.kelas.index')->with('sukses', 'Kelas berhasil dibuat!');
    }
}
