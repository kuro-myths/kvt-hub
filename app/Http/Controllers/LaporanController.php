<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'user_id' => Auth::id(),
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

    // ==================== DIAGRAM BUILDER ====================

    public function builder()
    {
        $laporanList = Laporan::where('user_id', Auth::id())
            ->latest()
            ->take(12)
            ->get();

        return view('laporan.builder', [
            'laporanList' => $laporanList,
            'laporan' => new Laporan(),
        ]);
    }

    public function builderEdit(Laporan $laporan)
    {
        $laporanList = Laporan::where('user_id', Auth::id())
            ->latest()
            ->take(12)
            ->get();

        return view('laporan.builder', compact('laporan', 'laporanList'));
    }

    public function simpanBuilder(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe_diagram' => 'required|string',
            'data_json' => 'required|json',
        ]);

        if ($request->id) {
            $laporan = Laporan::where('id', $request->id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
            $laporan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tipe_diagram' => $request->tipe_diagram,
                'data_json' => $request->data_json,
            ]);
            $pesan = 'Diagram berhasil diperbarui!';
        } else {
            $laporan = Laporan::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'user_id' => Auth::id(),
                'tipe_diagram' => $request->tipe_diagram,
                'data_json' => $request->data_json,
                'status' => 'terbit',
            ]);
            $pesan = 'Diagram berhasil dibuat!';
        }

        return response()->json([
            'sukses' => true,
            'pesan' => $pesan,
            'id' => $laporan->id,
        ]);
    }

    public function json(Laporan $laporan)
    {
        return response()->json($laporan->only('id', 'judul', 'deskripsi', 'tipe_diagram', 'data_json'));
    }

    public function hapus(Laporan $laporan)
    {
        if ($laporan->user_id !== Auth::id()) {
            return response()->json(['pesan' => 'Tidak diizinkan.'], 403);
        }

        $laporan->delete();
        return response()->json(['pesan' => 'Diagram berhasil dihapus!']);
    }
}
