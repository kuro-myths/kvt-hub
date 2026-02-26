# 🌐 Rekomendasi Hosting & Domain Gratis untuk KVT Hub

> Production-ready hosting untuk Laravel + PostgreSQL

---

## 🏆 TOP RECOMMENDATION: Railway

**Rating:** ⭐⭐⭐⭐⭐ (Best for Laravel + PostgreSQL)

### ✨ Keunggulan
- ✅ **$5/month free credit** setiap bulannya (= ~3 project kecil)
- ✅ Support **PHP/Laravel** native
- ✅ Support **PostgreSQL 14+**
- ✅ Support **custom domain** (free domain dari Freenom)
- ✅ Auto-deploy dari **GitHub** (git push = deploy otomatis)
- ✅ **Environment variables** mudah
- ✅ **Logs & monitoring** bawaan
- ✅ **No cold start** (unlike AWS Lambda)
- ✅ **HTTP/HTTPS** automatic SSL
- ✅ East to edit: push ke GitHub → auto deploy

### 💰 Cost Breakdown
```
Free credit/bulan:       $5.00
Laravel runtime:         ~$2-3/bulan (light traffic)
PostgreSQL database:     ~$1-2/bulan (small DB)
Custom domain:           GRATIS (Freenom)
────────────────
TOTAL:                   $0/bulan (within free credit)
```

### 🚀 Setup Steps
1. **Register Railway**: https://railway.app
   - Sign up with GitHub (recommended)
   - Verify email
   
2. **Create Project**:
   - Select "Deploy from GitHub"
   - Connect GitHub repo (kvt-hub)
   - Railway auto-detects Laravel
   
3. **Setup PostgreSQL**:
   - Add service → PostgreSQL
   - Auto-configure DATABASE_URL
   
4. **Configure Environment**:
   - Add `.env` variables:
     ```
     APP_KEY=base64:...
     APP_ENV=production
     APP_DEBUG=false
     DATABASE_URL=...
     OPENAI_API_KEY=sk-...
     ```
   
5. **Deploy**:
   - Push ke GitHub
   - Railway auto-deploy (5-10 menit)
   
6. **Custom Domain**:
   - Free domain: https://freenom.com
   - Domain registrasi: `kvthub.tk` atau `.ml`
   - Point to Railway (Railway beri nameserver)
   - Setup di Railway dashboard

### 📊 Estimated Monthly Cost
- **Light traffic** (100 users/hari): **$0** (dalam free credit)
- **Medium traffic** (1000 users/hari): **$2-5**
- **Heavy traffic** (10K+ users/hari): **$10-20**

### ⚠️ Limitations
- Free credit reset setiap bulan (tidak cumulative)
- Cold start jika idle 30+ hari
- Limited to 6 concurrent deployments
- Database backup manual

---

## 🥈 ALTERNATIVE: Render

**Rating:** ⭐⭐⭐⭐ (Good untuk Laravel)

### ✨ Keunggulan
- ✅ **Free tier** available (limited)
- ✅ Support PHP/Laravel
- ✅ PostgreSQL support
- ✅ Auto-deploy dari GitHub
- ✅ Custom domain (dengan Freenom)
- ✅ Free SSL
- ✅ Cron jobs support

### ⚠️ Kekurangan
- Free tier: 15 min idle timeout (spin down)
- Database free tier: 4 CPU, limited storage
- Limited uptime SLA
- Slower boot time

### 💻 Setup
```bash
1. Register: https://render.com
2. Connect GitHub
3. Create Web Service (PHP/Laravel)
4. Add PostgreSQL service
5. Configure env variables
6. Deploy & add custom domain
```

---

## 🔥 DARK HORSE: Replit (untuk development)

**Rating:** ⭐⭐⭐ (Good untuk learning, not ideal production)

### ✨ Keunggulan
- ✅ **100% free - no credit card**
- ✅ Web IDE built-in
- ✅ Edit code langsung di browser
- ✅ Auto-save & run
- ✅ Database included (PostgreSQL)
- ✅ Deploy instant
- ✅ Collaborative coding

### ⚠️ Kekurangan
- Memory/CPU terbatas (512MB RAM)
- Slow untuk traffic besar
- Free tier: 1 project per tier
- UI terbatas
- Not recommended untuk production traffic

