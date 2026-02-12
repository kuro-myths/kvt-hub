<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporanList = Laporan::with('pembuat')
            ->latest()
            ->paginate(12);

        return view('laporan.index', compact('laporanList'));
    }

    public function buat()
    {
        return view('laporan.buat');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe_diagram' => 'required|string',
            'data_json' => 'required|json',
        ]);

        Laporan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
            'tipe_diagram' => $request->tipe_diagram,
            'data_json' => $request->data_json,
            'status' => 'terbit',
        ]);

        return redirect()->route('laporan.index')->with('sukses', 'Laporan berhasil dibuat!');
    }

    public function tampilkan(Laporan $laporan)
    {
        $laporan->load('pembuat');
        return view('laporan.tampilkan', compact('laporan'));
    }
}
    }
}
