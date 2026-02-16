@extends('tata-letak.utama')
@section('judul', 'Pusat Bantuan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[50vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-life-ring"></i> Bantuan
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Pusat </span><span class="teks-gradien">Bantuan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Temukan jawaban atas pertanyaan Anda atau hubungi tim support kami.
        </p>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white mb-8 text-center" data-aos="zoom-in">Pertanyaan Umum</h2>

    @php
        $faq = [
            ['q' => 'Bagaimana cara mendaftar?', 'a' => 'Klik tombol "Daftar" di halaman utama, isi data diri Anda, dan verifikasi email. Anda juga bisa mendaftar menggunakan akun Google atau GitHub.'],
            ['q' => 'Apakah KVT Hub gratis?', 'a' => 'Ya! KVT Hub menyediakan paket gratis dengan akses ke kelas dasar. Untuk fitur lengkap, Anda bisa berlangganan paket Premium.'],
            ['q' => 'Bagaimana cara mengikuti kelas?', 'a' => 'Setelah login, buka halaman Kelas, cari kelas yang diminati, dan klik "Gabung". Anda bisa menggunakan kode kelas jika diberikan oleh pengajar.'],
            ['q' => 'Bagaimana cara menghubungi support?', 'a' => 'Anda bisa mengirim email ke support@kvthub.com atau menggunakan fitur chat di dashboard. Tim kami akan merespons dalam 1x24 jam.'],
            ['q' => 'Apakah sertifikat diakui?', 'a' => 'Sertifikat KVT Hub diakui oleh mitra industri dan institusi pendidikan yang bekerja sama dengan kami.'],
        ];
    @endphp

    <div class="space-y-4">
        @foreach($faq as $i => $item)
            <div class="kaca rounded-2xl p-6 border-kvt-500/20 hover:border-kvt-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <h3 class="text-white font-bold mb-2"><i class="fas fa-question-circle text-kvt-400 mr-2"></i>{{ $item['q'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $item['a'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- Contact --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <div class="kaca rounded-2xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
        <h2 class="text-3xl font-bold text-white mb-4">Masih Butuh Bantuan?</h2>
        <p class="text-gray-400 mb-8">Hubungi tim support kami melalui email atau media sosial.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="mailto:support@kvthub.com" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-kvt-400 transition">
                <i class="fas fa-envelope mr-2"></i>Email Support
            </a>
            <a href="https://github.com/kuro-myths/kvt-hub/issues" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-6 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fab fa-github mr-2"></i>GitHub Issues
            </a>
        </div>
    </div>
</section>
@endsection
