<?php

namespace App\Providers;

use App\Models\ContactMessage;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        app()->setLocale('ar');

        View::composer('admin.*', function ($view) {
            try {
                $view->with('unreadMessagesCount', ContactMessage::where('is_read', false)->count());
            } catch (\Exception $e) {
                $view->with('unreadMessagesCount', 0);
            }
        });

        View::composer('frontend.*', function ($view) {
            try {
                $view->with('siteName', Setting::get('site', 'name', 'مدرسة شمس المعرفة'));
            } catch (\Exception $e) {
                $view->with('siteName', 'مدرسة شمس المعرفة');
            }
        });
            $featuredCourses = Course::published()->featured()->ordered()->take(4)->get();
            View::share('featuredCourses', $featuredCourses);

    }
}