### 💻 Setup
```bash
1. Register: https://replit.com
2. Create Repl → PHP/Laravel template
3. Upload kode atau git clone
4. Setup PostgreSQL (via built-in database)
5. Click "Deploy"
6. Custom domain (paid feature)
```

---

## 🎁 DOMAIN GRATIS: Freenom

**Rating:** ⭐⭐⭐⭐ (Free + valid)

### ✨ Keunggulan
- ✅ **100% Gratis** untuk beberapa TLD
- ✅ 12 bulan registration
- ✅ Auto-renewal (free)
- ✅ DNS management included
- ✅ HTTPS support

### 📝 TLD yang Free
- `.tk` - Most popular
- `.ml` - Martinique
- `.ga` - Gabon  
- `.cf` - Central African Republic

### ⚠️ Kekurangan
- TLD kurang "premium" (tapi valid)
- Freenom ad banners kadang
- Suspend jika tidak renew
- DNS propagation slow

### 🚀 Setup
```
1. Go to https://www.freenom.com
2. Find domain → Search "kvt-hub.tk"
3. Add to cart → Checkout
4. Register FREE (12 bulan)
5. Dashboard → Manage Domain
6. Change nameserver ke Railway/Render
7. Done!
```

---

## 📊 COMPARISON TABLE

| Feature | Railway | Render | Replit |
|---------|---------|--------|--------|
| **Free Tier** | $5/mo credit | Limited | Full free |
| **PHP/Laravel** | ✅ Perfect | ✅ Good | ✅ Good |
| **PostgreSQL** | ✅ Yes | ✅ Yes | ✅ Yes |
| **Custom Domain** | ✅ Yes | ✅ Yes | 🟡 Paid |
| **Auto-deploy** | ✅ From GitHub | ✅ From GitHub | ✅ Native |
| **Production Ready** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐ |
| **Traffic Capacity** | Medium+ | Small-Medium | Small |
| **Uptime SLA** | 99% | 99% | No SLA |
| **Cost/Month** | $0-5 | $0-7 | $0 |
| **Setup Time** | 10 min | 15 min | 5 min |

---

## 🎯 RECOMMENDED STACK for You

### Option 1: Railway (BEST) 🏆
```
Domain:    kvt-hub.tk (Freenom - Free)
Hosting:   Railway ($5/mo credit, usually free)
Database:  PostgreSQL on Railway
Deploy:    Git push → auto deploy
Monitoring: Railway dashboard
Cost/month: $0 (within free credit)
```

### Option 2: Render + Freenom (BACKUP)
```
Domain:    kvt-hub.tk (Freenom - Free) 
Hosting:   Render (free tier)
Database:  PostgreSQL on Render
Deploy:    Git push → auto deploy
Cost/month: $0 (free tier)
Note:      Slower, cold start issues
```

### Option 3: Replit (IF NO CREDIT CARD)
```
Domain:    replit.dev subdomain (free)
Hosting:   Replit ($0)
Database:  Replit PostgreSQL
Deploy:    Instant via IDE
Cost/month: $0
Note:      Dev only, not production
```

---

## 🚀 QUICK START: Railway + Freenom

### Step 1: Prepare Code
```bash
cd kvt-hub

# Update .env untuk production
APP_ENV=production
APP_DEBUG=false
APP_URL=https://kvt-hub.tk

# Commit
git add .
git commit -m "chore: prepare for Railway deployment"
git push origin main
```

### Step 2: Railway Setup (5 min)
```
1. https://railway.app
2. Login with GitHub
3. New Project → Deploy from GitHub
4. Select kvt-hub repo
5. Railway auto-detect Laravel
6. Add PostgreSQL service
7. Configure env: (Railway auto-fill most)
   - APP_KEY (generate: php artisan key:generate)
   - OPENAI_API_KEY (your API key)
   - Other vars as needed
8. Deploy button → automatic
9. Copy Railway URL (kvthub.up.railway.app)
```

### Step 3: Domain (Freenom) (3 min)
```
1. https://www.freenom.com
2. Search "kvt-hub.tk"
3. Add to cart
4. Checkout → Use Freenom account
5. Register FREE
6. My Domains → kvt-hub.tk
7. Management Tools → Nameservers
8. Change to Railway nameservers:
   - ns-1.railway.app
   - ns-2.railway.app
   (Railway will provide these)
9. Wait 24-48h for DNS to propagate
```

