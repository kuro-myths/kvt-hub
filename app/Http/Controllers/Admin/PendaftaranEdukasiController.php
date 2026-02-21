<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranEdukasi;
use App\Models\EdukasiGratis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranEdukasiController extends Controller
{
    public function index(Request $request)
    {
        $query = PendaftaranEdukasi::with(['pengguna', 'edukasiGratis'])->latest();

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('nama_lengkap', 'ilike', '%' . $cari . '%')
                  ->orWhere('email', 'ilike', '%' . $cari . '%')
                  ->orWhere('institusi', 'ilike', '%' . $cari . '%');
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }
        if ($request->filled('edukasi')) {
            $query->where('edukasi_gratis_id', $request->edukasi);
        }

        $pendaftaran = $query->paginate(15)->withQueryString();
        $statusList = PendaftaranEdukasi::daftarStatus();
        $jenjangList = PendaftaranEdukasi::daftarJenjang();
        $edukasiList = EdukasiGratis::aktif()->orderBy('judul')->get(['id', 'judul']);

        // Statistik
        $stats = [
            'total' => PendaftaranEdukasi::count(),
            'menunggu' => PendaftaranEdukasi::menunggu()->count(),
            'disetujui' => PendaftaranEdukasi::disetujui()->count(),
            'ditolak' => PendaftaranEdukasi::ditolak()->count(),
        ];

        return view('akun.admin.pendaftaran-edukasi', compact(
            'pendaftaran', 'statusList', 'jenjangList', 'edukasiList', 'stats'
        ));
    }

    public function tampilkan(PendaftaranEdukasi $pendaftaranEdukasi)
    {
        $pendaftaranEdukasi->load(['pengguna', 'edukasiGratis', 'verifikator']);
        return response()->json($pendaftaranEdukasi);
    }

    public function ubahStatus(Request $request, PendaftaranEdukasi $pendaftaranEdukasi)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diverifikasi,disetujui,ditolak,selesai',
            'catatan_admin' => 'nullable|string|max:1000',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $pendaftaranEdukasi->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
            'diverifikasi_pada' => in_array($request->status, ['diverifikasi', 'disetujui', 'ditolak', 'selesai']) ? now() : null,
            'diverifikasi_oleh' => $user->id,
            'notifikasi_terakhir' => now(),
        ]);

        return back()->with('sukses', 'Status pendaftaran berhasil diperbarui!');
    }

    public function hapus(PendaftaranEdukasi $pendaftaranEdukasi)
    {
        // Hapus file dokumen jika ada
        $fields = ['dokumen_identitas', 'dokumen_pendukung', 'foto_selfie'];
        foreach ($fields as $field) {
            if ($pendaftaranEdukasi->$field && \Storage::disk('public')->exists($pendaftaranEdukasi->$field)) {
                \Storage::disk('public')->delete($pendaftaranEdukasi->$field);
            }
        }

        $pendaftaranEdukasi->delete();
        return back()->with('sukses', 'Pendaftaran berhasil dihapus!');
    }

    public function kirimNotifikasi(PendaftaranEdukasi $pendaftaranEdukasi)
    {
        // Update notifikasi terakhir (notifikasi simple via timestamp)
        $pendaftaranEdukasi->update([
            'notifikasi_terakhir' => now(),
        ]);

        return back()->with('sukses', 'Notifikasi berhasil dikirim ke pendaftar!');
    }
}
