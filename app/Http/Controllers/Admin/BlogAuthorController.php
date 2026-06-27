<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\UploadsFile;
use Illuminate\Http\Request;

class BlogAuthorController extends Controller
{
    use UploadsFile;

    public function edit()
    {
        return view('admin.blog-author.edit', [
            'author' => [
                'name' => Setting::get('blog', 'author_name'),
                'title' => Setting::get('blog', 'author_title'),
                'bio' => Setting::get('blog', 'author_bio'),
                'image' => Setting::get('blog', 'author_image'),
            ],
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'author_name' => ['required', 'string', 'max:255'],
            'author_title' => ['nullable', 'string', 'max:255'],
            'author_bio' => ['nullable', 'string'],
            'author_image' => ['nullable', 'image', 'max:5120'],
        ]);

        $image = $this->storeUpload(
            $request->file('author_image'),
            'blog',
            Setting::get('blog', 'author_image')
        );

        Setting::setMany('blog', [
            'author_name' => $data['author_name'],
            'author_title' => $data['author_title'] ?? '',
            'author_bio' => $data['author_bio'] ?? '',
            'author_image' => $image ?? Setting::get('blog', 'author_image'),
        ]);

        return back()->with('success', 'تم تحديث بيانات الكاتب.');
    }
}
