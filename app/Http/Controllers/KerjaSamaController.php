<?php

namespace App\Http\Controllers;

use App\Models\KerjaSama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KerjaSamaController extends Controller
{
    // === PUBLIK ===

    public function index(Request $request)
    {
        $tipeAktif = $request->get('tipe', 'semua');

        $query = KerjaSama::aktif()->orderBy('urutan');

        if ($tipeAktif !== 'semua') {
            $query->where('tipe', $tipeAktif);
        }

        $mitraList = $query->get();

        // Grouping by tier
        $platinum = $mitraList->where('tier', 'platinum');
        $gold = $mitraList->where('tier', 'gold');
        $silver = $mitraList->where('tier', 'silver');
        $bronze = $mitraList->where('tier', 'bronze');
        $community = $mitraList->where('tier', 'community');

        $tipeList = KerjaSama::tipeList();
        $totalMitra = KerjaSama::aktif()->count();

        return view('kerja-sama.index', compact(
            'mitraList', 'platinum', 'gold', 'silver', 'bronze', 'community',
            'tipeList', 'tipeAktif', 'totalMitra'
        ));
    }

    public function tampilkan(KerjaSama $kerjaSama)
    {
        return view('kerja-sama.tampilkan', compact('kerjaSama'));
    }

    // === ADMIN ===

    public function adminIndex()
    {
        $mitraList = KerjaSama::latest()->paginate(20);
        return view('admin.kerja-sama.index', compact('mitraList'));
    }

    public function adminBuat()
    {
        $tipeList = KerjaSama::tipeList();
        $tierList = KerjaSama::tierList();
        return view('admin.kerja-sama.form', compact('tipeList', 'tierList'));
    }

    public function adminSimpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'website' => 'nullable|url',
            'tipe' => 'required|in:sponsor,mitra_akademik,mitra_industri,media_partner,komunitas',
            'tier' => 'required|in:platinum,gold,silver,bronze,community',
            'logo' => 'nullable|image|max:1024',
        ]);

        $data = $request->only([
            'nama', 'deskripsi', 'website', 'tipe', 'tier',
            'nilai_kontrak', 'mulai_pada', 'berakhir_pada',
            'kontak_nama', 'kontak_email', 'kontak_telepon', 'benefit', 'urutan',
        ]);

        $data['aktif'] = $request->boolean('aktif', true);
        $data['tampil_beranda'] = $request->boolean('tampil_beranda');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('mitra', 'public');
        }

        KerjaSama::create($data);

        return redirect()->route('admin.kerja-sama.index')->with('sukses', 'Mitra berhasil ditambahkan!');
    }

    public function adminEdit(KerjaSama $kerjaSama)
    {
        $tipeList = KerjaSama::tipeList();
        $tierList = KerjaSama::tierList();
        return view('admin.kerja-sama.form', compact('kerjaSama', 'tipeList', 'tierList'));
    }

    public function adminUpdate(Request $request, KerjaSama $kerjaSama)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'website' => 'nullable|url',
            'tipe' => 'required|in:sponsor,mitra_akademik,mitra_industri,media_partner,komunitas',
            'tier' => 'required|in:platinum,gold,silver,bronze,community',
            'logo' => 'nullable|image|max:1024',
        ]);

        $data = $request->only([
            'nama', 'deskripsi', 'website', 'tipe', 'tier',
            'nilai_kontrak', 'mulai_pada', 'berakhir_pada',
            'kontak_nama', 'kontak_email', 'kontak_telepon', 'benefit', 'urutan',
        ]);

        $data['aktif'] = $request->boolean('aktif', true);
        $data['tampil_beranda'] = $request->boolean('tampil_beranda');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('mitra', 'public');
        }

        $kerjaSama->update($data);

        return redirect()->route('admin.kerja-sama.index')->with('sukses', 'Mitra berhasil diperbarui!');
    }

    public function adminHapus(KerjaSama $kerjaSama)
    {
        $kerjaSama->delete();
        return back()->with('sukses', 'Mitra berhasil dihapus!');
    }
}
