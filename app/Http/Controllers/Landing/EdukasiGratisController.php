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
        $query = EdukasiGratis::aktif()->orderBy('unggulan', 'desc')->orderBy('urutan');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->filled('cari')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'ilike', '%' . $request->cari . '%')
                  ->orWhere('deskripsi', 'ilike', '%' . $request->cari . '%')
                  ->orWhere('platform', 'ilike', '%' . $request->cari . '%');
            });
        }

        $edukasi = $query->paginate(12)->withQueryString();
        $kategoriList = EdukasiGratis::daftarKategori();
        $totalEdukasi = EdukasiGratis::aktif()->count();
        $unggulan = EdukasiGratis::aktif()->unggulan()->take(6)->get();

        return view('halaman.edukasi-gratis', compact('edukasi', 'kategoriList', 'totalEdukasi', 'unggulan'));
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
