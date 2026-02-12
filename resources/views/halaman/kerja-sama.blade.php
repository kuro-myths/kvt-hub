@extends('tata-letak.utama')
@section('judul', 'Kerja Sama - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-handshake text-2xl text-white"></i>
            </div>
            <h1 class="text-3xl font-black text-white">Program Kerja Sama</h1>
            <p class="text-gray-400 mt-2">Bersama membangun ekosistem pendidikan digital Indonesia</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-school text-blue-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Institusi Pendidikan</h3>
                <p class="text-gray-400 text-sm">Integrasikan KVT Hub sebagai platform e-learning di sekolah atau kampus Anda. Dapatkan fitur khusus, dashboard akademik, dan dukungan teknis penuh.</p>
                <ul class="mt-3 space-y-1 text-gray-500 text-xs">
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Branding sekolah di platform</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Akun guru & siswa tanpa batas</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Laporan akademik otomatis</li>
                </ul>
            </div>

            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-laptop-code text-purple-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Developer & Kreator</h3>
                <p class="text-gray-400 text-sm">Bergabung sebagai kontributor konten. Buat materi, kuis, dan kelas berkualitas. Dapatkan royalti dan pengakuan dari komunitas.</p>
                <ul class="mt-3 space-y-1 text-gray-500 text-xs">
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Revenue sharing hingga 70%</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Profil kreator terverifikasi</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Tools pembuatan konten</li>
                </ul>
            </div>

            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-building text-green-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Perusahaan & Startup</h3>
                <p class="text-gray-400 text-sm">Gunakan KVT Hub untuk program training internal, onboarding karyawan, atau CSR di bidang pendidikan teknologi.</p>
                <ul class="mt-3 space-y-1 text-gray-500 text-xs">
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Kelas privat perusahaan</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Sertifikat branded</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>API integration</li>
                </ul>
            </div>

            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-orange-500/20 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-globe text-orange-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Komunitas & NGO</h3>
                <p class="text-gray-400 text-sm">Bersama memperluas akses pendidikan teknologi ke seluruh Indonesia melalui program beasiswa dan pelatihan gratis.</p>
                <ul class="mt-3 space-y-1 text-gray-500 text-xs">
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Program beasiswa bersama</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Event kolaborasi</li>
                    <li><i class="fas fa-check text-kvt-400 mr-1"></i>Dukungan komunitas</li>
                </ul>
            </div>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 text-center" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-3">Mulai Kerja Sama</h2>
            <p class="text-gray-400 mb-6">Isi formulir atau hubungi kami langsung untuk memulai diskusi kerja sama.</p>
            <a href="mailto:kerjasama@kvthub.id" class="bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg inline-block">
                <i class="fas fa-envelope mr-2"></i>kerjasama@kvthub.id
            </a>
        </div>
    </div>
</section>
@endsection
