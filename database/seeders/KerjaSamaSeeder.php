<?php

namespace Database\Seeders;

use App\Models\KerjaSama;
use Illuminate\Database\Seeder;

class KerjaSamaSeeder extends Seeder
{
    /**
     * Seed data kerja sama / sponsor.
     */
    public function run(): void
    {
        if (KerjaSama::count() > 0) {
            $this->command->info('  [~] Kerja Sama sudah ada, skip.');
            return;
        }

        $mitraList = [
            ['nama' => 'Google for Education', 'deskripsi' => 'Program Google for Education menyediakan tools dan sumber daya untuk meningkatkan kualitas pembelajaran digital.', 'website' => 'https://edu.google.com', 'tipe' => 'sponsor', 'tier' => 'platinum', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 1],
            ['nama' => 'Microsoft Education', 'deskripsi' => 'Microsoft Education mendukung transformasi digital pendidikan melalui teknologi Azure dan Microsoft 365.', 'website' => 'https://education.microsoft.com', 'tipe' => 'sponsor', 'tier' => 'platinum', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 2],
            ['nama' => 'AWS Educate', 'deskripsi' => 'Amazon Web Services menyediakan kredit cloud computing dan materi pembelajaran untuk siswa dan guru.', 'website' => 'https://aws.amazon.com/education', 'tipe' => 'sponsor', 'tier' => 'gold', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 3],
            ['nama' => 'Universitas Indonesia', 'deskripsi' => 'Kerjasama riset dan pertukaran akademik dengan Universitas Indonesia.', 'website' => 'https://ui.ac.id', 'tipe' => 'mitra_akademik', 'tier' => 'gold', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 4],
            ['nama' => 'Institut Teknologi Bandung', 'deskripsi' => 'Kerjasama program riset teknologi dan inovasi dengan ITB.', 'website' => 'https://itb.ac.id', 'tipe' => 'mitra_akademik', 'tier' => 'gold', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 5],
            ['nama' => 'Tokopedia', 'deskripsi' => 'Program magang dan rekrutmen untuk alumni KVT Hub di bidang teknologi.', 'website' => 'https://tokopedia.com', 'tipe' => 'mitra_industri', 'tier' => 'silver', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 6],
            ['nama' => 'Gojek', 'deskripsi' => 'Kerjasama pengembangan talenta digital dan program mentorship.', 'website' => 'https://gojek.com', 'tipe' => 'mitra_industri', 'tier' => 'silver', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 7],
            ['nama' => 'Dicoding Indonesia', 'deskripsi' => 'Platform belajar developer Indonesia. Kolaborasi konten dan sertifikasi.', 'website' => 'https://dicoding.com', 'tipe' => 'media_partner', 'tier' => 'bronze', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 8],
            ['nama' => 'Komunitas Developer Bandung', 'deskripsi' => 'Komunitas developer aktif di Bandung yang rutin mengadakan meetup dan workshop.', 'website' => 'https://devbandung.id', 'tipe' => 'komunitas', 'tier' => 'community', 'aktif' => true, 'tampil_beranda' => false, 'urutan' => 9],
            ['nama' => 'GitHub Education', 'deskripsi' => 'GitHub Student Developer Pack dan tools untuk pendidikan.', 'website' => 'https://education.github.com', 'tipe' => 'sponsor', 'tier' => 'silver', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 10],
            ['nama' => 'JetBrains Educational License', 'deskripsi' => 'Lisensi gratis IDE JetBrains untuk mahasiswa dan pengajar. IntelliJ IDEA, PhpStorm, WebStorm.', 'website' => 'https://www.jetbrains.com/education', 'tipe' => 'sponsor', 'tier' => 'gold', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 11],
            ['nama' => 'Universitas Gadjah Mada', 'deskripsi' => 'Kerjasama riset dan pertukaran mahasiswa dengan UGM.', 'website' => 'https://ugm.ac.id', 'tipe' => 'mitra_akademik', 'tier' => 'gold', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 12],
            ['nama' => 'Bukalapak', 'deskripsi' => 'Program tech talent pipeline dan hackathon bersama Bukalapak.', 'website' => 'https://bukalapak.com', 'tipe' => 'mitra_industri', 'tier' => 'silver', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 13],
            ['nama' => 'DigitalOcean for Education', 'deskripsi' => 'Kredit cloud computing dan sumber belajar DevOps dari DigitalOcean.', 'website' => 'https://www.digitalocean.com/community/students', 'tipe' => 'sponsor', 'tier' => 'silver', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 14],
            ['nama' => 'Bangkit Academy by Google', 'deskripsi' => 'Kolaborasi program Bangkit Academy untuk pengembangan talenta digital Indonesia.', 'website' => 'https://grow.google/intl/id_id/bangkit', 'tipe' => 'mitra_akademik', 'tier' => 'platinum', 'aktif' => true, 'tampil_beranda' => true, 'urutan' => 15],
        ];

        foreach ($mitraList as $m) {
            KerjaSama::create($m);
        }

        $this->command->info('  [✓] Kerja Sama seeder selesai');
    }
}
