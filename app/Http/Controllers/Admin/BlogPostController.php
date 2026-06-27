<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Support\UploadsFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    use UploadsFile;

    public function index()
    {
        return view('admin.blog-posts.index', [
            'posts' => BlogPost::with('category')->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.blog-posts.form', [
            'post' => new BlogPost,
            'categories' => BlogCategory::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['featured_image'] = $this->storeUpload($request->file('featured_image'), 'blog');
        $data['user_id'] = auth()->id();
        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('success', 'تم إنشاء المقال.');
    }

    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog-posts.form', [
            'post' => $blogPost,
            'categories' => BlogCategory::orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $data = $this->validated($request, $blogPost);
        $data['featured_image'] = $this->storeUpload($request->file('featured_image'), 'blog', $blogPost->featured_image);
        $blogPost->update($data);

        return redirect()->route('admin.blog-posts.index')->with('success', 'تم التحديث.');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return back()->with('success', 'تم الحذف.');
    }

    private function validated(Request $request, ?BlogPost $post = null): array
    {
        $data = $request->validate([
            'blog_category_id' => ['nullable', 'exists:blog_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug,'.($post?->id ?? 'NULL')],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'max:5120'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
        ]);
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']) ?: Str::random(8);

        return $data;
    }
}