### Step 4: Railway Point Domain
```
In Railway Dashboard:
1. Project → Settings
2. Domain → Add Domain
3. Enter: kvt-hub.tk
4. Add (Railway auto-generates SSL)
5. Done!
```

### Step 5: Verify
```
https://kvt-hub.tk → Should show KVT Hub
🎉 You're live!
```

---

## 🔄 CI/CD: Automatic Deploy

Both Railway & Render support automatic deployment:

```yaml
# .github/workflows/deploy.yml (optional, Railway/Render auto-do this)

name: Deploy to Railway
on: [push]
jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - run: |
          git config user.name "Deploy Bot"
          git config user.email "deploy@example.com"
          echo "Deploy triggered!"
          # Railway handles rest automatically
```

**Workflow:**
```
You push to GitHub
    ↓
GitHub webhook → Railway
    ↓
Railway pulls latest code
    ↓
Builds Laravel (composer install, etc)
    ↓
Runs migrations (auto)
    ↓
Deploys to production
    ↓
URL: kvt-hub.tk live!
    ↓
Takes 5-10 minutes
```

---

## 📱 Edit Code Directly

### Option A: Cloud IDE (Replit)
- Edit in browser directly
- Auto-save & auto-deploy
- SQLite/PostgreSQL included
- Team collaboration built-in

### Option B: VS Code + DevContainer (Railway)
- Clone locally: `git clone https://github.com/yourname/kvt-hub.git`
- Edit locally in VS Code
- `git push` → Railway auto-deploys
- Run locally: `docker-compose up`

### Option C: GitHub Codespaces (Free tier)
- Edit in VS Code (browser)
- Full development environment
- 120 hours/month free
- Terminal, database, everything

---

## ⚠️ Important Notes

### Database Migration
When deploying to Railway/Render:
```bash
# Ensure migrations run automatically:
# In Procfile or Railway config:
web: composer install && php artisan migrate --force && php artisan serve

# Or use Railway post-deploy hook:
- type: exec
  command: php artisan migrate --force
```

### Environment Security
- **Never** commit `.env` to Git
- Use Railway/Render secret management
- Railway UI for sensitive variables:
  ```
  Dashboard → Project → Variables
  Add: APP_KEY, OPENAI_API_KEY, etc
  ```

### Storage & Uploads
- Railway/Render use **ephemeral storage** (deleted on redeploy)
- Use **S3 (AWS) / Cloudinary / ImageKit** untuk uploads
- Or use Supabase Storage (free)

### Database Backup
```sql
-- Backup PostgreSQL:
pg_dump -U postgres kvt_hub > backup.sql

-- Restore:
psql -U postgres kvt_hub < backup.sql
```

---

## 💡 Pro Tips

1. **Start with Railway** - Best balance free/production
2. **Use Freenom domain** - 100% free, valid TLD
3. **Test on Replit first** - No credit card needed, learn before deploying
4. **Setup GitHub Actions** - Auto-test before Railway deploys
5. **Monitor costs** - Railway dashboard shows real-time spend
6. **Database backups** - Backup often in early stage
7. **Use CDN** - Cloudflare free (for static assets)
8. **Enable caching** - Reduce API calls to OpenAI

---

## 🆘 Troubleshooting

### Issue: Build failing
```
Check Railway logs:
Dashboard → Deployment → Build Logs
Common: php.ini settings, missing extensions
```

### Issue: Database not connecting
```
Check DATABASE_URL in Railway variables
Format: postgresql://user:password@host:port/database
```

### Issue: Domain not pointing
```
1. Check DNS propagation: nslookup kvt-hub.tk
2. Wait 24-48h
3. Verify Freenom nameservers set correctly
```

### Issue: Costs increasing
```
1. Check Railway dashboard → Usage
2. Optimize queries (add indexes)
3. Enable caching (Redis free tier available)
4. Compress images before upload
```

---

## 📞 Support

- **Railway**: https://docs.railway.app
- **Render**: https://render.com/docs
- **Replit**: https://docs.replit.com
- **Freenom**: https://www.freenom.com/support

---

## 🎬 Next Steps

1. Choose hosting (Railway recommended for you)
2. Register domain (Freenom)
3. Push to GitHub (if not already)
4. Deploy to Railway (10 minutes)
5. Point domain to Railway
6. Test at kvt-hub.tk
7. Monitor & optimize

**Estimated time to live: 30-60 minutes** ⏱️

---

**Last Updated:** 26 February 2026
