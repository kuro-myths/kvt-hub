# 🤖 AI Chatbot Documentation

> Advanced AI Chatbot powered by OpenAI API untuk KVT Hub

---

## 📋 Daftar Isi

1. [Fitur Utama](#fitur-utama)
2. [Instalasi & Setup](#instalasi--setup)
3. [API Endpoints](#api-endpoints)
4. [Database Schema](#database-schema)
5. [Usage Examples](#usage-examples)
6. [Configuration](#configuration)
7. [Cost Management](#cost-management)
8. [Troubleshooting](#troubleshooting)

---

## ✨ Fitur Utama

### 1. **Real-time AI Conversations**
- Percakapan real-time dengan OpenAI GPT-4o-mini
- Context-aware responses dengan message history
- Knowledge base KVT Hub terintegrasi

### 2. **Session Management**
- Multiple chat sessions per user
- Auto-save conversation history
- Session archiving & deletion
- Persistent storage di database

### 3. **Token & Cost Tracking**
- Real-time token counting (input & output)
- Per-session API cost estimation
- Cost limits untuk mencegah overspending
- Monthly & daily usage statistics

### 4. **User Feedback System**
- 1-5 star rating untuk setiap message
- Feedback types: helpful, unhelpful, inaccurate, harmful, other
- Optional comments untuk qualitative feedback
- Anonymous feedback support

### 5. **User Experience**
- Responsive chat interface (mobile & desktop)
- Typing indicators untuk loading states
- Suggestion buttons untuk quick start
- Message timestamps & user badges
- Search history functionality

---

## 🚀 Instalasi & Setup

### 1. Install Dependencies

```bash
composer require openai-php/laravel
```

### 2. Configure Environment

Update `.env` file dengan konten berikut:

```env
# OpenAI API Configuration
OPENAI_API_KEY=sk-...your-api-key...
OPENAI_ORGANIZATION=
CHATBOT_MODEL=gpt-4o-mini
CHATBOT_MAX_TOKENS=2000
CHATBOT_TEMPERATURE=0.7
```

**Dapatkan API Key:**
1. Kunjungi [OpenAI Platform](https://platform.openai.com/account/api-keys)
2. Create new API key (atau gunakan existing)
3. Copy paste ke `.env` → `OPENAI_API_KEY`

### 3. Run Migrations

```bash
php artisan migrate
```

Ini akan membuat 3 tables baru:
- `chat_sessions`
- `chat_messages`
- `chat_feedbacks`

### 4. Access Chatbot

Buka browser: `http://kvt-hub.test/chat`

> **Note:** User harus login untuk mengakses full chatbot features

---

## 🔌 API Endpoints

### Create New Chat Session
```http
POST /chat/create

Response:
{
  "success": true,
  "session": {
    "id": 1,
    "token": "sess_...",
    "title": "New Chat - 26 Feb 2026"
  }
}
```

### Send Message
```http
POST /chat/{session}/send

Body:
{
  "message": "Apa saja fitur KVT Hub?"
}

Response:
{
  "success": true,
  "message": {
    "id": 42,
    "role": "assistant",
    "content": "KVT Hub adalah platform ekosistem...",
    "type": "text",
    "timestamp": "2026-02-26T12:34:56Z"
  },
  "session": {
    "tokens_used": 145,
    "api_cost": 0.0025
  }
}
```

### Get Chat Session
```http
GET /chat/{session}

Response:
{
  "session": {
    "id": 1,
    "title": "Apa saja fitur KVT Hub",
    "created_at": "2026-02-26T10:00:00Z",
    "message_count": 4,
    "tokens_used": 289,
    "api_cost": 0.0050
  },
  "messages": [
    {
      "id": 1,
      "role": "user",
      "content": "Apa saja fitur KVT Hub?",
      "type": "text",
      "timestamp": "2026-02-26T10:05:00Z",
      "rating": null
    },
    {
      "id": 2,
      "role": "assistant",
      "content": "KVT Hub adalah...",
      "type": "text",
      "timestamp": "2026-02-26T10:05:20Z",
      "rating": 5
    }
  ]
}
```

### Add Feedback
```http
POST /chat/message/{message}/feedback

Body:
{
  "rating": 5,
  "feedback_type": "helpful",
  "comment": "Sangat membantu sekali!"
}

Response:
{
  "success": true,
  "feedback": {
    "id": 1,
    "rating": 5,
    "rating_label": "⭐⭐⭐⭐⭐ Sangat Puas"
  }
}
```

### Archive Session
```http
POST /chat/{session}/archive

Response:
{
  "success": true
}
```

### Delete Session
```http
DELETE /chat/{session}

Response:
{
  "success": true
}
```

### List All Sessions
```http
GET /chat/sessions

Response:
{
  "sessions": [
    {
      "id": 1,
      "title": "Fitur KVT Hub",
      "message_count": 5,
      "created_at": "26 Feb 2026 10:05",
      "status": "active"
    }
  ]
}
```

---

## 🗄️ Database Schema

### chat_sessions
```sql
CREATE TABLE chat_sessions (
  id BIGINT PRIMARY KEY,
  user_id BIGINT NULLABLE,
  session_token VARCHAR(255) UNIQUE,
  title VARCHAR(255),
  context TEXT NULLABLE,
  message_count INT DEFAULT 0,
  total_tokens_used DECIMAL(10, 0) DEFAULT 0,
  api_cost DECIMAL(10, 4) DEFAULT 0,
  status ENUM('active', 'archived', 'deleted') DEFAULT 'active',
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  deleted_at TIMESTAMP NULLABLE
);
```

### chat_messages
```sql
CREATE TABLE chat_messages (
  id BIGINT PRIMARY KEY,
  chat_session_id BIGINT,
  role ENUM('user', 'assistant', 'system') DEFAULT 'user',
  content LONGTEXT,
  message_type VARCHAR(255) DEFAULT 'text',
  metadata JSON NULLABLE,
  tokens_used INT DEFAULT 0,
  is_edited BOOLEAN DEFAULT FALSE,
  edit_history TEXT NULLABLE,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### chat_feedbacks
```sql
CREATE TABLE chat_feedbacks (
  id BIGINT PRIMARY KEY,
  chat_message_id BIGINT,
  user_id BIGINT NULLABLE,
  rating INT,
  feedback_type VARCHAR(255) NULLABLE,
  comment TEXT NULLABLE,
  is_anonymous BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

---

## 📖 Usage Examples

### JavaScript / AJAX

```javascript
// Create new chat
async function createNewChat() {
  const response = await fetch('/chat/create', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    },
  });
  const data = await response.json();
  return data.session.id;
}

// Send message
async function sendMessage(sessionId, message) {
  const response = await fetch(`/chat/${sessionId}/send`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    },
    body: JSON.stringify({ message }),
  });
  const data = await response.json();
  return data.message;
}

// Add feedback
async function rateMes sage(messageId, rating) {
  const response = await fetch(`/chat/message/${messageId}/feedback`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    },
    body: JSON.stringify({ rating }),
  });
  return await response.json();
}
```

### PHP / Laravel

```php
use App\Services\ChatbotService;
use App\Models\ChatSession;

$chatbotService = app(ChatbotService::class);

// Create session
$session = ChatSession::createSession(userId: auth()->id());

// Send message
$reply = $chatbotService->sendMessage($session, "Apa itu KVT Hub?");

// Get history
$history = $chatbotService->getHistory($session);

// Archive
$chatbotService->archiveSession($session);

// Delete
$chatbotService->deleteSession($session);
```

---

## ⚙️ Configuration

### config/chatbot.php

```php
return [
    'enabled' => env('CHATBOT_ENABLED', true),
    
    'model' => env('CHATBOT_MODEL', 'gpt-4o-mini'),
    'max_tokens' => (int) env('CHATBOT_MAX_TOKENS', 2000),
    'temperature' => (float) env('CHATBOT_TEMPERATURE', 0.7),
    
    'features' => [
        'streaming' => true,
        'voice_input' => false,
        'voice_output' => false,
        'image_support' => false,
        'file_upload' => false,
    ],
    
    'rate_limit' => [
        'messages_per_minute' => 10,
        'messages_per_hour' => 100,
        'messages_per_day' => 500,
    ],
    
    'cost_limits' => [
        'daily_cost_limit' => 10.00,
        'monthly_cost_limit' => 100.00,
    ],
];
```

### Model Selection

Pilih model yang sesuai:

| Model | Input Token | Output Token | Speed | Use Case |
|-------|------------|--------------|-------|----------|
| `gpt-4o-mini` | $0.15/1M | $0.60/1M | ⚡ Cepat | General |
| `gpt-4o` | $5.00/1M | $15.00/1M | 🐢 Lambat | Complex |
| `gpt-3.5-turbo` | $0.50/1M | $1.50/1M | ⚡⚡ Sangat Cepat | Simple |

**Rekomendasi:** `gpt-4o-mini` untuk balance antara cost & quality

---

## 💰 Cost Management

### Token Counting

- **Input tokens**: Jumlah word dalam user message + system prompt
- **Output tokens**: Jumlah word dalam AI response
- **Overhead**: ~10-15% untuk processing

Contoh:
```
User: "Apa saja fitur KVT Hub?" (5 tokens)
System Prompt: ~200 tokens
AI Response: "KVT Hub adalah..." (150 tokens)

Total: ~360 tokens ≈ $0.00054 (dengan gpt-4o-mini)
```

### Cost Limits

Set di `.env`:
```env
CHATBOT_COST_LIMIT_DAILY=10.00    # $10 per hari
CHATBOT_COST_LIMIT_MONTHLY=100.00 # $100 per bulan
```

### Monitoring

Check database:
```sql
SELECT 
  user_id,
  COUNT(*) as sessions,
  SUM(total_tokens_used) as total_tokens,
  SUM(api_cost) as total_cost
FROM chat_sessions
WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
GROUP BY user_id
ORDER BY total_cost DESC;
```

---

## 🔧 Troubleshooting

### Issue: "Invalid API Key"

**Solusi:**
1. Check `.env` → `OPENAI_API_KEY` tidak kosong
2. Verify API key valid di [OpenAI Platform](https://platform.openai.com/account/api-keys)
3. Check rate limits (5 RPM free tier)

### Issue: "Session not found"

**Solusi:**
1. Check user_id match dengan auth user
2. Verify session status ≠ 'deleted'
3. Check session not soft-deleted

### Issue: "Max tokens exceeded"

**Solusi:**
1. Turunkan `CHATBOT_MAX_TOKENS` di `.env`
2. Clear message history / start new session
3. Gunakan shorter context

### Issue: Slow responses

**Solusi:**
1. Switch ke `gpt-3.5-turbo` (lebih cepat)
2. Reduce `CHATBOT_MAX_TOKENS`
3. Limit message history ke 5-10 messages

### Issue: Errors dalam production

**Check logs:**
```bash
tail -f storage/logs/laravel.log
```

**Enable debug mode:**
```env
APP_DEBUG=true  # ⚠️ Hanya untuk development
```

---

##📞 Support

- **Documentation**: [KVT Hub Docs](https://kvt-hub.test/docs)
- **GitHub Issues**: [github.com/kuro-myths/kvt-hub/issues](https://github.com/kuro-myths/kvt-hub/issues)
- **Community Forum**: [forum.kvt-hub.test](https://forum.kvt-hub.test)

---

**Last Updated:** 26 February 2026
