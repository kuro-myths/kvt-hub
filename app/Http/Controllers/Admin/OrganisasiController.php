<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Organisasi::withCount('anggota');

        if ($request->filled('cari')) {
            $query->where('nama', 'ilike', "%{$request->cari}%");
        }
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        $organisasi = $query->latest()->paginate(15)->withQueryString();

        return view('akun.admin.organisasi', compact('organisasi'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'kontak' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
        ]);

        Organisasi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'website' => $request->website,
            'kontak' => $request->kontak,
            'logo' => $request->logo,
            'aktif' => $request->has('aktif'),
            'unggulan' => $request->has('unggulan'),
        ]);

        return back()->with('sukses', 'Organisasi berhasil ditambahkan!');
    }

    public function update(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'kontak' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
        ]);

        $organisasi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'website' => $request->website,
            'kontak' => $request->kontak,
            'logo' => $request->logo,
            'aktif' => $request->has('aktif'),
            'unggulan' => $request->has('unggulan'),
        ]);

        return back()->with('sukses', 'Organisasi berhasil diperbarui!');
    }

    public function hapus(Organisasi $organisasi)
    {
        $organisasi->delete();
        return back()->with('sukses', 'Organisasi berhasil dihapus!');
    }
}
