@extends('frontend.layouts.app')

@section('title', 'الدورات — '.$siteName)

@push('styles')
<style>
    .courses-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .courses-hero::before {
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
    
    .courses-hero::after {
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
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <div class="courses-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="color: #fff; font-size: 48px; font-weight: 800; margin-bottom: 15px;">جميع الدورات</h1>
                    <p style="color: rgba(255, 255, 255, 0.9); font-size: 20px; font-weight: 500;">استكشف دوراتنا التدريبية المتنوعة</p>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid py-5" style="background: #f8f7ff;">
    <div class="container py-5">
        <div class="row">
            @forelse($courses as $course)
                <div class="col-lg-3 col-md-6 mb-4 fade-in-up">
                    @include('frontend.partials.course-card', ['course' => $course])
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-book-open" style="font-size: 64px; color: var(--primary); opacity: 0.3;"></i>
                        <p class="text-muted mt-3" style="font-size: 18px;">لا توجد دورات منشورة حالياً.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection
