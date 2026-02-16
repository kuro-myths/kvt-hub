<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelasMateriSeeder extends Seeder
{
    /**
     * Seed kelas dan materi.
     */
    public function run(): void
    {
        $guru = User::where('email', 'pengajar@kvthub.id')->first();
        $siswa = User::where('email', 'pengguna@kvthub.id')->first();

        if (!$guru) {
            $this->command->warn('  [!] Pengajar utama belum ada. Jalankan AkunSeeder terlebih dahulu.');
            return;
        }

        // ===== KELAS =====
        if (Kelas::count() === 0) {
            $kelas1 = Kelas::create([
                'nama' => 'Belajar Laravel dari Nol',
                'deskripsi' => 'Pelajari framework Laravel dari dasar hingga mahir. Cocok untuk pemula yang ingin membangun aplikasi web modern.',
                'gambar' => 'images/kelas.png',
                'guru_id' => $guru->id,
                'kode_kelas' => 'LRV-' . strtoupper(Str::random(6)),
            ]);

            Kelas::create([
                'nama' => 'Dasar Pemrograman Python',
                'deskripsi' => 'Mulai perjalanan coding Anda dengan Python. Bahasa pemrograman yang mudah dipelajari dan sangat powerful.',
                'gambar' => 'images/lab.png',
                'guru_id' => $guru->id,
                'kode_kelas' => 'PYT-' . strtoupper(Str::random(6)),
            ]);

            Kelas::create([
                'nama' => 'Desain UI/UX Modern',
                'deskripsi' => 'Pelajari prinsip desain antarmuka yang indah dan pengalaman pengguna yang menyenangkan.',
                'gambar' => 'images/pratek.png',
                'guru_id' => $guru->id,
                'kode_kelas' => 'UIX-' . strtoupper(Str::random(6)),
            ]);

            // Siswa gabung kelas
            if ($siswa && $kelas1->anggota()->where('user_id', $siswa->id)->count() === 0) {
                $kelas1->anggota()->attach($siswa->id);
            }

            // 7 kelas tambahan
            $kelasExtra = [
                ['nama' => 'Matematika Dasar untuk Pemula', 'deskripsi' => 'Pelajari konsep matematika dasar: aljabar, geometri, dan statistik untuk fondasi akademik yang kuat.'],
                ['nama' => 'Machine Learning & AI Fundamentals', 'deskripsi' => 'Pengantar kecerdasan buatan dan machine learning menggunakan Python, TensorFlow, dan scikit-learn.'],
                ['nama' => 'Belajar Database PostgreSQL', 'deskripsi' => 'Kuasai PostgreSQL dari instalasi hingga query advanced, indexing, dan optimasi performa database.'],
                ['nama' => 'Frontend React.js Modern', 'deskripsi' => 'Bangun UI interaktif dengan React.js, hooks, state management, dan Next.js framework.'],
                ['nama' => 'Cyber Security & Ethical Hacking', 'deskripsi' => 'Pelajari keamanan siber, penetration testing, dan ethical hacking sesuai standar industri.'],
                ['nama' => 'Mobile Development Flutter', 'deskripsi' => 'Buat aplikasi mobile cross-platform dengan Flutter dan Dart. Satu kode untuk Android & iOS.'],
                ['nama' => 'DevOps & Cloud Computing', 'deskripsi' => 'Pelajari Docker, Kubernetes, CI/CD pipeline, dan deployment ke AWS/GCP/Azure.'],
            ];
            $pengajarUsers = User::where('peran', 'pengajar')->get();
            foreach ($kelasExtra as $ke) {
                $pengajarId = $pengajarUsers->count() > 0 ? $pengajarUsers->random()->id : $guru->id;
                Kelas::create([
                    'nama' => $ke['nama'],
                    'deskripsi' => $ke['deskripsi'],
                    'guru_id' => $pengajarId,
                    'kode_kelas' => strtoupper(Str::random(3)) . '-' . strtoupper(Str::random(6)),
                ]);
            }
        }

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

        $this->command->info('  [✓] Kelas & Materi seeder selesai');
    }
}
