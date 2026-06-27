<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Support\UploadsFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    use UploadsFile;

    public function index()
    {
        return view('admin.courses.index', [
            'courses' => Course::with('category')->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.courses.form', [
            'course' => new Course,
            'categories' => CourseCategory::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['featured_image'] = $this->storeUpload($request->file('featured_image'), 'courses');
        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'تم إنشاء الدورة.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.form', [
            'course' => $course,
            'categories' => CourseCategory::orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $data = $this->validated($request, $course);
        $data['featured_image'] = $this->storeUpload($request->file('featured_image'), 'courses', $course->featured_image);
        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'تم التحديث.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'تم الحذف.');
    }

    private function validated(Request $request, ?Course $course = null): array
    {
        $data = $request->validate([
            'course_category_id' => ['nullable', 'exists:course_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:courses,slug,'.($course?->id ?? 'NULL')],
            'excerpt' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'max:5120'],
            'duration' => ['nullable', 'string', 'max:100'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']) ?: Str::random(8);
        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
