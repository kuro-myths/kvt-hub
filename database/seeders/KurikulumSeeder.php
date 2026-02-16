<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use App\Models\MataPelajaran;
use App\Models\BobotNilai;
use App\Models\PaketSemester;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Seed data kurikulum, mata pelajaran, bobot nilai, dan paket semester.
     */
    public function run(): void
    {
        $this->seedKurikulum();
        $this->seedBobotNilai();
        $this->seedMataPelajaran();

        $this->command->info('  [✓] Kurikulum seeder selesai');
    }

    private function seedKurikulum(): void
    {
        if (Kurikulum::count() > 0) return;

        $data = [
            [
                'nama' => 'Kurikulum Merdeka TK/PAUD',
                'jenjang' => 'tk_paud',
                'deskripsi' => 'Kurikulum bermain dan belajar untuk anak usia dini 4-6 tahun. Fokus pada perkembangan motorik, kognitif, bahasa, sosial-emosional, dan seni.',
                'durasi_tahun' => 2,
                'total_semester' => 4,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Mengenal huruf dan angka dasar (1-20)', 'Mampu berkomunikasi sederhana dalam Bahasa Indonesia', 'Mengenal warna, bentuk, dan ukuran', 'Memiliki kemandirian dasar (makan, berpakaian)', 'Mampu bersosialisasi dengan teman sebaya', 'Mengenal lingkungan sekitar dan alam', 'Mengembangkan kreativitas melalui seni dan bermain'],
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
                'capaian_lulusan' => ['Mampu membaca, menulis, dan berhitung dengan lancar', 'Memahami konsep dasar IPA dan IPS', 'Menguasai operasi hitung dasar hingga pecahan', 'Mampu berkomunikasi dalam Bahasa Indonesia dan Bahasa Inggris dasar', 'Memiliki karakter Profil Pelajar Pancasila', 'Mampu berpikir kritis dan kreatif tingkat dasar'],
            ],
            [
                'nama' => 'Kurikulum Merdeka SMP/MTs',
                'jenjang' => 'smp_mts',
                'deskripsi' => 'Kurikulum Merdeka untuk jenjang SMP kelas 7-9. Mata pelajaran terpisah dengan penguatan literasi dan numerasi.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Menguasai konsep Matematika aljabar dan geometri', 'Memahami IPA terpadu (Fisika, Kimia, Biologi)', 'Menguasai Bahasa Indonesia dan Bahasa Inggris komunikatif', 'Memahami sejarah dan geografi Indonesia', 'Mampu menggunakan teknologi informasi dasar', 'Siap melanjutkan ke SMA/SMK'],
            ],
            [
                'nama' => 'Kurikulum Merdeka SMA/MA',
                'jenjang' => 'sma_ma',
                'deskripsi' => 'Kurikulum SMA dengan sistem peminatan dan mata pelajaran lintas minat. Persiapan ke perguruan tinggi.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Menguasai mata pelajaran sesuai peminatan', 'Mampu berpikir kritis dan analitis', 'Siap mengikuti ujian masuk perguruan tinggi', 'Memiliki keterampilan riset sederhana', 'Menguasai Bahasa Inggris akademik'],
            ],
            [
                'nama' => 'Kurikulum SMK Teknologi',
                'jenjang' => 'smk',
                'deskripsi' => 'Kurikulum SMK bidang Teknologi & Rekayasa. Fokus pada kompetensi keahlian dan siap kerja.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Menguasai kompetensi keahlian teknologi', 'Mampu melakukan praktik industri', 'Memiliki sertifikasi kompetensi', 'Siap bekerja atau melanjutkan pendidikan'],
            ],
            [
                'nama' => 'Kurikulum D3 Teknik Informatika',
                'jenjang' => 'd3',
                'deskripsi' => 'Program Diploma 3 Teknik Informatika. 110 SKS dalam 6 semester. Fokus pada kemampuan terapan IT.',
                'durasi_tahun' => 3,
                'total_semester' => 6,
                'total_sks' => 110,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Mampu mengembangkan aplikasi web dan mobile', 'Menguasai basis data dan jaringan komputer', 'Mampu mengelola sistem informasi', 'Memiliki kemampuan troubleshooting IT'],
            ],
            [
                'nama' => 'Kurikulum S1 Ilmu Komputer',
                'jenjang' => 's1',
                'deskripsi' => 'Program Sarjana Ilmu Komputer berstandar KKNI Level 6. 144 SKS dalam 8 semester.',
                'durasi_tahun' => 4,
                'total_semester' => 8,
                'total_sks' => 144,
                'akreditasi' => 'SSS+',
                'capaian_lulusan' => ['Menguasai konsep dasar dan lanjut ilmu komputer', 'Mampu merancang dan mengembangkan sistem perangkat lunak', 'Menguasai algoritma, struktur data, dan pemrograman', 'Mampu melakukan riset di bidang komputer', 'Memiliki etika profesional dan kemampuan komunikasi', 'Siap berkarir di industri teknologi global'],
            ],
            [
                'nama' => 'Kurikulum S2 Teknik Informatika',
                'jenjang' => 's2',
                'deskripsi' => 'Program Magister Teknik Informatika. 42 SKS dalam 4 semester dengan tesis penelitian.',
                'durasi_tahun' => 2,
                'total_semester' => 4,
                'total_sks' => 42,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Mampu melakukan penelitian mandiri', 'Menguasai bidang spesialisasi (AI, Data Science, Cybersecurity)', 'Mampu mempublikasikan hasil penelitian', 'Memiliki kemampuan kepemimpinan akademik'],
            ],
            [
                'nama' => 'Kurikulum S3 Ilmu Komputer',
                'jenjang' => 's3',
                'deskripsi' => 'Program Doktoral Ilmu Komputer. 48 SKS dalam 6-8 semester dengan disertasi original.',
                'durasi_tahun' => 4,
                'total_semester' => 8,
                'total_sks' => 48,
                'akreditasi' => 'A',
                'capaian_lulusan' => ['Menghasilkan kontribusi asli bagi ilmu pengetahuan', 'Mampu memimpin tim riset', 'Publikasi di jurnal internasional bereputasi', 'Menjadi pakar di bidang spesialisasi'],
            ],
        ];

        foreach ($data as $kd) {
            Kurikulum::create($kd);
        }
    }

    private function seedBobotNilai(): void
    {
        $kurikulumS1 = Kurikulum::where('jenjang', 's1')->first();
        if (BobotNilai::count() > 0 || !$kurikulumS1) return;

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
    }

    private function seedMataPelajaran(): void
    {
        if (MataPelajaran::count() > 0) return;

        // ===== MATA KULIAH S1 =====
        $kurikulumS1 = Kurikulum::where('jenjang', 's1')->first();
        if ($kurikulumS1) {
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

            // Paket Semester
            if (PaketSemester::count() === 0) {
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
        }

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
    }
}
