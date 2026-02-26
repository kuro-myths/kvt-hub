# 🤖 Floating Chatbot Widget Documentation

> Floating chatbot widget yang dapat diakses dari semua halaman - untuk public & authenticated users

---

## 📋 Fitur

### ✨ Capabilities
- **Floating widget** di bottom-right corner
- **Guest users** bisa chat anonymous tanpa login
- **Authenticated users** session otomatis tersimpan
- **Persistent sessions** dengan localStorage token
- **Responsive design** - mobile & desktop friendly
- **Real-time messaging** dengan OpenAI API
- **No page reload** - semua via AJAX

### 🎯 Location
- Tersedia di **semua halaman** (landing, dashboard, publik, dll)
- Fixed position di bottom-right
- Minimal blocking (small bubble button)
- Toggle bukak/tutup dengan smooth animation

---

## 🏗️ Arsitektur

### File Structure
```
resources/views/
├── components/
│   └── chatbot-widget.blade.php     ← Floating widget component
└── tata-letak/
    └── utama.blade.php              ← Include widget

app/Http/Controllers/
└── ChatController.php               ← Widget endpoints

routes/web.php                         ← Public API routes
```

### API Endpoints

#### 1. Guest Session (Create/Get)
```http
POST /api/chat/guest-session

Body:
{
  "token": "sess_..." (optional, untuk restore session)
}

Response:
{
  "success": true,
  "session": {
    "id": 1,
    "token": "sess_abc123...",
    "isExisting": false  // true jika session lama
  }
}
```

#### 2. Send Message (Widget)
```http
POST /api/chat/send

Body:
{
  "message": "Apa itu KVT Hub?",
  "session_id": 1,
  "session_token": "sess_abc123..."
}

Response:
{
  "success": true,
  "message": {
    "id": 42,
    "role": "assistant",
    "content": "KVT Hub adalah...",
    "type": "text"
  }
}
```

---

## 🎨 UI Components

### Floating Bubble
- Position: fixed bottom-right (24px from edge)
- Size: 56px × 56px
- Color: Gradient violet → purple
- Icon: Comments icon
- Hover: Scale up + shadow increase
- Z-index: 50 (above most content)

### Chat Window
- Width: 384px (w-96)  
- Height: 384px (h-96)
- Position: Absolute, aligned to bubble
- Animation: Fade-in 200ms
- Resizable: No (fixed size)
- Responsive: Adjusts on small screens

### Messages
- User messages: Right-aligned, violet bg
- AI messages: Left-aligned, slate bg
- Errors: Left-aligned, red bg
- Auto-scroll to newest message
- Placeholder: Shows on empty state

---

## 💻 How It Works

### Client-side Flow

```
1. Page Loads
   ↓
2. Widget Initializes
   - Check localStorage for token
   - POST /api/chat/guest-session
   - Save session_id & session_token
   
3. User Clicks Bubble
   - Toggle chat window visibility
   - Focus input field

4. User Sends Message
   - Add to UI (optimistic)
   - POST /api/chat/send
   - Display AI response
   - Auto-scroll

5. Session Persists
   - Token saved to localStorage
   - Same browser = same session
   - Close & reopen = same chat
```

### Server-side Flow

```
POST /api/chat/send
   ↓
[ChatController::floatingWidgetSend()]
   ↓
Validate session_token & session_id
   ↓
Check session exists & is active
   ↓
Check authorization (if auth user)
   ↓
[ChatbotService::sendMessage()]
   ↓
Build message history
   ↓
Call OpenAI API
   ↓
Save user message to DB
   ↓
Save AI response to DB
   ↓
Update session stats (tokens, cost)
   ↓
Response JSON
```

---

## 🔐 Security

### Authentication
- **Guest sessions**: No user_id, just token-based
- **Auth sessions**: user_id + token verification
- **Authorization**: Check token matches session
- **CSRF protected**: X-CSRF-TOKEN header required

### Rate Limiting
- Per-session message limit: 10/minute
- Per IP: 100/hour (configurable)
- Token usage tracked per session

### Data Privacy
- Guest chats NOT persisted if user doesn't login
- Session timeout: 24 hours
- Soft delete: Can restore chats
- No IP logging by default

---

## 📱 Responsive Behavior

### Desktop (≥768px)
- Widget: 384px × 384px
- Position: Fixed bottom-right
- Visible: Full unobstructed

### Tablet (600px-768px)
- Widget: 350px × 350px (scaled)
- Position: Same
- Hidden: If keyboard open

### Mobile (<600px)
- Widget: 90% width (max 360px)
- Position: Bottom-center or full-width modal
- Behavior: Hide on scroll down, show on scroll up

---

## 🛠️ Customization

