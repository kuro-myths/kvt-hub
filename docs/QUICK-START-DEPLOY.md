# 🎯 KVT Hub Deployment Quick Start

> Panduan cepat deploy ke production dalam 1 jam

---

## The Plan (60 minutes total)

```
Railway Account & Setup      → 15 menit
Domain Registration         → 15 menit  
Environment Configuration   → 10 menit
First Deploy                → 10 menit
Verification & Testing      → 10 menit
─────────────────────────────────────
Total                       → 60 menit
```

---

## Phase 1: Railway Setup (15 menit)

### 1. Buat Railway Account
```
➜ Buka https://railway.app
➜ Klik "Start Project"
➜ Login dengan GitHub (recommended)
➜ Authorize Railway access ke akun GitHub
```

### 2. Connect Repository
```
➜ Pilih "Deploy from GitHub"
➜ Search "kvt-hub" repository
➜ Select kvt-hub
➜ Railway auto-detect Laravel framework ✓
```

### 3. Add PostgreSQL Database
```
➜ Di Railway dashboard: "Add Service"
➜ Select: PostgreSQL 14+
➜ Railway auto-generate DATABASE_URL
✓ Database ready dalam 30 detik
```

### 4. Configure Environment Variables
Buka Railway Dashboard → "Environment" → Paste variables berikut:

```ini
APP_NAME=KVT-Hub
APP_ENV=production
APP_DEBUG=false
APP_URL=https://kvt-hub.tk

APP_KEY=base64:YOUR_KEY_HERE
# Generate key locally: php artisan key:generate

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
# DATABASE_URL auto-generated (hapus jika ada)

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file

OPENAI_API_KEY=sk-proj-XXXX...
CHATBOT_MODEL=gpt-4o-mini
CHATBOT_MAX_TOKENS=2000
CHATBOT_TEMPERATURE=0.7
CHATBOT_ENABLED=true
```

**Cara dapat APP_KEY:**
```bash
# Local terminal
php artisan key:generate --show
# Copy output (format: base64:xxxxx)
# Paste ke Railway APP_KEY
```

**Cara dapat OPENAI_API_KEY:**
- Buka https://platform.openai.com/api-keys
- Create New API Key
- Copy key
- Paste ke Railway OPENAI_API_KEY

---

## Phase 2: Domain Registration (15 menit)

### 1. Register Domain di Freenom
```
➜ Buka https://www.freenom.com
➜ Search: kvt-hub.tk
➜ Add to Cart
➜ Continue
➜ Select: 12 Months (FREE)
➜ Checkout
➜ Complete order (NO PAYMENT)
✓ Domain registered gratis!
```

**Alternatif TLD:**
- `kvt-hub.ml` (Mali - lebih stable)
- `kvt-hub.ga` (Gabon)
- `kvt-hub.cf` (Central African Republic)

### 2. Get Nameservers dari Railway
```
Di Railway Dashboard:
➜ Klik project
➜ Domain → Custom Domain
➜ Lihat "Railway nameservers"
   ns1.railway.app
   ns2.railway.app
   ns3.railway.app
```

### 3. Update Nameservers di Freenom
```
Freenom:
➜ My Domains
➜ Manage Domain (kvt-hub.tk)
➜ Management Tools → Nameservers
➜ Ganti nameservers ke Railway's
➜ Save

⚠️ DNS propagation: 24-48 jam
```

---

## Phase 3: Connect Domain ke Railway (10 menit)

### Di Railway Dashboard:
```
➜ Project → Domain
➜ Add Custom Domain
➜ Enter: kvt-hub.tk
➜ Railway auto-generate SSL certificate
✓ Done!

Railway akan:
- Auto-generate HTTPS certificate (Let's Encrypt)
- Setup DNS pointing
- Enable auto-renewal
```

---

## Phase 4: Deploy! (10 menit)

### Deploy Otomatis (Recommended):
```bash
# Local terminal
cd ~/kvt-hub

# Pastikan semua changes committed
git add .
git commit -m "chore: production deployment"
git push origin main

# Railway watch untuk changes di main branch
# Auto-build & deploy dalam 5-10 menit
```

### Monitor Deployment:
```
Railway Dashboard:
➜ Deployments tab
➜ Lihat live build logs
➜ Status berubah: Building → Deploying → Success
```

### Jika ada error:
```
➜ Klik deployment → View Logs
➜ Cari error message
➜ Fix di local → git push lagi
➜ Railway re-deploy otomatis
```

