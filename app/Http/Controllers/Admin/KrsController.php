<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index(Request $request)
    {
        $query = Krs::with(['pengguna', 'kurikulum', 'detail.mataPelajaran', 'penyetuju']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('cari')) {
            $query->whereHas('pengguna', function ($q) use ($request) {
                $q->where('name', 'ilike', "%{$request->cari}%");
            });
        }

        $krsList = $query->latest()->paginate(15)->withQueryString();
        $totalMenunggu = Krs::where('status', 'menunggu')->count();
        $totalDisetujui = Krs::where('status', 'disetujui')->count();
        $totalDitolak = Krs::where('status', 'ditolak')->count();

        return view('akun.admin.krs', compact('krsList', 'totalMenunggu', 'totalDisetujui', 'totalDitolak'));
    }

    public function setujui(Krs $krs)
    {
        $krs->update([
            'status' => 'disetujui',
            'disetujui_oleh' => Auth::id(),
            'disetujui_pada' => now(),
        ]);

        return back()->with('sukses', "KRS #{$krs->id} berhasil disetujui!");
    }

    public function tolak(Request $request, Krs $krs)
    {
        $request->validate(['catatan_pembimbing' => 'nullable|string|max:500']);

        $krs->update([
            'status' => 'ditolak',
            'catatan_pembimbing' => $request->catatan_pembimbing,
        ]);

        return back()->with('sukses', "KRS #{$krs->id} ditolak.");
    }

    public function hapus(Krs $krs)
    {
        $krs->detail()->delete();
        $krs->delete();
        return back()->with('sukses', 'KRS berhasil dihapus!');
    }
}
