<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = Materi::with(['kelas', 'guru', 'kuis']);

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'ilike', "%{$cari}%")
                    ->orWhere('deskripsi', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        $materi = $query->withCount('kuis')->latest()->paginate(15)->withQueryString();
        $kelasList = Kelas::orderBy('nama')->get();
        $pengajar = User::where('peran', 'pengajar')->orderBy('name')->get();

        return view('akun.admin.materi', compact('materi', 'kelasList', 'pengajar'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'konten' => 'nullable|string',
            'kelas_id' => 'required|exists:kelas,id',
            'guru_id' => 'nullable|exists:users,id',
            'tipe' => 'required|in:video,artikel,tutorial,praktik,quiz',
            'video_url' => 'nullable|url',
            'durasi_menit' => 'nullable|integer|min:1',
            'xp_reward' => 'nullable|integer|min:1|max:1000',
            'status' => 'required|in:terbit,draft',
            'eksklusif' => 'nullable|boolean',
        ]);

        Materi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $request->guru_id ?? Auth::id(),
            'tipe' => $request->tipe,
            'video_url' => $request->video_url,
            'video_platform' => $request->video_url ? 'youtube' : null,
            'durasi_menit' => $request->durasi_menit ?? 0,
            'xp_reward' => $request->xp_reward ?? 10,
            'status' => $request->status,
            'eksklusif' => $request->boolean('eksklusif'),
        ]);

        return back()->with('sukses', 'Materi berhasil dibuat!');
    }

    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'konten' => 'nullable|string',
            'kelas_id' => 'required|exists:kelas,id',
            'guru_id' => 'nullable|exists:users,id',
            'tipe' => 'required|in:video,artikel,tutorial,praktik,quiz',
            'video_url' => 'nullable|url',
            'durasi_menit' => 'nullable|integer|min:1',
            'xp_reward' => 'nullable|integer|min:1|max:1000',
            'status' => 'required|in:terbit,draft',
            'eksklusif' => 'nullable|boolean',
        ]);

        $materi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $request->guru_id ?? $materi->guru_id,
            'tipe' => $request->tipe,
            'video_url' => $request->video_url,
            'video_platform' => $request->video_url ? 'youtube' : null,
            'durasi_menit' => $request->durasi_menit ?? $materi->durasi_menit,
            'xp_reward' => $request->xp_reward ?? $materi->xp_reward,
            'status' => $request->status,
            'eksklusif' => $request->boolean('eksklusif'),
        ]);

        return back()->with('sukses', 'Materi berhasil diperbarui!');
    }

    public function hapus(Materi $materi)
    {
        $materi->delete();
        return back()->with('sukses', 'Materi berhasil dihapus!');
    }
}
