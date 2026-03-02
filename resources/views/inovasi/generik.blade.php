{{-- Generic Innovation Page Template --}}
{{-- Digunakan oleh semua 100 route inovasi sebagai base view --}}
@extends('tata-letak.utama')

@php
    $pageData = [
        'ai-playground' => ['title' => 'AI Playground', 'icon' => 'fa-flask', 'color' => 'purple', 'desc' => 'Eksperimen AI interaktif — coba model AI, latih neural networks, dan eksplorasi kemampuan kecerdasan buatan secara langsung.', 'features' => ['Model Gallery dengan 100+ pretrained models', 'AI Sandbox tanpa perlu coding', 'Visualisasi real-time proses AI', 'Custom model upload & testing', 'Comparison benchmark antar model']],
        'ml-training' => ['title' => 'ML Model Training', 'icon' => 'fa-brain', 'color' => 'indigo', 'desc' => 'Latih model machine learning langsung di browser. Upload dataset, pilih algoritma, dan dapatkan model terlatih.', 'features' => ['AutoML Pipeline otomatis', 'Dataset Manager terintegrasi', 'Hyperparameter tuning visual', 'Model versioning & registry', 'Export ke ONNX/TensorFlow']],
        'nlp-studio' => ['title' => 'NLP Studio', 'icon' => 'fa-comment-dots', 'color' => 'cyan', 'desc' => 'Natural Language Processing studio — sentiment analysis, text generation, chatbot builder, dan named entity recognition.', 'features' => ['Sentiment Analysis real-time', 'Custom Chatbot Builder', 'Named Entity Recognition', 'Text Summarization AI', 'Language Detection 100+ bahasa']],
        'computer-vision' => ['title' => 'Computer Vision Lab', 'icon' => 'fa-eye', 'color' => 'blue', 'desc' => 'Lab computer vision dengan image classification, object detection, segmentation, dan OCR engine.', 'features' => ['Object Detection real-time', 'Image Classification multi-label', 'Semantic Segmentation', 'OCR Engine multi-bahasa', 'Face Detection & Recognition']],
        'ai-art' => ['title' => 'AI Art Generator', 'icon' => 'fa-paint-brush', 'color' => 'pink', 'desc' => 'Generate seni digital dengan AI — text-to-image, style transfer, dan galeri karya AI komunitas.', 'features' => ['Text-to-Image generation', 'Style Transfer antar gambar', 'Galeri karya AI komunitas', 'Prompt template library', 'Batch generation support']],
        'ai-music' => ['title' => 'AI Music Creator', 'icon' => 'fa-music', 'color' => 'violet', 'desc' => 'Komposisi musik dengan AI — generate melodi, beat, dan harmoni dari genre apapun.', 'features' => ['Beat Generator otomatis', 'Melody composition AI', 'Multi-genre support', 'Export WAV/MP3/MIDI', 'Collaboration workspace']],
        'ai-code' => ['title' => 'AI Code Assistant', 'icon' => 'fa-code', 'color' => 'green', 'desc' => 'AI-powered coding helper — review, generate, debug, dan optimasi kode dengan kecerdasan buatan.', 'features' => ['Code Review otomatis', 'Code Generation dari deskripsi', 'Bug Detection & fix suggestion', 'Performance optimization tips', '40+ bahasa pemrograman']],
        'prompt-engineering' => ['title' => 'Prompt Engineering Lab', 'icon' => 'fa-keyboard', 'color' => 'amber', 'desc' => 'Kuasai seni prompting AI — template library, teknik advanced, dan playground prompt testing.', 'features' => ['500+ prompt template', 'Chain-of-thought techniques', 'Multi-model prompt testing', 'Prompt versioning & sharing', 'Leaderboard prompt terbaik']],
        'ai-vtuber' => ['title' => 'AI VTuber Studio', 'icon' => 'fa-user-astronaut', 'color' => 'fuchsia', 'desc' => 'Studio VTuber AI dengan motion capture, karakter interaktif, dan streaming export untuk OBS.', 'features' => ['Full body motion capture', 'Face tracking 468 landmarks', 'Custom model character upload', 'AI chat interaction', 'OBS streaming export']],
        'ai-avatar' => ['title' => 'AI Avatar Maker', 'icon' => 'fa-user-circle', 'color' => 'sky', 'desc' => 'Generate avatar AI realistis atau anime dari foto. Support 3D avatar dengan berbagai style.', 'features' => ['Photo to Avatar AI', '3D Avatar generation', 'Anime/manga style', 'Custom outfit & accessories', 'Export untuk VTuber']],
        'mocap-lab' => ['title' => 'Motion Capture Lab', 'icon' => 'fa-walking', 'color' => 'lime', 'desc' => 'AI-based motion capture tanpa sensor khusus — cukup kamera biasa untuk full body tracking.', 'features' => ['468 face landmarks tracking', '33 body pose landmarks', 'Hand tracking 21 landmarks', 'Real-time 30fps+ processing', 'Export BVH/FBX animation']],
        'virtual-presenter' => ['title' => 'Virtual Presenter AI', 'icon' => 'fa-chalkboard-teacher', 'color' => 'emerald', 'desc' => 'Presentasi dengan avatar AI — teleprompter pintar, gesture otomatis, dan AI slide generator.', 'features' => ['AI Teleprompter', 'Auto gesture animation', 'Slide generation AI', 'Virtual background', 'Recording & streaming']],
        'ai-voice' => ['title' => 'AI Voice Lab', 'icon' => 'fa-microphone-alt', 'color' => 'rose', 'desc' => 'Voice synthesis, cloning, TTS & STT — 100+ suara natural di 50+ bahasa.', 'features' => ['100+ natural voices', 'Voice cloning AI', 'Text-to-Speech premium', 'Speech-to-Text 50+ bahasa', 'Custom voice training']],
        'ai-translator' => ['title' => 'AI Translator Pro', 'icon' => 'fa-language', 'color' => 'kvt', 'desc' => 'Terjemahan real-time 120+ bahasa dengan AI — dokumen, percakapan, dan subtitle otomatis.', 'features' => ['120+ bahasa support', 'Real-time translation', 'Document translation', 'Subtitle auto-generate', 'Context-aware translation']],
        'ai-tutor' => ['title' => 'AI Tutor Personal', 'icon' => 'fa-user-graduate', 'color' => 'yellow', 'desc' => 'Guru AI personal yang adaptif — sesuaikan pace belajar dengan kemampuanmu.', 'features' => ['Math Solver AI visual', 'Science tutor interaktif', 'Adaptive learning path', 'Progress tracking detail', 'Penjelasan step-by-step']],
        'ai-writer' => ['title' => 'AI Writer Studio', 'icon' => 'fa-pen-fancy', 'color' => 'amber', 'desc' => 'Tulis konten berkualitas dengan bantuan AI — essay, artikel, copywriting, dan creative writing.', 'features' => ['Essay Generator akademik', 'Article writing assistant', 'Copywriting templates', 'Grammar & style checker', 'Plagiarism detection']],
    ];
    $slug = request()->segment(2) ?? 'ai-playground';
    $page = $pageData[$slug] ?? ['title' => ucwords(str_replace('-', ' ', $slug)), 'icon' => 'fa-rocket', 'color' => 'kvt', 'desc' => 'Fitur inovasi AI & teknologi terbaru di KVT Hub — jelajahi dan manfaatkan untuk akselerasi belajarmu.', 'features' => ['Antarmuka modern & interaktif', 'Powered by AI terkini', 'Gratis untuk semua pengguna', 'Terintegrasi dengan ekosistem KVT Hub', 'Dukungan multi-platform']];
    $colorMap = ['purple'=>'#a855f7','indigo'=>'#6366f1','cyan'=>'#06b6d4','blue'=>'#3b82f6','pink'=>'#ec4899','violet'=>'#8b5cf6','green'=>'#22c55e','amber'=>'#f59e0b','fuchsia'=>'#d946ef','sky'=>'#0ea5e9','lime'=>'#84cc16','emerald'=>'#10b981','rose'=>'#f43f5e','kvt'=>'#3399FF','yellow'=>'#eab308','red'=>'#ef4444','orange'=>'#f97316','teal'=>'#14b8a6','gray'=>'#9ca3af'];
    $c = $colorMap[$page['color']] ?? '#3399FF';
