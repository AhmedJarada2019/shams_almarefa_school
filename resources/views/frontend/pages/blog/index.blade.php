@extends('frontend.layouts.app')

@section('title', (isset($currentCategory) ? $currentCategory->name : 'المقالات').' — '.$siteName)

@push('styles')
<style>
    .blog-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .blog-hero::before {
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
    
    .blog-hero::after {
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
    <div class="blog-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="color: #fff; font-size: 48px; font-weight: 800; margin-bottom: 15px;">{{ isset($currentCategory) ? $currentCategory->name : 'المقالات' }}</h1>
                    @if(!empty($authorName))
                        <p style="color: rgba(255, 255, 255, 0.9); font-size: 20px; font-weight: 500;">بقلم: {{ $authorName }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid py-5" style="background: #f8f7ff;">
    <div class="container py-5">
        <div class="row">
            @forelse($posts as $post)
                @include('frontend.partials.blog-card', ['post' => $post])
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-newspaper" style="font-size: 64px; color: var(--primary); opacity: 0.3;"></i>
                        <p class="text-muted mt-3" style="font-size: 18px;">لا توجد مقالات.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">{{ $posts->links() }}</div>
    </div>
</div>
@endsection
