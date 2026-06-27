<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blog-categories.index', [
            'categories' => BlogCategory::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('admin.blog-categories.form', ['category' => new BlogCategory]);
    }

    public function store(Request $request)
    {
        BlogCategory::create($this->validated($request));

        return redirect()->route('admin.blog-categories.index')->with('success', 'تم الإنشاء.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.form', ['category' => $blogCategory]);
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $blogCategory->update($this->validated($request, $blogCategory));

        return redirect()->route('admin.blog-categories.index')->with('success', 'تم التحديث.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return back()->with('success', 'تم الحذف.');
    }

    private function validated(Request $request, ?BlogCategory $category = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_categories,slug,'.($category?->id ?? 'NULL')],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']) ?: Str::random(8);
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
