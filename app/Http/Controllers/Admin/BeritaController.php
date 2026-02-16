<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::latest();
        if ($request->filled('cari')) {
            $query->where('judul', 'ilike', '%' . $request->cari . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        $berita = $query->paginate(15)->withQueryString();
        $kategoriList = Berita::distinct()->whereNotNull('kategori')->pluck('kategori');
        return view('akun.admin.berita', compact('berita', 'kategoriList'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'ringkasan' => 'nullable|string|max:500',
            'kategori' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'konten', 'ringkasan', 'kategori');
        $data['slug'] = Str::slug($request->judul) . '-' . Str::random(5);
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $data['penulis_id'] = $user->id;
        $data['status'] = $request->input('status', 'draf');
        $data['terbit_pada'] = $data['status'] === 'terbit' ? now() : null;
        $data['unggulan'] = $request->has('unggulan');
        $data['tampil_ticker'] = $request->has('tampil_ticker');
        $data['tampil_popup'] = $request->has('tampil_popup');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);
        return back()->with('sukses', 'Berita berhasil dibuat!');
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'ringkasan' => 'nullable|string|max:500',
            'kategori' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'konten', 'ringkasan', 'kategori');
        $data['slug'] = Str::slug($request->judul) . '-' . Str::random(5);
        $data['status'] = $request->input('status', $berita->status);
        $data['terbit_pada'] = $data['status'] === 'terbit' && !$berita->terbit_pada ? now() : $berita->terbit_pada;
        $data['unggulan'] = $request->has('unggulan');
        $data['tampil_ticker'] = $request->has('tampil_ticker');
        $data['tampil_popup'] = $request->has('tampil_popup');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);
        return back()->with('sukses', 'Berita berhasil diperbarui!');
    }

    public function hapus(Berita $berita)
    {
        $berita->delete();
        return back()->with('sukses', 'Berita berhasil dihapus!');
    }
}
