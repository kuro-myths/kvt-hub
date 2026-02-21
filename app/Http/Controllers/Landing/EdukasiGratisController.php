<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\AturanEdukasi;
use App\Models\EdukasiGratis;
use Illuminate\Http\Request;

class EdukasiGratisController extends Controller
{
    public function index(Request $request)
    {
        $semuaEdukasi = EdukasiGratis::aktif()
            ->orderBy('unggulan', 'desc')
            ->orderBy('urutan')
            ->get();

        $kategoriList = EdukasiGratis::daftarKategori();
        $totalEdukasi = $semuaEdukasi->count();
        $unggulan = $semuaEdukasi->where('unggulan', true)->take(6);

        return view('halaman.edukasi-gratis', compact('semuaEdukasi', 'kategoriList', 'totalEdukasi', 'unggulan'));
    }

    public function tampilkan(EdukasiGratis $edukasiGratis)
    {
        if (!$edukasiGratis->aktif) {
            abort(404);
        }

        $edukasiGratis->increment('dilihat');

        $terkait = EdukasiGratis::aktif()
            ->where('id', '!=', $edukasiGratis->id)
            ->where('kategori', $edukasiGratis->kategori)
            ->take(4)
            ->get();

        $aturan = AturanEdukasi::aktif()
            ->untukProgram($edukasiGratis->id)
            ->orderByRaw("CASE tipe WHEN 'larangan' THEN 1 WHEN 'peringatan' THEN 2 WHEN 'prosedur' THEN 3 WHEN 'tips' THEN 4 END")
            ->orderBy('urutan')
            ->get();

        return view('halaman.edukasi-gratis-detail', compact('edukasiGratis', 'terkait', 'aturan'));
    }
}
