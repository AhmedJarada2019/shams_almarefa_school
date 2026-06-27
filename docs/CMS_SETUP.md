# Academy CMS — Setup

## Requirements

- PHP 8.1+
- MySQL (utf8mb4)
- Composer

## First-time setup

```bash
cd "C:\Users\Pro Book\Desktop\موقع بلدية جباليا"
composer install
cp .env.example .env   # if needed
php artisan key:generate
```

Configure `.env` database, then:

```bash
composer dump-autoload
php artisan migrate
php artisan db:seed --class=AcademyCmsSeeder
php artisan storage:link
```

## Default admin

| Field | Value |
|-------|--------|
| URL | `/admin/login` |
| Email | `admin@academy.local` |
| Password | `password` |

Change the password after first login.

## Public routes (English URLs)

| Path | Section |
|------|---------|
| `/` | Home (hero, courses, blog, partners carousel) |
| `/about` | About us |
| `/courses` | Courses |
| `/blog` | Blog |
| `/media` | Media library |
| `/contact` | Contact |

## Assets

- **Frontend:** `public/frontend/` (from `jamal-academy-main`)
- **Admin (Metronic):** `public/assets/` (pasted from `jabalia` project)

## Notes

- Laravel **10** (Nova disabled in `config/app.php`).
- All active admins share the same dashboard permissions.
- Partners use the **trainer carousel** UI on the homepage.
