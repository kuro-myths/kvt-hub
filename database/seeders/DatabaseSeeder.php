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
use App\Models\Kurikulum;
use App\Models\MataPelajaran;
use App\Models\BobotNilai;
use App\Models\Organisasi;
use App\Models\PaketSemester;
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
        $admin = User::firstOrCreate(
            ['email' => 'admin@kvthub.id'],
            [
            'name' => 'Admin KVT',
            'password' => Hash::make('admin123'),
            'peran' => 'admin',
            'level' => 100,
            'xp' => 0,
            'xp_total' => 990000,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== KUNCI ADMIN =====
        $kunciAktif = KunciAdmin::firstOrCreate(
            ['kunci' => 'KVT-ADMIN-2025-SECRET'],
            [
            'deskripsi' => 'Kunci admin utama',
            'digunakan' => false,
        ]);

        // ===== TIM (Staff) =====
        $guru = User::firstOrCreate(
            ['email' => 'tim@kvthub.id'],
            [
            'name' => 'Tim Demo',
            'password' => Hash::make('tim123'),
            'peran' => 'tim',
            'level' => 25,
            'xp' => 50,
            'xp_total' => 2550,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== PENGGUNA =====
        $siswa = User::firstOrCreate(
            ['email' => 'pengguna@kvthub.id'],
            [
            'name' => 'Pengguna Demo',
            'password' => Hash::make('pengguna123'),
            'peran' => 'pengguna',
            'level' => 5,
            'xp' => 30,
            'xp_total' => 530,
            'aktif' => true,
            'email_verified_at' => now(),
        ]);

        // ===== KELAS =====
        if (Kelas::count() === 0) {
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
        if ($kelas1->anggota()->where('user_id', $siswa->id)->count() === 0) {
            $kelas1->anggota()->attach($siswa->id);
        }
        } // end Kelas guard

        // ===== MATERI =====
        $kelas1 = Kelas::where('nama', 'Belajar Laravel dari Nol')->first();
        if (Materi::count() === 0 && $kelas1) {
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

        }

        // ===== PAKET EKSKLUSIF =====
        if (PaketEksklusif::count() === 0) {
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

        } // end PaketEksklusif guard

        // ===== PENCAPAIAN =====
        if (Pencapaian::count() === 0) {
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
        } // end Pencapaian guard

        // ===== BERITA (v3.0) =====
        if (Berita::count() === 0) {
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
        } // end Berita guard

        // ===== KERJA SAMA / SPONSOR (v3.0) =====
        if (KerjaSama::count() === 0) {
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
        } // end KerjaSama guard

        // ===== SAMPLE PENGUNJUNG (v3.0) =====
        if (Pengunjung::count() === 0) {
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
        } // end Pengunjung guard

        // ===== KURIKULUM =====
        if (Kurikulum::count() === 0) {
        $kurikulumData = [
            [
                'nama' => 'Kurikulum Merdeka TK/PAUD',
                'jenjang' => 'tk_paud',
                'deskripsi' => 'Kurikulum bermain dan belajar untuk anak usia dini 4-6 tahun. Fokus pada perkembangan motorik, kognitif, bahasa, sosial-emosional, dan seni.',
                'durasi_tahun' => 2,
                'total_semester' => 4,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Mengenal huruf dan angka dasar (1-20)',
                    'Mampu berkomunikasi sederhana dalam Bahasa Indonesia',
                    'Mengenal warna, bentuk, dan ukuran',
                    'Memiliki kemandirian dasar (makan, berpakaian)',
                    'Mampu bersosialisasi dengan teman sebaya',
                    'Mengenal lingkungan sekitar dan alam',
                    'Mengembangkan kreativitas melalui seni dan bermain',
                ],
                'struktur_semester' => [
                    ['semester' => 1, 'tema' => 'Diriku & Keluargaku', 'capaian' => ['Mengenal diri sendiri', 'Mengenal anggota keluarga', 'Motorik halus dasar']],
                    ['semester' => 2, 'tema' => 'Lingkunganku', 'capaian' => ['Mengenal lingkungan rumah & sekolah', 'Menghitung 1-10', 'Mengenal 10 huruf']],
                    ['semester' => 3, 'tema' => 'Alam Semesta', 'capaian' => ['Mengenal binatang & tumbuhan', 'Menghitung 1-20', 'Menulis nama sendiri']],
                    ['semester' => 4, 'tema' => 'Tanah Airku', 'capaian' => ['Mengenal budaya Indonesia', 'Membaca suku kata', 'Siap masuk SD']],
                ],
            ],
            [
                'nama' => 'Kurikulum Merdeka SD/MI',
                'jenjang' => 'sd_mi',
                'deskripsi' => 'Kurikulum Merdeka untuk jenjang Sekolah Dasar kelas 1-6. Pembelajaran tematik integratif dengan Profil Pelajar Pancasila.',
                'durasi_tahun' => 6,
                'total_semester' => 12,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Mampu membaca, menulis, dan berhitung dengan lancar',
                    'Memahami konsep dasar IPA dan IPS',
                    'Menguasai operasi hitung dasar hingga pecahan',
                    'Mampu berkomunikasi dalam Bahasa Indonesia dan Bahasa Inggris dasar',
                    'Memiliki karakter Profil Pelajar Pancasila',
                    'Mampu berpikir kritis dan kreatif tingkat dasar',
                ],
            ],
            [
                'nama' => 'Kurikulum Merdeka SMP/MTs',
                'jenjang' => 'smp_mts',
                'deskripsi' => 'Kurikulum Merdeka untuk jenjang SMP kelas 7-9. Mata pelajaran terpisah dengan penguatan literasi dan numerasi.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Menguasai konsep Matematika aljabar dan geometri',
                    'Memahami IPA terpadu (Fisika, Kimia, Biologi)',
                    'Menguasai Bahasa Indonesia dan Bahasa Inggris komunikatif',
                    'Memahami sejarah dan geografi Indonesia',
                    'Mampu menggunakan teknologi informasi dasar',
                    'Siap melanjutkan ke SMA/SMK',
                ],
            ],
            [
                'nama' => 'Kurikulum Merdeka SMA/MA',
                'jenjang' => 'sma_ma',
                'deskripsi' => 'Kurikulum SMA dengan sistem peminatan dan mata pelajaran lintas minat. Persiapan ke perguruan tinggi.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Menguasai mata pelajaran sesuai peminatan',
                    'Mampu berpikir kritis dan analitis',
                    'Siap mengikuti ujian masuk perguruan tinggi',
                    'Memiliki keterampilan riset sederhana',
                    'Menguasai Bahasa Inggris akademik',
                ],
            ],
            [
                'nama' => 'Kurikulum SMK Teknologi',
                'jenjang' => 'smk',
                'deskripsi' => 'Kurikulum SMK bidang Teknologi & Rekayasa. Fokus pada kompetensi keahlian dan siap kerja.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Menguasai kompetensi keahlian teknologi',
                    'Mampu melakukan praktik industri',
                    'Memiliki sertifikasi kompetensi',
                    'Siap bekerja atau melanjutkan pendidikan',
                ],
            ],
            [
                'nama' => 'Kurikulum D3 Teknik Informatika',
                'jenjang' => 'd3',
                'deskripsi' => 'Program Diploma 3 Teknik Informatika. 110 SKS dalam 6 semester. Fokus pada kemampuan terapan IT.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'total_sks' => 110,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Mampu mengembangkan aplikasi web dan mobile',
                    'Menguasai basis data dan jaringan komputer',
                    'Mampu mengelola sistem informasi',
                    'Memiliki kemampuan troubleshooting IT',
                ],
            ],
            [
                'nama' => 'Kurikulum S1 Ilmu Komputer',
                'jenjang' => 's1',
                'deskripsi' => 'Program Sarjana Ilmu Komputer berstandar KKNI Level 6. 144 SKS dalam 8 semester.',
                'durasi_tahun' => 4,
                'total_semester' => 8,
                'total_sks' => 144,
                'akreditasi' => 'SSS+',
                'capaian_lulusan' => [
                    'Menguasai konsep dasar dan lanjut ilmu komputer',
                    'Mampu merancang dan mengembangkan sistem perangkat lunak',
                    'Menguasai algoritma, struktur data, dan pemrograman',
                    'Mampu melakukan riset di bidang komputer',
                    'Memiliki etika profesional dan kemampuan komunikasi',
                    'Siap berkarir di industri teknologi global',
                ],
            ],
            [
                'nama' => 'Kurikulum S2 Teknik Informatika',
                'jenjang' => 's2',
                'deskripsi' => 'Program Magister Teknik Informatika. 42 SKS dalam 4 semester dengan tesis penelitian.',
                'durasi_tahun' => 2,
                'total_semester' => 4,
                'total_sks' => 42,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Mampu melakukan penelitian mandiri',
                    'Menguasai bidang spesialisasi (AI, Data Science, Cybersecurity)',
                    'Mampu mempublikasikan hasil penelitian',
                    'Memiliki kemampuan kepemimpinan akademik',
                ],
            ],
            [
                'nama' => 'Kurikulum S3 Ilmu Komputer',
                'jenjang' => 's3',
                'deskripsi' => 'Program Doktoral Ilmu Komputer. 48 SKS dalam 6-8 semester dengan disertasi original.',
                'durasi_tahun' => 4,
                'total_semester' => 8,
                'total_sks' => 48,
                'akreditasi' => 'A',
                'capaian_lulusan' => [
                    'Menghasilkan kontribusi asli bagi ilmu pengetahuan',
                    'Mampu memimpin tim riset',
                    'Publikasi di jurnal internasional bereputasi',
                    'Menjadi pakar di bidang spesialisasi',
                ],
            ],
        ];

        foreach ($kurikulumData as $kd) {
            Kurikulum::create($kd);
        }
        } // end Kurikulum guard

        // ===== BOBOT NILAI STANDAR (S1) =====
        $kurikulumS1 = Kurikulum::where('jenjang', 's1')->first();
        if (BobotNilai::count() === 0 && $kurikulumS1) {
            $bobotList = [
                ['huruf' => 'A',  'bobot' => 4.00, 'batas_bawah' => 85, 'batas_atas' => 100, 'keterangan' => 'Sangat Baik'],
                ['huruf' => 'A-', 'bobot' => 3.75, 'batas_bawah' => 80, 'batas_atas' => 84, 'keterangan' => 'Hampir Sangat Baik'],
                ['huruf' => 'B+', 'bobot' => 3.50, 'batas_bawah' => 75, 'batas_atas' => 79, 'keterangan' => 'Lebih dari Baik'],
                ['huruf' => 'B',  'bobot' => 3.00, 'batas_bawah' => 70, 'batas_atas' => 74, 'keterangan' => 'Baik'],
                ['huruf' => 'B-', 'bobot' => 2.75, 'batas_bawah' => 65, 'batas_atas' => 69, 'keterangan' => 'Hampir Baik'],
                ['huruf' => 'C+', 'bobot' => 2.50, 'batas_bawah' => 60, 'batas_atas' => 64, 'keterangan' => 'Lebih dari Cukup'],
                ['huruf' => 'C',  'bobot' => 2.00, 'batas_bawah' => 55, 'batas_atas' => 59, 'keterangan' => 'Cukup'],
                ['huruf' => 'D',  'bobot' => 1.00, 'batas_bawah' => 40, 'batas_atas' => 54, 'keterangan' => 'Kurang'],
                ['huruf' => 'E',  'bobot' => 0.00, 'batas_bawah' => 0,  'batas_atas' => 39, 'keterangan' => 'Gagal'],
            ];
            foreach ($bobotList as $b) {
                BobotNilai::create(array_merge($b, ['kurikulum_id' => $kurikulumS1->id]));
            }
        } // end BobotNilai guard

        if (MataPelajaran::count() === 0) {
        if ($kurikulumS1) {
            // Mata Pelajaran S1 Semester 1-2
            $mataKuliahS1 = [
                ['kode' => 'MK-CS101', 'nama' => 'Algoritma & Pemrograman', 'sks' => 4, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS102', 'nama' => 'Matematika Diskrit', 'sks' => 3, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS103', 'nama' => 'Pengantar Teknologi Informasi', 'sks' => 3, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum'],
                ['kode' => 'MK-CS104', 'nama' => 'Bahasa Inggris I', 'sks' => 2, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum'],
                ['kode' => 'MK-CS105', 'nama' => 'Pancasila', 'sks' => 2, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum'],
                ['kode' => 'MK-CS106', 'nama' => 'Kalkulus I', 'sks' => 3, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS201', 'nama' => 'Struktur Data', 'sks' => 4, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS202', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS203', 'nama' => 'Pemrograman Web', 'sks' => 3, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS204', 'nama' => 'Statistika & Probabilitas', 'sks' => 3, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS205', 'nama' => 'Bahasa Inggris II', 'sks' => 2, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'umum'],
                ['kode' => 'MK-CS206', 'nama' => 'Kalkulus II', 'sks' => 3, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS301', 'nama' => 'Pemrograman Berorientasi Objek', 'sks' => 4, 'semester' => 3, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS302', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 3, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS303', 'nama' => 'Sistem Operasi', 'sks' => 3, 'semester' => 3, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS304', 'nama' => 'Aljabar Linear', 'sks' => 3, 'semester' => 3, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS401', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 4, 'semester' => 4, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS402', 'nama' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 4, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS403', 'nama' => 'Pemrograman Mobile', 'sks' => 3, 'semester' => 4, 'tipe' => 'pilihan', 'kategori' => 'peminatan'],
                ['kode' => 'MK-CS404', 'nama' => 'Keamanan Siber', 'sks' => 3, 'semester' => 4, 'tipe' => 'pilihan', 'kategori' => 'peminatan'],
                ['kode' => 'MK-CS501', 'nama' => 'Machine Learning', 'sks' => 3, 'semester' => 5, 'tipe' => 'pilihan', 'kategori' => 'peminatan'],
                ['kode' => 'MK-CS502', 'nama' => 'Cloud Computing', 'sks' => 3, 'semester' => 5, 'tipe' => 'pilihan', 'kategori' => 'peminatan'],
                ['kode' => 'MK-CS503', 'nama' => 'Kerja Praktik', 'sks' => 2, 'semester' => 5, 'tipe' => 'wajib', 'kategori' => 'praktik'],
                ['kode' => 'MK-CS601', 'nama' => 'Data Science', 'sks' => 3, 'semester' => 6, 'tipe' => 'pilihan', 'kategori' => 'peminatan'],
                ['kode' => 'MK-CS701', 'nama' => 'Metodologi Penelitian', 'sks' => 2, 'semester' => 7, 'tipe' => 'wajib', 'kategori' => 'inti'],
                ['kode' => 'MK-CS801', 'nama' => 'Skripsi', 'sks' => 6, 'semester' => 8, 'tipe' => 'wajib', 'kategori' => 'skripsi'],
            ];
            foreach ($mataKuliahS1 as $mk) {
                MataPelajaran::create(array_merge($mk, ['kurikulum_id' => $kurikulumS1->id]));
            }
            if (PaketSemester::count() === 0) {
                // Paket Semester S1
                $mkSem1 = MataPelajaran::where('kurikulum_id', $kurikulumS1->id)->where('semester', 1)->pluck('id')->toArray();
                PaketSemester::create([
                    'kurikulum_id' => $kurikulumS1->id,
                    'nama' => 'Paket A - Semester 1 (Penuh)',
                    'semester' => 1,
                    'deskripsi' => 'Semua mata kuliah wajib semester 1',
                    'mata_pelajaran_ids' => $mkSem1,
                    'total_sks' => 17,
                ]);
            }
        } // end if kurikulumS1

        // ===== MATA PELAJARAN TK =====
        $kurikulumTK = Kurikulum::where('jenjang', 'tk_paud')->first();
        if ($kurikulumTK) {
            $mpTK = [
                ['kode' => 'TK-01', 'nama' => 'Mengenal Huruf & Angka', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 5],
                ['kode' => 'TK-02', 'nama' => 'Motorik Halus & Kasar', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 4],
                ['kode' => 'TK-03', 'nama' => 'Bermain & Bercerita', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 5],
                ['kode' => 'TK-04', 'nama' => 'Seni & Kreativitas', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 3],
                ['kode' => 'TK-05', 'nama' => 'Agama & Budi Pekerti', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum', 'jam_per_minggu' => 2],
                ['kode' => 'TK-06', 'nama' => 'Pengenalan Lingkungan', 'sks' => 0, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 4],
                ['kode' => 'TK-07', 'nama' => 'Bahasa & Komunikasi', 'sks' => 0, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 5],
                ['kode' => 'TK-08', 'nama' => 'Sosial Emosional', 'sks' => 0, 'semester' => 2, 'tipe' => 'wajib', 'kategori' => 'tematik', 'jam_per_minggu' => 3],
            ];
            foreach ($mpTK as $mp) {
                MataPelajaran::create(array_merge($mp, ['kurikulum_id' => $kurikulumTK->id]));
            }
        }

        // ===== MATA PELAJARAN SD =====
        $kurikulumSD = Kurikulum::where('jenjang', 'sd_mi')->first();
        if ($kurikulumSD) {
            $mpSD = [
                ['kode' => 'SD-01', 'nama' => 'Bahasa Indonesia', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'inti', 'jam_per_minggu' => 7],
                ['kode' => 'SD-02', 'nama' => 'Matematika', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'inti', 'jam_per_minggu' => 6],
                ['kode' => 'SD-03', 'nama' => 'IPAS (IPA & IPS)', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'inti', 'jam_per_minggu' => 5],
                ['kode' => 'SD-04', 'nama' => 'PPKn', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum', 'jam_per_minggu' => 2],
                ['kode' => 'SD-05', 'nama' => 'Agama & Budi Pekerti', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum', 'jam_per_minggu' => 3],
                ['kode' => 'SD-06', 'nama' => 'PJOK', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum', 'jam_per_minggu' => 3],
                ['kode' => 'SD-07', 'nama' => 'Seni & Budaya', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum', 'jam_per_minggu' => 2],
                ['kode' => 'SD-08', 'nama' => 'Bahasa Inggris', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'umum', 'jam_per_minggu' => 2],
                ['kode' => 'SD-09', 'nama' => 'Muatan Lokal', 'sks' => 0, 'semester' => 1, 'tipe' => 'wajib', 'kategori' => 'muatan_lokal', 'jam_per_minggu' => 2],
            ];
            foreach ($mpSD as $mp) {
                MataPelajaran::create(array_merge($mp, ['kurikulum_id' => $kurikulumSD->id]));
            }
        }
        } // end MataPelajaran guard

        // ===== ORGANISASI =====
        if (Organisasi::count() === 0) {
        $organisasiData = [
            ['nama' => 'BEM KVT Hub', 'tipe' => 'internal', 'kategori' => 'akademik', 'unggulan' => true, 'jumlah_anggota' => 150, 'deskripsi' => 'Badan Eksekutif Mahasiswa KVT Hub'],
            ['nama' => 'HMIF - Himpunan Mahasiswa Informatika', 'tipe' => 'internal', 'kategori' => 'akademik', 'unggulan' => true, 'jumlah_anggota' => 200],
            ['nama' => 'Google Developer Student Club', 'tipe' => 'eksternal', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 80, 'website' => 'https://gdsc.community.dev'],
            ['nama' => 'AWS Cloud Club', 'tipe' => 'eksternal', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 60],
            ['nama' => 'OSIS KVT Academy', 'tipe' => 'internal', 'kategori' => 'akademik', 'unggulan' => false, 'jumlah_anggota' => 50],
            ['nama' => 'Pramuka Digital', 'tipe' => 'internal', 'kategori' => 'sosial', 'unggulan' => false, 'jumlah_anggota' => 40],
            ['nama' => 'Forum Riset Nasional', 'tipe' => 'nasional', 'kategori' => 'akademik', 'unggulan' => true, 'jumlah_anggota' => 500],
            ['nama' => 'IEEE Student Branch', 'tipe' => 'internasional', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 120, 'website' => 'https://ieee.org'],
            ['nama' => 'ACM Chapter', 'tipe' => 'internasional', 'kategori' => 'teknologi', 'unggulan' => true, 'jumlah_anggota' => 90, 'website' => 'https://acm.org'],
            ['nama' => 'Klub Olahraga E-Sport', 'tipe' => 'internal', 'kategori' => 'olahraga', 'unggulan' => false, 'jumlah_anggota' => 75],
            ['nama' => 'Sanggar Seni & Budaya', 'tipe' => 'internal', 'kategori' => 'seni_budaya', 'unggulan' => false, 'jumlah_anggota' => 35],
            ['nama' => 'Startup Incubator KVT', 'tipe' => 'internal', 'kategori' => 'kewirausahaan', 'unggulan' => true, 'jumlah_anggota' => 30],
            ['nama' => 'Green Campus Movement', 'tipe' => 'nasional', 'kategori' => 'lingkungan', 'unggulan' => false, 'jumlah_anggota' => 45],
            ['nama' => 'Rohani Islam (ROHIS)', 'tipe' => 'internal', 'kategori' => 'keagamaan', 'unggulan' => false, 'jumlah_anggota' => 65],
        ];
        foreach ($organisasiData as $org) {
            Organisasi::create($org);
        }
        } // end Organisasi guard

        $this->command->info('');
        $this->command->info('============================================');
        $this->command->info('       KVT Hub v3.0 Seeder Selesai         ');
        $this->command->info('============================================');
        $this->command->info('  Admin    : admin@kvthub.id / admin123    ');
        $this->command->info('  Tim      : tim@kvthub.id  / tim123      ');
        $this->command->info('  Pengguna : pengguna@kvthub.id / pengguna123');
        $this->command->info('  Kunci    : KVT-ADMIN-2025-SECRET        ');
        $this->command->info('  Kurikulum: ' . Kurikulum::count() . ' jenjang pendidikan     ');
        $this->command->info('  Organisasi: ' . Organisasi::count() . ' organisasi           ');
        $this->command->info('  Berita   : ' . Berita::count() . ' berita sample            ');
        $this->command->info('  Mitra    : ' . KerjaSama::count() . ' mitra sample             ');
        $this->command->info('============================================');
        $this->command->info('');
    }
}
