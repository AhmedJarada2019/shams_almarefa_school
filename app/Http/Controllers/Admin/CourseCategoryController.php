<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    public function index()
    {
        return view('admin.course-categories.index', [
            'categories' => CourseCategory::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.course-categories.form', ['category' => new CourseCategory]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        CourseCategory::create($data);

        return redirect()->route('admin.course-categories.index')->with('success', 'تم إنشاء التصنيف.');
    }

    public function edit(CourseCategory $courseCategory)
    {
        return view('admin.course-categories.form', ['category' => $courseCategory]);
    }

    public function update(Request $request, CourseCategory $courseCategory)
    {
        $courseCategory->update($this->validated($request, $courseCategory));

        return redirect()->route('admin.course-categories.index')->with('success', 'تم التحديث.');
    }

    public function destroy(CourseCategory $courseCategory)
    {
        $courseCategory->delete();

        return back()->with('success', 'تم الحذف.');
    }

    private function validated(Request $request, ?CourseCategory $category = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:course_categories,slug,'.($category?->id ?? 'NULL')],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']) ?: Str::random(8);
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
