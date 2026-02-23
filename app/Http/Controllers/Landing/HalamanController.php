<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\KuroCerita;
use App\Models\KarakterCerita;

class HalamanController extends Controller
{
    public function jenjang()
    {
        return view('halaman.jenjang-pendidikan');
    }

    public function platform()
    {
        $fitur = [
            ['ikon' => 'fas fa-graduation-cap', 'judul' => 'Pembelajaran Interaktif', 'deskripsi' => 'Kelas online dengan materi multimedia dan kuis interaktif.'],
            ['ikon' => 'fas fa-chart-line', 'judul' => 'Tracking Progress', 'deskripsi' => 'Pantau kemajuan belajar secara real-time dengan dashboard.'],
            ['ikon' => 'fas fa-users', 'judul' => 'Komunitas Aktif', 'deskripsi' => 'Bergabung dengan komunitas pelajar dan pengajar se-Indonesia.'],
            ['ikon' => 'fas fa-certificate', 'judul' => 'Sertifikasi', 'deskripsi' => 'Dapatkan sertifikat kompetensi yang diakui industri.'],
        ];
        return view('halaman.platform', compact('fitur'));
    }

    public function tentang()
    {
        return view('halaman.tentang');
    }

    public function riset()
    {
        return view('halaman.riset-inovasi');
    }

    public function karir()
    {
        return view('halaman.karir-industri');
    }

    public function komunitas()
    {
        return view('halaman.komunitas');
    }

    public function sertifikasi()
    {
        return view('halaman.sertifikasi');
    }

    public function langganan()
    {
        return view('halaman.langganan');
    }

    public function sumberdaya()
    {
        return view('halaman.sumber-daya');
    }

    public function keamanan()
    {
        return view('halaman.keamanan');
    }

    public function kurikulum()
    {
        return view('halaman.kurikulum');
    }

    public function panduan()
    {
        return view('halaman.alur-panduan');
    }

    public function media()
    {
        return view('halaman.media');
    }

    public function dokumen()
    {
        return view('halaman.dokumen');
    }

    public function bantuan()
    {
        return view('halaman.bantuan');
    }

    public function statistik()
    {
        return view('halaman.statistik');
    }

    public function akun()
    {
        return view('halaman.akun');
    }

    // ===== MENU 22-40 (New Landing Pages) =====

    public function webinar()
    {
        return view('halaman.webinar');
    }

    public function beasiswa()
    {
        return view('halaman.beasiswa');
    }

    public function laboratorium()
    {
        return view('halaman.laboratorium');
    }

    public function perpustakaan()
    {
        return view('halaman.perpustakaan');
    }

    public function forum()
    {
        return view('halaman.forum');
    }

    public function mentoring()
    {
        return view('halaman.mentoring');
    }

    public function magang()
    {
        return view('halaman.magang');
    }

    public function alumni()
    {
        return view('halaman.alumni');
    }

    public function portofolio()
    {
        return view('halaman.portofolio');
    }

    public function kompetisi()
    {
        return view('halaman.kompetisi');
    }

    public function workshop()
    {
        return view('halaman.workshop');
    }

    public function jurnal()
    {
        return view('halaman.jurnal');
    }

    public function podcast()
    {
        return view('halaman.podcast');
    }

    public function pelatihan()
    {
        return view('halaman.pelatihan');
    }

    public function konsultasi()
    {
        return view('halaman.konsultasi');
    }

    public function eLearning()
    {
        return view('halaman.e-learning');
    }

    public function akreditasi()
    {
        return view('halaman.akreditasi');
    }

    public function galeri()
    {
        return view('halaman.galeri');
    }

    public function pengumuman()
    {
        return view('halaman.pengumuman');
    }

    public function kuro()
    {
        $chapters = KuroCerita::terbit()->urutChapter()->get();
        return view('halaman.kuro', compact('chapters'));
    }

    public function bejotaro()
    {
        $chapters = KarakterCerita::ceritaKarakter('bejotaro');
        return view('halaman.bejotaro', compact('chapters'));
    }

    public function veteran()
    {
        $chapters = KarakterCerita::ceritaKarakter('veteran');
        return view('halaman.veteran', compact('chapters'));
    }
}
