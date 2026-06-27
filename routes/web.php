<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AppsController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/apps', [AppsController::class, 'show'])->name('apps');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{blogCategory:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{blogPost:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/media', [MediaController::class, 'index'])->name('media.index');
Route::get('/media/category/{mediaCategory:slug}', [MediaController::class, 'category'])->name('media.category');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.store');
