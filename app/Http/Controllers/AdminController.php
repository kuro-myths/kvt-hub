<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\KunciAdmin;
use App\Models\PaketEksklusif;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dasbor()
    {
        $totalPengguna = User::count();
        $totalKelas = Kelas::count();
        $totalMateri = Materi::count();
        $totalKunci = KunciAdmin::where('digunakan', false)->count();
        $penggunaTerbaru = User::latest()->take(10)->get();

        return view('admin.dasbor', compact('totalPengguna', 'totalKelas', 'totalMateri', 'totalKunci', 'penggunaTerbaru'));
    }

    public function pengguna()
    {
        $pengguna = User::latest()->paginate(20);
        return view('admin.pengguna', compact('pengguna'));
    }

    public function kunciAdmin()
    {
        $kunciList = KunciAdmin::with('pengguna')->latest()->get();
        return view('admin.kunci', compact('kunciList'));
    }

    public function buatKunci(Request $request)
    {
        $kunciBaru = 'KVT-' . strtoupper(Str::random(16));

        KunciAdmin::create([
            'kunci' => $kunciBaru,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return back()->with('sukses', 'Kunci admin baru berhasil dibuat!')->with('kunci_baru', $kunciBaru);
    }

    public function paket()
    {
        $paketList = PaketEksklusif::withCount('langganan')->latest()->get();
        return view('admin.paket', compact('paketList'));
    }

    public function simpanPaket(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'durasi_hari' => 'required|integer|min:1',
            'xp_bonus' => 'nullable|integer|min:0',
            'fitur' => 'nullable|string',
        ]);

        PaketEksklusif::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_hari' => $request->durasi_hari,
            'xp_bonus' => $request->xp_bonus ?? 0,
            'fitur' => $request->fitur,
            'aktif' => $request->has('aktif'),
        ]);

        return back()->with('sukses', 'Paket berhasil dibuat!');
    }
}
