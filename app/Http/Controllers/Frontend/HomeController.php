<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Course;
use App\Models\Hero;
use App\Models\Partner;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::current();

        if (! $hero->is_active) {
            $hero = null;
        }

        return view('frontend.pages.home', [
            'hero' => $hero,
            'featuredCourses' => Course::published()->featured()->ordered()->take(8)->get(),
            'latestPosts' => BlogPost::published()->latest('published_at')->take(3)->get(),
            'partners' => Partner::active()->get(),
            'contact' => [
                'phone' => Setting::get('contact', 'phone'),
                'email' => Setting::get('contact', 'email'),
                'address' => Setting::get('contact', 'address'),
                'map_embed' => Setting::get('contact', 'map_embed'),
                'working_hours' => Setting::get('contact', 'working_hours'),
            ],
        ]);
    }
}
