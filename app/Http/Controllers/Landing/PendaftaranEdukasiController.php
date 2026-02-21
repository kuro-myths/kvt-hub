<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\AturanEdukasi;
use App\Models\EdukasiGratis;
use App\Models\PendaftaranEdukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranEdukasiController extends Controller
{
    /**
     * Halaman form pendaftaran edukasi
     */
    public function buat(EdukasiGratis $edukasiGratis)
    {
        if (!$edukasiGratis->aktif) {
            abort(404);
        }

        // Cek apakah sudah pernah mendaftar
        $sudahDaftar = null;
        if (Auth::check()) {
            $sudahDaftar = PendaftaranEdukasi::where('user_id', Auth::id())
                ->where('edukasi_gratis_id', $edukasiGratis->id)
                ->first();
        }

        $jenjangList = PendaftaranEdukasi::daftarJenjang();

        // Prasyarat berdasarkan kategori
        $prasyarat = self::getPrasyarat($edukasiGratis);

        // Aturan & peringatan
        $aturan = AturanEdukasi::aktif()
            ->untukProgram($edukasiGratis->id)
            ->orderByRaw("CASE tipe WHEN 'larangan' THEN 1 WHEN 'peringatan' THEN 2 WHEN 'prosedur' THEN 3 WHEN 'tips' THEN 4 END")
            ->orderBy('urutan')
            ->get();

        return view('halaman.pendaftaran-edukasi', compact(
            'edukasiGratis', 'sudahDaftar', 'jenjangList', 'prasyarat', 'aturan'
        ));
    }

    /**
     * Proses simpan pendaftaran
     */
    public function simpan(Request $request, EdukasiGratis $edukasiGratis)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'institusi' => 'nullable|string|max:255',
            'jenjang' => 'nullable|string|max:50',
            'motivasi' => 'nullable|string|max:2000',
            'prasyarat_status' => 'nullable|array',
            'dokumen_identitas' => 'nullable|image|max:3072',
            'dokumen_pendukung' => 'nullable|file|max:5120',
            'foto_selfie' => 'nullable|image|max:3072',
            'lokasi_kota' => 'nullable|string|max:100',
            'lokasi_provinsi' => 'nullable|string|max:100',
            'lokasi_lat' => 'nullable|numeric',
            'lokasi_lng' => 'nullable|numeric',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cek duplikat
        $ada = PendaftaranEdukasi::where('user_id', $user->id)
            ->where('edukasi_gratis_id', $edukasiGratis->id)
            ->exists();

        if ($ada) {
            return back()->with('gagal', 'Anda sudah terdaftar pada program ini!');
        }

        $data = $request->only([
            'nama_lengkap', 'email', 'telepon', 'institusi', 'jenjang',
            'motivasi', 'prasyarat_status', 'lokasi_kota', 'lokasi_provinsi',
            'lokasi_lat', 'lokasi_lng',
        ]);

        $data['user_id'] = $user->id;
        $data['edukasi_gratis_id'] = $edukasiGratis->id;
        $data['status'] = 'menunggu';

        // Upload dokumen
        if ($request->hasFile('dokumen_identitas')) {
            $data['dokumen_identitas'] = $request->file('dokumen_identitas')->store('pendaftaran/identitas', 'public');
        }
        if ($request->hasFile('dokumen_pendukung')) {
            $data['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('pendaftaran/pendukung', 'public');
        }
        if ($request->hasFile('foto_selfie')) {
            $data['foto_selfie'] = $request->file('foto_selfie')->store('pendaftaran/selfie', 'public');
        }

        PendaftaranEdukasi::create($data);

        return redirect()->route('edukasi-gratis.tampilkan', $edukasiGratis)
            ->with('sukses', 'Pendaftaran berhasil dikirim! Silakan menunggu verifikasi dari admin.');
    }

    /**
     * Riwayat pendaftaran user
     */
    public function riwayat()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $pendaftaran = PendaftaranEdukasi::with('edukasiGratis')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $statusList = PendaftaranEdukasi::daftarStatus();

        return view('halaman.riwayat-pendaftaran', compact('pendaftaran', 'statusList'));
    }

    /**
     * Dapatkan prasyarat berdasarkan kategori edukasi
     */
    private static function getPrasyarat(EdukasiGratis $edukasi): array
    {
        $prasyaratUmum = [
            'Memiliki akun email aktif',
            'Bersedia mengikuti ketentuan program',
            'Data yang diisi valid dan benar',
        ];

        $prasyaratKategori = match ($edukasi->kategori) {
            'tools' => [
                'Memiliki akun GitHub atau platform terkait',
                'Status sebagai pelajar/mahasiswa aktif',
                'Dokumen identitas pelajar (KTM/kartu pelajar)',
            ],
            'cloud' => [
                'Memiliki email institusi pendidikan (.ac.id / .edu)',
                'Belum pernah menggunakan free tier sebelumnya',
                'Pemahaman dasar cloud computing (opsional)',
            ],
            'design' => [
                'Memiliki perangkat yang mendukung',
                'Status sebagai pelajar/mahasiswa aktif',
                'Portfolio dasar (opsional)',
            ],
            'dev' => [
                'Pemahaman dasar pemrograman',
                'Memiliki komputer/laptop',
                'Instalasi code editor (VS Code, dll)',
            ],
            'ai' => [
                'Pengetahuan dasar Python (direkomendasikan)',
                'Memiliki akun Google/GitHub',
                'Koneksi internet stabil',
            ],
            'pendidikan' => [
                'Terdaftar sebagai pelajar aktif',
                'Rekomendasi dari guru/dosen (opsional)',
                'Nilai akademik memadai',
            ],
            'sertifikasi' => [
                'Pengalaman di bidang terkait (minimal dasar)',
                'Email institusi/perusahaan',
                'Komitmen menyelesaikan sertifikasi',
            ],
            default => [
                'Tidak ada prasyarat khusus',
            ],
        };

        return array_merge($prasyaratUmum, $prasyaratKategori);
    }
}
