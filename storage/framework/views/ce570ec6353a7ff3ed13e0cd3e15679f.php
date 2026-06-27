<?php if($partners->isNotEmpty()): ?>
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
                                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo e($partner->website_url ?: '#'); ?>" class="box-trainer" <?php if($partner->website_url): ?> target="_blank" rel="noopener" <?php endif; ?>>
                                            <div class="img">
                                                <img src="<?php echo e(media_url($partner->logo, 'frontend/imgs/trainer4.png')); ?>" width="100" height="100" alt="<?php echo e($partner->name); ?>">
                                            </div>
                                            <div>
                                                <h4 class="mb-2"><?php echo e($partner->name); ?></h4>
                                                <?php if($partner->description): ?>
                                                    <span><?php echo e(Str::limit(strip_tags($partner->description), 50)); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined' && document.querySelector('.partners-swiper')) {
        new Swiper('.partners-swiper', { slidesPerView: 1, spaceBetween: 16, breakpoints: { 768: { slidesPerView: 3 }, 1200: { slidesPerView: 4 } } });
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/partials/partners-carousel.blade.php ENDPATH**/ ?>