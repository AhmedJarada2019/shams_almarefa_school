@extends('frontend.layouts.app')

@section('title', $siteName)

@push('styles')
<style>
    /* Loading Screen Styles */
    #loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #6F2DBD 0%, #8BC53F 100%);
        z-index: 99999;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
    }

    #loading-screen.hidden {
        opacity: 0;
        visibility: hidden;
    }

    .loading-content {
        text-align: center;
        padding: 20px;
    }

    .loading-title {
        color: #fff;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 10px;
        font-family: 'Cairo', sans-serif;
    }

    .loading-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 18px;
        margin-bottom: 40px;
        font-family: 'Cairo', sans-serif;
    }

    .qr-container {
        display: flex;
        gap: 40px;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }

    .qr-item {
        background: rgba(255, 255, 255, 0.95);
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        text-align: center;
        min-width: 200px;
    }

    .qr-code {
        width: 180px;
        height: 180px;
        margin: 0 auto 15px;
        border: 3px solid var(--primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
    }

    .qr-code img {
        max-width: 100%;
        max-height: 100%;
    }

    .qr-label {
        color: var(--primary);
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Cairo', sans-serif;
    }

    .donate-btn {
        display: inline-block;
        padding: 12px 30px;
        background: var(--secondary);
        color: #fff;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 16px;
        font-family: 'Cairo', sans-serif;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .donate-btn:hover {
        background: var(--primary);
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(111, 45, 189, 0.4);
    }

    .loading-spinner {
        margin-top: 30px;
        width: 50px;
        height: 50px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid #fff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @media (max-width: 768px) {
        .qr-container {
            gap: 20px;
        }
        .qr-item {
            min-width: 160px;
            padding: 20px;
        }
        .qr-code {
            width: 140px;
            height: 140px;
        }
        .loading-title {
            font-size: 24px;
        }
        .loading-subtitle {
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="loading-content">
            <h1 class="loading-title">مدرسة شمس المعرفة</h1>
            <p class="loading-subtitle">ساهم في بناء مستقبل أطفالنا</p>

            <div class="qr-container">
                <div class="qr-item">
                    <div class="qr-code">
                        <img src="{{ asset('frontend/imgs/binance-qr-placeholder.png') }}" alt="Binance QR Code" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=TKHCtsRSqCnNsZyUMBT3hpYtEM1jbXNLBm'">
                    </div>
                    <div class="qr-label">تبرع عبر Binance</div>
                    <a href="https://www.binance.com/en/donate/crypto/TKHCtsRSqCnNsZyUMBT3hpYtEM1jbXNLBm" target="_blank" class="donate-btn">تبرع الآن</a>
                </div>

                <div class="qr-item">
                    <div class="qr-code">
                        <img src="{{ asset('frontend/imgs/gofundme-qr-placeholder.png') }}" alt="GoFundMe QR Code" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://www.gofundme.com/f/help-provide-a-safe-learning-space-in-gaza'">
                    </div>
                    <div class="qr-label">تبرع عبر GoFundMe</div>
                    <a href="https://www.gofundme.com/f/help-provide-a-safe-learning-space-in-gaza" target="_blank" class="donate-btn">تبرع الآن</a>
                </div>
            </div>

            <div class="loading-spinner"></div>
        </div>
    </div>

    <script>
        // Hide loading screen after 3 seconds
        window.addEventListener('load', function() {
            setTimeout(function() {
                const loadingScreen = document.getElementById('loading-screen');
                if (loadingScreen) {
                    loadingScreen.classList.add('hidden');
                    // Remove from DOM after animation
                    setTimeout(function() {
                        loadingScreen.style.display = 'none';
                    }, 500);
                }
            }, 3000);
        });
    </script>
    @if ($hero)

        <div class="hero-home container-fluid fade-in-up">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="text">
                            <h1 class="mb-2rem">{{ $hero->title }}</h1>
                            @if ($hero->subtitle)
                                <p class="lead">{!! $hero->subtitle !!}</p>
                            @endif
                            @if ($hero->description)
                                <p class="mb-2rem">{!! $hero->description !!}</p>
                            @endif
                            @if ($hero->button_text)
                                <div class="d-inline-flex align-items-center gap-3 flex-wrap mt-3">
                                    <a href="{{ $hero->button_url ?: route('courses.index') }}"
                                        class="btn btn-lg mx-2">{{ $hero->button_text }}</a>
                                    <a href="{{ route('apps') }}" class="btn btn-lg btn-outline"
                                       style="display:inline-flex;align-items:center;gap:8px;">
                                        <i class="fas fa-mobile-alt"></i>
                                        تبرّع الآن
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <img src="{{ media_url($hero->image, 'frontend/imgs/hero_img.png') }}" alt="{{ $hero->title }}">
        </div>
    @endif

    <div class="some-courses container-fluidpy-4 py-lg-5 fade-in-up" style="background: #f8f7ff;">
        <div class="container py-5">
            <div class="row d-flex align-items-center mb-5">
                <div class="col-lg-6">
                    <h2 class="title-section mb-2" style="font-size: 36px;">من نحن</h2>
                    <p style="color: #666; font-size: 18px; font-weight: 500;">برامج تدريبية متطورة لبناء مهاراتك</p>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-6 about-content fade-in-left">
                    <div style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 40px rgba(111, 45, 189, 0.1);">
                        <p style="color: #555; font-size: 16px; line-height: 2; margin-bottom: 25px;">نحن شمس المعرفة نسجنا خيوط ُ امل لمستقبل طلابنا فمحونا جهل كاد ان يتفشى بعقول ابنائنا لنرسخ عقائد
                            ايمانية بعلم وعمل وتربية واخلاق لنتحدى انفسنا بأنفسنا ونرتقى بطلابنا نحو العلا متشبثين باقلامنا
                            وكتبنا لنكون صفوة في العلم والخلق نحن نصنع التميز ولا ننتظره</p>
                        <a href="{{ route('about') }}" class="btn btn-lg btn-outline" style="border-color: var(--primary); color: var(--primary); padding: 12px 35px; font-weight: 700; border-radius: 50px;">عرض المزيد</a>
                    </div>
                </div>
                <div class="col-md-6 fade-in-right">
                    <div style="position: relative;">
                        <img src="{{ media_url($hero->image, 'frontend/imgs/hero_img.png') }}" alt="" width="100%"
                            class="img-fluid" style="border-radius: 20px; box-shadow: 0 15px 50px rgba(111, 45, 189, 0.2);">
                        <div style="position: absolute; bottom: -20px; right: -20px; width: 100px; height: 100px; background: linear-gradient(135deg, var(--primary), var(--secondary)); border-radius: 50%; opacity: 0.3; filter: blur(40px);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="statistics-section container-fluid py-5 scale-in" style="background: linear-gradient(135deg, #6F2DBD 0%, #8BC53F 100%);color: #fff;">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="text-white fw-bold mb-2">إحصائياتنا</h2>
                    <p class="text-white-50">أرقام تعكس نجاحنا وتطورنا</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-card text-center p-4 rounded-4" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-users text-white" style="font-size: 40px;"></i>
                        </div>
                        <div class="stat-number text-white fw-bold" data-target="1500">1500</div>
                        <div class="stat-label text-white-50">طالب مسجل</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card text-center p-4 rounded-4" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-book text-white" style="font-size: 40px;"></i>
                        </div>
                        <div class="stat-number text-white fw-bold" data-target="120">120</div>
                        <div class="stat-label text-white-50">دورة تدريبية</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card text-center p-4 rounded-4" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-chalkboard-teacher text-white" style="font-size: 40px;"></i>
                        </div>
                        <div class="stat-number text-white fw-bold" data-target="45">45</div>
                        <div class="stat-label text-white-50">مدرب محترف</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card text-center p-4 rounded-4" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-award text-white" style="font-size: 40px;"></i>
                        </div>
                        <div class="stat-number text-white fw-bold" data-target="98">98</div>
                        <div class="stat-label text-white-50">نسبة النجاح %</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .stat-number {
            font-size: 48px;
            font-family: 'Cairo', sans-serif;
            font-weight: 800;
        }
        .stat-label {
            font-size: 16px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
        }
        @media (max-width: 768px) {
            .stat-number {
                font-size: 32px;
            }
            .stat-label {
                font-size: 14px;
            }
        }
    </style>

    @if ($featuredCourses->isNotEmpty())

        <!-- Courses Slider -->
        <div class="some-courses container-fluid py-4 py-lg-5" style="background: #fff;">
            <div class="container py-5">

                <!-- Header -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6">
                        <h2 class="title-section mb-2" style="font-size: 36px;">دوراتنا المميزة</h2>
                        <p style="color: #666; font-size: 18px; font-weight: 500;">قم ببناء مهاراتك العمليّة من خلال برامج تدريبيّة متطوّرة</p>
                    </div>

                    <div class="col-lg-6 d-inline-flex justify-content-lg-end mt-4 mt-lg-0">
                        <a href="{{ route('courses.index') }}" class="btn btn-lg btn-outline" style="border-color: var(--primary); color: var(--primary); padding: 12px 35px; font-weight: 700; border-radius: 50px;">
                            عرض الكل
                        </a>
                    </div>
                </div>

                <!-- Slider -->
                <style>
                    /* الحاوية الخارجية المحيطة بكل شيء */
                    .swiper-container-wrapper {
                        position: relative;
                        width: 100%;
                        /* السماح برؤية العناصر التي تخرج قليلاً على الأطراف كالأزرار */
                        overflow: visible !important;
                    }

                    /* حاوية الـ Swiper نفسها نقوم بضمان وجود مساحة كافية داخلها */
                    .swiper-container-wrapper .swiper {
                        overflow: hidden;
                        /* لحماية حركة السلايدر الداخلية */
                        position: relative;
                    }

                    /* أزرار التحكم المخصصة */
                    .custom-swiper-nav {
                        width: 44px !important;
                        height: 44px !important;
                        background-color: #ffffff !important;
                        color: #6f42c1 !important;
                        /* لون الأكاديمية البنفسجي */
                        border-radius: 50% !important;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
                        transition: all 0.3s ease !important;

                        /* حل مشكلة الاختفاء: رفع طبقة السهم ليظهر فوق الكروت */
                        /* z-index: 1000 !important; */

                        /* التموضع الرأسي في منتصف الكروت تماماً */
                        top: 40% !important;
                        margin-top: 0 !important;

                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                    }

                    /* تأثير عند تمرير الماوس */
                    .custom-swiper-nav:hover {
                        background-color: #6f42c1 !important;
                        color: #ffffff !important;
                        transform: scale(1.08);
                    }

                    /* تصغير حجم السهم الداخلي الافتراضي لـ Swiper */
                    .custom-swiper-nav::after {
                        font-size: 16px !important;
                        font-weight: bold !important;
                    }

                    /* تحديد الأماكن بدقة على الأطراف الخارجية */
                    /* ملاحظة: في نظام الـ RTL (العربي) يعكس الـ Swiper اتجاه الأزرار تلقائياً */
                    .swiper-container-wrapper .swiper-button-next {
                        left: -15px !important;
                        /* دفع السهم خارج حدود الكروت جهة اليسار */
                        right: auto !important;
                    }

                    .swiper-container-wrapper .swiper-button-prev {
                        right: -15px !important;
                        /* دفع السهم خارج حدود الكروت جهة اليمين */
                        left: auto !important;
                    }

                    /* في الشاشات الصغيرة جداً، نلغي الأسهم ونعتمد على سحب الإصبع (Touch) منعاً للتداخل */
                    @media (max-width: 767.98px) {
                        .custom-swiper-nav {
                            display: none !important;
                        }

                        .swiper-container-wrapper {
                            padding-left: 0 !important;
                            padding-right: 0 !important;
                        }
                    }
                </style>
                <div class="position-relative swiper-container-wrapper px-md-5 px-4">
                    <div class="swiper coursesSwiper pb-5">
                        <div class="swiper-wrapper">
                            @foreach ($featuredCourses as $course)
                                <div class="swiper-slide h-auto">
                                    <a href="{{ route('courses.show', $course) }}"
                                        class="box-course d-block h-100 bg-white shadow-sm rounded-4 overflow-hidden border-0">
                                        <div class="img mb-1 position-relative">
                                            <img src="{{ media_url($course->featured_image, 'frontend/imgs/course2.png') }}"
                                                alt="{{ $course->title }}" class="w-100 object-fit-cover"
                                                style="height: 200px;">
                                        </div>

                                        <div class="p-3">
                                            <div class="info mb-3">
                                                <h5 class="fw-bold text-dark lh-base mb-0 text-truncate-2">
                                                    {{ $course->title }}
                                                </h5>
                                            </div>

                                            <div class="others d-flex align-items-center gap-2 mb-3">
                                                <span class="badge bg-light text-muted fw-normal px-2 py-1">
                                                    <i class="far fa-clock me-1"></i> {{ $course->duration ?? 0 }} ساعة
                                                </span>
                                                <span class="badge bg-light text-primary fw-semibold px-2 py-1">
                                                    {{ $course->category->name ?? 'بدون تصنيف' }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
{{--
                                    <div class="px-3 pb-3">
                                        <a href="{{ route('courses.index', $course->id) }}"
                                            class="btn btn-success w-100 py-2 fw-semibold rounded-3">
                                            التحق الآن
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="swiper-button-prev custom-swiper-nav z-0">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="swiper-button-next custom-swiper-nav z-0">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif

    @if ($latestPosts->isNotEmpty())
        <div class="container-fluid py-4 py-lg-5" style="background: #f8f7ff;">
            <div class="container py-5">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <h2 class="title-section mb-2" style="font-size: 36px;">أحدث المقالات</h2>
                        <p style="color: #666; font-size: 18px; font-weight: 500;">تابع أحدث الأخبار والمقالات التعليمية</p>
                    </div>
                    <div class="col-lg-6 text-lg-end d-flex justify-content-end" style="padding: 30px 30px">
                        <a href="{{ route('blog.index') }}" class="btn btn-lg btn-outline" style="border-color: var(--primary); color: var(--primary); padding: 12px 35px; font-weight: 700; border-radius: 50px;">جميع المقالات</a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($latestPosts as $post)
                        @include('frontend.partials.blog-card', ['post' => $post])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <script>
        const swiper = new Swiper('.coursesSwiper', {
            rtl: true, // تفعيل محاذاة اليمين لليسار
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,

            // ربط الأزرار بدقة
            navigation: {
                nextEl: '.swiper-container-wrapper .swiper-button-next',
                prevEl: '.swiper-container-wrapper .swiper-button-prev',
            },

            // التجاوب مع الشاشات
            breakpoints: {
                576: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                }
            }
        });

        // Statistics Counter Animation
        const statsSection = document.querySelector('.statistics-section');
        const statNumbers = document.querySelectorAll('.stat-number');
        let hasAnimated = false;

        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);

            function updateCounter() {
                start += increment;
                if (start < target) {
                    element.textContent = Math.floor(start).toLocaleString('ar-EG');
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target.toLocaleString('ar-EG');
                }
            }

            updateCounter();
        }

        function checkStatsSection() {
            if (!statsSection || hasAnimated) return;

            const rect = statsSection.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

            if (isVisible) {
                hasAnimated = true;
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-target'));
                    animateCounter(stat, target);
                });
            }
        }

        window.addEventListener('scroll', checkStatsSection);
        window.addEventListener('load', checkStatsSection);
    </script>
    @include('frontend.partials.partners-carousel', ['partners' => $partners])
    @include('frontend.partials.contact-part', ['contact' => $contact])
@endsection
