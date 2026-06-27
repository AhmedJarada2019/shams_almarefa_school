<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    private array $groups = [
        'site' => ['name', 'tagline', 'footer_text'],
        'seo' => ['meta_title', 'meta_description'],
        'social' => ['facebook', 'twitter', 'instagram', 'youtube', 'whatsapp'],
    ];

    public function edit(string $group)
    {
        abort_unless(isset($this->groups[$group]), 404);

        $values = [];
        foreach ($this->groups[$group] as $key) {
            $values[$key] = Setting::get($group, $key);
        }

        return view('admin.settings.edit', compact('group', 'values'));
    }

    public function update(Request $request, string $group)
    {
        abort_unless(isset($this->groups[$group]), 404);

        $rules = [];
        foreach ($this->groups[$group] as $key) {
            $rules[$key] = ['nullable', 'string'];
        }

        Setting::setMany($group, $request->validate($rules));

        return back()->with('success', 'تم حفظ الإعدادات.');
    }
}
