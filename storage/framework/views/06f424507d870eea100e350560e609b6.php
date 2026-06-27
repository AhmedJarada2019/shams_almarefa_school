<?php $__env->startSection('title', ($course->meta_title ?: $course->title).' — '.$siteName); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 desc-content">
                <h1 class="mb-3 title-section"><?php echo e($course->title); ?></h1>
                <?php if($course->category): ?>
                   <br> <span class="tag mb-3 d-inline-block"><?php echo e($course->category->name); ?></span>
                <?php endif; ?>
                <?php if($course->duration): ?>
                    <p><strong>المدة:</strong> <?php echo e($course->duration); ?></p>
                <?php endif; ?>
                <?php if($course->excerpt): ?>
                    <p class="lead"><?php echo e($course->excerpt); ?></p>
                <?php endif; ?>
                <div class="course-body ">
                   <p> <?php echo $course->description; ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <img src="<?php echo e(media_url($course->featured_image, 'frontend/imgs/course2.png')); ?>" width="100%" class="img-fluid rounded" alt="<?php echo e($course->title); ?>">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/pages/courses/show.blade.php ENDPATH**/ ?>