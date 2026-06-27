<div class="col-lg-4 col-md-6 mb-4">
    <div class="box-article">
        <a href="{{ route('blog.show', $post) }}" class="w-100">
            <img src="{{ media_url($post->featured_image, 'frontend/imgs/article.png') }}" alt="{{ $post->title }}">
        </a>
        <div class="p-3">
            @if($post->category)
                <a href="{{ route('blog.category', $post->category) }}" class="tag me-3 d-inline-flex align-items-center">{{ $post->category->name }}</a>
            @endif
            <h3 class="mb-2"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
            @if($post->excerpt)
                <p class="desc-content">{{ Str::limit(strip_tags($post->excerpt), 100) }}</p>
            @endif
            <a href="{{ route('blog.show', $post) }}" class="more">اقرأ المزيد</a>
        </div>
    </div>
</div>
