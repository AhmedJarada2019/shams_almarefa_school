@extends('frontend.layouts.app')

@section('title', (isset($currentCategory) ? $currentCategory->name : 'مكتبة الوسائط').' — '.$siteName)

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="title-section mb-4">{{ isset($currentCategory) ? $currentCategory->name : 'مكتبة الوسائط' }}</h1>
        @if($categories->isNotEmpty())
            <div class="mb-4 d-flex flex-wrap gap-2">
                <a href="{{ route('media.index') }}" class="btn btn-sm {{ empty($currentCategory) ? 'btn-dark' : 'btn-outline' }}">الكل</a>
                @foreach($categories as $cat)
                    <a href="{{ route('media.category', $cat) }}" class="btn btn-sm {{ isset($currentCategory) && $currentCategory->id === $cat->id ? 'btn-dark' : 'btn-outline' }}">{{ $cat->name }}</a>
                @endforeach
            </div>
        @endif
        <div class="row g-4">
            @forelse($items as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="border rounded overflow-hidden h-100">
                        @if($item->type === 'video' && $item->external_url)
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ $item->external_url }}" title="{{ $item->title }}" allowfullscreen></iframe>
                            </div>
                        @else
                            <img src="{{ media_url($item->thumbnail_path ?: $item->file_path, 'frontend/imgs/article.png') }}" class="media-item-image" alt="{{ $item->alt_text ?: $item->title }}">
                        @endif
                        <div class="p-3">
                            <h5 class="mb-1">{{ $item->title }}</h5>
                            @if($item->description)<p class="small mb-0">{!! Str::limit($item->description, 100) !!}</p>@endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><p class="text-center">لا توجد وسائط.</p></div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">{{ $items->links() }}</div>
    </div>
</div>
@endsection
