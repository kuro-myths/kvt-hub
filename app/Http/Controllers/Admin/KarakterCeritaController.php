<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KarakterCerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KarakterCeritaController extends Controller
{
    /**
     * Daftar cerita karakter (Bejotaro & Veteran).
     * Support filter: karakter, status, cari.
     */
    public function index(Request $request)
    {
        $query = KarakterCerita::orderBy('karakter')->orderBy('chapter');

        if ($request->filled('karakter')) {
            $query->where('karakter', $request->karakter);
        }
        if ($request->filled('cari')) {
            $query->where('judul', 'ilike', '%' . $request->cari . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $cerita = $query->paginate(15)->withQueryString();

        // Statistik per karakter
        $stats = KarakterCerita::selectRaw("karakter, COUNT(*) as total, SUM(CASE WHEN status='terbit' THEN 1 ELSE 0 END) as terbit")
            ->groupBy('karakter')
            ->pluck('total', 'karakter');

        return view('akun.admin.karakter-cerita', compact('cerita', 'stats'));
    }

    /**
     * Simpan chapter baru.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'karakter'     => 'required|string|in:bejotaro,veteran',
            'chapter'      => 'required|integer|min:1',
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

        // Validasi unique chapter per karakter
        $exists = KarakterCerita::where('karakter', $request->karakter)
            ->where('chapter', $request->chapter)
            ->exists();

        if ($exists) {
            return back()->withErrors(['chapter' => "Chapter {$request->chapter} untuk {$request->karakter} sudah ada."])->withInput();
        }

        $data = $request->only([
            'karakter', 'chapter', 'judul', 'judul_asing', 'ikon', 'warna', 'warna_hex',
            'ringkasan', 'konten', 'aliansi', 'jenjang', 'status',
        ]);

        $data['slug'] = $request->karakter . '-' . Str::slug($request->judul) . '-ch' . $request->chapter;
        $data['urutan'] = $request->chapter;
        $data['status'] = $data['status'] ?? 'terbit';

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('karakter-cerita', 'public');
        }

        KarakterCerita::create($data);

        $label = ucfirst($request->karakter);
        return back()->with('sukses', "Chapter {$request->chapter} ({$label}) berhasil ditambahkan!");
    }

    /**
     * Update chapter.
     */
    public function update(Request $request, KarakterCerita $karakterCerita)
    {
        $request->validate([
            'karakter'     => 'required|string|in:bejotaro,veteran',
            'chapter'      => 'required|integer|min:1',
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

        // Validasi unique chapter per karakter (exclude self)
        $exists = KarakterCerita::where('karakter', $request->karakter)
            ->where('chapter', $request->chapter)
            ->where('id', '!=', $karakterCerita->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['chapter' => "Chapter {$request->chapter} untuk {$request->karakter} sudah ada."])->withInput();
        }

        $data = $request->only([
            'karakter', 'chapter', 'judul', 'judul_asing', 'ikon', 'warna', 'warna_hex',
            'ringkasan', 'konten', 'aliansi', 'jenjang', 'status',
        ]);

        $data['slug'] = $request->karakter . '-' . Str::slug($request->judul) . '-ch' . $request->chapter;
        $data['urutan'] = $request->chapter;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('karakter-cerita', 'public');
        }

        $karakterCerita->update($data);

        return back()->with('sukses', 'Chapter berhasil diperbarui!');
    }

    /**
     * Hapus chapter.
     */
    public function hapus(KarakterCerita $karakterCerita)
    {
        $label = ucfirst($karakterCerita->karakter) . ' Ch.' . $karakterCerita->chapter;
        $karakterCerita->delete();
        return back()->with('sukses', "{$label} berhasil dihapus!");
    }
}
