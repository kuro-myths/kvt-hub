<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VerifikasiController extends Controller
{
    /**
     * List all pending verification accounts.
     */
    public function index(Request $request)
    {
        $query = User::where('status_verifikasi', '!=', User::STATUS_TERVERIFIKASI)
            ->whereNotIn('peran', ['admin']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status_verifikasi', $request->status);
        } else {
            // Default: show pending first
            $query->orderByRaw("CASE status_verifikasi WHEN 'pending' THEN 0 WHEN 'ditolak' THEN 1 ELSE 2 END");
        }

        // Filter by role
        if ($request->filled('peran')) {
            $query->where('peran', $request->peran);
        }

        // Search
        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('name', 'ilike', "%{$cari}%")
                    ->orWhere('email', 'ilike', "%{$cari}%");
            });
        }

        $pendaftar = $query->latest()->paginate(15)->withQueryString();

        $statistik = [
            'pending' => User::where('status_verifikasi', User::STATUS_PENDING)->count(),
            'terverifikasi' => User::where('status_verifikasi', User::STATUS_TERVERIFIKASI)->count(),
            'ditolak' => User::where('status_verifikasi', User::STATUS_DITOLAK)->count(),
        ];

        return view('akun.admin.verifikasi', compact('pendaftar', 'statistik'));
    }

    /**
     * Show detail of a pending account.
     */
    public function tampilkan(User $user)
    {
        return view('akun.admin.verifikasi-detail', compact('user'));
    }

    /**
     * Approve an account.
     */
    public function setujui(Request $request, User $user)
    {
        /** @var \App\Models\User $admin */
        $admin = Auth::user();

        $user->update([
            'status_verifikasi' => User::STATUS_TERVERIFIKASI,
            'verified_at' => now(),
            'verified_by' => $admin->id,
            'catatan_verifikasi' => $request->input('catatan'),
            'aktif' => true,
        ]);

        return back()->with('sukses', "Akun {$user->name} berhasil diverifikasi!");
    }

    /**
     * Reject an account.
     */
    public function tolak(Request $request, User $user)
    {
        $request->validate([
            'catatan' => 'required|string|max:500',
        ], [
            'catatan.required' => 'Alasan penolakan wajib diisi.',
        ]);

        /** @var \App\Models\User $admin */
        $admin = Auth::user();

        $user->update([
            'status_verifikasi' => User::STATUS_DITOLAK,
            'verified_at' => now(),
            'verified_by' => $admin->id,
            'catatan_verifikasi' => $request->catatan,
        ]);

        return back()->with('sukses', "Akun {$user->name} ditolak.");
    }

    /**
     * View uploaded document.
     */
    public function lihatDokumen(User $user, string $tipe)
    {
        $field = match ($tipe) {
            'identitas' => 'dokumen_identitas',
            'cv' => 'dokumen_cv',
            'ijazah' => 'dokumen_ijazah',
            'sertifikat' => 'dokumen_sertifikat',
            default => abort(404),
        };

        $path = $user->{$field};

        if (!$path || !Storage::disk('public')->exists($path)) {
            abort(404, 'Dokumen tidak ditemukan.');
        }

        return response()->file(Storage::disk('public')->path($path));
    }
}
