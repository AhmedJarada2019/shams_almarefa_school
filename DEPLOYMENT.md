# تعليمات رفع المشروع на GitHub ونشره على الاستضافة

## 1. تثبيت Git (إذا لم يكن مثبتاً)

### خيار A: تثبيت Git عبر سطر الأوامر
1. قم بتحميل Git من: https://git-scm.com/download/win
2. قم بتثبيته مع الإعدادات الافتراضية
3. أعد تشغيل PowerShell أو CMD بعد التثبيت

### خيار B: استخدام GitHub Desktop
1. قم بتحميل GitHub Desktop من: https://desktop.github.com/
2. قم بتثبيته وسجل الدخول بحساب GitHub الخاص بك

## 2. إنشاء مستودع على GitHub

1. اذهب إلى https://github.com/new
2. أدخل اسم المستودع (مثلاً: school-website)
3. اختر "Public" أو "Private" حسب رغبتك
4. لا تحدد إضافة README أو .gitignore
5. اضغط على "Create repository"

## 3. ربط المشروع بـ GitHub

### باستخدام سطر الأوامر (بعد تثبيت Git):

```bash
cd "c:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed"
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/USERNAME/REPOSITORY.git
git push -u origin main
```

استبدل `USERNAME` باسم مستخدم GitHub الخاص بك
استبدل `REPOSITORY` باسم المستودع الذي أنشأته

### باستخدام GitHub Desktop:

1. افتح GitHub Desktop
2. اضغط على "File" > "Add Local Repository"
3. اختر مجلد المشروع: `c:\Users\Pro Book\Downloads/school_fixed_updated_1/school_fixed`
4. اضغط على "Publish repository"
5. اختر اسم المستودع وحدد "Public" أو "Private"
6. اضغط على "Publish repository"

## 4. تعليمات النشر على الاستضافة

### خيار A: استضافة مشتركة (Shared Hosting) مع cPanel

1. **إعداد الملفات:**
   - قم بتحميل الملفات من GitHub أو من مجلد المشروع
   - استثني المجلدات التالية من الرفع:
     - `node_modules`
     - `vendor`
     - `.git`

2. **رفع الملفات:**
   - استخدم File Manager أو FTP لرفع محتوى مجلد `public` إلى مجلد `public_html`
   - ارفع باقي الملفات والمجلدات (ما عدا المجلدات المستثناة) خارج `public_html`

3. **إعداد البيئة:**
   - أنشئ ملف `.env` في الاستضافة
   - انسخ محتوى `.env.example` أو استخدم التالي:
   ```env
   APP_NAME=School
   APP_ENV=production
   APP_KEY=base64:YOUR_APP_KEY_HERE
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

4. **توليد APP_KEY:**
   ```bash
   php artisan key:generate
   ```

5. **تثبيت التبعيات:**
   - في SSH أو Terminal في cPanel:
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   ```

6. **إنشاء symbolic link:**
   ```bash
   php artisan storage:link
   ```

7. **تشغيل الترحيلات:**
   ```bash
   php artisan migrate --force
   ```

8. **تخزين التخزين:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### خيار B: VPS أو Cloud Server (DigitalOcean, AWS, etc.)

1. **تثبيت LEMP Stack:**
   - Nginx
   - MySQL/MariaDB
   - PHP 8.1+ مع الامتدادات المطلوبة
   - Composer
   - Node.js

2. **استنساخ المشروع:**
   ```bash
   git clone https://github.com/USERNAME/REPOSITORY.git /var/www/school
   cd /var/www/school
   ```

3. **إعداد الأذونات:**
   ```bash
   chown -R www-data:www-data /var/www/school
   chmod -R 755 /var/www/school
   chmod -R 777 /var/www/school/storage
   chmod -R 777 /var/www/school/bootstrap/cache
   ```

