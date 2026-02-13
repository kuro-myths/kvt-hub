<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use App\Models\KerjaSama;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function cari(Request $request)
    {
        $request->validate(['q' => 'required|string|min:2|max:100']);

        $q = $request->q;
        $hasil = [];

        // Cari di Berita
        $berita = Berita::terbit()
            ->where(function ($query) use ($q) {
                $query->where('judul', 'ilike', "%{$q}%")
                    ->orWhere('ringkasan', 'ilike', "%{$q}%");
            })
            ->take(5)
            ->get(['id', 'judul', 'slug', 'ringkasan', 'kategori']);

        foreach ($berita as $item) {
            $hasil[] = [
                'tipe' => 'berita',
                'judul' => $item->judul,
                'deskripsi' => $item->ringkasan ?? '',
                'url' => route('berita.tampilkan', $item->slug),
                'ikon' => 'fa-newspaper',
                'warna' => 'text-blue-400',
            ];
        }

        // Cari di Kelas
        $kelas = Kelas::where('status', 'aktif')
            ->where(function ($query) use ($q) {
                $query->where('nama', 'ilike', "%{$q}%")
                    ->orWhere('deskripsi', 'ilike', "%{$q}%")
                    ->orWhere('kategori', 'ilike', "%{$q}%");
            })
            ->take(5)
            ->get(['id', 'nama', 'deskripsi', 'kategori']);

        foreach ($kelas as $item) {
            $hasil[] = [
                'tipe' => 'kelas',
                'judul' => $item->nama,
                'deskripsi' => $item->deskripsi ?? $item->kategori ?? '',
                'url' => route('kelas.tampilkan', $item->id),
                'ikon' => 'fa-chalkboard',
                'warna' => 'text-green-400',
            ];
        }

        // Cari di Materi
        $materi = Materi::where('status', 'terbit')
            ->where(function ($query) use ($q) {
                $query->where('judul', 'ilike', "%{$q}%")
                    ->orWhere('deskripsi', 'ilike', "%{$q}%");
            })
            ->take(5)
            ->get(['id', 'judul', 'deskripsi', 'tipe']);

        foreach ($materi as $item) {
            $hasil[] = [
                'tipe' => 'materi',
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi ?? '',
                'url' => route('materi.tampilkan', $item->id),
                'ikon' => 'fa-book-open',
                'warna' => 'text-purple-400',
            ];
        }

        // Cari di Mitra/Sponsor
        $mitra = KerjaSama::aktif()
            ->where(function ($query) use ($q) {
                $query->where('nama', 'ilike', "%{$q}%")
                    ->orWhere('deskripsi', 'ilike', "%{$q}%");
            })
            ->take(3)
            ->get(['id', 'nama', 'slug', 'deskripsi', 'tipe']);

        foreach ($mitra as $item) {
            $hasil[] = [
                'tipe' => 'mitra',
                'judul' => $item->nama,
                'deskripsi' => $item->deskripsi ?? '',
                'url' => route('kerja-sama.tampilkan', $item->slug),
                'ikon' => 'fa-handshake',
                'warna' => 'text-yellow-400',
            ];
        }

        // Cari di halaman statis (pages array)
        $halamanStatis = [
            ['judul' => 'Jenjang Pendidikan', 'desk' => 'TK, SD, SMP, SMA, SMK, D1-D3, S1, S2, S3', 'url' => '/jenjang-pendidikan', 'ikon' => 'fa-graduation-cap', 'warna' => 'text-green-400'],
            ['judul' => 'Riset & Inovasi', 'desk' => 'Research Hub, jurnal, konferensi, paten', 'url' => '/riset-inovasi', 'ikon' => 'fa-microscope', 'warna' => 'text-purple-400'],
            ['judul' => 'Karir & Industri', 'desk' => 'Lowongan, magang, sertifikasi industri', 'url' => '/karir-industri', 'ikon' => 'fa-briefcase', 'warna' => 'text-orange-400'],
            ['judul' => 'Komunitas', 'desk' => 'Forum, study group, alumni network', 'url' => '/komunitas', 'ikon' => 'fa-users', 'warna' => 'text-pink-400'],
            ['judul' => 'Sertifikasi', 'desk' => 'Sertifikat gratis, verified, blockchain', 'url' => '/sertifikasi', 'ikon' => 'fa-award', 'warna' => 'text-amber-400'],
            ['judul' => 'Sumber Daya', 'desk' => 'E-Book, dataset, coding playground', 'url' => '/sumber-daya', 'ikon' => 'fa-database', 'warna' => 'text-cyan-400'],
            ['judul' => 'Keamanan', 'desk' => 'ISO 27001, COBIT 2019, enkripsi', 'url' => '/keamanan', 'ikon' => 'fa-shield-alt', 'warna' => 'text-red-400'],
            ['judul' => 'Penjamin Mutu', 'desk' => 'QA/QC, SPK, CRM, standar mutu', 'url' => '/penjamin-mutu', 'ikon' => 'fa-check-double', 'warna' => 'text-teal-400'],
            ['judul' => 'Tentang', 'desk' => 'Visi, misi, tim KVT Hub', 'url' => '/tentang', 'ikon' => 'fa-landmark', 'warna' => 'text-blue-400'],
        ];

        $ql = strtolower($q);
        foreach ($halamanStatis as $h) {
            if (str_contains(strtolower($h['judul']), $ql) || str_contains(strtolower($h['desk']), $ql)) {
                $hasil[] = [
                    'tipe' => 'halaman',
                    'judul' => $h['judul'],
                    'deskripsi' => $h['desk'],
                    'url' => $h['url'],
                    'ikon' => $h['ikon'],
                    'warna' => $h['warna'],
                ];
            }
        }

        return response()->json([
            'query' => $q,
            'total' => count($hasil),
            'hasil' => $hasil,
        ]);
    }
}
