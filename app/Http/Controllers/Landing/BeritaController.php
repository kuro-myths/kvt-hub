<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::terbit()->latest('terbit_pada')->paginate(12);
        return view('berita.index', compact('berita'));
    }

    public function tampilkan(Berita $berita)
    {
        $beritaLain = Berita::terbit()
            ->where('id', '!=', $berita->id)
            ->latest('terbit_pada')
            ->take(4)
            ->get();

        return view('berita.tampilkan', compact('berita', 'beritaLain'));
    }

    public function ticker()
    {
        $berita = Berita::terbit()->latest('terbit_pada')->take(5)->get(['judul', 'slug']);
        return response()->json($berita);
    }

    public function popup()
    {
        $berita = Berita::terbit()->where('popup', true)->latest('terbit_pada')->first();
        return response()->json($berita);
    }
}
