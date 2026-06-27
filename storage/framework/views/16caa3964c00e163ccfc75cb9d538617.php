<?php $__env->startSection('title', (isset($currentCategory) ? $currentCategory->name : 'المقالات').' — '.$siteName); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="title-section mb-4"><?php echo e(isset($currentCategory) ? $currentCategory->name : 'المقالات'); ?></h1>
        <?php if(!empty($authorName)): ?>
            <p class="mb-4 text-muted">بقلم: <?php echo e($authorName); ?></p>
        <?php endif; ?>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo $__env->make('frontend.partials.blog-card', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12"><p class="text-center">لا توجد مقالات.</p></div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-4"><?php echo e($posts->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/pages/blog/index.blade.php ENDPATH**/ ?>