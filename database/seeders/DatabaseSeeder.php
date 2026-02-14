<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\KunciAdmin;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\PaketEksklusif;
use App\Models\Pencapaian;
use App\Models\Berita;
use App\Models\KerjaSama;
use App\Models\Pengunjung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== ADMIN =====
        $admin = User::create([
            'name' => 'Admin KVT',
            'email' => 'admin@kvthub.id',
            'password' => Hash::make('admin123'),
            'peran' => 'admin',
            'level' => 100,
            'xp' => 0,
            'xp_total' => 990000,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== KUNCI ADMIN =====
        $kunciAktif = KunciAdmin::create([
            'kunci' => 'KVT-ADMIN-2025-SECRET',
            'deskripsi' => 'Kunci admin utama',
            'digunakan' => false,
        ]);

        KunciAdmin::create([
            'kunci' => 'KVT-' . strtoupper(Str::random(16)),
            'deskripsi' => 'Kunci admin cadangan',
            'digunakan' => false,
        ]);

        // ===== GURU =====
        $guru = User::create([
            'name' => 'Guru Demo',
            'email' => 'guru@kvthub.id',
            'password' => Hash::make('guru123'),
            'peran' => 'guru',
            'level' => 25,
            'xp' => 50,
            'xp_total' => 2550,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== SISWA =====
        $siswa = User::create([
            'name' => 'Siswa Demo',
            'email' => 'siswa@kvthub.id',
            'password' => Hash::make('siswa123'),
            'peran' => 'siswa',
            'level' => 5,
            'xp' => 30,
            'xp_total' => 530,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== KELAS =====
        $kelas1 = Kelas::create([
            'nama' => 'Belajar Laravel dari Nol',
            'deskripsi' => 'Pelajari framework Laravel dari dasar hingga mahir. Cocok untuk pemula yang ingin membangun aplikasi web modern.',
            'gambar' => 'images/kelas.png',
            'guru_id' => $guru->id,
            'kode_kelas' => 'LRV-' . strtoupper(Str::random(6)),
        ]);

        $kelas2 = Kelas::create([
            'nama' => 'Dasar Pemrograman Python',
            'deskripsi' => 'Mulai perjalanan coding Anda dengan Python. Bahasa pemrograman yang mudah dipelajari dan sangat powerful.',
            'gambar' => 'images/lab.png',
            'guru_id' => $guru->id,
            'kode_kelas' => 'PYT-' . strtoupper(Str::random(6)),
        ]);

        $kelas3 = Kelas::create([
            'nama' => 'Desain UI/UX Modern',
            'deskripsi' => 'Pelajari prinsip desain antarmuka yang indah dan pengalaman pengguna yang menyenangkan.',
            'gambar' => 'images/pratek.png',
            'guru_id' => $guru->id,
            'kode_kelas' => 'UIX-' . strtoupper(Str::random(6)),
        ]);

        // Siswa gabung kelas
        $kelas1->anggota()->attach($siswa->id);

        // ===== MATERI =====
        Materi::create([
            'judul' => 'Pengenalan Laravel & MVC',
            'konten' => 'Laravel adalah framework PHP yang menggunakan pola arsitektur MVC (Model-View-Controller). Dalam pelajaran ini kita akan memahami konsep dasar MVC dan bagaimana Laravel mengimplementasikannya.',
            'tipe' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'kelas_id' => $kelas1->id,
            'guru_id' => $guru->id,
            'urutan' => 1,
            'xp_reward' => 25,
            'status' => 'terbit',
        ]);

        Materi::create([
            'judul' => 'Routing & Controller',
            'konten' => 'Pelajari cara membuat route dan controller di Laravel. Route menghubungkan URL ke controller yang tepat, sedangkan controller berisi logika aplikasi.',
            'tipe' => 'artikel',
            'kelas_id' => $kelas1->id,
            'guru_id' => $guru->id,
            'urutan' => 2,
            'xp_reward' => 20,
            'status' => 'terbit',
        ]);

        Materi::create([
            'judul' => 'Database & Eloquent ORM',
            'konten' => 'Eloquent adalah ORM (Object-Relational Mapping) bawaan Laravel yang membuat interaksi dengan database menjadi sangat mudah dan ekspresif.',
            'tipe' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'kelas_id' => $kelas1->id,
            'guru_id' => $guru->id,
            'urutan' => 3,
            'xp_reward' => 30,
            'status' => 'terbit',
        ]);

        // ===== PAKET EKSKLUSIF =====
        PaketEksklusif::create([
            'nama' => 'Paket Starter',
            'deskripsi' => 'Akses dasar ke semua materi dan kelas public.',
            'harga' => 49000,
            'durasi_hari' => 30,
            'fitur' => "Akses semua kelas public\nDownload materi offline\nSertifikat digital",
            'xp_bonus' => 50,
            'aktif' => true,
        ]);

        PaketEksklusif::create([
            'nama' => 'Paket Pro',
            'deskripsi' => 'Akses penuh ke semua fitur premium KVT Hub.',
            'harga' => 149000,
            'durasi_hari' => 90,
            'fitur' => "Semua fitur Starter\nAkses kelas eksklusif\nKonsultasi dengan guru\nBadge Pro di profil\nPrioritas support",
            'xp_bonus' => 200,
            'aktif' => true,
        ]);

        PaketEksklusif::create([
            'nama' => 'Paket Ultimate',
            'deskripsi' => 'Pengalaman belajar tanpa batas dengan semua fitur terbuka.',
            'harga' => 299000,
            'durasi_hari' => 365,
            'fitur' => "Semua fitur Pro\nAkses seumur hidup\nMentor pribadi\nSertifikat premium\nEarly access fitur baru\nKomunitas eksklusif",
            'xp_bonus' => 500,
            'aktif' => true,
        ]);

        // ===== PENCAPAIAN =====
        $pencapaianList = [
            ['nama' => 'Langkah Pertama', 'deskripsi' => 'Gabung kelas pertama', 'ikon' => 'fa-shoe-prints', 'xp_syarat' => 10],
            ['nama' => 'Pemula Rajin', 'deskripsi' => 'Selesaikan 5 materi', 'ikon' => 'fa-book-reader', 'xp_syarat' => 25],
            ['nama' => 'Quiz Master', 'deskripsi' => 'Lulus 10 kuis dengan skor 100%', 'ikon' => 'fa-brain', 'xp_syarat' => 50],
            ['nama' => 'Iron Will', 'deskripsi' => 'Capai rank Iron', 'ikon' => 'fa-shield-alt', 'xp_syarat' => 30, 'level_syarat' => 20],
            ['nama' => 'Gold Rush', 'deskripsi' => 'Capai rank Gold', 'ikon' => 'fa-crown', 'xp_syarat' => 100, 'level_syarat' => 50],
            ['nama' => 'Grandmaster', 'deskripsi' => 'Capai level 100', 'ikon' => 'fa-trophy', 'xp_syarat' => 500, 'level_syarat' => 100],
            ['nama' => 'Social Butterfly', 'deskripsi' => 'Gabung 10 kelas', 'ikon' => 'fa-users', 'xp_syarat' => 40],
            ['nama' => 'Night Owl', 'deskripsi' => 'Belajar setelah jam 10 malam', 'ikon' => 'fa-moon', 'xp_syarat' => 15],
        ];

        foreach ($pencapaianList as $p) {
            Pencapaian::create($p);
        }

        // ===== BERITA (v3.0) =====
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
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
                'penulis_id' => $admin->id,
                'terbit_pada' => now()->subDays(4),
            ],
        ];

        foreach ($beritaList as $b) {
            Berita::create($b);
        }

        // ===== KERJA SAMA / SPONSOR (v3.0) =====
        $mitraList = [
            [
                'nama' => 'Google for Education',
                'deskripsi' => 'Program Google for Education menyediakan tools dan sumber daya untuk meningkatkan kualitas pembelajaran digital.',
                'website' => 'https://edu.google.com',
                'tipe' => 'sponsor',
                'tier' => 'platinum',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 1,
            ],
            [
                'nama' => 'Microsoft Education',
                'deskripsi' => 'Microsoft Education mendukung transformasi digital pendidikan melalui teknologi Azure dan Microsoft 365.',
                'website' => 'https://education.microsoft.com',
                'tipe' => 'sponsor',
                'tier' => 'platinum',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 2,
            ],
            [
                'nama' => 'AWS Educate',
                'deskripsi' => 'Amazon Web Services menyediakan kredit cloud computing dan materi pembelajaran untuk siswa dan guru.',
                'website' => 'https://aws.amazon.com/education',
                'tipe' => 'sponsor',
                'tier' => 'gold',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 3,
            ],
            [
                'nama' => 'Universitas Indonesia',
                'deskripsi' => 'Kerjasama riset dan pertukaran akademik dengan Universitas Indonesia.',
                'website' => 'https://ui.ac.id',
                'tipe' => 'mitra_akademik',
                'tier' => 'gold',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 4,
            ],
            [
                'nama' => 'Institut Teknologi Bandung',
                'deskripsi' => 'Kerjasama program riset teknologi dan inovasi dengan ITB.',
                'website' => 'https://itb.ac.id',
                'tipe' => 'mitra_akademik',
                'tier' => 'gold',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 5,
            ],
            [
                'nama' => 'Tokopedia',
                'deskripsi' => 'Program magang dan rekrutmen untuk alumni KVT Hub di bidang teknologi.',
                'website' => 'https://tokopedia.com',
                'tipe' => 'mitra_industri',
                'tier' => 'silver',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 6,
            ],
            [
                'nama' => 'Gojek',
                'deskripsi' => 'Kerjasama pengembangan talenta digital dan program mentorship.',
                'website' => 'https://gojek.com',
                'tipe' => 'mitra_industri',
                'tier' => 'silver',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 7,
            ],
            [
                'nama' => 'Dicoding Indonesia',
                'deskripsi' => 'Platform belajar developer Indonesia. Kolaborasi konten dan sertifikasi.',
                'website' => 'https://dicoding.com',
                'tipe' => 'media_partner',
                'tier' => 'bronze',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 8,
            ],
            [
                'nama' => 'Komunitas Developer Bandung',
                'deskripsi' => 'Komunitas developer aktif di Bandung yang rutin mengadakan meetup dan workshop.',
                'website' => 'https://devbandung.id',
                'tipe' => 'komunitas',
                'tier' => 'community',
                'aktif' => true,
                'tampil_beranda' => false,
                'urutan' => 9,
            ],
            [
                'nama' => 'GitHub Education',
                'deskripsi' => 'GitHub Student Developer Pack dan tools untuk pendidikan.',
                'website' => 'https://education.github.com',
                'tipe' => 'sponsor',
                'tier' => 'silver',
                'aktif' => true,
                'tampil_beranda' => true,
                'urutan' => 10,
            ],
        ];

        foreach ($mitraList as $m) {
            KerjaSama::create($m);
        }

        // ===== SAMPLE PENGUNJUNG (v3.0) =====
        $negaraList = [
            ['Indonesia', 'ID'],
            ['United States', 'US'],
            ['Japan', 'JP'],
            ['Germany', 'DE'],
            ['Malaysia', 'MY'],
            ['Singapore', 'SG'],
            ['Australia', 'AU'],
            ['United Kingdom', 'GB'],
            ['South Korea', 'KR'],
            ['Netherlands', 'NL'],
        ];
        $halamanList = ['/', '/berita', '/kerja-sama', '/jenjang-pendidikan', '/riset-inovasi', '/karir-industri', '/komunitas', '/sertifikasi', '/tentang'];
        $browserList = ['Chrome', 'Firefox', 'Safari', 'Edge', 'Opera'];
        $osList = ['Windows 11', 'macOS', 'Linux', 'Android', 'iOS'];

        for ($i = 0; $i < 150; $i++) {
            $negara = $negaraList[array_rand($negaraList)];
            Pengunjung::create([
                'ip_address' => fake()->ipv4(),
                'user_agent' => fake()->userAgent(),
                'halaman' => $halamanList[array_rand($halamanList)],
                'negara' => $negara[0],
                'kode_negara' => $negara[1],
                'browser' => $browserList[array_rand($browserList)],
                'os' => $osList[array_rand($osList)],
                'perangkat' => ['Desktop', 'Mobile', 'Tablet'][array_rand(['Desktop', 'Mobile', 'Tablet'])],
                'session_id' => Str::random(40),
                'created_at' => now()->subMinutes(rand(0, 10080)), // Last 7 days
            ]);
        }

        $this->command->info('');
        $this->command->info('============================================');
        $this->command->info('       KVT Hub v3.0 Seeder Selesai         ');
        $this->command->info('============================================');
        $this->command->info('  Admin  : admin@kvthub.id / admin123     ');
        $this->command->info('  Guru   : guru@kvthub.id  / guru123     ');
        $this->command->info('  Siswa  : siswa@kvthub.id / siswa123    ');
        $this->command->info('  Kunci  : KVT-ADMIN-2025-SECRET         ');
        $this->command->info('  Berita : ' . count($beritaList) . ' berita sample            ');
        $this->command->info('  Mitra  : ' . count($mitraList) . ' mitra sample             ');
        $this->command->info('  Visitor: 150 sample pengunjung          ');
        $this->command->info('============================================');
        $this->command->info('');
    }
}
