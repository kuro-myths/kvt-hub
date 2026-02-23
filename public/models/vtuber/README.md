# VTuber 3D Models — KVT Hub

Folder ini untuk menyimpan file model 3D karakter VTuber (Kuro AI dan karakter lainnya).

## Format yang Didukung

| Format | Ekstensi | Library | Keterangan |
|--------|----------|---------|------------|
| **VRM** | `.vrm` | `@pixiv/three-vrm` | Format standar VTuber, mendukung ekspresi wajah & bone |
| **GLB/GLTF** | `.glb`, `.gltf` | `three.js` (GLTFLoader) | Model 3D universal, ringan |
| **Live2D** | `.moc3`, `.json` | `live2d-cubism-sdk` | Animasi 2.5D, cocok untuk avatar |

## Cara Menambahkan Model

### 1. Siapkan File Model

```
public/models/vtuber/
├── kuro/
│   ├── kuro.vrm           ← Model VRM karakter Kuro
│   ├── kuro.glb            ← Alternatif format GLB
│   └── textures/           ← Tekstur tambahan (jika ada)
├── karakter-2/
│   ├── karakter.vrm
│   └── textures/
└── README.md               ← File ini
```

### 2. Install Dependencies

```bash
npm install three @pixiv/three-vrm
# atau untuk Live2D:
# npm install pixi-live2d-display
```

### 3. Integrasi dengan KVT Hub

Model akan dimuat oleh renderer di `vtuber3DViewport` (file: `resources/views/tata-letak/utama.blade.php`).

Contoh kode loader VRM:

```javascript
import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { VRMLoaderPlugin } from '@pixiv/three-vrm';

const loader = new GLTFLoader();
loader.register((parser) => new VRMLoaderPlugin(parser));

loader.load('/models/vtuber/kuro/kuro.vrm', (gltf) => {
    const vrm = gltf.userData.vrm;
    scene.add(vrm.scene);
    
    // Setup ekspresi & animasi
    vrm.expressionManager?.setValue('happy', 1.0);
    vrm.humanoid?.getNormalizedBoneNode('head')?.lookAt(camera.position);
});
```

### 4. Fitur Model 3D

- **Lip Sync** — Sinkronisasi mulut dengan audio TTS
- **Eye Tracking** — Mata mengikuti kursor mouse
- **Ekspresi** — Happy, Sad, Surprised, Angry, dll
- **Animasi Idle** — Gerakan otomatis saat menganggur
- **Physics** — Simulasi rambut & pakaian (VRM Spring Bone)
- **Interaksi** — Klik/tap pada karakter untuk reaksi

## Membuat Model VTuber

### Menggunakan VRoid Studio (Gratis)

1. Download [VRoid Studio](https://vroid.com/en/studio) 
2. Buat karakter custom
3. Export sebagai `.vrm`
4. Letakkan di folder ini

### Menggunakan Blender + VRM Add-on

1. Buat model di Blender
2. Install [VRM Add-on for Blender](https://github.com/saturday06/VRM-Addon-for-Blender)
3. Setup bone structure (humanoid)
4. Export sebagai `.vrm`

### Menggunakan Live2D Cubism

1. Buat artwork 2D (PSB/PSD)
2. Import ke Live2D Cubism Editor
3. Setup mesh, deformer, parameter
4. Export `.moc3` + textures
5. Gunakan `pixi-live2d-display` untuk web

## Catatan

- Ukuran file model disarankan < 20MB untuk performa web yang baik
- Gunakan tekstur resolusi 1024x1024 atau 2048x2048
- VRM v0.x dan v1.0 keduanya didukung oleh `@pixiv/three-vrm`
- Untuk production, pertimbangkan lazy loading model

---

© 2025–2026 KVT Hub Foundation
