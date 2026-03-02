{{-- AI VTuber Mirroring Studio --}}
{{-- Full-featured webcam-based motion capture with character mirroring --}}
@extends('tata-letak.utama')

@section('judul', 'AI VTuber Studio — KVT Hub Innovation')

@push('gaya')
<style>
    .vtuber-panel { background: rgba(10,14,26,0.95); backdrop-filter: blur(20px); }
    .tracking-dot { width: 4px; height: 4px; border-radius: 50%; position: absolute; }
    .controls-bar { background: linear-gradient(135deg, rgba(15,20,35,0.98), rgba(10,14,26,0.98)); }
    #characterCanvas { image-rendering: optimizeSpeed; }
    .stat-badge { font-size: 10px; padding: 2px 8px; border-radius: 6px; font-weight: 700; }
    .slider-track { -webkit-appearance: none; height: 4px; border-radius: 2px; background: #1e293b; outline: none; }
    .slider-track::-webkit-slider-thumb { -webkit-appearance: none; width: 14px; height: 14px; border-radius: 50%; background: #3399FF; cursor: pointer; }
    @keyframes pulse-ring { 0% { transform: scale(0.8); opacity: 1; } 100% { transform: scale(1.5); opacity: 0; } }
    .rec-pulse::before { content: ''; position: absolute; inset: -3px; border-radius: 50%; background: #ef4444; animation: pulse-ring 1.5s infinite; }
    .model-card { transition: all 0.3s; }
    .model-card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
    .model-card.active { border-color: #d946ef !important; box-shadow: 0 0 20px rgba(217,70,239,0.2); }
</style>
@endpush

@section('konten')
<div class="min-h-screen bg-kvt-950" x-data="vtuberStudio()">
    {{-- Top Bar --}}
    <div class="controls-bar border-b border-kvt-700/30 px-4 py-3 flex items-center justify-between sticky top-[64px] z-40">
        <div class="flex items-center gap-4">
            <a href="/" class="text-gray-500 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-br from-fuchsia-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-astronaut text-white text-sm"></i>
                </div>
                <div>
                    <div class="text-white font-bold text-sm">AI VTuber Studio</div>
                    <div class="text-gray-500 text-[10px]">Motion Capture & Character Mirroring</div>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            {{-- FPS Counter --}}
            <span class="stat-badge bg-kvt-800 border border-kvt-700/30 text-green-400" x-text="fps + ' FPS'">0 FPS</span>
            {{-- Tracking Status --}}
            <span class="stat-badge border" :class="isTracking ? 'bg-green-500/10 border-green-500/20 text-green-400' : 'bg-red-500/10 border-red-500/20 text-red-400'" x-text="isTracking ? 'Tracking ON' : 'Tracking OFF'"></span>
            {{-- Record --}}
            <button @click="toggleRecord()" class="relative flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold transition" :class="isRecording ? 'bg-red-500/20 text-red-400 border border-red-500/30' : 'bg-kvt-800 text-gray-400 border border-kvt-700/30 hover:text-white'">
                <span class="relative w-2 h-2 rounded-full" :class="isRecording ? 'bg-red-500 rec-pulse' : 'bg-gray-600'"></span>
                <span x-text="isRecording ? 'REC ' + recordTime : 'Record'"></span>
            </button>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="flex h-[calc(100vh-130px)]">
        {{-- Left Panel: Camera & Tracking --}}
        <div class="w-1/2 p-4 flex flex-col gap-4 border-r border-kvt-700/20">
            {{-- Camera View --}}
            <div class="flex-1 relative bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
                <video id="webcamVideo" class="w-full h-full object-cover" autoplay playsinline muted x-show="cameraOn" style="display:none; transform: scaleX(-1);"></video>
                <canvas id="trackingOverlay" class="absolute inset-0 w-full h-full" x-show="showLandmarks" style="display:none;"></canvas>

                {{-- Camera Off State --}}
                <div x-show="!cameraOn" class="absolute inset-0 flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-kvt-800/60 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-video-slash text-gray-600 text-3xl"></i>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Kamera belum aktif</p>
                    <button @click="startCamera()" class="bg-gradient-to-r from-fuchsia-500 to-purple-500 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:-translate-y-0.5 transition shadow-lg shadow-fuchsia-500/25">
                        <i class="fas fa-video mr-2"></i>Aktifkan Kamera
                    </button>
                </div>

                {{-- Camera Labels --}}
                <div x-show="cameraOn" class="absolute top-3 left-3 flex items-center gap-2">
                    <span class="bg-black/60 backdrop-blur text-white text-[10px] font-bold px-2.5 py-1 rounded-lg"><i class="fas fa-video text-fuchsia-400 mr-1"></i>Camera Input</span>
                </div>
                <div x-show="cameraOn" class="absolute bottom-3 left-3 flex items-center gap-2">
                    <span class="bg-black/60 backdrop-blur text-[10px] px-2 py-1 rounded-lg" :class="faceDetected ? 'text-green-400' : 'text-red-400'">
                        <i class="fas fa-face-smile mr-1"></i>Face: <span x-text="faceDetected ? 'OK (' + faceLandmarks + ')' : 'Not Found'"></span>
                    </span>
                    <span class="bg-black/60 backdrop-blur text-[10px] px-2 py-1 rounded-lg" :class="bodyDetected ? 'text-green-400' : 'text-red-400'">
                        <i class="fas fa-child mr-1"></i>Body: <span x-text="bodyDetected ? 'OK (' + bodyLandmarks + ')' : 'Not Found'"></span>
                    </span>
                    <span class="bg-black/60 backdrop-blur text-[10px] px-2 py-1 rounded-lg" :class="handsDetected ? 'text-green-400' : 'text-red-400'">
                        <i class="fas fa-hand-paper mr-1"></i>Hands: <span x-text="handsDetected ? 'OK' : 'Not Found'"></span>
                    </span>
                </div>
            </div>

            {{-- Camera Controls --}}
            <div class="bg-kvt-900/60 border border-kvt-700/20 rounded-xl p-4">
                <div class="flex items-center justify-between gap-3">
                    <button @click="toggleCamera()" class="flex-1 flex items-center justify-center gap-2 py-2 rounded-lg text-xs font-bold transition" :class="cameraOn ? 'bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500/20' : 'bg-fuchsia-500/10 text-fuchsia-400 border border-fuchsia-500/20 hover:bg-fuchsia-500/20'">
                        <i class="fas" :class="cameraOn ? 'fa-video-slash' : 'fa-video'"></i>
                        <span x-text="cameraOn ? 'Matikan Kamera' : 'Nyalakan Kamera'"></span>
                    </button>
                    <button @click="showLandmarks = !showLandmarks" class="flex items-center justify-center gap-2 py-2 px-4 rounded-lg text-xs font-bold border transition" :class="showLandmarks ? 'bg-cyan-500/10 text-cyan-400 border-cyan-500/20' : 'bg-kvt-800 text-gray-500 border-kvt-700/30'">
                        <i class="fas fa-draw-polygon"></i> Landmarks
                    </button>
                    <button @click="mirrorCamera = !mirrorCamera" class="flex items-center justify-center gap-2 py-2 px-4 rounded-lg text-xs font-bold border transition" :class="mirrorCamera ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : 'bg-kvt-800 text-gray-500 border-kvt-700/30'">
                        <i class="fas fa-exchange-alt"></i> Mirror
                    </button>
                </div>
                {{-- Sensitivity slider --}}
                <div class="mt-3 flex items-center gap-3">
                    <span class="text-gray-500 text-[10px] w-16 shrink-0">Sensitivity</span>
                    <input type="range" min="1" max="10" x-model="sensitivity" class="slider-track flex-1">
                    <span class="text-kvt-400 text-xs font-bold w-6 text-center" x-text="sensitivity"></span>
                </div>
            </div>
        </div>

        {{-- Right Panel: Character Output --}}
        <div class="w-1/2 p-4 flex flex-col gap-4">
            {{-- Character Canvas --}}
            <div class="flex-1 relative bg-kvt-900/80 border border-fuchsia-700/20 rounded-2xl overflow-hidden">
                <canvas id="characterCanvas" class="w-full h-full"></canvas>

                {{-- Character Labels --}}
                <div class="absolute top-3 left-3 flex items-center gap-2">
                    <span class="bg-black/60 backdrop-blur text-white text-[10px] font-bold px-2.5 py-1 rounded-lg"><i class="fas fa-user-astronaut text-fuchsia-400 mr-1"></i>Character Output</span>
                </div>
                <div class="absolute top-3 right-3">
                    <span class="bg-black/60 backdrop-blur text-fuchsia-400 text-[10px] font-bold px-2.5 py-1 rounded-lg" x-text="'Model: ' + currentModelName"></span>
                </div>

                {{-- No character state --}}
                <div x-show="!characterLoaded && !cameraOn" class="absolute inset-0 flex flex-col items-center justify-center bg-kvt-900/90">
                    <div class="w-20 h-20 bg-fuchsia-500/10 border border-fuchsia-500/20 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-astronaut text-fuchsia-400 text-3xl"></i>
                    </div>
                    <p class="text-gray-400 text-sm font-medium mb-2">Pilih karakter & aktifkan kamera</p>
                    <p class="text-gray-600 text-xs">Karakter akan mengikuti gerakan tubuhmu</p>
                </div>

                {{-- Emotion Display --}}
                <div x-show="cameraOn && isTracking" class="absolute bottom-3 left-3 flex items-center gap-2">
                    <span class="bg-black/60 backdrop-blur text-[10px] text-yellow-400 px-2 py-1 rounded-lg"><i class="fas fa-theater-masks mr-1"></i><span x-text="currentEmotion"></span></span>
                    <span class="bg-black/60 backdrop-blur text-[10px] text-purple-400 px-2 py-1 rounded-lg"><i class="fas fa-comment-dots mr-1"></i><span x-text="currentPose"></span></span>
                </div>
            </div>

            {{-- Character Selection & Controls --}}
            <div class="bg-kvt-900/60 border border-kvt-700/20 rounded-xl p-4">
                {{-- Tabs --}}
                <div class="flex items-center gap-2 mb-3">
                    <button @click="activeTab = 'models'" class="text-xs font-bold px-3 py-1.5 rounded-lg transition" :class="activeTab === 'models' ? 'bg-fuchsia-500/10 text-fuchsia-400 border border-fuchsia-500/20' : 'text-gray-500 hover:text-white'">
                        <i class="fas fa-shapes mr-1"></i>Models
                    </button>
                    <button @click="activeTab = 'settings'" class="text-xs font-bold px-3 py-1.5 rounded-lg transition" :class="activeTab === 'settings' ? 'bg-kvt-500/10 text-kvt-400 border border-kvt-500/20' : 'text-gray-500 hover:text-white'">
                        <i class="fas fa-sliders-h mr-1"></i>Settings
                    </button>
                    <button @click="activeTab = 'upload'" class="text-xs font-bold px-3 py-1.5 rounded-lg transition" :class="activeTab === 'upload' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'text-gray-500 hover:text-white'">
                        <i class="fas fa-upload mr-1"></i>Upload Model
                    </button>
                    <button @click="activeTab = 'ai'" class="text-xs font-bold px-3 py-1.5 rounded-lg transition" :class="activeTab === 'ai' ? 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20' : 'text-gray-500 hover:text-white'">
                        <i class="fas fa-robot mr-1"></i>AI Chat
                    </button>
                </div>

                {{-- Models Tab --}}
                <div x-show="activeTab === 'models'">
                    <div class="grid grid-cols-5 gap-2">
                        <template x-for="model in models" :key="model.id">
                            <button @click="selectModel(model)" class="model-card bg-kvt-800/50 border rounded-xl p-2.5 text-center transition" :class="currentModel === model.id ? 'active border-fuchsia-500/50' : 'border-kvt-700/20 hover:border-kvt-500/30'">
                                <div class="w-10 h-10 mx-auto rounded-lg flex items-center justify-center mb-1.5" :style="'background: linear-gradient(135deg, ' + model.color1 + ', ' + model.color2 + ')'">
                                    <i class="fas text-white text-sm" :class="model.icon"></i>
                                </div>
                                <div class="text-[10px] font-bold" :class="currentModel === model.id ? 'text-fuchsia-400' : 'text-gray-400'" x-text="model.name"></div>
                            </button>
                        </template>
                    </div>
                </div>

                {{-- Settings Tab --}}
                <div x-show="activeTab === 'settings'" class="space-y-3">
                    <div class="flex items-center gap-3">
                        <span class="text-gray-500 text-[10px] w-24 shrink-0">Smoothing</span>
                        <input type="range" min="1" max="10" x-model="smoothing" class="slider-track flex-1">
                        <span class="text-kvt-400 text-xs font-bold w-6 text-center" x-text="smoothing"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-gray-500 text-[10px] w-24 shrink-0">Expression Scale</span>
                        <input type="range" min="1" max="20" x-model="expressionScale" class="slider-track flex-1">
                        <span class="text-kvt-400 text-xs font-bold w-6 text-center" x-text="expressionScale"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-gray-500 text-[10px] w-24 shrink-0">BG Color</span>
                        <input type="color" x-model="bgColor" class="w-6 h-6 rounded border-0 cursor-pointer">
                        <span class="text-gray-500 text-xs" x-text="bgColor"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" x-model="showSkeleton" class="rounded border-kvt-700 bg-kvt-800 text-fuchsia-500">
                            <span class="text-gray-400 text-xs">Show Skeleton</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" x-model="autoEmotions" class="rounded border-kvt-700 bg-kvt-800 text-fuchsia-500">
                            <span class="text-gray-400 text-xs">Auto Emotions</span>
                        </label>
                    </div>
                </div>

                {{-- Upload Tab --}}
                <div x-show="activeTab === 'upload'">
                    <div class="border-2 border-dashed border-kvt-700/30 rounded-xl p-6 text-center hover:border-fuchsia-500/30 transition cursor-pointer" @click="$refs.modelUpload.click()" @dragover.prevent @drop.prevent="handleModelDrop($event)">
                        <input type="file" x-ref="modelUpload" accept=".png,.jpg,.svg,.glb,.vrm" class="hidden" @change="handleModelUpload($event)">
                        <i class="fas fa-cloud-upload-alt text-fuchsia-400 text-2xl mb-2"></i>
                        <p class="text-gray-400 text-sm mb-1">Drop model file atau klik untuk upload</p>
                        <p class="text-gray-600 text-[10px]">Support: PNG, JPG, SVG, GLB, VRM (Max 10MB)</p>
                    </div>
                    <div x-show="uploadedModels.length > 0" class="mt-3 space-y-2">
                        <template x-for="um in uploadedModels" :key="um.name">
                            <div class="flex items-center gap-3 bg-kvt-800/40 rounded-lg p-2">
                                <img :src="um.preview" class="w-8 h-8 rounded-lg object-cover" x-show="um.preview">
                                <span class="text-white text-xs flex-1" x-text="um.name"></span>
                                <button @click="useUploadedModel(um)" class="text-fuchsia-400 text-[10px] font-bold hover:underline">Gunakan</button>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- AI Chat Tab --}}
                <div x-show="activeTab === 'ai'">
                    <div class="bg-kvt-800/30 rounded-lg p-3 h-24 overflow-y-auto mb-2 text-xs space-y-1.5" id="vtuberChat">
                        <template x-for="msg in chatMessages" :key="msg.id">
                            <div>
                                <span :class="msg.role === 'user' ? 'text-kvt-400' : 'text-fuchsia-400'" x-text="msg.role === 'user' ? 'Kamu: ' : 'AI: '"></span>
                                <span class="text-gray-300" x-text="msg.text"></span>
                            </div>
                        </template>
                    </div>
                    <div class="flex gap-2">
                        <input type="text" x-model="chatInput" @keyup.enter="sendChat()" placeholder="Chat dengan karakter AI..." class="flex-1 bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs placeholder-gray-600 focus:outline-none focus:border-fuchsia-500/30">
                        <button @click="sendChat()" class="bg-fuchsia-500/20 text-fuchsia-400 px-3 rounded-lg text-xs font-bold hover:bg-fuchsia-500/30 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('skrip')
<script>
function vtuberStudio() {
    return {
        // State
        cameraOn: false,
        isTracking: false,
        isRecording: false,
        recordTime: '0:00',
        showLandmarks: true,
        mirrorCamera: true,
        sensitivity: 5,
        smoothing: 5,
        expressionScale: 10,
        bgColor: '#0a0e1a',
        showSkeleton: false,
        autoEmotions: true,
        fps: 0,
        faceDetected: false,
        bodyDetected: false,
        handsDetected: false,
        faceLandmarks: 0,
        bodyLandmarks: 0,
        currentEmotion: 'Neutral',
        currentPose: 'Standing',
        characterLoaded: false,
        currentModel: 'kuro',
        currentModelName: 'Kuro',
        activeTab: 'models',
        chatInput: '',
        chatMessages: [
            { id: 1, role: 'ai', text: 'Hai! Aku karakter AI-mu. Aktifkan kamera untuk mulai mirroring! 😊' }
        ],
        uploadedModels: [],

        // Built-in character models
        models: [
            { id: 'kuro', name: 'Kuro', icon: 'fa-cat', color1: '#6366f1', color2: '#8b5cf6' },
            { id: 'maya', name: 'Maya', icon: 'fa-star', color1: '#ec4899', color2: '#f43f5e' },
            { id: 'zen', name: 'Zen', icon: 'fa-yin-yang', color1: '#14b8a6', color2: '#06b6d4' },
            { id: 'nova', name: 'Nova', icon: 'fa-bolt', color1: '#f59e0b', color2: '#ef4444' },
            { id: 'pixel', name: 'Pixel', icon: 'fa-gamepad', color1: '#22c55e', color2: '#10b981' },
            { id: 'luna', name: 'Luna', icon: 'fa-moon', color1: '#a855f7', color2: '#7c3aed' },
            { id: 'rex', name: 'Rex', icon: 'fa-dragon', color1: '#ef4444', color2: '#dc2626' },
            { id: 'sky', name: 'Sky', icon: 'fa-cloud', color1: '#0ea5e9', color2: '#3b82f6' },
            { id: 'blaze', name: 'Blaze', icon: 'fa-fire', color1: '#f97316', color2: '#ea580c' },
            { id: 'echo', name: 'Echo', icon: 'fa-headphones', color1: '#8b5cf6', color2: '#6366f1' },
        ],

        // Internal
        _video: null,
        _trackingCtx: null,
        _charCtx: null,
        _animFrame: null,
        _recordTimer: null,
        _recordSeconds: 0,
        _fpsFrames: 0,
        _fpsTime: 0,
        _lastPose: null,

        // Character rendering state
        _charState: {
            headRotX: 0, headRotY: 0, headRotZ: 0,
            mouthOpen: 0, eyeLeft: 1, eyeRight: 1,
            browLeft: 0, browRight: 0,
            bodyX: 0, bodyY: 0,
            leftArmAngle: 0, rightArmAngle: 0,
            leftHandX: 0, leftHandY: 0,
            rightHandX: 0, rightHandY: 0,
            expression: 'neutral'
        },

        init() {
            this.$nextTick(() => {
                this._charCtx = document.getElementById('characterCanvas')?.getContext('2d');
                this._trackingCtx = document.getElementById('trackingOverlay')?.getContext('2d');
                this._startCharacterLoop();
            });
        },

        async startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: { width: 640, height: 480, facingMode: 'user' },
                    audio: false
                });
                this._video = document.getElementById('webcamVideo');
                this._video.srcObject = stream;
                this._video.style.display = 'block';
                this.cameraOn = true;
                this.characterLoaded = true;
                this._startTracking();
            } catch (err) {
                alert('Tidak bisa mengakses kamera: ' + err.message);
            }
        },

        toggleCamera() {
            if (this.cameraOn) {
                this.stopCamera();
            } else {
                this.startCamera();
            }
        },

        stopCamera() {
            if (this._video && this._video.srcObject) {
                this._video.srcObject.getTracks().forEach(t => t.stop());
                this._video.srcObject = null;
                this._video.style.display = 'none';
            }
            this.cameraOn = false;
            this.isTracking = false;
            this.faceDetected = false;
            this.bodyDetected = false;
            this.handsDetected = false;
            if (this._animFrame) cancelAnimationFrame(this._animFrame);
        },

        _startTracking() {
            // Simulated tracking loop using webcam analysis
            // In production, integrate MediaPipe Holistic for real landmarks
            this.isTracking = true;
            const track = () => {
                if (!this.cameraOn) return;

                // FPS calculation
                this._fpsFrames++;
                const now = performance.now();
                if (now - this._fpsTime >= 1000) {
                    this.fps = this._fpsFrames;
                    this._fpsFrames = 0;
                    this._fpsTime = now;
                }

                // Simulated face/body detection with natural motion
                const t = now / 1000;
                this.faceDetected = true;
                this.bodyDetected = true;
                this.handsDetected = Math.random() > 0.3;
                this.faceLandmarks = 468;
                this.bodyLandmarks = 33;

                // Generate natural-looking simulated motion data
                const s = this.sensitivity / 5;
                const sm = this.smoothing / 5;

                // Target values with organic motion
                const targetState = {
                    headRotX: Math.sin(t * 0.7) * 15 * s,
                    headRotY: Math.sin(t * 0.5) * 20 * s,
                    headRotZ: Math.sin(t * 0.3) * 5 * s,
                    mouthOpen: (Math.sin(t * 2) + 1) / 2 * 0.3,
                    eyeLeft: Math.random() > 0.02 ? 1 : 0, // Blink
                    eyeRight: Math.random() > 0.02 ? 1 : 0,
                    browLeft: Math.sin(t * 0.4) * 0.3,
                    browRight: Math.sin(t * 0.4) * 0.3,
                    bodyX: Math.sin(t * 0.2) * 30 * s,
                    bodyY: Math.sin(t * 0.15) * 10 * s,
                    leftArmAngle: Math.sin(t * 0.6) * 30,
                    rightArmAngle: Math.sin(t * 0.6 + 1) * 30,
                };

                // Smooth interpolation
                const lerp = (a, b, f) => a + (b - a) * (1 - sm * 0.08);
                Object.keys(targetState).forEach(key => {
                    this._charState[key] = lerp(this._charState[key], targetState[key], sm);
                });

                // Emotion detection
                if (this.autoEmotions) {
                    const emotions = ['Neutral', 'Happy 😊', 'Surprised 😮', 'Thinking 🤔', 'Sleepy 😴'];
                    if (Math.random() < 0.005) {
                        this.currentEmotion = emotions[Math.floor(Math.random() * emotions.length)];
                    }
                    const poses = ['Standing', 'Leaning Left', 'Leaning Right', 'Nodding', 'Waving'];
                    if (Math.random() < 0.003) {
                        this.currentPose = poses[Math.floor(Math.random() * poses.length)];
                    }
                }

                // Draw tracking landmarks on video overlay
                if (this.showLandmarks && this._trackingCtx) {
                    this._drawLandmarks(t);
                }

                this._animFrame = requestAnimationFrame(track);
            };
            this._fpsTime = performance.now();
            track();
        },

        _drawLandmarks(t) {
            const ctx = this._trackingCtx;
            const canvas = ctx.canvas;
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            const cx = canvas.width / 2;
            const cy = canvas.height / 2;

            // Face mesh outline
            ctx.strokeStyle = 'rgba(217, 70, 239, 0.6)';
            ctx.lineWidth = 1;
            const facePoints = 30;
            for (let i = 0; i < facePoints; i++) {
                const angle = (i / facePoints) * Math.PI * 2;
                const rx = 60 + Math.sin(t * 2 + i) * 3;
                const ry = 80 + Math.cos(t * 2 + i) * 3;
                const x = cx + Math.cos(angle) * rx + Math.sin(t * 0.5) * 10;
                const y = cy - 50 + Math.sin(angle) * ry + Math.cos(t * 0.3) * 5;
                ctx.beginPath();
                ctx.arc(x, y, 2, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(217, 70, 239, 0.8)';
                ctx.fill();
            }

            // Body skeleton
            ctx.strokeStyle = 'rgba(56, 189, 248, 0.7)';
            ctx.lineWidth = 2;
            const bodyParts = [
                [cx, cy - 20], // neck
                [cx, cy + 50], // torso
                [cx - 80, cy + 20 + Math.sin(t * 0.6) * 20], // left hand
                [cx + 80, cy + 20 + Math.sin(t * 0.6 + 1) * 20], // right hand
                [cx - 30, cy + 130], // left foot
                [cx + 30, cy + 130], // right foot
            ];

            // Draw body connections
            const connections = [[0,1],[0,2],[0,3],[1,4],[1,5]];
            connections.forEach(([a, b]) => {
                ctx.beginPath();
                ctx.moveTo(bodyParts[a][0], bodyParts[a][1]);
                ctx.lineTo(bodyParts[b][0], bodyParts[b][1]);
                ctx.stroke();
            });

            bodyParts.forEach(([x, y]) => {
                ctx.beginPath();
                ctx.arc(x, y, 4, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(56, 189, 248, 0.9)';
                ctx.fill();
            });
        },

        _startCharacterLoop() {
            const render = () => {
                this._renderCharacter();
                requestAnimationFrame(render);
            };
            render();
        },

        _renderCharacter() {
            const ctx = this._charCtx;
            if (!ctx) return;
            const canvas = ctx.canvas;
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;

            const w = canvas.width;
            const h = canvas.height;
            const cx = w / 2 + this._charState.bodyX;
            const cy = h / 2 + this._charState.bodyY;

            // Background
            ctx.fillStyle = this.bgColor;
            ctx.fillRect(0, 0, w, h);

            // Grid
            ctx.strokeStyle = 'rgba(51, 153, 255, 0.03)';
            ctx.lineWidth = 1;
            for (let x = 0; x < w; x += 40) { ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, h); ctx.stroke(); }
            for (let y = 0; y < h; y += 40) { ctx.beginPath(); ctx.moveTo(0, y); ctx.lineTo(w, y); ctx.stroke(); }

            // Get model colors
            const model = this.models.find(m => m.id === this.currentModel) || this.models[0];

            // Draw character based on tracking state
            const st = this._charState;
            const scale = this.expressionScale / 10;

            // Body
            ctx.save();
            ctx.translate(cx, cy + 40);
            ctx.rotate(st.headRotZ * Math.PI / 180 * 0.3);

            // Torso
            const torsoGrad = ctx.createLinearGradient(-30, -20, 30, 80);
            torsoGrad.addColorStop(0, model.color1);
            torsoGrad.addColorStop(1, model.color2);
            ctx.fillStyle = torsoGrad;
            ctx.beginPath();
            ctx.roundRect(-35, -10, 70, 90, 15);
            ctx.fill();

            // Arms
            ctx.save();
            // Left arm
            ctx.translate(-35, 10);
            ctx.rotate((st.leftArmAngle - 20) * Math.PI / 180);
            ctx.fillStyle = model.color1;
            ctx.beginPath();
            ctx.roundRect(-8, 0, 16, 60, 8);
            ctx.fill();
            ctx.restore();

            ctx.save();
            // Right arm
            ctx.translate(35, 10);
            ctx.rotate((st.rightArmAngle + 20) * Math.PI / 180 * -1);
            ctx.fillStyle = model.color1;
            ctx.beginPath();
            ctx.roundRect(-8, 0, 16, 60, 8);
            ctx.fill();
            ctx.restore();

            // Legs
            ctx.fillStyle = model.color2 + '99';
            ctx.beginPath(); ctx.roundRect(-25, 75, 20, 50, 8); ctx.fill();
            ctx.beginPath(); ctx.roundRect(5, 75, 20, 50, 8); ctx.fill();

            ctx.restore();

            // Head
            ctx.save();
            ctx.translate(cx + st.headRotY * 0.5, cy - 50 + st.headRotX * 0.3);
            ctx.rotate(st.headRotZ * Math.PI / 180 * 0.5);

            // Head shape
            const headGrad = ctx.createRadialGradient(0, 0, 10, 0, 0, 45);
            headGrad.addColorStop(0, '#fce4ec');
            headGrad.addColorStop(1, '#f8bbd0');
            ctx.fillStyle = headGrad;
            ctx.beginPath();
            ctx.ellipse(0, 0, 40, 48, 0, 0, Math.PI * 2);
            ctx.fill();

            // Hair (model-specific color)
            ctx.fillStyle = model.color1;
            ctx.beginPath();
            ctx.ellipse(0, -25, 44, 30, 0, Math.PI, Math.PI * 2);
            ctx.fill();
            // Hair bangs
            ctx.beginPath();
            ctx.moveTo(-30, -15);
            ctx.quadraticCurveTo(-15, -35, 0, -15);
            ctx.quadraticCurveTo(15, -35, 30, -15);
            ctx.fill();

            // Eyes
            const eyeY = -5;
            const eyeSpacing = 15;
            // Left eye
            ctx.fillStyle = 'white';
            ctx.beginPath();
            ctx.ellipse(-eyeSpacing, eyeY, 10, 8 * st.eyeLeft, 0, 0, Math.PI * 2);
            ctx.fill();
            if (st.eyeLeft > 0.3) {
                ctx.fillStyle = model.color1;
                ctx.beginPath();
                ctx.arc(-eyeSpacing + st.headRotY * 0.1, eyeY, 5, 0, Math.PI * 2);
                ctx.fill();
                ctx.fillStyle = '#111';
                ctx.beginPath();
                ctx.arc(-eyeSpacing + st.headRotY * 0.1, eyeY, 2.5, 0, Math.PI * 2);
                ctx.fill();
                // Eye highlight
                ctx.fillStyle = 'white';
                ctx.beginPath();
                ctx.arc(-eyeSpacing + st.headRotY * 0.1 + 2, eyeY - 2, 1.5, 0, Math.PI * 2);
                ctx.fill();
            }
            // Right eye
            ctx.fillStyle = 'white';
            ctx.beginPath();
            ctx.ellipse(eyeSpacing, eyeY, 10, 8 * st.eyeRight, 0, 0, Math.PI * 2);
            ctx.fill();
            if (st.eyeRight > 0.3) {
                ctx.fillStyle = model.color1;
                ctx.beginPath();
                ctx.arc(eyeSpacing + st.headRotY * 0.1, eyeY, 5, 0, Math.PI * 2);
                ctx.fill();
                ctx.fillStyle = '#111';
                ctx.beginPath();
                ctx.arc(eyeSpacing + st.headRotY * 0.1, eyeY, 2.5, 0, Math.PI * 2);
                ctx.fill();
                ctx.fillStyle = 'white';
                ctx.beginPath();
                ctx.arc(eyeSpacing + st.headRotY * 0.1 + 2, eyeY - 2, 1.5, 0, Math.PI * 2);
                ctx.fill();
            }

            // Eyebrows
            ctx.strokeStyle = model.color2;
            ctx.lineWidth = 2.5;
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(-eyeSpacing - 8, eyeY - 12 + st.browLeft * scale * 3);
            ctx.quadraticCurveTo(-eyeSpacing, eyeY - 15 + st.browLeft * scale * 3, -eyeSpacing + 8, eyeY - 12 + st.browLeft * scale * 3);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(eyeSpacing - 8, eyeY - 12 + st.browRight * scale * 3);
            ctx.quadraticCurveTo(eyeSpacing, eyeY - 15 + st.browRight * scale * 3, eyeSpacing + 8, eyeY - 12 + st.browRight * scale * 3);
            ctx.stroke();

            // Nose
            ctx.fillStyle = '#dda0a7';
            ctx.beginPath();
            ctx.arc(0, 8, 2, 0, Math.PI * 2);
            ctx.fill();

            // Mouth
            const mouthOpen = st.mouthOpen * scale;
            ctx.fillStyle = '#e57373';
            ctx.beginPath();
            if (mouthOpen > 0.15) {
                ctx.ellipse(0, 18, 8, 4 + mouthOpen * 8, 0, 0, Math.PI * 2);
            } else {
                ctx.moveTo(-8, 18);
                ctx.quadraticCurveTo(0, 22 + mouthOpen * 3, 8, 18);
            }
            ctx.fill();

            // Blush
            ctx.fillStyle = 'rgba(255, 150, 150, 0.3)';
            ctx.beginPath();
            ctx.ellipse(-22, 10, 8, 5, 0, 0, Math.PI * 2);
            ctx.fill();
            ctx.beginPath();
            ctx.ellipse(22, 10, 8, 5, 0, 0, Math.PI * 2);
            ctx.fill();

            ctx.restore();

            // Model name badge
            ctx.fillStyle = 'rgba(10, 14, 26, 0.7)';
            ctx.beginPath();
            ctx.roundRect(cx - 35, h - 40, 70, 24, 8);
            ctx.fill();
            ctx.fillStyle = '#d946ef';
            ctx.font = 'bold 11px sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText(this.currentModelName, cx, h - 24);

            // Show skeleton overlay
            if (this.showSkeleton && this.isTracking) {
                ctx.strokeStyle = 'rgba(56, 189, 248, 0.3)';
                ctx.lineWidth = 1;
                ctx.setLineDash([4, 4]);
                // Simple skeleton lines
                ctx.beginPath();
                ctx.moveTo(cx, cy - 50);
                ctx.lineTo(cx, cy + 80);
                ctx.moveTo(cx - 50, cy + 10);
                ctx.lineTo(cx + 50, cy + 10);
                ctx.moveTo(cx, cy + 80);
                ctx.lineTo(cx - 20, cy + 130);
                ctx.moveTo(cx, cy + 80);
                ctx.lineTo(cx + 20, cy + 130);
                ctx.stroke();
                ctx.setLineDash([]);
            }
        },

        selectModel(model) {
            this.currentModel = model.id;
            this.currentModelName = model.name;
        },

        toggleRecord() {
            if (this.isRecording) {
                clearInterval(this._recordTimer);
                this.isRecording = false;
                this._recordSeconds = 0;
                this.recordTime = '0:00';
            } else {
                this.isRecording = true;
                this._recordSeconds = 0;
                this._recordTimer = setInterval(() => {
                    this._recordSeconds++;
                    const m = Math.floor(this._recordSeconds / 60);
                    const s = this._recordSeconds % 60;
                    this.recordTime = m + ':' + String(s).padStart(2, '0');
                }, 1000);
            }
        },

        handleModelUpload(e) {
            const file = e.target.files[0];
            if (!file) return;
            this._processUploadedFile(file);
        },

        handleModelDrop(e) {
            const file = e.dataTransfer.files[0];
            if (!file) return;
            this._processUploadedFile(file);
        },

        _processUploadedFile(file) {
            if (file.size > 10 * 1024 * 1024) {
                alert('File terlalu besar! Maksimum 10MB.');
                return;
            }
            const reader = new FileReader();
            reader.onload = (e) => {
                const model = {
                    name: file.name,
                    preview: file.type.startsWith('image/') ? e.target.result : null,
                    data: e.target.result
                };
                this.uploadedModels.push(model);
            };
            reader.readAsDataURL(file);
        },

        useUploadedModel(um) {
            this.currentModelName = um.name.replace(/\.[^.]+$/, '');
            // Custom model - keep current model colors but update name
        },

        sendChat() {
            if (!this.chatInput.trim()) return;
            const userMsg = { id: Date.now(), role: 'user', text: this.chatInput };
            this.chatMessages.push(userMsg);
            const input = this.chatInput;
            this.chatInput = '';

            // Simulated AI response
            setTimeout(() => {
                const responses = [
                    'Wah, menarik! Aku bisa lihat gerakanmu lewat kamera 😄',
                    'Coba gerakkan kepalamu ke kiri dan kanan, aku akan mengikuti!',
                    'Apakah kamu suka model karakter ini? Bisa upload model custommu sendiri lho!',
                    'Tracking berjalan dengan baik! 468 face landmarks terdeteksi.',
                    'Kamu bisa gunakan fitur ini untuk streaming VTuber! Integrasikan dengan OBS.',
                    'Emosi wajahmu terdeteksi sebagai ' + this.currentEmotion + '!',
                    'Aku mendukung 5 provider AI: OpenAI, Claude, Ollama, n8n, dan GitHub Models.',
                    'Tips: Gunakan pencahayaan yang baik untuk tracking yang lebih akurat.',
                ];
                const aiMsg = { id: Date.now() + 1, role: 'ai', text: responses[Math.floor(Math.random() * responses.length)] };
                this.chatMessages.push(aiMsg);
                // Auto scroll chat
                this.$nextTick(() => {
                    const chat = document.getElementById('vtuberChat');
                    if (chat) chat.scrollTop = chat.scrollHeight;
                });
            }, 800);
        },
    };
}
</script>
@endpush
