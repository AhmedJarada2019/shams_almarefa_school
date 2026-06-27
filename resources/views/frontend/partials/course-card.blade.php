<a href="{{ route('courses.show', $course) }}" class="box-course">
    <div class="img mb-1">
        <img src="{{ media_url($course->featured_image, 'frontend/imgs/course2.png') }}" alt="{{ $course->title }}">
    </div>
    <div class="p-10px">
        <div class="info mb-2">
            <h2 class="mb-2">{{ $course->title }}</h2>
            @if($course->duration)
                <span class="text-muted">{{ $course->duration }}</span>
            @endif
        </div>
        @if($course->excerpt)
            <p class="mb-0 small desc-content">{{ Str::limit(strip_tags($course->excerpt), 80) }}</p>
        @endif
    </div>
</a>
