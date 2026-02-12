<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MateriProgres;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function tampilkan(Materi $materi)
    {
        $materi->load(['kelas', 'guru', 'kuis.pertanyaan']);

        $progres = null;
        if (auth()->check()) {
            $progres = MateriProgres::firstOrCreate(
                ['user_id' => auth()->id(), 'materi_id' => $materi->id],
                ['status' => 'sedang']
            );
        }

        return view('materi.tampilkan', compact('materi', 'progres'));
    }

    public function selesaikan(Materi $materi)
    {
        $user = auth()->user();

        $progres = MateriProgres::updateOrCreate(
            ['user_id' => $user->id, 'materi_id' => $materi->id],
            ['status' => 'selesai', 'progres_persen' => 100, 'selesai_pada' => now()]
        );

        $user->tambahXP($materi->xp_reward);

        return back()->with('sukses', "Materi selesai! +{$materi->xp_reward} XP");
    }

    public function buat(Request $request)
    {
        return view('materi.buat', ['kelas_id' => $request->kelas_id]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'konten' => 'nullable|string',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe' => 'required|in:video,artikel,tutorial,praktik,quiz',
            'video_url' => 'nullable|url',
            'xp_reward' => 'nullable|integer|min:1',
        ]);

        $materi = Materi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
            'kelas_id' => $request->kelas_id,
            'guru_id' => auth()->id(),
            'tipe' => $request->tipe,
            'video_url' => $request->video_url,
            'video_platform' => $request->video_url ? 'youtube' : null,
            'xp_reward' => $request->xp_reward ?? 10,
            'status' => 'terbit',
        ]);

        return redirect()->route('materi.tampilkan', $materi)->with('sukses', 'Materi berhasil dibuat!');
    }
}
