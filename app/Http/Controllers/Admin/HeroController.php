<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Support\UploadsFile;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use UploadsFile;

    public function edit()
    {
        return view('admin.hero.edit', ['hero' => Hero::current()]);
    }

    public function update(Request $request)
    {
        $hero = Hero::current();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_url' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['image'] = $this->storeUpload($request->file('image'), 'heroes', $hero->image);

        $hero->update($data);

        return back()->with('success', 'تم تحديث قسم البطل بنجاح.');
    }
}
