<?php $__env->startSection('title', $about->meta_title ?: $about->title . ' — ' . $siteName); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid py-5">
        <div class="container py-4">

            <div class="row align-items-center g-4">
                <div class="col-lg-6">

                    <h2 class="title-section mb-4">أهدافنا</h2>

                    <div class="about-content">
                        <?php echo $about->mission; ?>

                    </div>

                </div>
                <div class="col-lg-6">
                    <?php if($about->mission_image): ?>
                        <img src="<?php echo e(media_url($about->mission_image, 'frontend/imgs/hero_img.png')); ?>"
                            class="img-fluid rounded" alt="<?php echo e($about->title); ?>" width="100%">
                    <?php else: ?>
                        <img src="<?php echo e(media_url($about->mission_image, 'frontend/imgs/hero_img.png')); ?>"
                            class="img-fluid rounded" alt="<?php echo e($about->title); ?>" width="100%">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">

                <h2 class="title-section mb-4">رؤيتنا</h2>

                <div class="about-content">
                    <?php echo $about->vision; ?>

                </div>

            </div>
            <div class="col-lg-6">
                <?php if($about->vision_image): ?>
                    <img src="<?php echo e(media_url($about->vision_image, 'frontend/imgs/hero_img.png')); ?>" class="img-fluid rounded"
                        alt="<?php echo e($about->title); ?>" width="100%">
                <?php else: ?>
                    <img src="<?php echo e(media_url($about->vision_image, 'frontend/imgs/hero_img.png')); ?>" class="img-fluid rounded"
                        alt="<?php echo e($about->title); ?>" width="100%">
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/pages/about.blade.php ENDPATH**/ ?>