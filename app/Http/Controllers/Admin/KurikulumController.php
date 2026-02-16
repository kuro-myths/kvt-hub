<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index(Request $request)
    {
        $query = Kurikulum::withCount('mataPelajaran')->latest();
        if ($request->filled('cari')) {
            $query->where('nama', 'ilike', '%' . $request->cari . '%');
        }
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }
        $kurikulum = $query->paginate(15)->withQueryString();
        return view('akun.admin.kurikulum', compact('kurikulum'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'durasi_tahun' => 'nullable|integer|min:1|max:8',
            'total_semester' => 'nullable|integer|min:1|max:16',
            'total_sks' => 'nullable|integer|min:1',
            'akreditasi' => 'nullable|string|max:50',
        ]);

        $data = $request->only('nama', 'jenjang', 'deskripsi', 'durasi_tahun', 'total_semester', 'total_sks', 'akreditasi');
        $data['status'] = $request->input('status', 'aktif');

        Kurikulum::create($data);
        return back()->with('sukses', 'Kurikulum berhasil dibuat!');
    }

    public function update(Request $request, Kurikulum $kurikulum)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'durasi_tahun' => 'nullable|integer|min:1|max:8',
            'total_semester' => 'nullable|integer|min:1|max:16',
            'total_sks' => 'nullable|integer|min:1',
            'akreditasi' => 'nullable|string|max:50',
        ]);

        $data = $request->only('nama', 'jenjang', 'deskripsi', 'durasi_tahun', 'total_semester', 'total_sks', 'akreditasi');
        $data['status'] = $request->input('status', $kurikulum->status);

        $kurikulum->update($data);
        return back()->with('sukses', 'Kurikulum berhasil diperbarui!');
    }

    public function hapus(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return back()->with('sukses', 'Kurikulum berhasil dihapus!');
    }
}
