<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('frontend.pages.contact', [
            'contact' => [
                'phone' => Setting::get('contact', 'phone'),
                'email' => Setting::get('contact', 'email'),
                'address' => Setting::get('contact', 'address'),
                'map_embed' => Setting::get('contact', 'map_embed'),
                'working_hours' => Setting::get('contact', 'working_hours'),
            ],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'phone' => 'الهاتف',
            'subject' => 'الموضوع',
            'message' => 'الرسالة',
        ]);

        $data['ip_address'] = $request->ip();
        ContactMessage::create($data);

        return back()->with('success', 'تم إرسال رسالتك بنجاح.');
    }
}
