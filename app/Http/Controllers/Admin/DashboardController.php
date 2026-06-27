<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Course;
use App\Models\MediaItem;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'coursesCount' => Course::count(),
            'postsCount' => BlogPost::count(),
            'mediaCount' => MediaItem::count(),
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
