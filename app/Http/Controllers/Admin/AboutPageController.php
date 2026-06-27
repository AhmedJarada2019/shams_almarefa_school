<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Support\UploadsFile;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    use UploadsFile;

    public function edit()
    {
        return view('admin.about.edit', ['about' => AboutPage::current()]);
    }

    public function update(Request $request)
    {
        $about = AboutPage::current();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['image'] = $this->storeUpload($request->file('image'), 'about', $about->image);

        $about->update($data);

        return back()->with('success', 'تم تحديث صفحة من نحن بنجاح.');
    }
}
