<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $materi = Materi::where('guru_id', $user->id)->with('kelas')->latest()->paginate(12);
        return view('akun.pengajar.materi.index', compact('materi'));
    }

    public function buat()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $kelas = Kelas::where('guru_id', $user->id)->get();
        return view('akun.pengajar.materi.buat', compact('kelas'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Materi::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kelas_id' => $request->kelas_id,
            'guru_id' => Auth::id(),
            'status' => $request->has('terbitkan') ? 'terbit' : 'draf',
        ]);

        return redirect()->route('pengajar.materi.index')->with('sukses', 'Materi berhasil dibuat!');
    }
}