4. **تثبيت التبعيات:**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   ```

5. **إعداد .env:**
   ```bash
   cp .env.example .env
   nano .env
   ```

6. **توليد المفتاح:**
   ```bash
   php artisan key:generate
   ```

7. **إنشاء symbolic link:**
   ```bash
   php artisan storage:link
   ```

8. **تشغيل الترحيلات:**
   ```bash
   php artisan migrate --force
   ```

9. **إعداد Nginx:**
   - أنشئ ملف إعداد في `/etc/nginx/sites-available/school`
   - أضف symbolic link إلى `/etc/nginx/sites-enabled/`
   - أعد تشغيل Nginx

### خيار C: Laravel Forge + DigitalOcean

1. سجل في Laravel Forge
2. قم بربط حساب DigitalOcean
3. أنشئ خادم جديد
4. أضف مستودع GitHub
5. قم بإعداد البيئة في Forge
6. قم بتثبيت SSL
7. قم بنشر المشروع

### خيار D: Hostinger مع النشر التلقائي (GitHub Actions)

هذا الخيار يوفر مزامنة تلقائية بين GitHub و Hostinger. أي تغيير يتم دفعه إلى فرع `main` سيتم نشره تلقائياً على الاستضافة.

#### الخطوة 1: إعداد Hostinger

1. **تفعيل SSH على Hostinger:**
   - سجل الدخول إلى لوحة تحكم Hostinger (hPanel)
   - اذهب إلى SSH Access
   - قم بتفعيل SSH إذا لم يكن مفعلاً
   - احصل على:
     - Host (مثلاً: `ssh.hostinger.com`)
     - Port (عادة 21 أو 22)
     - Username
     - Password أو SSH Key

2. **إنشاء SSH Key (اختياري لكن موصى به):**
   ```bash
   ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
   ```
   - أضف المفتاح العام إلى Hostinger في SSH Access
   - احتفظ بالمفتاح الخاص للإضافة إلى GitHub Secrets

3. **إعداد قاعدة البيانات:**
   - أنشئ قاعدة بيانات MySQL جديدة في hPanel
   - احفظ بيانات الاتصال (اسم قاعدة البيانات، المستخدم، كلمة المرور)

4. **رفع المشروع يدوياً لأول مرة:**
   - استخدم File Manager أو FTP لرفع الملفات
   - ارفع محتوى مجلد `public` إلى `public_html`
   - ارفع باقي المجلدات خارج `public_html`
   - أنشئ ملف `.env` باستخدام `.env.example`
   - شغل الأوامر التالية عبر SSH:
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   php artisan key:generate
   php artisan storage:link
   php artisan migrate --force
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

#### الخطوة 2: إعداد GitHub Actions

1. **إضافة Secrets إلى GitHub:**
   - اذهب إلى مستودع GitHub الخاص بك
   - Settings > Secrets and variables > Actions
   - أضف الأسرار التالية:
   
   | Secret Name | Description | Example |
   |-------------|-------------|---------|
   | `SSH_PRIVATE_KEY` | مفتاح SSH الخاص | محتوى ملف `~/.ssh/id_rsa` |
   | `HOSTINGER_HOST` | عنوان Hostinger SSH | `ssh.hostinger.com` |
   | `HOSTINGER_PORT` | منفذ SSH | `22` |
   | `HOSTINGER_USER` | اسم المستخدم في Hostinger | `u123456789` |
   | `HOSTINGER_PATH` | مسار المشروع على الاستضافة | `/home/u123456789/public_html` |

2. **تفعيل GitHub Actions:**
   - المشروع يحتوي بالفعل على ملف `.github/workflows/deploy.yml`
   - هذا الملف سيقوم تلقائياً بالنشر عند كل دفع إلى فرع `main`

#### الخطوة 3: النشر التلقائي

الآن عند أي تغيير تقوم به محلياً:

1. قم بالتغييرات المطلوبة
2. ارسلها إلى GitHub:
   ```bash
   git add .
   git commit -m "وصف التغيير"
   git push origin main
   ```
3. GitHub Actions سيقوم تلقائياً:
   - تثبيت التبعيات
   - بناء الأصول (assets)
   - رفع الملفات إلى Hostinger
   - تشغيل الترحيلات
   - تحديث الـ cache

يمكنك مراقبة عملية النشر في:
- GitHub: Actions tab في المستودع
- Hostinger: سجلات الخادم

#### الخطوة 4: النشر اليدوي (اختياري)

إذا كنت تفضل النشر يدوياً، يمكنك استخدام سكريبت `deploy.sh`:

```bash
# عدل إعدادات الاستضافة في deploy.sh أولاً
chmod +x deploy.sh
./deploy.sh
```

### خيار E: استضافة Laravel متخصصة

- Laravel Vapor (Serverless)
- Laravel Forge (مع أي استضافة)
- Plesk مع Laravel
- cPanel مع Laravel Manager

## 5. ملاحظات مهمة

- تأكد من أن قاعدة البيانات موجودة قبل تشغيل الترحيلات
- في الإنتاج، تأكد من أن `APP_DEBUG=false` في ملف `.env`
- استخدم HTTPS في الإنتاج
- قم بعمل نسخ احتياطية دورية لقاعدة البيانات
- راجع سجلات الأخطاء في `storage/logs/laravel.log`
