<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\KerjaSama;

class KerjaSamaController extends Controller
{
    public function index()
    {
        $kerjaSama = KerjaSama::aktif()->latest()->paginate(12);
        return view('kerja-sama.index', compact('kerjaSama'));
    }

    public function tampilkan(KerjaSama $kerjaSama)
    {
        return view('kerja-sama.tampilkan', compact('kerjaSama'));
    }
}
