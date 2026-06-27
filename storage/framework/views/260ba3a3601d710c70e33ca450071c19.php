<?php $__env->startSection('title', (isset($currentCategory) ? $currentCategory->name : 'مكتبة الوسائط').' — '.$siteName); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-5">
    <div class="container">
        <h1 class="title-section mb-4"><?php echo e(isset($currentCategory) ? $currentCategory->name : 'مكتبة الوسائط'); ?></h1>
        <?php if($categories->isNotEmpty()): ?>
            <div class="mb-4 d-flex flex-wrap gap-2">
                <a href="<?php echo e(route('media.index')); ?>" class="btn btn-sm <?php echo e(empty($currentCategory) ? 'btn-dark' : 'btn-outline'); ?>">الكل</a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('media.category', $cat)); ?>" class="btn btn-sm <?php echo e(isset($currentCategory) && $currentCategory->id === $cat->id ? 'btn-dark' : 'btn-outline'); ?>"><?php echo e($cat->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="border rounded overflow-hidden h-100">
                        <?php if($item->type === 'video' && $item->external_url): ?>
                            <div class="ratio ratio-16x9">
                                <iframe src="<?php echo e($item->external_url); ?>" title="<?php echo e($item->title); ?>" allowfullscreen></iframe>
                            </div>
                        <?php else: ?>
                            <img src="<?php echo e(media_url($item->thumbnail_path ?: $item->file_path, 'frontend/imgs/article.png')); ?>" class="media-item-image" alt="<?php echo e($item->alt_text ?: $item->title); ?>">
                        <?php endif; ?>
                        <div class="p-3">
                            <h5 class="mb-1"><?php echo e($item->title); ?></h5>
                            <?php if($item->description): ?><p class="small mb-0"><?php echo Str::limit($item->description, 100); ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12"><p class="text-center">لا توجد وسائط.</p></div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center mt-4"><?php echo e($items->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/pages/media/index.blade.php ENDPATH**/ ?>