---

## Phase 5: Verification (10 menit)

### Test Website
```
Buka: https://kvt-hub.tk

Cek:
✓ Homepage loads
✓ Navigation works
✓ Database connected (check in logs)
✓ Chat feature works
✓ Images load
✓ No 5xx errors
```

### Debug Jika Ada Masalah:
```bash
# Local: Check migrations status
php artisan migrate:status

# Check database connection
php artisan tinker
>>> DB::connection()->getPDO()

# Check OpenAI API
>>> OpenAI::factory()->make()->chat()->create([...])

# Local: Check logs
tail -f storage/logs/laravel.log
```

**Railway Logs:**
```
Dashboard → Deployments → Select latest deploy → Logs
```

---

## Monitoring & Daily Operations

### Check Status
```bash
# Daily: Monitor costs
Railway Dashboard → Billing

# Monitor logs
Dashboard → Latest Deployment → Logs

# Check errors
Dashboard → Logs → "ERROR" filter
```

### Update Code
```bash
# Feature development
git checkout -b feature/my-feature
# ... make changes ...
git commit -m "feat: my feature"
git push origin feature/my-feature

# Merge ke main
git checkout main
git merge feature/my-feature
git push origin main

# Railway auto-deploy dalam 5-10 menit ✓
```

### Database Backup (Penting!)
```bash
# Dari Railway PostgreSQL credentials:
pg_dump -h host -U user -d database > backup.sql

# Simpan ke external storage:
- Google Drive
- Dropbox
- AWS S3
- GitHub (private repo)
```

---

## Cost Breakdown (Expected)

| Service | Cost | Notes |
|---------|------|-------|
| Railway | $5/mo credit | Usually stays within free tier |
| Domain (Freenom) | $0 | FREE perpetual |
| OpenAI API | $0-2/mo | Depends on usage |
| **Total** | **$0-2/mo** | 🎉 Nearly free! |

---

## Troubleshooting

### "502 Bad Gateway"
```
→ Check Railway logs
→ Likely: database not connecting
→ Verify DATABASE_URL valid
→ Run migrations: php artisan migrate
→ Redeploy
```

### "OpenAI API key not working"
```
→ Check OPENAI_API_KEY in Railway env vars
→ Verify key is active: platform.openai.com/api-keys
→ Check API usage: Usage page on OpenAI dashboard
→ Keys have usage limits ($5 default)
```

### "Domain not resolving"
```
→ AWS: nslookup kvt-hub.tk
→ Check Freenom nameservers point to Railway
→ Wait 24-48 hours for DNS propagation
→ Clear browser cache: Ctrl+Shift+Del
```

### "Database errors after migrate"
```
→ Ensure all migrations created
→ Check migration status: 
   php artisan migrate:status
→ Rerun missed migrations:
   php artisan migrate --path=...
```

### "Images not loading"
```
→ Check storage symlink exists:
   php artisan storage:link
→ Verify storage on Railway persists (use DB instead)
→ Or upload to external CDN (free: Cloudflare)
```

---

## Next Steps (After Going Live)

### Immediate (Day 1)
- [ ] Verify all pages working
- [ ] Test chat feature
- [ ] Check error logs
- [ ] Announce to users

### Short-term (Week 1)
- [ ] Setup backup automation
- [ ] Monitor costs
- [ ] Optimize slow queries
- [ ] Fix any bugs found

### Long-term (Month 1+)
- [ ] Upgrade to paid domain (.com, .id, etc)
- [ ] Setup CDN for images
- [ ] Implement caching strategy
- [ ] Plan feature roadmap

---

## Helpful Resources

- Railway Docs: https://docs.railway.app/
- Laravel on Railway: https://docs.railway.app/reference/apps/railway-app/framework-deploy-guides/laravel
- Freenom: https://www.freenom.com/
- OpenAI API: https://platform.openai.com/docs/
- Railway Community: https://railway.app/community

---

## Support

Jika ada masalah:

1. **Check logs first:**
   - Railway dashboard
   - Local `storage/logs/laravel.log`

2. **Search in docs:**
   - HOSTING-DEPLOYMENT.md
   - DEPLOYMENT-CHECKLIST.md
   - Laravel official docs

3. **Ask for help:**
   - Railway Discord: https://discord.gg/railway
   - Laravel Discord: https://discord.gg/laravel
   - GitHub Issues (jika bug)

---

**You're all set! 🚀 KVT Hub live in 1 hour!**

Last updated: 26 February 2026
