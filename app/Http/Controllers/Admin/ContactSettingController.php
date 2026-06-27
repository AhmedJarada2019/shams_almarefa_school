<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function edit()
    {
        return view('admin.contact-settings.edit', [
            'contact' => [
                'phone' => Setting::get('contact', 'phone'),
                'email' => Setting::get('contact', 'email'),
                'address' => Setting::get('contact', 'address'),
                'map_embed' => Setting::get('contact', 'map_embed'),
                'working_hours' => Setting::get('contact', 'working_hours'),
            ],
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'phone' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'map_embed' => ['nullable', 'string'],
            'working_hours' => ['nullable', 'string'],
        ]);

        Setting::setMany('contact', $data);

        return back()->with('success', 'تم تحديث إعدادات اتصل بنا.');
    }
}
