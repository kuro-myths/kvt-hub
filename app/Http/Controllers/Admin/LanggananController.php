<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Langganan;
use App\Models\User;
use App\Models\PaketEksklusif;
use Illuminate\Http\Request;

class LanggananController extends Controller
{
    public function index(Request $request)
    {
        $query = Langganan::with('user', 'paket');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->whereHas('user', function ($q) use ($cari) {
                $q->where('name', 'ilike', "%{$cari}%")
                    ->orWhere('email', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('paket_id')) {
            $query->where('paket_id', $request->paket_id);
        }

        $langganan = $query->latest()->paginate(20)->withQueryString();
        $pakets = PaketEksklusif::where('aktif', true)->orderBy('nama')->get();
        $statuses = ['aktif', 'kadaluarsa', 'dibatalkan'];

        return view('akun.admin.langganan', compact('langganan', 'pakets', 'statuses'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'paket_id' => 'required|exists:paket_eksklusif,id',
            'mulai_pada' => 'required|date',
            'berakhir_pada' => 'required|date|after:mulai_pada',
            'status' => 'required|in:aktif,kadaluarsa,dibatalkan',
        ]);

        Langganan::create([
            'user_id' => $request->user_id,
            'paket_id' => $request->paket_id,
            'mulai_pada' => $request->mulai_pada,
            'berakhir_pada' => $request->berakhir_pada,
            'status' => $request->status,
        ]);

        return back()->with('sukses', 'Langganan berhasil ditambahkan!');
    }

    public function detail(Langganan $langganan)
    {
        $langganan->load('user', 'paket');
        return view('akun.admin.langganan-detail', compact('langganan'));
    }

    public function update(Request $request, Langganan $langganan)
    {
        $request->validate([
            'paket_id' => 'required|exists:paket_eksklusif,id',
            'mulai_pada' => 'required|date',
            'berakhir_pada' => 'required|date|after:mulai_pada',
            'status' => 'required|in:aktif,kadaluarsa,dibatalkan',
        ]);

        $langganan->update([
            'paket_id' => $request->paket_id,
            'mulai_pada' => $request->mulai_pada,
            'berakhir_pada' => $request->berakhir_pada,
            'status' => $request->status,
        ]);

        return back()->with('sukses', 'Langganan berhasil diperbarui!');
    }

    public function hapus(Langganan $langganan)
    {
        $langganan->delete();
        return back()->with('sukses', 'Langganan berhasil dihapus!');
    }

    public function ubahStatus(Request $request, Langganan $langganan)
    {
        $request->validate([
            'status' => 'required|in:aktif,kadaluarsa,dibatalkan',
        ]);

        $langganan->update(['status' => $request->status]);
        return back()->with('sukses', 'Status langganan berhasil diubah!');
    }

    public function perpanjang(Request $request, Langganan $langganan)
    {
        $request->validate([
            'berakhir_pada' => 'required|date|after:today',
        ]);

        $langganan->update([
            'berakhir_pada' => $request->berakhir_pada,
            'status' => 'aktif',
        ]);

        return back()->with('sukses', 'Langganan berhasil diperpanjang!');
    }

    public function statistik()
    {
        $totalAktif = Langganan::where('status', 'aktif')->count();
        $totalExpired = Langganan::where('status', 'kadaluarsa')->count();
        $totalCancelled = Langganan::where('status', 'dibatalkan')->count();

        $langgananPerPaket = Langganan::with('paket')
            ->where('status', 'aktif')
            ->get()
            ->groupBy('paket_id')
            ->map(function ($items, $paketId) {
                $paket = $items->first()->paket;
                return [
                    'paket' => $paket->nama,
                    'jumlah' => $items->count(),
                    'revenue' => $items->count() * $paket->harga,
                ];
            });

        return view('akun.admin.langganan-statistik', compact(
            'totalAktif',
            'totalExpired',
            'totalCancelled',
            'langgananPerPaket'
        ));
    }
}
