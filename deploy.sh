#!/bin/bash

# سكريبت نشر يدوي على Hostinger
# استخدم هذا السكريبت للنشر يدوياً إذا لم تكن تستخدم GitHub Actions

# إعدادات الاستضافة
HOSTINGER_HOST="your-hostinger-host.com"
HOSTINGER_PORT="21"  # أو 22 إذا كان SSH
HOSTINGER_USER="your-username"
HOSTINGER_PATH="/public_html"

# مسار المشروع المحلي
LOCAL_PATH="$(pwd)"

echo "جاري النشر على Hostinger..."

# تثبيت التبعيات
echo "تثبيت التبعيات..."
composer install --no-dev --optimize-autoloader
npm ci
npm run build

# النشر باستخدام rsync (يتطلب SSH)
if command -v rsync &> /dev/null; then
    echo "النشر باستخدام rsync..."
    rsync -avz --delete \
        --exclude='.git' \
        --exclude='node_modules' \
        --exclude='.env' \
        --exclude='storage' \
        --exclude='.github' \
        --exclude='.gitignore' \
        --exclude='DEPLOYMENT.md' \
        -e "ssh -p $HOSTINGER_PORT" \
        $LOCAL_PATH/ $HOSTINGER_USER@$HOSTINGER_HOST:$HOSTINGER_PATH
else
    echo "rsync غير متوفر. يرجى استخدام FTP."
    echo "يمكنك استخدام FileZilla أو أداة FTP أخرى."
fi

echo "تم النشر بنجاح!"
