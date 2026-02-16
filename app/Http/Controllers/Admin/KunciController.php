<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KunciAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KunciController extends Controller
{
    public function index()
    {
        $kunciList = KunciAdmin::with('pengguna')->latest()->get();
        $totalAktif = KunciAdmin::where('digunakan', false)->count();
        $totalDigunakan = KunciAdmin::where('digunakan', true)->count();

        return view('akun.admin.kunci', compact('kunciList', 'totalAktif', 'totalDigunakan'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'deskripsi' => 'nullable|string|max:255',
            'jumlah' => 'nullable|integer|min:1|max:20',
        ]);

        $jumlah = $request->jumlah ?? 1;
        $kunciDibuat = [];

        for ($i = 0; $i < $jumlah; $i++) {
            $kunci = 'KVT-' . strtoupper(Str::random(16));
            KunciAdmin::create([
                'kunci' => $kunci,
                'deskripsi' => $request->deskripsi,
            ]);
            $kunciDibuat[] = $kunci;
        }

        return back()->with('sukses', "{$jumlah} kunci admin baru berhasil dibuat!")
            ->with('kunci_baru', implode(', ', $kunciDibuat));
    }

    public function hapus(KunciAdmin $kunci)
    {
        $kunci->delete();
        return back()->with('sukses', 'Kunci admin berhasil dihapus!');
    }

    public function hapusSemua()
    {
        KunciAdmin::where('digunakan', true)->delete();
        return back()->with('sukses', 'Semua kunci yang sudah digunakan berhasil dihapus!');
    }
}
