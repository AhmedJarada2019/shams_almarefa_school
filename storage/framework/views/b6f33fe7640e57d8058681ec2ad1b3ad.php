<?php $__env->startSection('title', 'الدورات — '.$siteName); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="title-section mb-4">جميع الدورات</h1>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <?php echo $__env->make('frontend.partials.course-card', ['course' => $course], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12"><p class="text-center">لا توجد دورات منشورة حالياً.</p></div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($courses->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/pages/courses/index.blade.php ENDPATH**/ ?>