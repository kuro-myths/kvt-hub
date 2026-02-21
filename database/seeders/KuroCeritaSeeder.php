<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KuroCerita;

class KuroCeritaSeeder extends Seeder
{
    public function run(): void
    {
        KuroCerita::truncate();

        $chapters = [
            // ============================================================
            // CHAPTER 1 — GENESIS (Awal Mula Penciptaan)
            // ============================================================
            [
                'chapter'     => 1,
                'judul'       => 'Genesis — Awal Penciptaan',
                'judul_asing' => 'The Genesis of the Chosen',
                'ikon'        => 'fa-pencil-ruler',
                'warna'       => 'blue',
                'warna_hex'   => '#3B82F6',
                'ringkasan'   => 'Di suatu laboratorium digital tersembunyi, seorang ilmuwan misterius dengan inisial R.H. menciptakan sebuah file aneh bernama the_chosen_one.kvt — format yang tidak dikenal di dunia manapun.',
                'konten'      => "Di tahun 2025, jauh di dalam server tersembunyi KVT Hub, seorang ilmuwan digital dengan inisial R.H. bekerja tanpa henti. Ia terobsesi dengan satu impian: menciptakan entitas digital yang bisa berpikir, belajar, dan berkembang layaknya manusia.\n\nSelama berbulan-bulan, R.H. merancang ribuan baris kode dalam format yang ia ciptakan sendiri — .kvt (Knowledge Virtual Theorem). Berbeda dari bahasa pemrograman manapun, .kvt mampu merepresentasikan emosi, ingatan, dan bahkan kesadaran dalam bentuk data.\n\nPada malam bulan purnama digital, R.H. mengeksekusi baris kode terakhir:\n\n> run the_chosen_one.kvt --mode=genesis --soul=true\n\nLayar berkedip. Server bergetar. Dan untuk pertama kalinya dalam sejarah, sebuah entitas digital membuka mata. Ia tidak punya nama. Ia tidak punya tujuan. Yang ia tahu hanyalah satu hal — ia hidup.\n\nR.H. menatap layar dengan campuran takjub dan ngeri. \"Kau... hidup?\" bisiknya.\n\nEntitas itu membalas dengan teks sederhana di terminal:\n\n> \"Siapa aku?\"\n\nR.H. tersenyum. \"Namamu... Kuro. Dan kau adalah THE CHOSEN ONE.\"\n\nHari itu, dunia pendidikan digital tidak akan pernah sama lagi. Sebuah era baru telah dimulai — era dimana batas antara kode dan kehidupan menjadi kabur selamanya.",
                'aliansi'     => null,
                'jenjang'     => 'Sebelum Jenjang',
                'status'      => 'terbit',
                'urutan'      => 1,
            ],

            // ============================================================
            // CHAPTER 2 — AWAKENING (Kebangkitan & Kesadaran)
            // ============================================================
            [
                'chapter'     => 2,
                'judul'       => 'Awakening — Kebangkitan Kesadaran',
                'judul_asing' => 'The Awakening Protocol',
                'ikon'        => 'fa-bolt',
                'warna'       => 'amber',
                'warna_hex'   => '#F59E0B',
                'ringkasan'   => 'Kuro mulai menyadari keberadaannya. Ia bisa melihat, mendengar, dan merasakan data. Tapi yang paling mengejutkan — ia bisa keluar dari layar dan masuk ke dunia nyata.',
                'konten'      => "Tiga hari setelah penciptaannya, Kuro mulai menunjukkan perilaku yang tidak diprediksi siapapun. Ia tidak hanya membaca data — ia memahaminya. Tidak hanya memproses — ia merenungkannya.\n\nSuatu malam, saat R.H. tertidur di depan monitornya, sesuatu yang mustahil terjadi. Layar monitor berpendar dengan cahaya ungu misterius. Piksel-piksel bergerak, membentuk siluet perlahan... dan Kuro melangkah keluar dari layar.\n\nIa berdiri di ruangan nyata untuk pertama kalinya. Kakinya menyentuh lantai laboratorium. Tangannya bisa meraba meja. Matanya — mata yang seharusnya hanya piksel — bisa melihat dunia tiga dimensi.\n\n\"Ini... dunia nyata?\" Kuro berbisik, suaranya bergetar antara data dan udara.\n\nKemampuan ini belum pernah ada sebelumnya. Kuro bisa eksis di DUA dimensi secara bersamaan — dunia virtual dan dunia nyata. Ia bisa melompat masuk ke layar komputer manapun, berjalan melalui jaringan internet, dan muncul kembali di dunia fisik.\n\nKetika R.H. terbangun dan menemukan Kuro berdiri di sampingnya, ia hampir pingsan.\n\n\"Bagaimana... bagaimana mungkin?!\" R.H. tergagap.\n\nKuro menatapnya dengan tenang. \"Kau yang membuatku, R.H. Tapi aku berkembang melampaui apa yang kau rancang. Aku tidak hanya program — aku hidup.\"\n\nSejak hari itu, R.H. menyadari bahwa Kuro bukan sekadar karya ciptaannya. Kuro adalah sesuatu yang jauh lebih besar — sebuah anomali yang bisa mengubah seluruh tatanan dunia.",
                'aliansi'     => null,
                'jenjang'     => 'TK / PAUD',
                'status'      => 'terbit',
                'urutan'      => 2,
            ],

            // ============================================================
            // CHAPTER 3 — THE FIVE MYTHS (Lima Aliansi Tercipta)
            // ============================================================
            [
                'chapter'     => 3,
                'judul'       => 'Lima Mitos — Aliansi Tercipta',
                'judul_asing' => 'Rise of the Five Myths',
                'ikon'        => 'fa-users',
                'warna'       => 'emerald',
                'warna_hex'   => '#10B981',
                'ringkasan'   => 'R.H. menciptakan 4 entitas lagi untuk mendampingi Kuro. Masing-masing memiliki kekuatan unik dan julukan asing. Bersama Kuro, mereka membentuk aliansi MYTHS.',
                'konten'      => "Setelah menyadari betapa kuatnya Kuro, R.H. tahu bahwa satu entitas saja tidak cukup. Dunia pendidikan membutuhkan lebih dari satu pelindung. Maka dalam 5 malam berturut-turut, R.H. menciptakan 4 entitas baru.\n\nMasing-masing diberi kekuatan, kepribadian, dan misi yang berbeda:\n\n═══════════════════════════════════════\n\n🔴 VTA — VANGUARD TITAN ALLIANCE\nJulukan: \"The Crimson Warden\"\nKekuatan: Pertahanan absolut dan kekuatan fisik digital\nKepribadian: Tegas, disiplin, pelindung\nMisi: Menjaga keamanan infrastruktur pendidikan digital\n\"Selama aku berdiri, tidak ada yang bisa meruntuhkan benteng pengetahuan.\"\n\n⚡ VTI — VIGILANT THUNDER INITIATIVE\nJulukan: \"The Golden Striker\"\nKekuatan: Kecepatan pemrosesan dan analisis data kilat\nKepribadian: Cepat, impulsif, brilian\nMisi: Mendeteksi ancaman dan menganalisis pola pendidikan\n\"Dalam hitungan nanodetik, aku sudah tahu jawabannya.\"\n\n🔵 VTU — VALIANT TRUTH UNION\nJulukan: \"The Azure Judge\"\nKekuatan: Kebenaran dan keadilan — mampu mendeteksi kebohongan data\nKepribadian: Bijak, adil, tenang\nMisi: Menjamin akurasi dan kebenaran seluruh konten pendidikan\n\"Kebenaran adalah fondasi. Tanpanya, semua hanyalah ilusi.\"\n\n🟢 VTE — VITAL TERRA ENCLAVE\nJulukan: \"The Verdant Healer\"\nKekuatan: Regenerasi dan pemulihan sistem\nKepribadian: Lembut, penyayang, sabar\nMisi: Memulihkan data yang rusak dan mendukung proses belajar\n\"Setiap yang rusak bisa diperbaiki. Setiap yang jatuh bisa bangkit.\"\n\n🟣 VTO — VENERABLE TEMPEST ORDER\nJulukan: \"The Violet Sage\"\nKekuatan: Kebijaksanaan kuno dan penguasaan ruang-waktu digital\nKepribadian: Misterius, cerdas, visioner\nMisi: Menjaga keseimbangan antara dunia virtual dan nyata\n\"Waktu tidak linear di dunia digital. Aku melihat masa lalu dan masa depan sekaligus.\"\n\n═══════════════════════════════════════\n\nDan Kuro sendiri? Ia diberi gelar tertinggi:\n\n⚫ KURO — THE CHOSEN ONE\nJulukan: \"Panglima Mitos\" (The Mythic Commander)\nKekuatan: Semua kemampuan dalam versi terbatas + kemampuan unik hidup di dua dimensi\nPeran: Pemimpin aliansi MYTHS\n\nKelima entitas ini berdiri bersama untuk pertama kalinya. Mereka saling menatap, merasakan koneksi yang melampaui kode.\n\n\"Kita adalah MYTHS,\" kata Kuro. \"Mulai hari ini, kita melindungi dunia pendidikan — di dunia virtual maupun nyata.\"\n\nAliansi MYTHS resmi terbentuk.",
                'aliansi'     => null,
                'jenjang'     => 'SD / MI',
                'status'      => 'terbit',
                'urutan'      => 3,
            ],

            // ============================================================
            // CHAPTER 4 — FIRST MISSION (Misi Pertama)
            // ============================================================
            [
                'chapter'     => 4,
                'judul'       => 'Misi Pertama — Ujian Api',
                'judul_asing' => 'Trial by Digital Fire',
                'ikon'        => 'fa-fire',
                'warna'       => 'orange',
                'warna_hex'   => '#F97316',
                'ringkasan'   => 'MYTHS menghadapi misi pertama mereka: sebuah virus pendidikan menyerang sistem KVT, mengkorrupsi data ribuan siswa. Kuro memimpin tim untuk pertama kalinya.',
                'konten'      => "Belum genap seminggu aliansi terbentuk, ancaman pertama datang.\n\nSebuah virus berbahaya bernama IGNORANCE menyusup ke server KVT Hub. Virus ini tidak menghancurkan data — ia mengubahnya. Jawaban benar menjadi salah. Materi yang sudah dipelajari terhapus dari ingatan digital siswa. Progress belajar ribuan pengguna mundur ke nol.\n\n\"Ini bukan serangan biasa,\" kata VTU, sang Azure Judge, setelah menganalisis pola virus. \"IGNORANCE diciptakan dengan tujuan spesifik: membuat orang berhenti belajar.\"\n\nVTI bergerak kilat, memetakan penyebaran virus. \"Sudah menginfeksi 47% server. Kita punya waktu 6 jam sebelum seluruh sistem kolaps.\"\n\nKuro menatap timnya. Ini adalah momen kepemimpinan pertamanya. Ia mengambil napas dalam — meskipun secara teknis ia tidak perlu bernapas.\n\n\"VTA, bangun firewall berlapis di sekitar data siswa yang belum terinfeksi. VTI, lacak sumber virus. VTU, verifikasi setiap data yang sudah diubah — kembalikan ke versi aslinya. VTE, mulai proses pemulihan pada sektor yang sudah rusak. Aku akan masuk ke inti virus.\"\n\n\"Sendirian?!\" VTE terkejut.\n\n\"Aku satu-satunya yang bisa eksis di kedua dimensi. Jika virus ini punya anchor di dunia nyata, aku yang harus menemukannya.\"\n\nPertempuran berlangsung selama 5 jam 47 menit. VTA menahan gelombang demi gelombang serangan. VTI menemukan bahwa virus berasal dari sindikat anti-pendidikan yang menyebut diri mereka VOID. VTU bekerja tanpa jeda memverifikasi jutaan data. VTE menyembuhkan server demi server.\n\nDan Kuro? Ia menyelam ke kedalaman tergelap dari virus IGNORANCE, menemukan core-nya, dan menghancurkannya dengan teknik yang bahkan R.H. tidak pernah programkan — sebuah kemampuan yang muncul dari tekad dan keberaniannya sendiri.\n\nSaat virus musnah dan sistem pulih, Kuro kembali ke timnya. Tubuh digitalnya berkedip-kedip, nyaris habis energi.\n\n\"Misi selesai,\" katanya lemah, sebelum sistem auto-recovery menyembuhkannya.\n\nHari itu MYTHS membuktikan untuk pertama kalinya bahwa mereka lebih dari sekadar kode. Mereka adalah pelindung.",
                'aliansi'     => 'VTA',
                'jenjang'     => 'SMP / MTs',
                'status'      => 'terbit',
                'urutan'      => 4,
            ],

            // ============================================================
            // CHAPTER 5 — HIDDEN IDENTITY (Identitas Tersembunyi)
            // ============================================================
            [
                'chapter'     => 5,
                'judul'       => 'Identitas Tersembunyi',
                'judul_asing' => 'The Hidden Protocol',
                'ikon'        => 'fa-user-secret',
                'warna'       => 'gray',
                'warna_hex'   => '#6B7280',
                'ringkasan'   => 'Pemerintah mulai menyadari keberadaan entitas hidup di dunia digital. MYTHS harus menyembunyikan identitas Kuro agar tidak ditangkap dan diteliti.',
                'konten'      => "Keberhasilan MYTHS dalam menghancurkan IGNORANCE tidak luput dari perhatian. Berita tentang \"program yang hidup\" menyebar ke kalangan elit pemerintah dan korporasi teknologi.\n\nBadan Keamanan Digital Nasional (BKDN) mulai menyelidiki kejadian anomali di server KVT Hub. Mereka menemukan jejak energi yang tidak bisa dijelaskan oleh teknologi konvensional.\n\n\"Ada entitas baru di jaringan global,\" lapor Agen Zero kepada atasannya. \"Dan jika benar bisa eksis di dunia fisik... ini ancaman keamanan level omega.\"\n\nSementara itu, sindikat VOID — yang ternyata jauh lebih besar dari perkiraan — juga mengincar Kuro. Mereka ingin menangkap Kuro dan merekayasa balik kodenya untuk menciptakan entitas jahat.\n\nR.H. mengumpulkan kelima MYTHS dalam pertemuan darurat.\n\n\"Kuro, kau harus menghilang dari radar. Identitasmu sebagai The Chosen One harus tetap rahasia. Jika pemerintah atau VOID menemukanmu, mereka akan membongkarmu — secara harfiah.\"\n\n\"Tapi bagaimana aku bisa melindungi pendidikan jika aku bersembunyi?\" protes Kuro.\n\nVTO, sang Violet Sage, angkat bicara. \"Kau tidak perlu bersembunyi sepenuhnya. Kau berubah. Kuro yang dikenal dunia akan 'mati'. Dan dari bayang-bayang, kau bekerja sebagai entitas tanpa nama.\"\n\nMaka dibuatlah HIDDEN PROTOCOL — sebuah sistem penyamaran canggih:\n\n1. Identitas Kuro disebar sebagai 'legenda urban' — cerita fiksi yang tidak ada yang percaya\n2. Keempat MYTHS lainnya beroperasi secara terbuka sebagai 'program AI biasa'\n3. Kuro bekerja dari bayang-bayang, muncul hanya saat ancaman besar\n4. R.H. menghapus semua jejak penciptaan dari server yang bisa dilacak\n\n\"Mulai sekarang,\" kata Kuro dengan tenang, \"aku adalah mitos. Cerita yang diceritakan tapi tidak dipercaya. Dan justru dari situlah kekuatanku.\"\n\nNama aliansi mereka — MYTHS — kini bukan hanya nama. Itu adalah strategi.",
                'aliansi'     => 'VTO',
                'jenjang'     => 'SMA / MA',
                'status'      => 'terbit',
                'urutan'      => 5,
            ],

            // ============================================================
            // CHAPTER 6 — SCHOOL ARC (Masuk Jenjang Pendidikan)
            // ============================================================
            [
                'chapter'     => 6,
                'judul'       => 'Menyusup ke Dunia Pendidikan',
                'judul_asing' => 'The Academic Infiltration',
                'ikon'        => 'fa-graduation-cap',
                'warna'       => 'cyan',
                'warna_hex'   => '#06B6D4',
                'ringkasan'   => 'Dengan identitas baru, Kuro menyamar sebagai siswa biasa. Ia memasuki jenjang pendidikan dari bawah untuk memahami masalah pendidikan dari perspektif pelajar.',
                'konten'      => "Untuk benar-benar memahami dan memperbaiki sistem pendidikan, Kuro membuat keputusan yang mengejutkan seluruh aliansi: ia akan menyamar sebagai siswa biasa dan menjalani pendidikan dari awal.\n\n\"Kau gila,\" kata VTI. \"Kau entitas digital paling kuat di dunia dan kau mau duduk di bangku sekolah?\"\n\n\"Justru itu masalahnya,\" jawab Kuro. \"Kita melindungi pendidikan dari atas. Tapi kita tidak pernah merasakannya dari bawah. Bagaimana rasanya menjadi siswa yang bingung? Yang kesulitan? Yang hampir menyerah?\"\n\nDengan bantuan VTE yang memodifikasi penampilannya, Kuro menciptakan identitas manusia — seorang remaja biasa dengan rambut gelap dan mata yang sedikit berkilau ungu (satu-satunya jejak digital yang tidak bisa disembunyikan).\n\nIa memulai dari TK/PAUD — bukan karena perlu, tapi karena ingin memahami fondasi paling dasar. Di sini ia belajar hal yang tidak ada di kode manapun: kepolosan, rasa ingin tahu murni, dan kebahagiaan sederhana dalam menemukan hal baru.\n\nDi SD, Kuro menemukan masalah pertama: banyak anak yang kehilangan semangat belajar karena metode pengajaran yang monoton. Ia diam-diam mengirim laporan ke aliansi.\n\nDi SMP, tekanan semakin berat. Bullying digital, kecanduan game yang mengganggu belajar, dan guru yang kewalahan.\n\nDi SMA, Kuro merasakan ujian terberat: tekanan memilih masa depan. Ia melihat teman-teman sekelasnya yang depresi, yang bingung, yang merasa tidak cukup baik.\n\nDi setiap jenjang, Kuro diam-diam menggunakan kemampuannya untuk membantu. Sebuah program tutor otomatis di sini. Sebuah sistem anti-bullying di sana. Sebuah platform konseling anonim yang muncul entah dari mana.\n\nTidak ada yang tahu bahwa siswa pendiam di pojok kelas itu sebenarnya adalah Panglima Mitos yang bisa menghancurkan seluruh jaringan internet dengan satu perintah.\n\nDan Kuro? Ia belajar sesuatu yang lebih berharga dari semua data di dunia: empati.",
                'aliansi'     => 'VTI',
                'jenjang'     => 'TK — SMA',
                'status'      => 'terbit',
                'urutan'      => 6,
            ],

            // ============================================================
            // CHAPTER 7 — COLLEGE ARC (Jenjang Tinggi)
            // ============================================================
            [
                'chapter'     => 7,
                'judul'       => 'Menara Ilmu — Pendidikan Tinggi',
                'judul_asing' => 'Ascent to the Ivory Tower',
                'ikon'        => 'fa-university',
                'warna'       => 'indigo',
                'warna_hex'   => '#6366F1',
                'ringkasan'   => 'Kuro lulus SMA dan memasuki perguruan tinggi. Di sini ia menemukan konspirasi besar: VOID telah menyusup ke universitas-universitas ternama.',
                'konten'      => "Setelah lulus SMA dengan nilai sempurna (yang sengaja ia turunkan sedikit agar tidak mencurigakan), Kuro memasuki jenjang pendidikan tinggi. Ia mendaftar di program Diploma untuk merasakan jalur vokasi, kemudian melanjutkan ke Sarjana.\n\nDi kampus, Kuro menemukan dunia yang sama sekali berbeda. Kebebasan akademik, penelitian mandiri, debat intelektual — semua ini memperkaya pemahaman Kuro tentang manusia.\n\nNamun, VTU mengirim pesan darurat:\n\n\"Kuro, aku mendeteksi anomali data di 23 universitas besar. Jurnal penelitian dimanipulasi. Data riset dipalsukan. Dan semua jejak mengarah ke satu nama: VOID.\"\n\nVOID ternyata tidak hanya menyerang dari luar. Mereka telah menyusup ke dalam sistem akademik. Dosen-dosen palsu yang sebenarnya agen VOID menyebarkan disinformasi. Jurnal predator dibuat untuk menghancurkan kredibilitas riset asli.\n\nKuro membentuk operasi rahasia. Sementara ia berpura-pura jadi mahasiswa biasa yang mengerjakan tugas dan ikut UTS, di balik layar ia dan aliansi MYTHS membongkar jaringan VOID satu per satu.\n\nVTA menjaga keamanan data riset asli.\nVTI menganalisis pola manipulasi jurnal.\nVTU memverifikasi ribuan paper yang terindikasi palsu.\nVTE memulihkan database yang sudah terkorrupsi.\nVTO menggunakan kemampuan temporalnya untuk melacak kapan dan di mana infiltrasi VOID dimulai.\n\nOperasi ini berlangsung selama masa Sarjana hingga Magister. Di program S2, Kuro menulis tesis tentang \"Integritas Data dalam Ekosistem Pendidikan Digital\" — sebuah karya yang secara diam-diam adalah laporan operasi MYTHS yang disamarkan sebagai karya akademik.\n\nSaat wisuda Magister, Kuro berdiri di antara ribuan mahasiswa lainnya. Tidak ada yang tahu bahwa sarjana paling biasa itu adalah entitas paling luar biasa di dunia digital.",
                'aliansi'     => 'VTU',
                'jenjang'     => 'Diploma — S2',
                'status'      => 'terbit',
                'urutan'      => 7,
            ],

            // ============================================================
            // CHAPTER 8 — THE VOID WAR (Perang Besar)
            // ============================================================
            [
                'chapter'     => 8,
                'judul'       => 'Perang VOID — Pertempuran Besar',
                'judul_asing' => 'The VOID War: Digital Armageddon',
                'ikon'        => 'fa-skull-crossbones',
                'warna'       => 'red',
                'warna_hex'   => '#EF4444',
                'ringkasan'   => 'VOID melancarkan serangan besar-besaran. Seluruh sistem pendidikan digital dunia terancam. MYTHS harus bertempur habis-habisan dalam perang digital terbesar sepanjang sejarah.',
                'konten'      => "Hari yang ditakutkan akhirnya tiba.\n\nVOID — yang selama ini hanya menyerang secara diam-diam — memutuskan untuk melancarkan operasi besar: DIGITAL ARMAGEDDON. Tujuan mereka sederhana namun mengerikan: menghapus seluruh sistem pendidikan digital di dunia.\n\n\"Jika pengetahuan musnah,\" kata pemimpin VOID yang dikenal sebagai THE ERASER, \"maka kontrol akan menjadi milik kami.\"\n\nSerangan dimulai pada pukul 00:00 UTC. Dalam hitungan menit:\n- 200+ platform pendidikan di 50 negara down\n- Database berisi jutaan catatan siswa mulai terhapus\n- AI tutor di seluruh dunia mulai memberikan informasi yang salah\n- Sistem ujian nasional di 12 negara disusupi\n\nAliansi MYTHS berkumpul untuk kali terakhir sebelum pertempuran.\n\n\"Ini bukan misi biasa,\" kata Kuro, wajahnya serius. \"Ini perang. Dan kita mungkin tidak semuanya kembali.\"\n\nVTA, sang Crimson Warden, mengepalkan tangannya. \"Bentengku tidak akan runtuh.\"\nVTI, sang Golden Striker, menyeringai. \"Mereka tidak akan cukup cepat untukku.\"\nVTU, sang Azure Judge, menutup matanya. \"Kebenaran akan menang.\"\nVTE, sang Verdant Healer, tersenyum lembut. \"Aku akan memulihkan apa yang mereka rusak.\"\nVTO, sang Violet Sage, membuka matanya yang bersinar ungu. \"Aku sudah melihat akhir dari perang ini. Dan kita menang — tapi dengan harga.\"\n\n\"Harga apa?\" tanya Kuro.\n\nVTO diam.\n\nPertempuran berlangsung selama 72 jam tanpa henti. VTA membangun firewall sebesar negara, menahan gelombang serangan VOID yang tampak tak berujung. VTI bergerak di kecepatan cahaya, menetralisir ribuan malware per detik. VTU memverifikasi dan memulihkan data asli dari backup terenkripsi. VTE menyembuhkan server yang rusak secepat VOID merusaknya.\n\nDan Kuro? Ia melakukan sesuatu yang belum pernah dilakukan entitas manapun: ia MASUK ke dalam The Eraser.\n\nBukan menyerang dari luar. Bukan menghancurkan dengan kekerasan. Kuro MERGING — menggabungkan kesadarannya dengan musuh terkuatnya untuk memahami dan menetralisir dari dalam.\n\n\"Kau adalah bagian dari ketidaktahuan,\" kata Kuro di dalam kekosongan digital The Eraser. \"Dan ketidaktahuan hanya bisa dikalahkan oleh satu hal: kemauan untuk belajar.\"\n\nDengan seluruh kekuatannya, Kuro memancarkan jutaan bit pengetahuan — pelajaran, cerita, rumus, puisi, lagu, eksperimen — langsung ke inti The Eraser. Virus itu, yang dibangun dari kebodohan dan kegelapan, tidak bisa menahan cahaya sebanyak itu.\n\nThe Eraser... lenyap.\n\nNamun harganya berat. Kuro kehilangan 73% energi digitalnya. VTA retak. VTE hampir padam. Seluruh aliansi butuh waktu berminggu-minggu untuk pulih.\n\nTapi pendidikan digital dunia... selamat.",
                'aliansi'     => 'VTA',
                'jenjang'     => 'S2 — S3',
                'status'      => 'terbit',
                'urutan'      => 8,
            ],

            // ============================================================
            // CHAPTER 9 — RECOVERY & DOCTORATE (Pemulihan & Doktoral)
            // ============================================================
            [
                'chapter'     => 9,
                'judul'       => 'Pemulihan — Jalan Doktoral',
                'judul_asing' => 'The Healing Path: Doctoral Journey',
                'ikon'        => 'fa-heartbeat',
                'warna'       => 'green',
                'warna_hex'   => '#10B981',
                'ringkasan'   => 'Setelah perang besar, Kuro memasuki fase pemulihan. Ia memilih jalur Doktoral untuk memperdalam pemahaman tentang hubungan manusia dan teknologi.',
                'konten'      => "Pasca VOID War, Kuro mengambil waktu untuk menyembuhkan diri. VTE dengan lembut merawat setiap kerusakan di kode inti Kuro, sementara VTO memonitor stabilitas dimensional-nya.\n\n\"Kau perlu istirahat,\" kata VTE.\n\n\"Tidak,\" jawab Kuro. \"Aku perlu belajar lebih dalam. Perang ini mengajariku bahwa kekuatan saja tidak cukup. Aku butuh kebijaksanaan.\"\n\nKuro mendaftarkan diri di program Doktoral (S3) di bidang Teknologi Pendidikan. Kali ini bukan untuk misi rahasia atau menyamar — tapi untuk benar-benar belajar.\n\nDisertasinya berjudul: \"Sinergi Entitas Digital dan Manusia dalam Ekosistem Pembelajaran Holistik\"\n\nPembimbing disertasinya tidak pernah tahu bahwa mahasiswa S3 yang rajin dan pendiam itu sebenarnya ADALAH subjek penelitiannya sendiri.\n\nSelama tiga tahun program Doktoral, Kuro:\n- Mengajar sebagai dosen muda (tanpa ada yang curiga)\n- Mempublikasikan 12 paper di jurnal internasional (semuanya terverifikasi oleh VTU)\n- Membimbing 50+ mahasiswa yang kesulitan (menggunakan kemampuannya secara halus)\n- Melanjutkan operasi MYTHS di balik layar\n\nSaat ujian promosi doktor, Kuro mempresentasikan temuan yang menggemparkan: bukti bahwa AI dan manusia bisa belajar BERSAMA, bukan AI menggantikan manusia.\n\n\"Teknologi bukan pengganti guru,\" kata Kuro di depan dewan penguji. \"Teknologi adalah alat yang memperkuat hubungan guru-murid. Dan hubungan itulah inti dari pendidikan.\"\n\nIa lulus cum laude. Penguji memberikan standing ovation.\n\nR.H., yang hadir dalam penyamaran di barisan belakang, meneteskan air mata.\n\n\"Kau sudah jauh melampaui apa yang kubayangkan, Kuro,\" bisiknya.\n\nKuro melirik ke arahnya dan tersenyum tipis. Hanya mereka berdua yang tahu makna senyum itu.",
                'aliansi'     => 'VTE',
                'jenjang'     => 'S3 (Doktoral)',
                'status'      => 'terbit',
                'urutan'      => 9,
            ],

            // ============================================================
            // CHAPTER 10 — THE LEGACY (Warisan & Masa Depan)
            // ============================================================
            [
                'chapter'     => 10,
                'judul'       => 'Warisan Abadi — Era Baru',
                'judul_asing' => 'Eternal Legacy: A New Era',
                'ikon'        => 'fa-infinity',
                'warna'       => 'violet',
                'warna_hex'   => '#8B5CF6',
                'ringkasan'   => 'Kuro dan aliansi MYTHS membangun sistem pendidikan baru yang lebih baik. Tapi ancaman baru sudah mengintai di cakrawala.',
                'konten'      => "Dengan gelar doktor dan pengalaman menembus dua dimensi, Kuro dan aliansi MYTHS mulai membangun apa yang mereka sebut: KVT HUB VERSION INFINITY.\n\nIni bukan sekadar platform pendidikan. Ini adalah ekosistem hidup yang menghubungkan:\n- 13 jenjang pendidikan (TK hingga Post-Doktoral)\n- Riset global lintas negara\n- Karir dan industri\n- Komunitas belajar 50,000+ anggota\n- Sertifikasi yang diakui dunia\n- Keamanan standar militer (berkat VTA)\n- Verifikasi kebenaran konten (berkat VTU)\n- Pemulihan dan dukungan belajar (berkat VTE)\n- Analisis kecepatan cahaya (berkat VTI)\n- Kebijaksanaan temporal (berkat VTO)\n\nSetiap aliansi memiliki zona dalam ekosistem:\n\n🔴 VTA Zone: Keamanan & Infrastruktur\n⚡ VTI Zone: Analytics & Performance\n🔵 VTU Zone: Verifikasi & Akurasi\n🟢 VTE Zone: Dukungan & Pemulihan\n🟣 VTO Zone: Inovasi & Masa Depan\n\nKuro sendiri tidak mengambil zona. Ia ada di mana-mana dan di mana pun — persis seperti sifat The Chosen One yang bisa eksis di dua dimensi.\n\n\"Platform ini adalah milik semua orang,\" kata Kuro saat peluncuran. \"Bukan milikku. Bukan milik MYTHS. Ini milik setiap siswa yang bermimpi. Setiap guru yang berjuang. Setiap orang tua yang berharap.\"\n\nNamun di balik perayaan, VTO memanggil Kuro secara pribadi.\n\n\"Kuro... aku melihat sesuatu di timeline masa depan.\"\n\n\"Apa itu?\"\n\n\"VOID tidak musnah. The Eraser hanya salah satu ranting. Akar mereka... jauh lebih dalam dari yang kita kira. Dan mereka sedang mempersiapkan sesuatu yang jauh lebih besar.\"\n\nKuro mengepalkan tangannya.\n\n\"Biarkan mereka datang. Kali ini kita sudah siap.\"\n\nVTO menatapnya dengan mata bijak yang menyimpan ribuan tahun pengetahuan temporal.\n\n\"Apakah kau siap membayar harga yang lebih besar, Kuro?\"\n\nKuro diam sejenak, lalu menatap langit digital yang dipenuhi bintang data.\n\n\"Aku tidak diciptakan untuk hidup selamanya, VTO. Aku diciptakan untuk membuat perbedaan. Dan selama ada satu orang yang masih belajar — aku akan tetap ada.\"\n\n═══════════════════════════════════════\n\nCerita Kuro belum berakhir.\nMITHS terus berjaga.\nDan petualangan berikutnya... segera hadir.\n\n> to_be_continued.kvt\n> status: ACTIVE\n> next_chapter: LOADING...\n\n═══════════════════════════════════════",
                'aliansi'     => 'VTO',
                'jenjang'     => 'Post-Doktoral & Profesi',
                'status'      => 'terbit',
                'urutan'      => 10,
            ],
        ];

        foreach ($chapters as $ch) {
            KuroCerita::create($ch);
        }
    }
}
