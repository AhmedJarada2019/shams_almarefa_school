<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    public function index()
    {
        return view('frontend.pages.courses.index', [
            'courses' => Course::published()->with('category')->ordered()->paginate(12),
            'categories' => CourseCategory::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function show(Course $course)
    {
        abort_unless($course->status === 'published', 404);

        return view('frontend.pages.courses.show', compact('course'));
    }
}
