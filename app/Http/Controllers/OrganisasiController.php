<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Organisasi::where('aktif', true);

        if ($request->tipe) {
            $query->where('tipe', $request->tipe);
        }
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->unggulan) {
            $query->where('unggulan', true);
        }

        $organisasi = $query->orderBy('unggulan', 'desc')
            ->orderBy('nama')
            ->paginate(12);

        $tipeList = Organisasi::TIPE;
        $kategoriList = Organisasi::KATEGORI;

        return view('halaman.komunitas.organisasi', compact('organisasi', 'tipeList', 'kategoriList'));
    }
}
