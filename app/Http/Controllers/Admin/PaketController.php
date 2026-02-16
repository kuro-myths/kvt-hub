<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketEksklusif;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paketList = PaketEksklusif::withCount('langganan')->latest()->get();
        return view('akun.admin.paket', compact('paketList'));
    }

    public function simpan(Request $request)
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

    public function update(Request $request, PaketEksklusif $paket)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'durasi_hari' => 'required|integer|min:1',
            'xp_bonus' => 'nullable|integer|min:0',
            'fitur' => 'nullable|string',
        ]);

        $paket->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_hari' => $request->durasi_hari,
            'xp_bonus' => $request->xp_bonus ?? 0,
            'fitur' => $request->fitur,
            'aktif' => $request->has('aktif'),
        ]);

        return back()->with('sukses', 'Paket berhasil diperbarui!');
    }

    public function hapus(PaketEksklusif $paket)
    {
        $paket->delete();
        return back()->with('sukses', 'Paket berhasil dihapus!');
    }

    public function toggleAktif(PaketEksklusif $paket)
    {
        $paket->update(['aktif' => !$paket->aktif]);
        return back()->with('sukses', 'Status paket berhasil diubah!');
    }
}
