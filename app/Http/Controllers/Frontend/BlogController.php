<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Setting;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.pages.blog.index', [
            'posts' => BlogPost::published()->with('category')->latest('published_at')->paginate(9),
            'authorName' => Setting::get('blog', 'author_name'),
        ]);
    }

    public function category(BlogCategory $blogCategory)
    {
        abort_unless($blogCategory->is_active, 404);

        return view('frontend.pages.blog.index', [
            'posts' => BlogPost::published()->where('blog_category_id', $blogCategory->id)->latest('published_at')->paginate(9),
            'currentCategory' => $blogCategory,
            'authorName' => Setting::get('blog', 'author_name'),
        ]);
    }

    public function show(BlogPost $blogPost)
    {
        abort_unless($blogPost->status === 'published', 404);

        $blogPost->increment('views_count');

        return view('frontend.pages.blog.show', [
            'post' => $blogPost->load('category'),
            'author' => [
                'name' => Setting::get('blog', 'author_name'),
                'title' => Setting::get('blog', 'author_title'),
                'bio' => Setting::get('blog', 'author_bio'),
                'image' => Setting::get('blog', 'author_image'),
            ],
        ]);
    }
}