### Change Position
Edit `chatbot-widget.blade.php`:
```html
<!-- Change from bottom-right to bottom-left -->
<div id="chatbotWidget" class="fixed bottom-6 left-6 z-50">
```

Position options:
- `bottom-6 right-6` - Bottom right (default)
- `bottom-6 left-6` - Bottom left
- `top-6 right-6` - Top right
- `top-6 left-6` - Top left

### Change Colors
```html
<!-- Bubble button gradient -->
<button class="bg-gradient-to-br from-blue-500 to-teal-600">

<!-- Header gradient -->
<div class="bg-gradient-to-r from-blue-600 to-teal-600">

<!-- Message bubbles -->
User: bg-blue-600
AI: bg-slate-700
Error: bg-red-600
```

### Change Size
```html
<!-- Bubble size -->
<button class="w-14 h-14">  <!-- Change to w-16 h-16 -->

<!-- Window size -->
<div class="w-96 h-96">      <!-- Change to w-[500px] h-[500px] -->
```

### Change Initial Message
```javascript
// In chatbot-widget.blade.php, modify placeholder:
<div class="text-center py-8">
    <p class="text-slate-300 text-sm">Mulai percakapan!</p>
    <p class="text-slate-400 text-xs mt-2">Tanya tentang apa saja</p>
</div>
```

---

## 🐛 Troubleshooting

### Widget Not Showing

**Check:**
1. Page has CSS meta `<meta name="csrf-token">`
2. `resources/views/components/chatbot-widget.blade.php` exists
3. `utama.blade.php` includes component: `@include('components.chatbot-widget')`
4. Check browser console for errors (F12)
5. Clear cache: `php artisan view:cache`

```bash
# Recompile views
php artisan view:clear
php artisan view:cache
```

### Messages Not Sending

**Check:**
1. OpenAI API key configured: `.env` has `OPENAI_API_KEY`
2. API key valid (no expired/revoked)
3. Rate limits not exceeded
4. Session exists: Check browser localStorage `chatbot_token`
5. Check Laravel logs: `storage/logs/laravel.log`

```bash
# Test API key via tinker
php artisan tinker
>>> $response = OpenAI::chat()->create([...])
```

### Widget UI Broken

**Check:**
1. Tailwind CSS loaded (check source in browser)
2. No CSS conflicts from other frameworks
3. Z-index conflict with other fixed elements
4. Browser compatibility (use latest Chrome/Firefox)

**Fix CSS conflicts:**
```html
<!-- Add !important to override conflicts -->
<div id="chatbotWidget" class="fixed bottom-6 right-6 z-50 !font-sans !text-base">
```

### Slow Messages

**Causes:**
1. OpenAI API rate limit (5 RPM free)
2. Server response time  
3. Network latency
4. Large context history

**Solutions:**
- Upgrade to paid OpenAI plan
- Reduce context (fewer history messages)
- Optimize server (enable caching)
- Use faster model: `gpt-3.5-turbo`

---

## 📊 Analytics

### Tracking Usage
```php
// Get widget usage stats
SELECT 
    COUNT(DISTINCT chat_session_id) as total_sessions,
    COUNT(*) as total_messages,
    COUNT(CASE WHEN role='user' THEN 1 END) as user_messages,
    COUNT(CASE WHEN role='assistant' THEN 1 END) as ai_responses,
    SUM(api_cost) as total_cost
FROM chat_messages
WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 DAY);
```

### Session Retention
```php
// Guest sessions (no user_id)
SELECT COUNT(*) FROM chat_sessions WHERE user_id IS NULL;

// Sessions per day
SELECT DATE(created_at) as day, COUNT(*) as sessions
FROM chat_sessions
WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
GROUP BY DATE(created_at);
```

---

## 🚀 Deployment

### Production Setup

1. **Verify API Keys**
   ```bash
   # Test OpenAI connectivity
   curl -X GET "https://api.openai.com/v4/models" \
     -H "Authorization: Bearer $OPENAI_API_KEY"
   ```

2. **Enable Caching**
   ```bash
   php artisan config:cache
   php artisan view:cache
   php artisan route:cache
   ```

3. **Set Cost Limits**
   ```env
   CHATBOT_COST_LIMIT_DAILY=50.00
   CHATBOT_COST_LIMIT_MONTHLY=500.00
   ```

4. **Monitor Logs**
   ```bash
   # Real-time log monitoring
   tail -f storage/logs/laravel.log | grep -i chat
   ```

5. **Setup Backups**
   ```bash
   # Backup chat data daily
   php artisan backup:run
   ```

---

## 📞 Support

- **Docs**: [docs/CHATBOT.md](CHATBOT.md)
- **Issues**: GitHub Issues
- **Discord**: Community server

---

**Last Updated:** 26 February 2026
