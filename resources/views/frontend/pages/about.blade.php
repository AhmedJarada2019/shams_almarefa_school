@extends('frontend.layouts.app')

@section('title', $about->meta_title ?: $about->title . ' — ' . $siteName)

@push('styles')
<style>
    .about-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        filter: blur(60px);
    }

    .about-hero::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        filter: blur(80px);
    }

    .about-content-card {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(111, 45, 189, 0.1);
        height: 100%;
    }

    .about-image-wrapper {
        position: relative;
    }

    .about-image-wrapper img {
        border-radius: 20px;
        box-shadow: 0 15px 50px rgba(111, 45, 189, 0.2);
    }

    .about-image-wrapper::before {
        content: '';
        position: absolute;
        bottom: -20px;
        right: -20px;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 50%;
        opacity: 0.3;
        filter: blur(40px);
    }
</style>
@endpush

@section('content')

    <!-- Hero Section -->
    <div class="about-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="color: #fff; font-size: 48px; font-weight: 800; margin-bottom: 15px;">من نحن</h1>
                    <p style="color: rgba(255, 255, 255, 0.9); font-size: 20px; font-weight: 500;">تعرف على رؤيتنا وأهدافنا في مدرسة شمس المعرفة</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="container-fluid py-5" style="background: #f8f7ff;">
        <div class="container py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="about-content-card fade-in-left">
                        <h2 class="title-section mb-4" style="font-size: 36px;">أهدافنا</h2>
                        <div class="about-content" style="color: #555; font-size: 16px; line-height: 2;">
                            {!! $about->mission !!}
                            {{-- تقديم تعليم متميز وفق أحدث الأساليب التعليمية.
تنمية مهارات الإبداع والتفكير النقدي لدى الطلاب.
تعزيز القيم الأخلاقية والمسؤولية المجتمعية.
إعداد جيل قادر على التعلم المستمر ومواكبة المستقبل. --}}



                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image-wrapper fade-in-right">
                        @if ($about->mission_image)
                            <img src="{{ media_url($about->mission_image, 'frontend/imgs/hero_img.png') }}"
                                alt="{{ $about->title }}" width="100%">
                        @else
                            <img src="{{ media_url($about->mission_image, 'frontend/imgs/hero_img.png') }}"
                                alt="{{ $about->title }}" width="100%">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="container-fluid py-5" style="background: #fff;">
        <div class="container py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 order-lg-2">
                    <div class="about-content-card fade-in-right">
                        <h2 class="title-section mb-4" style="font-size: 36px;">رؤيتنا</h2>
                        <div class="about-content" style="color: #555; font-size: 16px; line-height: 2;">
                            {!! $about->vision !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="about-image-wrapper fade-in-left">
                        @if ($about->vision_image)
                            <img src="{{ media_url($about->vision_image, 'frontend/imgs/hero_img.png') }}"
                                alt="{{ $about->title }}" width="100%">
                        @else
                            <img src="{{ media_url($about->vision_image, 'frontend/imgs/hero_img.png') }}"
                                alt="{{ $about->title }}" width="100%">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
