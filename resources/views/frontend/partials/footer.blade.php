 @php
    $footerAbout = \App\Models\Setting::get(
        'site',
        'footer_text',
        'مدرسة شمس المعرفة تقدم دورات تدريبية مميزة في مختلف المجالات.',
    );
    $facebookUrl = 'https://www.facebook.com/share/r/1PRFLzhbXP/';
    $twitterUrl = '#';
    $instagramUrl = 'https://www.instagram.com/almaarefashams?igsh=dTcwaGw3cDN6c2ty';
    $linkedinUrl = '#';
    $youtubeUrl = 'https://youtube.com/@hams770?si=iTtdQhAzgLxSeVvT';
@endphp
<footer class="container-fluid" style="background: #f3f0fa;">
    <div class="container py-5">
        <div class="row">
            {{-- اللوغو والوصف والأيقونات --}}
            <div class="col-lg-5 col-md-6 mb-4 mb-md-0" dir="rtl">
                <a href="{{ route('home') }}" class="d-flex align-items-center gap-2 text-decoration-none mb-3">
                    <img src="{{ asset('frontend/imgs/ChatGPT Image Jun 5, 2026, 06_40_29 PM.png') }}" width="52"
                        height="52" alt="logo" style="border-radius: 12px;">
                    <span
                        style="font-size: 18px; font-weight: 700; color: #5b21b6; line-height: 1.2;">مدرسة<br>شمس المعرفة</span>
                </a>
                <p class="text-muted" style="font-size: 14px; line-height: 1.7;">
                    {{ $footerAbout }}
                </p>
                <div class="d-flex gap-2 mt-3 flex-wrap">
                    @foreach ([['url' => $youtubeUrl, 'icon' => 'fa-youtube', 'label' => 'YouTube'], ['url' => $linkedinUrl, 'icon' => 'fa-linkedin-in', 'label' => 'LinkedIn'], ['url' => $instagramUrl, 'icon' => 'fa-instagram', 'label' => 'Instagram'], ['url' => $twitterUrl, 'icon' => 'fa-twitter', 'label' => 'Twitter'] ['url' => $facebookUrl, 'icon' => 'fa-facebook-f', 'label' => 'Facebook']] as $s)
                        <a href="{{ $s['url'] }}" target="_blank" aria-label="{{ $s['label'] }}"
                            style="width:42px;height:42px;border-radius:50%;background:#5b21b6;color:#fff;
                              display:flex;align-items:center;justify-content:center;font-size:16px;
                              text-decoration:none;">
                            <i class="fab {{ $s['icon'] }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- روابط الصفحات --}}
            <div class="col-lg-3 col-md-4 offset-lg-1" dir="rtl">
                <ul class="list-unstyled">
                    <li class="mb-3 fw-bold" style="color:#5b21b6; font-size:15px;">الصفحات</li>
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none text-dark"
                            style="font-size:14px;">الرئيسية</a></li>
                    <li class="mb-2"><a href="{{ route('courses.index') }}" class="text-decoration-none text-dark"
                            style="font-size:14px;">جميع الدورات</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-decoration-none text-dark"
                            style="font-size:14px;">من نحن</a></li>
                    <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-decoration-none text-dark"
                            style="font-size:14px;">المقالات</a></li>
                    <li class="mb-2"><a href="{{ route('contact.show') }}" class="text-decoration-none text-dark"
                            style="font-size:14px;">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <ul class="list-unstyled">
                    <li class="mb-3 fw-bold" style="color:#5b21b6; font-size:15px;">احدث الدورات</li>
                    @foreach ($featuredCourses as $course)
                        <li class="mb-2"><a href="{{ route('courses.show', $course) }}"
                                class="text-decoration-none text-dark" style="font-size:14px;">{{$course->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- الجزء السفلي --}}
    <div style="border-top: 1px solid #ddd4f5; background: #f3f0fa;" class="text-center py-3">
        <p class="mb-0 text-muted" style="font-size: 13px;" dir="rtl">
            © 2025 <a href="{{ route('home') }}" class="fw-bold text-decoration-none" style="color:#5b21b6;">أكاديمية
                الكفاءة</a>. جميع الحقوق محفوظة.
        </p>
    </div>
</footer>
