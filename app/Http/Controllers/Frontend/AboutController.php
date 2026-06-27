<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;

class AboutController extends Controller
{
    public function show()
    {
        $about = AboutPage::current();
        // add data to about page
        $about->setAppends(['goals_list', 'vision_list', 'message_list']);
        $about->vision = '1. انشاء جيل واعد ومثقف قادر على مواجهة التحديات<br>
2. خفض مستوى الفاقد التعليمي لدى الطلاب<br>
 3.الارتقاء بمستوى الطلاب علميًا واخلاقيًا<br>
4. ترسيخ المبادأ والقيم الاخلاقية والدينية';
        $about->mission = '1. تقديم تعليم متميز وفق أحدث الأساليب التعليمية.<br>2. تنمية مهارات الإبداع والتفكير النقدي لدى الطلاب.<br>
3. تعزيز القيم الأخلاقية والمسؤولية المجتمعية.<br>4. إعداد جيل قادر على التعلم المستمر ومواكبة المستقبل.';
        $about->goals = '1. تقديم تعليم متميز وفق أحدث الأساليب التعليمية.<br>
2. تنمية مهارات الإبداع والتفكير النقدي لدى الطلاب.<br>
3. تعزيز القيم الأخلاقية والمسؤولية المجتمعية.<br>
4. إعداد جيل قادر على التعلم المستمر        ومواكبة المستقبل.';
        abort_unless($about->is_active, 404);

        return view('frontend.pages.about', compact('about'));
    }
}