@endphp

@section('judul', $page['title'] . ' — KVT Hub Innovation')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden py-20 lg:py-28">
        <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-kvt-950"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, {{ $c }} 1px, transparent 1px); background-size: 50px 50px;"></div>
        <div class="absolute top-10 right-10 w-96 h-96 rounded-full blur-3xl opacity-15" style="background: {{ $c }};"></div>
        <div class="absolute bottom-10 left-10 w-72 h-72 rounded-full blur-3xl opacity-10" style="background: {{ $c }};"></div>

        <div class="relative max-w-6xl mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border mb-6" style="background: {{ $c }}15; border-color: {{ $c }}30;">
                    <i class="fas {{ $page['icon'] }} text-sm" style="color: {{ $c }};"></i>
                    <span class="text-sm font-medium" style="color: {{ $c }};">Innovation Hub</span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-black text-white mb-4">{{ $page['title'] }}</h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">{{ $page['desc'] }}</p>
            </div>

            {{-- Feature Cards --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
                @foreach($page['features'] as $i => $feature)
                <div class="bg-kvt-900/60 backdrop-blur border border-kvt-700/30 rounded-xl p-5 hover:border-opacity-50 transition group" style="hover:border-color: {{ $c }}50;">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-3" style="background: {{ $c }}15;">
                        <i class="fas fa-check text-sm" style="color: {{ $c }};"></i>
                    </div>
                    <p class="text-white font-medium text-sm">{{ $feature }}</p>
                </div>
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="inline-flex items-center gap-4 bg-kvt-900/80 backdrop-blur border border-kvt-700/30 rounded-2xl p-6">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, {{ $c }}, {{ $c }}80);">
                        <i class="fas {{ $page['icon'] }} text-white text-xl"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-white font-bold text-lg">Mulai {{ $page['title'] }}</div>
                        <div class="text-gray-500 text-sm">Daftar gratis untuk akses penuh</div>
                    </div>
                    <a href="{{ route('daftar') }}" class="px-6 py-3 rounded-xl text-white font-semibold transition hover:-translate-y-0.5" style="background: {{ $c }};">
                        Mulai <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Navigation Links --}}
    <section class="py-12 border-t border-kvt-800/50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-xl font-bold text-white mb-6">Jelajahi Inovasi Lainnya</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @php
                $navLinks = [
                    ['AI Playground', 'fa-flask', 'ai-playground', 'purple'],
                    ['ML Training', 'fa-brain', 'ml-training', 'indigo'],
                    ['NLP Studio', 'fa-comment-dots', 'nlp-studio', 'cyan'],
                    ['Vision AI', 'fa-eye', 'computer-vision', 'blue'],
                    ['AI VTuber', 'fa-user-astronaut', 'ai-vtuber', 'fuchsia'],
                    ['Smart IoT', 'fa-tachometer-alt', 'smart-dashboard', 'teal'],
                    ['Digital Twin', 'fa-city', 'digital-twin', 'kvt'],
                    ['Quantum Lab', 'fa-atom', 'quantum-lab', 'violet'],
                    ['Cyber Range', 'fa-shield-virus', 'cyber-range', 'red'],
                    ['Robot Sim', 'fa-robot', 'robot-simulator', 'indigo'],
                    ['Space Lab', 'fa-rocket', 'space-lab', 'sky'],
                    ['Innovation', 'fa-lightbulb', 'innovation-garage', 'yellow'],
                ];
                @endphp
                @foreach($navLinks as $link)
                <a href="/inovasi/{{ $link[2] }}" class="flex items-center gap-2 bg-kvt-900/50 border border-kvt-700/20 rounded-lg px-3 py-2.5 text-gray-400 hover:text-white hover:border-kvt-500/30 transition text-sm">
                    <i class="fas {{ $link[1] }} text-{{ $link[3] }}-400 text-xs"></i>
                    <span>{{ $link[0] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
