<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KerjaSama;
use Illuminate\Http\Request;

class KerjaSamaController extends Controller
{
    public function index(Request $request)
    {
        $query = KerjaSama::latest();
        if ($request->filled('cari')) {
            $query->where('nama', 'ilike', '%' . $request->cari . '%');
        }
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }
        $kerjaSama = $query->paginate(15)->withQueryString();
        return view('akun.admin.kerja-sama', compact('kerjaSama'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url',
            'tipe' => 'nullable|string|max:100',
            'tier' => 'nullable|string|max:50',
        ]);

        $data = $request->only('nama', 'deskripsi', 'website', 'tipe', 'tier');
        $data['slug'] = \Illuminate\Support\Str::slug($request->nama);
        $data['aktif'] = $request->has('aktif');
        $data['tampil_beranda'] = $request->has('tampil_beranda');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('kerja-sama', 'public');
        }

        KerjaSama::create($data);
        return back()->with('sukses', 'Mitra berhasil ditambahkan!');
    }

    public function update(Request $request, KerjaSama $kerjaSama)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url',
            'tipe' => 'nullable|string|max:100',
            'tier' => 'nullable|string|max:50',
        ]);

        $data = $request->only('nama', 'deskripsi', 'website', 'tipe', 'tier');
        $data['aktif'] = $request->has('aktif');
        $data['tampil_beranda'] = $request->has('tampil_beranda');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('kerja-sama', 'public');
        }

        $kerjaSama->update($data);
        return back()->with('sukses', 'Mitra berhasil diperbarui!');
    }

    public function hapus(KerjaSama $kerjaSama)
    {
        $kerjaSama->delete();
        return back()->with('sukses', 'Mitra berhasil dihapus!');
    }
}
