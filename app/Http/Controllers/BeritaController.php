<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // === PUBLIK ===

    public function index(Request $request)
    {
        $query = Berita::terbit()->with('penulis')->latest('terbit_pada');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('cari')) {
            $search = $request->cari;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'ilike', "%{$search}%")
                    ->orWhere('ringkasan', 'ilike', "%{$search}%")
                    ->orWhere('konten', 'ilike', "%{$search}%");
            });
        }

        $beritaList = $query->paginate(12);
        $kategoriList = Berita::kategoriList();
        $beritaUnggulan = Berita::unggulan()->latest('terbit_pada')->take(3)->get();

        return view('berita.index', compact('beritaList', 'kategoriList', 'beritaUnggulan'));
    }

    public function tampilkan(Berita $berita)
    {
        if ($berita->status !== 'terbit') {
            abort(404);
        }

        $berita->tambahDilihat();
        $berita->load('penulis');

        $beritaTerkait = Berita::terbit()
            ->where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->latest('terbit_pada')
            ->take(4)
            ->get();

        return view('berita.tampilkan', compact('berita', 'beritaTerkait'));
    }

    // === API untuk Ticker & Popup ===

    public function ticker()
    {
        $berita = Berita::untukTicker()
            ->latest('terbit_pada')
            ->take(10)
            ->get(['id', 'judul', 'slug', 'kategori', 'terbit_pada']);

        return response()->json($berita);
    }

    public function popup()
    {
        $berita = Berita::untukPopup()
            ->latest('terbit_pada')
            ->take(5)
            ->get(['id', 'judul', 'slug', 'ringkasan', 'kategori', 'terbit_pada']);

        return response()->json($berita);
    }

    // === ADMIN CRUD ===

    public function adminIndex(Request $request)
    {
        $beritaList = Berita::with('penulis')
            ->latest()
            ->paginate(20);

        return view('admin.berita.index', compact('beritaList'));
    }

    public function adminBuat()
    {
        $kategoriList = Berita::kategoriList();
        return view('admin.berita.form', compact('kategoriList'));
    }

    public function adminSimpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'required|string|max:50',
            'status' => 'required|in:draft,terbit,arsip',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'ringkasan', 'konten', 'kategori', 'status']);
        $data['penulis_id'] = Auth::id();
        $data['tampil_ticker'] = $request->boolean('tampil_ticker');
        $data['tampil_popup'] = $request->boolean('tampil_popup');
        $data['unggulan'] = $request->boolean('unggulan');

        if ($data['status'] === 'terbit') {
            $data['terbit_pada'] = now();
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil dibuat!');
    }

    public function adminEdit(Berita $berita)
    {
        $kategoriList = Berita::kategoriList();
        return view('admin.berita.form', compact('berita', 'kategoriList'));
    }

    public function adminUpdate(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'required|string|max:50',
            'status' => 'required|in:draft,terbit,arsip',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'ringkasan', 'konten', 'kategori', 'status']);
        $data['tampil_ticker'] = $request->boolean('tampil_ticker');
        $data['tampil_popup'] = $request->boolean('tampil_popup');
        $data['unggulan'] = $request->boolean('unggulan');

        if ($data['status'] === 'terbit' && !$berita->terbit_pada) {
            $data['terbit_pada'] = now();
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('sukses', 'Berita berhasil diperbarui!');
    }

    public function adminHapus(Berita $berita)
    {
        $berita->delete();
        return back()->with('sukses', 'Berita berhasil dihapus!');
    }
}
