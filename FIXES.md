# Bug Fixes Applied

## Problems Found & Fixed

### 1. `GeneralController.php` — Missing Model Imports
**Problem:** The controller imported 4 models that don't exist in the project:
- `App\Models\Category`
- `App\Models\Contact`
- `App\Models\MainPage`
- `App\Models\Product`

These were leftover from an older version of the project and caused a fatal error on any request.

**Fix:** Removed the unused imports. The controller only uses `Article`, `JabMember`, `Offer`, and `Sitting` — all of which exist.

---

### 2. `add_admin_user` Migration — Column Dependency Bug
**Problem:** The migration at `2023_06_21_071323_add_admin_user.php` used the `User` Eloquent model with `firstOrCreate()`. The `is_active` column didn't exist yet at that point in the migration order, which caused a **"column not found"** error when running `php artisan migrate` fresh.

**Fix:** Changed it to use raw `DB::table()` instead of the Eloquent model, which avoids the model's `$casts` and `$fillable` triggering column checks.

---

### 3. `add_is_active_to_users_table` Migration — Admin Account Left Inactive
**Problem:** The migration added the `is_active` column with `default(true)` but existing rows (like the admin user already inserted) were not updated. MySQL sometimes does not backfill existing rows with the default value reliably across different versions.

**Fix:** Added `DB::table('users')->update(['is_active' => true])` after the schema change to ensure all existing users, including the admin, are activated.

---

### 4. `AppServiceProvider.php` — Crash Before Tables Exist
**Problem:** The `View::composer` callbacks called `ContactMessage::where(...)->count()` and `Setting::get(...)` on every request — including during `php artisan migrate` when those tables may not yet exist. This caused a fatal DB error on first setup.

**Fix:** Wrapped both calls in `try/catch` blocks so they fail gracefully and return `0` / the default site name if the tables aren't available yet.

---

## How to Run the Project

### Requirements
- PHP 8.1+
- MySQL 5.7+ / MariaDB 10.3+
- Composer
- Node.js (for assets, optional)

### Setup Steps

```bash
# 1. Install dependencies
composer install

# 2. Set up environment
cp .env .env.backup   # already has a key set
# Edit .env: set DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 3. Run migrations
php artisan migrate

# 4. Create storage symlink (for uploaded images)
php artisan storage:link

# 5. Clear caches
php artisan config:clear && php artisan cache:clear

# 6. Start the server
php artisan serve
```

Or simply run: `bash setup.sh`

### Default Admin Login
- **URL:** `http://127.0.0.1:8000/admin`
- **Email:** `admin@admin.com`
- **Password:** `admin@admin.com`

### Database Configuration
Edit `.env` and update:
```
DB_DATABASE=school
DB_USERNAME=root
DB_PASSWORD=your_password
```
Make sure the database `school` exists in MySQL before running migrations.
