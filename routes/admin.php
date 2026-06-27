<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogAuthorController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\MediaCategoryController;
use App\Http\Controllers\Admin\MediaItemController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware(['auth', 'active.admin'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero', [HeroController::class, 'update'])->name('hero.update');

    Route::get('about', [AboutPageController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutPageController::class, 'update'])->name('about.update');

    Route::resource('course-categories', CourseCategoryController::class)->except(['show']);
    Route::resource('courses', CourseController::class)->except(['show']);

    Route::resource('blog-categories', BlogCategoryController::class)->except(['show']);
    Route::resource('blog-posts', BlogPostController::class)->except(['show']);
    Route::get('blog-author', [BlogAuthorController::class, 'edit'])->name('blog-author.edit');
    Route::put('blog-author', [BlogAuthorController::class, 'update'])->name('blog-author.update');

    Route::resource('media-categories', MediaCategoryController::class)->except(['show']);
    Route::resource('media-items', MediaItemController::class)->except(['show']);

    Route::resource('partners', PartnerController::class)->except(['show']);

    Route::get('contact-settings', [ContactSettingController::class, 'edit'])->name('contact-settings.edit');
    Route::put('contact-settings', [ContactSettingController::class, 'update'])->name('contact-settings.update');
    Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::delete('contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

    Route::get('settings/{group}', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings/{group}', [SiteSettingController::class, 'update'])->name('settings.update');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('users', UserController::class)->except(['show']);
});
