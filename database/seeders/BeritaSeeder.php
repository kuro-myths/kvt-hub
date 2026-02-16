<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Seed data berita.
     */
    public function run(): void
    {
        if (Berita::count() > 0) {
            $this->command->info('  [~] Berita sudah ada, skip.');
            return;
        }

        $admin = User::where('peran', 'admin')->first();
        $penulisId = $admin?->id ?? 1;

        $beritaList = [
            [
                'judul' => 'KVT Hub v3.0 Resmi Diluncurkan dengan Fitur Real-Time Analytics',
                'ringkasan' => 'Versi terbaru KVT Hub hadir dengan fitur pelacakan pengunjung real-time, flag counter, news ticker langsung dari database, dan integrasi PostgreSQL.',
                'konten' => "KVT Hub versi 3.0 telah resmi diluncurkan dengan berbagai fitur baru yang revolusioner.\n\nFitur utama yang hadir di v3.0:\n\n1. Real-Time Visitor Analytics - Pantau pengunjung secara langsung dengan data yang diperbarui setiap 15 detik.\n\n2. Flag Counter - Widget yang menampilkan asal negara pengunjung lengkap dengan bendera, mirip dengan layanan flag counter populer.\n\n3. News Ticker - Berita terbaru berjalan otomatis di bagian atas halaman, diambil langsung dari database.\n\n4. PostgreSQL Integration - Migrasi dari MySQL ke PostgreSQL untuk performa dan keandalan yang lebih baik.\n\n5. Kerja Sama & Sponsor Hub - Halaman khusus untuk menampilkan mitra dan sponsor dengan sistem tier.\n\n6. Expanded Navigation - Menu header yang lebih lengkap dengan 12 item dan navigasi slider yang unik.\n\nSemua fitur ini dirancang untuk memberikan pengalaman yang lebih baik bagi pengguna dan administrator.",
                'kategori' => 'teknologi',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => true,
                'unggulan' => true,
                'penulis_id' => $penulisId,
                'terbit_pada' => now(),
            ],
            [
                'judul' => 'Program Beasiswa Riset Global 2025 Dibuka untuk Mahasiswa',
                'ringkasan' => 'KVT Hub membuka program beasiswa riset internasional bekerjasama dengan universitas-universitas terkemuka dunia.',
                'konten' => "Program beasiswa riset global 2025 telah resmi dibuka.\n\nProgram ini ditujukan untuk mahasiswa S2 dan S3 yang ingin melakukan penelitian lintas negara. Beasiswa mencakup biaya riset, living cost, dan akses ke laboratorium mitra.\n\nPersyaratan:\n- Mahasiswa aktif program S2 atau S3\n- IPK minimal 3.50\n- Proposal riset yang telah disetujui pembimbing\n- Kemampuan bahasa Inggris (TOEFL iBT 90+)\n\nBatas pendaftaran: 30 Juni 2025",
                'kategori' => 'akademik',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => true,
                'unggulan' => true,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subHours(3),
            ],
            [
                'judul' => 'Workshop Cybersecurity: Mengamankan Aplikasi Web Modern',
                'ringkasan' => 'Ikuti workshop intensif tentang keamanan aplikasi web dengan standar ISO 27001.',
                'konten' => "Workshop keamanan siber akan diadakan secara online selama 3 hari.\n\nMateri yang dibahas:\n- OWASP Top 10 vulnerabilities\n- Implementasi ISO 27001\n- Secure coding practices\n- Penetration testing basics\n- Incident response planning\n\nPembicara: Tim keamanan KVT Hub dan pakar dari industri.\n\nTanggal: 15-17 Maret 2025\nBiaya: GRATIS untuk anggota KVT Hub",
                'kategori' => 'keamanan',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subHours(6),
            ],
            [
                'judul' => 'Kompetisi Coding Nasional: KVT Code Challenge 2025',
                'ringkasan' => 'Kompetisi pemrograman terbesar yang diselenggarakan KVT Hub dengan hadiah total Rp 100 juta.',
                'konten' => "KVT Code Challenge 2025 akan menjadi kompetisi coding terbesar yang pernah diselenggarakan.\n\nKategori lomba:\n1. Web Development (Full Stack)\n2. Mobile App Development\n3. AI/Machine Learning\n4. Cybersecurity CTF\n\nHadiah:\n- Juara 1: Rp 30.000.000 + Sertifikat + Magang\n- Juara 2: Rp 20.000.000 + Sertifikat\n- Juara 3: Rp 10.000.000 + Sertifikat\n\nPendaftaran dibuka sekarang!",
                'kategori' => 'event',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => true,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subHours(12),
            ],
            [
                'judul' => 'Alumni KVT Hub Raih Penghargaan Forbes 30 Under 30 Asia',
                'ringkasan' => 'Tiga alumni KVT Hub masuk daftar Forbes 30 Under 30 Asia 2025 di kategori Technology dan Education.',
                'konten' => "Tiga alumni KVT Hub berhasil meraih penghargaan bergengsi Forbes 30 Under 30 Asia 2025.\n\nMereka adalah:\n1. Rina Kusuma - Founder startup EdTech di Singapura\n2. Andi Wijaya - CTO perusahaan AI di Jakarta\n3. Dina Pratiwi - Peneliti AI di MIT\n\nKetiganya merupakan alumni program Fast Track Career KVT Hub dan telah berkontribusi besar di bidang masing-masing.",
                'kategori' => 'prestasi',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => true,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDay(),
            ],
            [
                'judul' => 'Panduan Lengkap: Memulai Karir di Bidang Data Science',
                'ringkasan' => 'Roadmap komprehensif untuk memulai karir sebagai Data Scientist, dari pemula hingga profesional.',
                'konten' => "Data Science menjadi salah satu profesi paling dicari saat ini.\n\nRoadmap yang direkomendasikan:\n\n1. Fondasi Matematika & Statistik\n2. Pemrograman Python/R\n3. SQL & Database Management\n4. Machine Learning Fundamentals\n5. Deep Learning & Neural Networks\n6. Data Visualization (Tableau/PowerBI)\n7. Big Data Technologies (Spark, Hadoop)\n8. Cloud Computing (AWS/GCP/Azure)\n\nKVT Hub menyediakan kelas lengkap untuk setiap tahap di roadmap ini.",
                'kategori' => 'karir',
                'status' => 'terbit',
                'tampil_ticker' => false,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(2),
            ],
            [
                'judul' => 'Kelas Baru: React.js & Next.js Advanced Patterns',
                'ringkasan' => 'Kelas baru yang membahas advanced patterns di React.js dan Next.js untuk membangun aplikasi web skala besar.',
                'konten' => "Kelas baru telah tersedia di platform KVT Hub!\n\nTopik yang dibahas:\n- Server Components & Streaming SSR\n- Advanced State Management (Zustand, Jotai)\n- Optimistic Updates & Cache Management\n- Custom Hooks Patterns\n- Performance Optimization\n- Testing Strategies\n\nKelas ini cocok untuk developer yang sudah memahami dasar React dan ingin meningkatkan skill ke level lanjut.",
                'kategori' => 'teknologi',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(3),
            ],
            [
                'judul' => 'Pengumuman: Jadwal Ujian Sertifikasi Q1 2025',
                'ringkasan' => 'Jadwal ujian sertifikasi profesional kuartal pertama 2025 telah dirilis.',
                'konten' => "Jadwal ujian sertifikasi Q1 2025:\n\n- AWS Certified Solutions Architect: 15 Januari\n- Google Cloud Professional: 22 Januari\n- Certified Ethical Hacker (CEH): 5 Februari\n- CISCO CCNA: 12 Februari\n- CompTIA Security+: 26 Februari\n- PMP (Project Management): 5 Maret\n\nDaftar sekarang melalui halaman Sertifikasi di KVT Hub.",
                'kategori' => 'pengumuman',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(4),
            ],
            [
                'judul' => 'KVT Hub Raih Penghargaan Best EdTech Platform 2025',
                'ringkasan' => 'KVT Hub meraih penghargaan sebagai platform edukasi teknologi terbaik se-Asia Tenggara.',
                'konten' => "KVT Hub berhasil meraih penghargaan Best EdTech Platform 2025 pada acara ASEAN Digital Education Summit.\n\nPenghargaan ini diberikan atas inovasi dalam pembelajaran digital berbasis gamifikasi, integrasi kurikulum nasional, dan sistem analitik real-time yang canggih.",
                'kategori' => 'prestasi',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => true,
                'unggulan' => true,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(5),
            ],
            [
                'judul' => 'Webinar Gratis: Mengenal Blockchain & Web3 untuk Pemula',
                'ringkasan' => 'Webinar gratis membahas teknologi blockchain, cryptocurrency, dan Web3.',
                'konten' => "Yuk ikuti webinar gratis tentang Blockchain & Web3!\n\nTopik:\n- Apa itu Blockchain?\n- Smart Contract & Ethereum\n- NFT & DeFi\n- Karir di Web3\n\nPembicara: Tim Developer KVT Hub\nWaktu: Sabtu, 22 Maret 2025 pukul 10:00 WIB\nPlatform: Google Meet",
                'kategori' => 'event',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(6),
            ],
            [
                'judul' => 'Tips Sukses Interview Magang di Perusahaan Tech',
                'ringkasan' => 'Kiat-kiat efektif untuk mempersiapkan diri menghadapi interview magang di perusahaan teknologi.',
                'konten' => "Persiapan terbaik untuk interview magang:\n\n1. Kuasai DSA (Data Structures & Algorithms)\n2. Bangun portfolio proyek di GitHub\n3. Pelajari system design dasar\n4. Latih behavioral interview\n5. Riset perusahaan target\n\nGunakan fitur Karir di KVT Hub untuk latihan interview.",
                'kategori' => 'karir',
                'status' => 'terbit',
                'tampil_ticker' => false,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(7),
            ],
            [
                'judul' => 'Pembaruan Sistem: Migrasi Database ke PostgreSQL',
                'ringkasan' => 'KVT Hub telah berhasil melakukan migrasi database untuk performa yang lebih baik.',
                'konten' => "Pemberitahuan penting: KVT Hub telah berhasil melakukan migrasi database dari MySQL ke PostgreSQL.\n\nKeuntungan:\n- Performa query 3x lebih cepat\n- Dukungan JSONB untuk data fleksibel\n- Keamanan data lebih baik\n- Full-text search native",
                'kategori' => 'teknologi',
                'status' => 'terbit',
                'tampil_ticker' => false,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(10),
            ],
            [
                'judul' => 'Program Mentor-Mentee KVT Hub Season 3',
                'ringkasan' => 'Program mentoring musim ketiga dibuka untuk semua anggota KVT Hub.',
                'konten' => "Program Mentor-Mentee Season 3 telah dibuka!\n\nProgram ini menghubungkan mentor berpengalaman dengan mentee yang ingin belajar. Topik: Web Dev, Mobile, AI/ML, Data Science, Cybersecurity.\n\nDurasi: 3 bulan\nFormat: 1-on-1 online session\nBiaya: GRATIS",
                'kategori' => 'akademik',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(12),
            ],
            [
                'judul' => 'Kelas Baru: IoT dengan Arduino & Raspberry Pi',
                'ringkasan' => 'Kelas Internet of Things baru tersedia dengan praktik langsung menggunakan Arduino dan Raspberry Pi.',
                'konten' => "Kelas IoT baru hadir di KVT Hub!\n\nMateri:\n- Pengenalan IoT & Embedded Systems\n- Arduino Programming\n- Raspberry Pi Setup\n- Sensor & Aktuator\n- MQTT Protocol\n- Cloud IoT Platform\n\nLengkap dengan kit praktik yang dikirim ke rumah!",
                'kategori' => 'teknologi',
                'status' => 'terbit',
                'tampil_ticker' => true,
                'tampil_popup' => false,
                'unggulan' => false,
                'penulis_id' => $penulisId,
                'terbit_pada' => now()->subDays(14),
            ],
        ];

        foreach ($beritaList as $b) {
            Berita::create($b);
        }

        $this->command->info('  [✓] Berita seeder selesai');
    }
}
