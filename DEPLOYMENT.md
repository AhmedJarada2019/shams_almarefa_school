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

### خيار D: استضافة Laravel متخصصة

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
