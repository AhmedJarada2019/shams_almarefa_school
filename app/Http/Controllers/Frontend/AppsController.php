<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class AppsController extends Controller
{
    public function show()
    {
        return view('frontend.pages.apps', [
            'androidUrl' => Setting::get('apps', 'android_url', '#'),
            'iosUrl'     => Setting::get('apps', 'ios_url',     '#'),
            'androidQr'  => Setting::get('apps', 'android_qr',  null),
            'iosQr'      => Setting::get('apps', 'ios_qr',      null),
        ]);
    }
}
