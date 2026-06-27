@if($partners->isNotEmpty())
<div class="trainers swiper-trainers container-fluid py-4 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="title-section mb-2 d-inline-flex mx-auto">شركاؤنا</h2>
                <p>شركاء النجاح في رحلة التعلم</p>
            </div>
        </div>
    </div>
    <div class="container-fluid fluid-traniers">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <div class="relative">
                        <div class="swiper px-1 partners-swiper">
                            <div class="swiper-wrapper">
                                @foreach($partners as $partner)
                                    <div class="swiper-slide">
                                        <a href="{{ $partner->website_url ?: '#' }}" class="box-trainer" @if($partner->website_url) target="_blank" rel="noopener" @endif>
                                            <div class="img">
                                                <img src="{{ media_url($partner->logo, 'frontend/imgs/trainer4.png') }}" width="100" height="100" alt="{{ $partner->name }}">
                                            </div>
                                            <div>
                                                <h4 class="mb-2">{{ $partner->name }}</h4>
                                                @if($partner->description)
                                                    <span>{{ Str::limit(strip_tags($partner->description), 50) }}</span>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined' && document.querySelector('.partners-swiper')) {
        new Swiper('.partners-swiper', { slidesPerView: 1, spaceBetween: 16, breakpoints: { 768: { slidesPerView: 3 }, 1200: { slidesPerView: 4 } } });
    }
});
</script>
@endpush
@endif
