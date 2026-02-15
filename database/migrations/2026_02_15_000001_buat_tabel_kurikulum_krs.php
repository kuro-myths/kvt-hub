<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ===== KURIKULUM: Struktur kurikulum per jenjang =====
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Kurikulum Merdeka TK, Kurikulum SD, dll
            $table->enum('jenjang', [
                'tk_paud',
                'sd_mi',
                'smp_mts',
                'sma_ma',
                'smk',
                'd1',
                'd2',
                'd3',
                'd4',
                's1',
                's2',
                's3',
                'profesi',
                'post_doktoral'
            ]);
            $table->text('deskripsi')->nullable();
            $table->integer('durasi_tahun'); // Lama pendidikan
            $table->integer('total_semester')->nullable();
            $table->integer('total_sks')->nullable(); // NULL untuk TK-SMA
            $table->json('capaian_lulusan')->nullable(); // Array capaian
            $table->json('struktur_semester')->nullable(); // Detail per semester
            $table->enum('status', ['aktif', 'arsip', 'draft'])->default('aktif');
            $table->string('akreditasi')->nullable(); // SSS+, A, B, C
            $table->timestamps();
        });

        // ===== MATA PELAJARAN / MATA KULIAH =====
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // MK001, MP-SD-01
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->foreignId('kurikulum_id')->constrained('kurikulum')->onDelete('cascade');
            $table->integer('sks')->default(0); // 0 untuk TK-SMA
            $table->integer('semester')->nullable(); // Semester ke berapa
            $table->enum('tipe', ['wajib', 'pilihan', 'peminatan', 'prasyarat'])->default('wajib');
            $table->enum('kategori', [
                'umum',
                'inti',
                'peminatan',
                'praktik',
                'skripsi',
                'tematik',
                'muatan_lokal',
                'ekstrakurikuler'
            ])->default('umum');
            $table->json('prasyarat_ids')->nullable(); // ID mata pelajaran prasyarat
            $table->integer('jam_per_minggu')->nullable();
            $table->json('capaian_pembelajaran')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // ===== PAKET SEMESTER (untuk D1-S3) =====
        Schema::create('paket_semester', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurikulum_id')->constrained('kurikulum')->onDelete('cascade');
            $table->string('nama'); // Paket A, Paket B, Paket C, Paket Penuh
            $table->integer('semester');
            $table->text('deskripsi')->nullable();
            $table->json('mata_pelajaran_ids'); // Array ID mata pelajaran dalam paket
            $table->integer('total_sks');
            $table->timestamps();
        });

        // ===== KRS (Kartu Rencana Studi) =====
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kurikulum_id')->constrained('kurikulum')->onDelete('cascade');
            $table->integer('semester'); // Semester aktif
            $table->string('tahun_ajaran'); // 2025/2026
            $table->enum('status', ['draft', 'diajukan', 'disetujui', 'ditolak', 'aktif', 'selesai'])->default('draft');
            $table->integer('total_sks')->default(0);
            $table->string('catatan_pembimbing')->nullable();
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users');
            $table->timestamp('disetujui_pada')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'kurikulum_id', 'semester', 'tahun_ajaran'], 'krs_unique');
        });

        // ===== KRS DETAIL (Mata pelajaran yang diambil) =====
        Schema::create('krs_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('krs_id')->constrained('krs')->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onDelete('cascade');
            $table->enum('status', ['aktif', 'dibatalkan', 'selesai', 'mengulang'])->default('aktif');
            $table->timestamps();

            $table->unique(['krs_id', 'mata_pelajaran_id']);
        });

        // ===== BOBOT NILAI =====
        Schema::create('bobot_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kurikulum_id')->constrained('kurikulum')->onDelete('cascade');
            $table->string('huruf'); // A, A-, B+, B, B-, C+, C, D, E
            $table->decimal('bobot', 3, 2); // 4.00, 3.75, 3.50...
            $table->integer('batas_bawah'); // Nilai minimum
            $table->integer('batas_atas'); // Nilai maksimum
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        // ===== NILAI PENGGUNA =====
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->onDelete('cascade');
            $table->foreignId('krs_id')->nullable()->constrained('krs')->onDelete('set null');
            $table->decimal('tugas', 5, 2)->nullable(); // Nilai tugas (0-100)
            $table->decimal('uts', 5, 2)->nullable(); // Ujian Tengah Semester
            $table->decimal('uas', 5, 2)->nullable(); // Ujian Akhir Semester
            $table->decimal('praktik', 5, 2)->nullable();
            $table->decimal('partisipasi', 5, 2)->nullable();
            $table->decimal('nilai_akhir', 5, 2)->nullable(); // Kalkulasi akhir
            $table->string('huruf_mutu')->nullable(); // A, B+, C, dll
            $table->decimal('bobot_mutu', 3, 2)->nullable(); // 4.00, 3.50, dll
            $table->enum('status', ['proses', 'final', 'mengulang'])->default('proses');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'mata_pelajaran_id', 'krs_id']);
        });

        // ===== ORGANISASI KOMUNITAS =====
        Schema::create('organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->enum('tipe', ['internal', 'eksternal', 'nasional', 'internasional'])->default('internal');
            $table->enum('kategori', [
                'akademik',
                'olahraga',
                'seni_budaya',
                'teknologi',
                'keagamaan',
                'sosial',
                'lingkungan',
                'kewirausahaan',
                'lainnya'
            ])->default('lainnya');
            $table->string('website')->nullable();
            $table->string('kontak')->nullable();
            $table->integer('jumlah_anggota')->default(0);
            $table->boolean('unggulan')->default(false);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // ===== KEANGGOTAAN ORGANISASI =====
        Schema::create('organisasi_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('organisasi_id')->constrained('organisasi')->onDelete('cascade');
            $table->enum('jabatan', ['anggota', 'pengurus', 'ketua', 'wakil_ketua', 'sekretaris', 'bendahara'])->default('anggota');
            $table->date('bergabung_pada');
            $table->date('berakhir_pada')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();

            $table->unique(['user_id', 'organisasi_id']);
        });

        // ===== JENJANG PENGGUNA (tracking jenjang per user) =====
        Schema::create('jenjang_pengguna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kurikulum_id')->constrained('kurikulum')->onDelete('cascade');
            $table->integer('semester_aktif')->default(1);
            $table->enum('status', ['aktif', 'cuti', 'lulus', 'keluar'])->default('aktif');
            $table->string('jurusan')->nullable();
            $table->decimal('ipk', 3, 2)->nullable(); // IPK untuk perguruan tinggi
            $table->foreignId('wali_user_id')->nullable()->constrained('users'); // Orang tua/wali
            $table->boolean('perlu_pengawasan')->default(false); // TK-SMA perlu ortu
            $table->timestamps();

            $table->unique(['user_id', 'kurikulum_id']);
        });

        // ===== LAPORAN AKADEMIK (untuk admin export) =====
        Schema::create('laporan_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->enum('tipe', [
                'transkrip',
                'rekap_nilai',
                'khs',
                'daftar_hadir',
                'capaian_kurikulum',
                'statistik_kelulusan',
                'akreditasi',
                'custom'
            ]);
            $table->foreignId('kurikulum_id')->nullable()->constrained('kurikulum');
            $table->foreignId('dibuat_oleh')->constrained('users');
            $table->json('filter')->nullable(); // Filter yang digunakan
            $table->json('data')->nullable(); // Data laporan
            $table->string('file_path')->nullable(); // Path file Excel/PDF
            $table->enum('format', ['excel', 'pdf', 'csv'])->default('excel');
            $table->enum('status', ['proses', 'selesai', 'gagal'])->default('proses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_akademik');
        Schema::dropIfExists('jenjang_pengguna');
        Schema::dropIfExists('organisasi_anggota');
        Schema::dropIfExists('organisasi');
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('bobot_nilai');
        Schema::dropIfExists('krs_detail');
        Schema::dropIfExists('krs');
        Schema::dropIfExists('paket_semester');
        Schema::dropIfExists('mata_pelajaran');
        Schema::dropIfExists('kurikulum');
    }
};
