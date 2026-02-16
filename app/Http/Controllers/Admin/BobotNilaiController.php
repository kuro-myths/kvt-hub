<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BobotNilai;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class BobotNilaiController extends Controller
{
    public function index(Request $request)
    {
        $query = BobotNilai::with('kurikulum');

        if ($request->filled('kurikulum_id')) {
            $query->where('kurikulum_id', $request->kurikulum_id);
        }

        $bobotNilai = $query->orderBy('kurikulum_id')->orderByDesc('batas_atas')->get();
        $kurikulum = Kurikulum::where('status', 'aktif')->orderBy('nama')->get();

        return view('akun.admin.bobot-nilai', compact('bobotNilai', 'kurikulum'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'huruf' => 'required|string|max:5',
            'bobot' => 'required|numeric|min:0|max:4',
            'batas_bawah' => 'required|numeric|min:0|max:100',
            'batas_atas' => 'required|numeric|min:0|max:100',
            'keterangan' => 'nullable|string|max:255',
        ]);

        BobotNilai::updateOrCreate(
            ['kurikulum_id' => $request->kurikulum_id, 'huruf' => $request->huruf],
            [
                'bobot' => $request->bobot,
                'batas_bawah' => $request->batas_bawah,
                'batas_atas' => $request->batas_atas,
                'keterangan' => $request->keterangan,
            ]
        );

        return back()->with('sukses', 'Bobot nilai berhasil disimpan!');
    }

    public function hapus(BobotNilai $bobotNilai)
    {
        $bobotNilai->delete();
        return back()->with('sukses', 'Bobot nilai berhasil dihapus!');
    }
}
