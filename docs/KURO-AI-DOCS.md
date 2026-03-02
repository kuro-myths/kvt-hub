# 🧠 Kuro Nexus AI — Documentation

> **Multi-Provider AI Orchestration Platform for KVT Hub**
> Version 2.1 | Built with Laravel 12 · PHP 8.2+

---

## 📋 Daftar Isi

1. [Status Fitur AI (Mana yang Berfungsi?)](#status-fitur-ai)
2. [Cara Dapat API Key (Gratis & Berbayar)](#cara-dapat-api-key)
3. [Overview](#overview)
4. [Arsitektur](#arsitektur)
5. [Quick Start](#quick-start)
6. [AI Providers](#ai-providers)
7. [AI Pipeline System](#ai-pipeline-system)
8. [Fitur AI](#fitur-ai)
9. [API Reference](#api-reference)
10. [n8n Integration](#n8n-integration)
11. [Claude / Anthropic Setup](#claude--anthropic-setup)
12. [Ollama (Local AI)](#ollama-local-ai)
13. [Extending & Custom Providers](#extending--custom-providers)
14. [Environment Variables](#environment-variables)
15. [Troubleshooting](#troubleshooting)

---

## Status Fitur AI

### 📊 Status Semua Provider AI

| # | Provider | Status | Biaya | API Key dari Mana? | Syarat |
|---|----------|--------|-------|---------------------|--------|
| 1 | **GitHub Models** ⭐ | ✅ **BERFUNGSI** (jika `GITHUB_TOKEN` diisi) | 🆓 **GRATIS** | [github.com/settings/tokens](https://github.com/settings/tokens) | Punya akun GitHub |
| 2 | **OpenAI (GPT-4o)** | ✅ **BERFUNGSI** (jika `OPENAI_API_KEY` diisi) | 💰 Berbayar ($0.15-$0.60/1M tokens) | [platform.openai.com/api-keys](https://platform.openai.com/api-keys) | Kartu kredit/debit |
| 3 | **Claude / Anthropic** | ✅ **BERFUNGSI** (jika `ANTHROPIC_API_KEY` diisi) | 💰 Berbayar ($3-$15/1M tokens) | [console.anthropic.com](https://console.anthropic.com/settings/keys) | Kartu kredit/debit |
| 4 | **Ollama (Local)** | ✅ **BERFUNGSI** (jika Ollama terinstall & running) | 🆓 **GRATIS** | Tidak perlu API key | Install Ollama + GPU |
| 5 | **n8n Workflows** | ⚠️ **BERFUNGSI PARSIAL** (perlu self-host n8n) | 🆓 **GRATIS** (self-hosted) | Self-hosted, buat sendiri | Install n8n |

### 📊 Status Semua Fitur AI

| # | Fitur | Status | Provider yang Bisa | Cara Pakai |
|---|-------|--------|-------------------|------------|
| 1 | 🤖 **AI Chat** | ✅ Berfungsi | OpenAI, Claude, GitHub Models, Ollama, n8n | Chat langsung, pilih provider |
| 2 | 💻 **Code Generator** | ✅ Berfungsi | OpenAI, Claude, GitHub Models, Ollama | Deskripsikan kode, AI buatkan |
| 3 | 🌐 **Translator** | ✅ Berfungsi | OpenAI, Claude, GitHub Models, Ollama | Input teks + bahasa tujuan |
| 4 | 📝 **Summarizer** | ✅ Berfungsi | OpenAI, Claude, GitHub Models, Ollama | Paste teks panjang, AI rangkum |
| 5 | 💖 **Sentiment Analysis** | ✅ Berfungsi | OpenAI, Claude, GitHub Models, Ollama | Input teks, dapatkan sentimen |
| 6 | 🎓 **AI Tutor** | ✅ Berfungsi | OpenAI, Claude, GitHub Models, Ollama | Pilih topik + level |
| 7 | ⚡ **AI Pipeline** | ✅ Berfungsi | Semua (chain antar provider) | Build pipeline visual |
| 8 | 🔗 **n8n Trigger** | ⚠️ Perlu Setup | n8n only | Setup n8n dulu |
| 9 | 🐙 **GitHub AI Hub** | ✅ Berfungsi | GitHub API + OpenAI chatbot | `/admin/github-ai` |

### ⭐ Rekomendasi: Provider Mana yang Harus Dipakai?

**Untuk memulai GRATIS tanpa kartu kredit:**

1. **GitHub Models** ← ⭐ **PALING DIREKOMENDASIKAN**
   - Gratis, hanya butuh akun GitHub
   - Bisa akses GPT-4o, Llama 3.1, Mistral, DeepSeek, dll
   - Rate limit: ~150 requests/menit (cukup untuk development)

2. **Ollama (Local)** ← Untuk offline & privasi
   - Gratis, tapi butuh GPU
   - Install di komputer sendiri

**Untuk produksi dengan budget:**

3. **OpenAI** ← Paling stabil, paling banyak dokumentasi
4. **Claude** ← Reasoning terbaik, kode paling akurat

---

## Cara Dapat API Key

### 1. 🆓 GitHub Token (GRATIS — Paling Mudah!)

GitHub Models menyediakan akses **gratis** ke 30+ model AI (GPT-4o, Llama, Mistral, dll).

**Langkah:**

1. Login ke [github.com](https://github.com)
2. Buka **Settings** → **Developer settings** → **Personal access tokens** → **Tokens (classic)**
   - URL langsung: [github.com/settings/tokens](https://github.com/settings/tokens)
3. Klik **"Generate new token (classic)"**
4. Nama: `KVT Hub AI` (bebas)
5. Expiration: custom (pilih 1 tahun)
6. **Scopes: TIDAK PERLU centang apapun** (cukup tanpa scope untuk GitHub Models)
7. Klik **Generate token**
8. Copy token (dimulai dengan `ghp_...`)
9. Paste ke `.env`:
   ```env
   GITHUB_TOKEN=ghp_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   AI_DEFAULT_PROVIDER=github
   ```

**Model yang tersedia gratis:**
- `gpt-4o` — OpenAI GPT-4o (terbaik)
- `gpt-4o-mini` — OpenAI GPT-4o Mini (cepat & murah)
- `meta-llama-3.1-405b-instruct` — Meta Llama 3.1 405B
- `meta-llama-3.1-70b-instruct` — Meta Llama 3.1 70B
- `mistral-large-2411` — Mistral Large
- `phi-4` — Microsoft Phi-4
- `deepseek-r1` — DeepSeek R1
- `cohere-command-r-plus` — Cohere Command R+

> 💡 **Rate limit**: ~150 req/min untuk free tier, 1000 req/min untuk Pro

### 2. 💰 OpenAI API Key (Berbayar)

**Langkah:**

1. Buka [platform.openai.com](https://platform.openai.com)
2. Sign up / Login
3. Buka **API keys** → [platform.openai.com/api-keys](https://platform.openai.com/api-keys)
4. Klik **"Create new secret key"**
5. Copy key (dimulai dengan `sk-...`)
6. **Isi saldo**: Settings → Billing → Add funds (min $5)
7. Paste ke `.env`:
   ```env
   OPENAI_API_KEY=sk-proj-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   ```

**Harga (GPT-4o-mini):** $0.15/1M input tokens, $0.60/1M output tokens
*~$5 cukup untuk ~8 juta token (ribuan pesan)*

### 3. 💰 Anthropic / Claude API Key (Berbayar)

**Langkah:**

1. Buka [console.anthropic.com](https://console.anthropic.com)
2. Sign up / Login
3. Buka **Settings** → **API Keys**
4. Klik **"Create Key"**
5. Copy key (dimulai dengan `sk-ant-...`)
6. **Isi saldo**: Settings → Plans & Billing → Add credits (min $5)
7. Paste ke `.env`:
   ```env
   ANTHROPIC_API_KEY=sk-ant-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   ```

**Harga (Claude Sonnet 4):** $3/1M input, $15/1M output
*Lebih mahal tapi reasoning paling bagus*

### 4. 🆓 Ollama — Local AI (GRATIS, Perlu Install)

**Langkah:**

1. Download dari [ollama.com/download](https://ollama.com/download)
2. Install (Windows / Mac / Linux)
3. Buka terminal:
   ```bash
   ollama pull llama3.1       # download model (~4GB)
   ollama serve                # start server
   ```
4. `.env` default sudah benar:
   ```env
   OLLAMA_BASE_URL=http://localhost:11434
   OLLAMA_MODEL=llama3.1
   ```

**⚠️ Butuh**: GPU dengan min 8GB VRAM untuk llama3.1

### 5. 🆓 n8n — Workflow Automation (GRATIS, Self-Hosted)

**Langkah:**

1. Install n8n:
   ```bash
   npx n8n                     # via npm
   # atau
   docker run -p 5678:5678 n8nio/n8n  # via Docker
   ```
2. Buka `http://localhost:5678`
3. Buat workflow dengan **Webhook trigger**
4. Copy webhook URL ke `.env`

---

## Overview

**Kuro Nexus AI** adalah platform AI orkestrasi multi-provider yang terintegrasi di KVT Hub. Platform ini mendukung **5 provider AI** (GitHub Models, OpenAI, Claude/Anthropic, n8n, Ollama), menampilkan 8 fitur AI, dan memiliki sistem pipeline yang memungkinkan chaining operasi AI seperti LangChain.

### Keunggulan

- 🆓 **GitHub Models**: Akses GPT-4o, Llama, Mistral dll **GRATIS** via GitHub token
- 🔌 **Multi-Provider**: OpenAI GPT, Claude Sonnet, GitHub Models, n8n Workflows, Ollama Local
- 🔗 **AI Pipeline**: Chain multiple AI operations (translate → summarize → sentiment)
- 🔄 **Automatic Fallback**: Jika provider utama down, otomatis switch ke provider lain
- 💰 **Cost Tracking**: Setiap request dilacak biayanya per token
- 🧩 **Extensible**: Tambah provider baru hanya dengan 1 class
- ⚡ **n8n Integration**: Orkestrasi workflow AI yang kompleks via webhook
- 🏠 **Local AI**: Jalankan model AI secara lokal via Ollama

---

## Arsitektur

```
┌──────────────────────────────────────────────────┐
│                 KuroNexusController               │
│    (index, chat, codegen, translate, pipeline)    │
└──────────────────┬───────────────────────────────┘
                   │
         ┌─────────▼──────────┐
         │     AIManager      │ ← Main Orchestrator
         │  (cache, fallback) │
         └────────┬───────────┘
                  │
    ┌──────┬──────┼──────┬──────┐
    │      │      │      │      │
    ▼      ▼      ▼      ▼      ▼
┌──────┐┌──────┐┌──────┐┌──────┐┌──────┐
│OpenAI││Claude││GitHub││ n8n  ││Ollama│
│ GPT  ││Sonnet││Models││Wflow ││Local │
└──────┘└──────┘└──────┘└──────┘└──────┘
   │       │       │       │       │
   ▼       ▼       ▼       ▼       ▼
 $0.15  $3/1M   🆓FREE  🆓self  🆓local
 /1M    token   GitHub   host    GPU
```

### File Structure

```
config/
  ai.php                          ← Multi-provider configuration

app/Services/AI/
  AIManager.php                   ← Main orchestrator (facade-like)
  Contracts/
    AIProviderInterface.php       ← Interface all providers implement
  Providers/
    OpenAIProvider.php            ← OpenAI GPT adapter (HTTP)
    ClaudeProvider.php            ← Anthropic Claude adapter
    GitHubModelsProvider.php      ← GitHub Models adapter (FREE!)
    N8nProvider.php               ← n8n webhook adapter
    OllamaProvider.php            ← Local Ollama adapter
  Pipeline/
    AIPipeline.php                ← Chain AI operations

app/Http/Controllers/Admin/
  KuroNexusController.php         ← Controller (13 endpoints)

resources/views/akun/admin/
  kuro-nexus.blade.php            ← Dashboard view (8 tabs)

routes/
  admin.php                       ← Routes (15 kuro-nexus routes)
```

---

## Quick Start

### 1. Environment Setup

Tambahkan ke `.env`:

```env
# === KURO NEXUS AI ===

# Default provider: openai | claude | ollama | n8n
AI_DEFAULT_PROVIDER=openai

# --- OpenAI ---
OPENAI_API_KEY=sk-your-openai-key
OPENAI_ORGANIZATION=               # optional
OPENAI_MODEL=gpt-4o-mini
OPENAI_MAX_TOKENS=4096

# --- Claude / Anthropic ---
ANTHROPIC_API_KEY=sk-ant-your-key
CLAUDE_MODEL=claude-sonnet-4-20250514
CLAUDE_MAX_TOKENS=4096

# --- n8n (optional) ---
N8N_BASE_URL=http://localhost:5678
N8N_API_KEY=your-n8n-api-key
N8N_WEBHOOK_SECRET=random-secret-string
N8N_WORKFLOW_CHAT=
N8N_WORKFLOW_CODE_REVIEW=
N8N_WORKFLOW_SUMMARIZE=
N8N_WORKFLOW_TRANSLATE=
N8N_WORKFLOW_CUSTOM=

# --- Ollama (optional) ---
OLLAMA_BASE_URL=http://localhost:11434
OLLAMA_MODEL=llama3.1
```

### 2. Access Dashboard

Navigate to: `/admin/kuro-nexus`

Dashboard akan menampilkan status semua provider dan quick stats.

### 3. Test Chat

1. Pilih provider di sidebar
2. Ketik pesan
3. AI akan merespons via provider yang dipilih

---

## AI Providers

### ⭐ GitHub Models (GRATIS — Rekomendasi!)

| Setting | Value |
|---------|-------|
| API URL | `https://models.inference.ai.azure.com/chat/completions` |
| Default Model | `gpt-4o-mini` |
| Pricing | 🆓 **GRATIS** (rate-limited) |
| Max Tokens | 4096 |
| Auth | GitHub Personal Access Token |
| Get Key | [github.com/settings/tokens](https://github.com/settings/tokens) |

**Cara kerja**: Direct HTTP call ke GitHub Models inference API (Azure-hosted). Compatible dengan OpenAI chat/completions format. Mendukung 30+ model dari berbagai vendor (OpenAI, Meta, Mistral, Microsoft, DeepSeek, Cohere).

**Available Models**: gpt-4o, gpt-4o-mini, meta-llama-3.1-405b-instruct, mistral-large-2411, phi-4, deepseek-r1, cohere-command-r-plus, dan lainnya.

### OpenAI (GPT-4o-mini)

| Setting | Value |
|---------|-------|
| API URL | `https://api.openai.com/v1/chat/completions` |
| Default Model | `gpt-4o-mini` |
| Pricing | 💰 $0.15/1M input tokens, $0.60/1M output tokens |
| Max Tokens | 4096 |
| Get Key | [platform.openai.com/api-keys](https://platform.openai.com/api-keys) |

**Cara kerja**: Direct HTTP call ke OpenAI API menggunakan Laravel HTTP client. Mendukung semua GPT models.

### Claude / Anthropic

| Setting | Value |
|---------|-------|
| API URL | `https://api.anthropic.com/v1/messages` |
| Default Model | `claude-sonnet-4-20250514` |
| Pricing | 💰 $3/1M input tokens, $15/1M output tokens |
| Max Tokens | 4096 |
| API Version | `2023-06-01` |
| Get Key | [console.anthropic.com](https://console.anthropic.com/settings/keys) |

**Fitur khusus**: System prompt diekstrak secara otomatis dari messages dan dikirim sebagai field `system` terpisah (sesuai Anthropic API spec).

### n8n (Workflow Automation)

| Setting | Value |
|---------|-------|
| Base URL | Configurable (default: `localhost:5678`) |
| Auth | API Key + Webhook Secret |
| Pricing | 🆓 **GRATIS** (self-hosted) |
| Workflows | 5 configurable endpoints |

**Cara kerja**: Mengirim payload ke n8n webhook URL. n8n memproses menggunakan node chain (AI, filter, transform), lalu mengembalikan hasil. Perlu install n8n sendiri.

### Ollama (Local AI)

| Setting | Value |
|---------|-------|
| Base URL | `http://localhost:11434` |
| Default Model | `llama3.1` |
| Pricing | 🆓 **GRATIS** (lokal) |
| Requirement | Ollama installed + GPU |

**Fitur khusus**: `listModels()` untuk melihat model yang terinstall. Streaming dimatikan untuk konsistensi.

---

## AI Pipeline System

Pipeline memungkinkan chaining multiple AI operations dalam satu request.

### Cara Kerja

```php
use App\Services\AI\AIManager;

$manager = new AIManager();

$result = $manager->pipeline()
    ->step('translate', ['to' => 'English'])
    ->step('summarize')
    ->step('sentiment')
    ->run('Teks panjang dalam Bahasa Indonesia...');

// $result = {
//   output: "...",
//   log: [...],
//   total_cost: 0.0012,
//   total_tokens: 450,
// }
```

### Available Actions

| Action | Description | Params |
|--------|-------------|--------|
| `translate` | Terjemahkan teks | `to`, `from` |
| `summarize` | Rangkum teks | `max_words` |
| `review` | Code review | — |
| `sentiment` | Analisis sentimen | — |
| `extract` | Ekstrak data terstruktur | `fields` |
| `rewrite` | Tulis ulang teks | `tone`, `style` |
| `code_generate` | Generate kode | `language`, `framework` |
| `explain` | Jelaskan konsep | `level` |
| `custom` | Prompt kustom | `prompt` |

### Pipeline Presets

**Translate + Summarize:**
```
Input → Translate (to: English) → Summarize → Output
```

**Review + Rewrite:**
```
Input → Code Review → Rewrite (professional) → Output
```

**Full Analysis:**
```
Input → Sentiment → Extract (entities, topics) → Summarize → Output
```

---

## Fitur AI

### 1. 🤖 Multi-Provider AI Chat
Chat interaktif dengan pilihan provider. Support context switching (General, Code, Education, GitHub, Career).

### 2. 💻 Code Generator
Generate kode dari deskripsi natural language. Support 8 bahasa (PHP, JS, Python, TS, SQL, Go, Rust, Java) dan 6 framework (Laravel, React, Vue, Express, Django, FastAPI).

### 3. 🌐 Smart Translator
Terjemahan AI-powered dengan support 9 bahasa (Indonesia, English, Japanese, Korean, Chinese, Arabic, Spanish, French, German). Auto-detect bahasa sumber.

### 4. 📝 Content Summarizer
Rangkum teks panjang dengan kontrol max kata. Output terformat dengan bullet points dan key takeaways.

### 5. 💖 Sentiment Analyzer
Analisis sentimen teks dengan output: sentiment (positive/negative/neutral), score (0-1), detected emotions, dan summary.

### 6. 🎓 AI Tutor
Penjelasan konsep dengan level (Beginner, Intermediate, Advanced). Support contoh praktis dan analogi.

### 7. ⚡ AI Pipeline Builder
Visual pipeline builder untuk chaining operasi AI. Drag-and-drop steps, preview execution log.

### 8. 🔗 Integrations (n8n + Claude + Ollama)
Dashboard untuk monitoring dan konfigurasi integrasi external.

---

## API Reference

Semua endpoint membutuhkan autentikasi admin. Base path: `/admin/kuro-nexus`

### GET `/` — Dashboard
Returns view dengan provider status, features, dan stats.

### POST `/chat` — AI Chat
```json
// Request
{
    "message": "Jelaskan Laravel middleware",
    "provider": "openai",          // optional
    "context": "code"              // optional: general|code|education|github|career
}

// Response
{
    "success": true,
    "message": {
        "role": "assistant",
        "content": "Laravel middleware adalah...",
        "provider": "openai",
        "tokens": 234,
        "cost": 0.0002,
        "time": "14:30"
    }
}
```

### POST `/chat/reset` — Reset Chat History
```json
// Response
{ "success": true }
```

### POST `/generate-code` — Code Generation
```json
// Request
{
    "description": "Buat REST API CRUD untuk products",
    "language": "PHP",
    "framework": "Laravel",
    "provider": "claude"           // optional
}

// Response
{
    "success": true,
    "code": "```php\n// Generated code...\n```",
    "provider": "claude",
    "tokens": 890,
    "cost": 0.005
}
```

### POST `/translate` — Translation
```json
// Request
{
    "text": "Halo dunia",
    "to": "English",
    "from": "Indonesian"           // optional, default: auto-detect
}

// Response
{
    "success": true,
    "translated": "Hello world",
    "provider": "openai",
    "tokens": 45,
    "cost": 0.00001
}
```

### POST `/summarize` — Summarization
```json
// Request
{
    "text": "Long text here...",
    "max_words": 200               // optional, default: 200
}

// Response
{
    "success": true,
    "summary": "## Summary\n- Point 1\n- Point 2",
    "provider": "openai",
    "tokens": 350,
    "cost": 0.0003
}
```

### POST `/sentiment` — Sentiment Analysis
```json
// Request
{
    "text": "Produk ini sangat bagus!"
}

// Response
{
    "success": true,
    "analysis": {
        "sentiment": "positive",
        "score": 0.92,
        "emotions": ["joy", "satisfaction"],
        "summary": "Teks menunjukkan sentimen positif..."
    },
    "provider": "openai"
}
```

### POST `/tutor` — AI Tutor
```json
// Request
{
    "topic": "Jelaskan OOP di PHP",
    "level": "beginner"            // beginner|intermediate|advanced
}

// Response
{
    "success": true,
    "explanation": "## OOP di PHP\n...",
    "provider": "openai"
}
```

### POST `/pipeline` — Run AI Pipeline
```json
// Request
{
    "input": "Teks untuk diproses",
    "steps": [
        { "action": "translate", "params": { "to": "English" }, "provider": "" },
        { "action": "summarize", "params": {}, "provider": "claude" }
    ]
}

// Response
{
    "success": true,
    "output": "Summarized translated text...",
    "log": [
        {
            "step": 1,
            "action": "translate",
            "provider": "openai",
            "status": "success",
            "duration_ms": 1250,
            "tokens": 120,
            "cost": 0.0001
        },
        {
            "step": 2,
            "action": "summarize",
            "provider": "claude",
            "status": "success",
            "duration_ms": 2100,
            "tokens": 200,
            "cost": 0.001
        }
    ],
    "total_cost": 0.0011,
    "total_tokens": 320
}
```

### POST `/n8n/trigger` — Trigger n8n Workflow
```json
// Request
{
    "workflow": "chat",            // chat|code_review|summarize|translate|custom
    "data": { "message": "Hello" }
}

// Response
{
    "success": true,
    "result": { ... }              // n8n workflow output
}
```

### POST `/n8n/webhook` — n8n Webhook Receiver
```
Header: X-Webhook-Secret: your-secret
Body: { ... any payload from n8n ... }
```

### GET `/api/providers` — Provider Status
```json
// Response
{
    "openai": { "available": true, "model": "gpt-4o-mini" },
    "claude": { "available": false, "model": "claude-sonnet-4-20250514" },
    "n8n": { "available": true, "model": "n8n-workflow" },
    "ollama": { "available": false, "model": "llama3.1" }
}
```

### GET `/api/stats` — Usage Statistics
```json
// Response
{
    "today": { "total_requests": 42, "total_tokens": 12500, "total_cost": 0.025 },
    "features": { "chat": 20, "code_generator": 8, ... },
    "providers": { "openai": 30, "claude": 12 }
}
```

---

## n8n Integration

### Apa itu n8n?

[n8n](https://n8n.io) adalah workflow automation platform (open-source) yang memungkinkan Anda membuat workflow visual untuk mengotomasi tugas. Dengan integrasi Kuro Nexus, Anda bisa membuat AI workflow yang kompleks tanpa coding.

### Setup

#### 1. Install n8n

```bash
# Via npm
npx n8n

# Via Docker
docker run -it --rm -p 5678:5678 n8nio/n8n

# Via Docker Compose
docker-compose up -d n8n
```

#### 2. Buat Workflow

1. Buka n8n di `http://localhost:5678`
2. Buat workflow baru
3. Tambah node **Webhook** sebagai trigger:
   - Method: POST
   - Path: `/kvt-hub-chat` (contoh)
   - Authentication: Header Auth
   - Header Name: `X-Webhook-Secret`
4. Tambah node AI (OpenAI, Claude, dll)
5. Tambah node **Respond to Webhook** untuk mengembalikan hasil

#### 3. Konfigurasi .env

```env
N8N_BASE_URL=http://localhost:5678
N8N_API_KEY=your-n8n-api-key
N8N_WEBHOOK_SECRET=same-secret-as-n8n-webhook

# Webhook URLs (from n8n webhook node)
N8N_WORKFLOW_CHAT=http://localhost:5678/webhook/kvt-hub-chat
N8N_WORKFLOW_CODE_REVIEW=http://localhost:5678/webhook/kvt-hub-review
N8N_WORKFLOW_SUMMARIZE=http://localhost:5678/webhook/kvt-hub-summarize
N8N_WORKFLOW_TRANSLATE=http://localhost:5678/webhook/kvt-hub-translate
N8N_WORKFLOW_CUSTOM=http://localhost:5678/webhook/kvt-hub-custom
```

#### 4. Contoh Workflow: AI Chat with Memory

```
[Webhook Trigger]
       ↓
[Set Variables] → Extract message, session_id
       ↓
[Postgres] → Load chat history
       ↓
[OpenAI Chat] → Generate response with history context
       ↓
[Postgres] → Save new message
       ↓
[Respond to Webhook] → Return AI response
```

---

## Claude / Anthropic Setup

### 1. Dapatkan API Key

1. Buka [console.anthropic.com](https://console.anthropic.com)
2. Sign up / Login
3. Go to **API Keys**
4. Create new key → Copy `sk-ant-...`

### 2. Konfigurasi

```env
ANTHROPIC_API_KEY=sk-ant-your-key-here
CLAUDE_MODEL=claude-sonnet-4-20250514
CLAUDE_MAX_TOKENS=4096
```

### 3. Set sebagai Default (opsional)

```env
AI_DEFAULT_PROVIDER=claude
```

### 4. Available Models

| Model | Speed | Intelligence | Cost |
|-------|-------|-------------|------|
| `claude-sonnet-4-20250514` | Fast | Very High | $3/$15 per 1M tokens |
| `claude-haiku-3-20240307` | Fastest | Good | $0.25/$1.25 per 1M tokens |
| `claude-opus-4-20250514` | Slower | Highest | $15/$75 per 1M tokens |

---

## Ollama (Local AI)

### 1. Install Ollama

```bash
# macOS / Linux
curl -fsSL https://ollama.com/install.sh | sh

# Windows
# Download dari https://ollama.com/download
```

### 2. Pull Model

```bash
ollama pull llama3.1
ollama pull codellama      # untuk coding
ollama pull phi3           # model kecil, cepat
```

### 3. Start Server

```bash
ollama serve
# Server berjalan di http://localhost:11434
```

### 4. Konfigurasi

```env
OLLAMA_BASE_URL=http://localhost:11434
OLLAMA_MODEL=llama3.1
```

### 5. Keunggulan Local AI

- ✅ **Gratis** — Tidak ada biaya per token
- ✅ **Privasi** — Data tidak keluar dari server
- ✅ **Offline** — Bisa digunakan tanpa internet
- ⚠️ **Requires GPU** — Perlu GPU untuk performa optimal
- ⚠️ **Quality** — Kualitas output di bawah GPT-4o/Claude

---

## Extending & Custom Providers

### Membuat Provider Baru

1. Buat class yang implement `AIProviderInterface`:

```php
namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\AIProviderInterface;

class GoogleGeminiProvider implements AIProviderInterface
{
    private string $apiKey;
    private string $model;
    private float $lastCost = 0;

    public function __construct()
    {
        $this->apiKey = config('ai.providers.gemini.api_key');
        $this->model = config('ai.providers.gemini.model', 'gemini-pro');
    }

    public function chat(array $messages, array $options = []): array
    {
        // Implement Gemini API call
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1/models/{$this->model}:generateContent?key={$this->apiKey}", [
            'contents' => $this->formatMessages($messages),
        ]);

        $data = $response->json();
        $content = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

        return [
            'content' => $content,
            'tokens' => ['prompt' => 0, 'completion' => 0],
            'cost' => 0,
        ];
    }

    public function complete(string $prompt, array $options = []): array
    {
        return $this->chat([['role' => 'user', 'content' => $prompt]], $options);
    }

    public function isAvailable(): bool
    {
        return !empty($this->apiKey);
    }

    public function getName(): string { return 'gemini'; }
    public function getModel(): string { return $this->model; }
    public function getLastCost(): float { return $this->lastCost; }

    private function formatMessages(array $messages): array
    {
        // Convert OpenAI format to Gemini format
        return array_map(fn($m) => [
            'role' => $m['role'] === 'assistant' ? 'model' : 'user',
            'parts' => [['text' => $m['content']]],
        ], $messages);
    }
}
```

2. Tambah config di `config/ai.php`:

```php
'providers' => [
    // ... existing providers ...
    'gemini' => [
        'api_key' => env('GEMINI_API_KEY'),
        'model' => env('GEMINI_MODEL', 'gemini-pro'),
    ],
],
```

3. Register di `AIManager.php`:

```php
protected function createProvider(string $name): AIProviderInterface
{
    return match ($name) {
        // ... existing providers ...
        'gemini' => new GoogleGeminiProvider(),
        default => throw new \Exception("Unknown AI provider: {$name}"),
    };
}
```

---

## Environment Variables

| Variable | Required | Default | Description |
|----------|----------|---------|-------------|
| `AI_DEFAULT_PROVIDER` | No | `github` | Default AI provider |
| **GitHub Models** | | | |
| `GITHUB_TOKEN` | ⭐ Yes | — | GitHub Personal Access Token (`ghp_...`) |
| `GITHUB_AI_MODEL` | No | `gpt-4o-mini` | Model dari GitHub Models marketplace |
| `GITHUB_AI_MAX_TOKENS` | No | `4096` | Max tokens |
| **OpenAI** | | | |
| `OPENAI_API_KEY` | No | — | OpenAI API key (`sk-...`) |
| `OPENAI_ORGANIZATION` | No | — | OpenAI organization ID |
| `OPENAI_MODEL` | No | `gpt-4o-mini` | OpenAI model name |
| `OPENAI_MAX_TOKENS` | No | `4096` | Max tokens per request |
| **Claude / Anthropic** | | | |
| `ANTHROPIC_API_KEY` | No | — | Anthropic/Claude API key (`sk-ant-...`) |
| `CLAUDE_MODEL` | No | `claude-sonnet-4-20250514` | Claude model name |
| `CLAUDE_MAX_TOKENS` | No | `4096` | Claude max tokens |
| **n8n** | | | |
| `N8N_BASE_URL` | No | `http://localhost:5678` | n8n server URL |
| `N8N_API_KEY` | No | — | n8n API key |
| `N8N_WEBHOOK_SECRET` | No | — | Webhook authentication secret |
| `N8N_WORKFLOW_CHAT` | No | — | Chat workflow webhook URL |
| `N8N_WORKFLOW_CODE_REVIEW` | No | — | Code review workflow URL |
| `N8N_WORKFLOW_SUMMARIZE` | No | — | Summarize workflow URL |
| `N8N_WORKFLOW_TRANSLATE` | No | — | Translate workflow URL |
| `N8N_WORKFLOW_CUSTOM` | No | — | Custom workflow URL |
| **Ollama** | | | |
| `OLLAMA_BASE_URL` | No | `http://localhost:11434` | Ollama server URL |
| `OLLAMA_MODEL` | No | `llama3.1` | Default Ollama model |

*At least one provider API key/token is required. Recommended: `GITHUB_TOKEN` (gratis!)

---

## Troubleshooting

### Provider menunjukkan "Offline"

- **GitHub Models**: Pastikan `GITHUB_TOKEN` di `.env` sudah diisi (dimulai `ghp_`)
- **OpenAI**: Pastikan `OPENAI_API_KEY` di `.env` sudah benar dan saldo terisi
- **Claude**: Pastikan `ANTHROPIC_API_KEY` dimulai dengan `sk-ant-` dan kredit terisi
- **n8n**: Pastikan n8n server running di `N8N_BASE_URL`
- **Ollama**: Pastikan `ollama serve` sudah dijalankan

### Error "Rate limit exceeded"

Config rate limit di `config/ai.php`:
```php
'rate_limits' => [
    'chat' => 60,           // per jam
    'code_generator' => 30, // per jam
],
```

### Chat tidak menyimpan history

History disimpan di session. Pastikan session driver aktif. Maksimal 20 pesan terakhir.

### Pipeline timeout

Default timeout 30 detik. Ubah di `config/ai.php`:
```php
'pipeline' => [
    'timeout' => 60, // detik
],
```

### n8n webhook error

1. Pastikan webhook secret sama di `.env` dan n8n
2. Pastikan n8n workflow sudah di-activate
3. Cek n8n execution log untuk detail error

---

## Credits

- **Platform**: KVT Hub by Kuro Myths
- **Providers**: OpenAI, Anthropic, n8n, Ollama
- **Framework**: Laravel 12, Alpine.js, Tailwind CSS 4
- **License**: MIT

---

*Last updated: {{ date }}*
*Documentation version: 2.0*
