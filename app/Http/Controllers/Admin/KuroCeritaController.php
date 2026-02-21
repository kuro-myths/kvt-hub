<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KuroCerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KuroCeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = KuroCerita::orderBy('chapter');

        if ($request->filled('cari')) {
            $query->where('judul', 'ilike', '%' . $request->cari . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('aliansi')) {
            $query->where('aliansi', $request->aliansi);
        }

        $cerita = $query->paginate(15)->withQueryString();

        return view('akun.admin.kuro-cerita', compact('cerita'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'chapter'      => 'required|integer|min:1|unique:kuro_cerita,chapter',
            'judul'        => 'required|string|max:255',
            'judul_asing'  => 'nullable|string|max:255',
            'ikon'         => 'nullable|string|max:100',
            'warna'        => 'nullable|string|max:100',
            'warna_hex'    => 'nullable|string|max:20',
            'ringkasan'    => 'nullable|string|max:1000',
            'konten'       => 'required|string',
            'gambar'       => 'nullable|image|max:2048',
            'aliansi'      => 'nullable|string|in:VTA,VTI,VTU,VTE,VTO',
            'jenjang'      => 'nullable|string|max:100',
            'status'       => 'nullable|string|in:draft,terbit,arsip',
        ]);

        $data = $request->only([
            'chapter', 'judul', 'judul_asing', 'ikon', 'warna', 'warna_hex',
            'ringkasan', 'konten', 'aliansi', 'jenjang', 'status',
        ]);

        $data['slug'] = Str::slug($request->judul) . '-ch' . $request->chapter;
        $data['urutan'] = $request->chapter;
        $data['status'] = $data['status'] ?? 'terbit';

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kuro-cerita', 'public');
        }

        KuroCerita::create($data);

        return back()->with('sukses', 'Chapter berhasil ditambahkan!');
    }

    public function update(Request $request, KuroCerita $kuroCerita)
    {
        $request->validate([
            'chapter'      => 'required|integer|min:1|unique:kuro_cerita,chapter,' . $kuroCerita->id,
            'judul'        => 'required|string|max:255',
            'judul_asing'  => 'nullable|string|max:255',
            'ikon'         => 'nullable|string|max:100',
            'warna'        => 'nullable|string|max:100',
            'warna_hex'    => 'nullable|string|max:20',
            'ringkasan'    => 'nullable|string|max:1000',
            'konten'       => 'required|string',
            'gambar'       => 'nullable|image|max:2048',
            'aliansi'      => 'nullable|string|in:VTA,VTI,VTU,VTE,VTO',
            'jenjang'      => 'nullable|string|max:100',
            'status'       => 'nullable|string|in:draft,terbit,arsip',
        ]);

        $data = $request->only([
            'chapter', 'judul', 'judul_asing', 'ikon', 'warna', 'warna_hex',
            'ringkasan', 'konten', 'aliansi', 'jenjang', 'status',
        ]);

        $data['slug'] = Str::slug($request->judul) . '-ch' . $request->chapter;
        $data['urutan'] = $request->chapter;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kuro-cerita', 'public');
        }

        $kuroCerita->update($data);

        return back()->with('sukses', 'Chapter berhasil diperbarui!');
    }

    public function hapus(KuroCerita $kuroCerita)
    {
        $kuroCerita->delete();
        return back()->with('sukses', 'Chapter berhasil dihapus!');
    }
}
