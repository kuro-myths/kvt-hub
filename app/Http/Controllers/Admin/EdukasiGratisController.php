<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EdukasiGratis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EdukasiGratisController extends Controller
{
    public function index(Request $request)
    {
        $query = EdukasiGratis::latest();

        if ($request->filled('cari')) {
            $query->where('judul', 'ilike', '%' . $request->cari . '%');
        }
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->filled('status')) {
            $query->where('aktif', $request->status === 'aktif');
        }

        $edukasi = $query->paginate(15)->withQueryString();
        $kategoriList = EdukasiGratis::daftarKategori();

        return view('akun.admin.edukasi-gratis', compact('edukasi', 'kategoriList'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'langkah' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'platform' => 'nullable|string|max:100',
            'url_resmi' => 'nullable|url|max:500',
            'gambar' => 'nullable|image|max:2048',
            'ikon' => 'nullable|string|max:100',
            'warna' => 'nullable|string|max:50',
        ]);

        $data = $request->only('judul', 'deskripsi', 'langkah', 'kategori', 'platform', 'url_resmi', 'ikon', 'warna');
        $data['slug'] = Str::slug($request->judul) . '-' . Str::random(5);
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $data['dibuat_oleh'] = $user->id;
        $data['aktif'] = $request->has('aktif');
        $data['unggulan'] = $request->has('unggulan');
        $data['urutan'] = $request->input('urutan', 0);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('edukasi-gratis', 'public');
        }

        EdukasiGratis::create($data);
        return back()->with('sukses', 'Edukasi gratis berhasil ditambahkan!');
    }

    public function update(Request $request, EdukasiGratis $edukasiGratis)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'langkah' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'platform' => 'nullable|string|max:100',
            'url_resmi' => 'nullable|url|max:500',
            'gambar' => 'nullable|image|max:2048',
            'ikon' => 'nullable|string|max:100',
            'warna' => 'nullable|string|max:50',
        ]);

        $data = $request->only('judul', 'deskripsi', 'langkah', 'kategori', 'platform', 'url_resmi', 'ikon', 'warna');
        $data['slug'] = Str::slug($request->judul) . '-' . Str::random(5);
        $data['aktif'] = $request->has('aktif');
        $data['unggulan'] = $request->has('unggulan');
        $data['urutan'] = $request->input('urutan', $edukasiGratis->urutan);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('edukasi-gratis', 'public');
        }

        $edukasiGratis->update($data);
        return back()->with('sukses', 'Edukasi gratis berhasil diperbarui!');
    }

    public function hapus(EdukasiGratis $edukasiGratis)
    {
        $edukasiGratis->delete();
        return back()->with('sukses', 'Edukasi gratis berhasil dihapus!');
    }

    public function toggleAktif(EdukasiGratis $edukasiGratis)
    {
        $edukasiGratis->update(['aktif' => !$edukasiGratis->aktif]);
        return back()->with('sukses', 'Status edukasi gratis berhasil diubah!');
    }
}
