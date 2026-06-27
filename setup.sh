#!/bin/bash
# School Project Setup Script
# Run this from the project root directory

echo "=== School Laravel Project Setup ==="

# 1. Install PHP dependencies
echo "[1/6] Installing PHP dependencies..."
composer install --no-interaction

# 2. Copy .env if not exists
if [ ! -f .env ]; then
    cp .env.example .env
    echo "[2/6] Created .env from .env.example"
else
    echo "[2/6] .env already exists"
fi

# 3. Generate app key if missing
echo "[3/6] Generating app key..."
php artisan key:generate

# 4. Run migrations
echo "[4/6] Running migrations..."
php artisan migrate --force

# 5. Create storage symlink
echo "[5/6] Creating storage symlink..."
php artisan storage:link

# 6. Clear caches
echo "[6/6] Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo ""
echo "=== Setup complete! ==="
echo ""
echo "Default admin credentials:"
echo "  URL:      http://127.0.0.1:8000/admin"
echo "  Email:    admin@admin.com"
echo "  Password: admin@admin.com"
echo ""
echo "Start the development server:"
echo "  php artisan serve"
