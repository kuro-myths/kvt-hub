<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenjangPengguna;
use App\Models\User;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class JenjangPenggunaController extends Controller
{
    public function index(Request $request)
    {
        $query = JenjangPengguna::with('pengguna', 'kurikulum');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->whereHas('pengguna', function ($q) use ($cari) {
                $q->where('name', 'ilike', "%{$cari}%")
                    ->orWhere('email', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('kurikulum_id')) {
            $query->where('kurikulum_id', $request->kurikulum_id);
        }

        $jenjang = $query->latest()->paginate(20)->withQueryString();
        $kurikulums = Kurikulum::orderBy('nama')->get();
        $statuses = ['aktif', 'suspend', 'lulus', 'dropout'];

        return view('akun.admin.jenjang-pengguna', compact('jenjang', 'kurikulums', 'statuses'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:jenjang_pengguna',
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'semester_aktif' => 'required|integer|min:1',
            'status' => 'required|in:aktif,suspend,lulus,dropout',
            'jurusan' => 'nullable|string|max:255',
            'ipk' => 'nullable|numeric|between:0,4',
            'wali_user_id' => 'nullable|exists:users,id',
            'perlu_pengawasan' => 'nullable|boolean',
        ]);

        JenjangPengguna::create([
            'user_id' => $request->user_id,
            'kurikulum_id' => $request->kurikulum_id,
            'semester_aktif' => $request->semester_aktif,
            'status' => $request->status,
            'jurusan' => $request->jurusan,
            'ipk' => $request->ipk,
            'wali_user_id' => $request->wali_user_id,
            'perlu_pengawasan' => $request->has('perlu_pengawasan'),
        ]);

        return back()->with('sukses', 'Jenjang pengguna berhasil ditambahkan!');
    }

    public function detail(JenjangPengguna $jenjangPengguna)
    {
        $jenjangPengguna->load('pengguna', 'kurikulum', 'wali');
        return view('akun.admin.jenjang-pengguna-detail', compact('jenjangPengguna'));
    }

    public function update(Request $request, JenjangPengguna $jenjangPengguna)
    {
        $request->validate([
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'semester_aktif' => 'required|integer|min:1',
            'status' => 'required|in:aktif,suspend,lulus,dropout',
            'jurusan' => 'nullable|string|max:255',
            'ipk' => 'nullable|numeric|between:0,4',
            'wali_user_id' => 'nullable|exists:users,id',
            'perlu_pengawasan' => 'nullable|boolean',
        ]);

        $jenjangPengguna->update([
            'kurikulum_id' => $request->kurikulum_id,
            'semester_aktif' => $request->semester_aktif,
            'status' => $request->status,
            'jurusan' => $request->jurusan,
            'ipk' => $request->ipk,
            'wali_user_id' => $request->wali_user_id,
            'perlu_pengawasan' => $request->has('perlu_pengawasan'),
        ]);

        return back()->with('sukses', 'Jenjang pengguna berhasil diperbarui!');
    }

    public function hapus(JenjangPengguna $jenjangPengguna)
    {
        $jenjangPengguna->delete();
        return back()->with('sukses', 'Jenjang pengguna berhasil dihapus!');
    }

    public function ubahStatus(Request $request, JenjangPengguna $jenjangPengguna)
    {
        $request->validate([
            'status' => 'required|in:aktif,suspend,lulus,dropout',
        ]);

        $jenjangPengguna->update(['status' => $request->status]);
        return back()->with('sukses', 'Status berhasil diubah!');
    }

    public function naikkanSemester(JenjangPengguna $jenjangPengguna)
    {
        $kurikulum = $jenjangPengguna->kurikulum;
        if ($jenjangPengguna->semester_aktif < ($kurikulum->total_semester ?? 8)) {
            $jenjangPengguna->increment('semester_aktif');
            return back()->with('sukses', 'Semester berhasil dinaikkan!');
        }
        return back()->with('error', 'Sudah mencapai semester maksimal!');
    }
}
