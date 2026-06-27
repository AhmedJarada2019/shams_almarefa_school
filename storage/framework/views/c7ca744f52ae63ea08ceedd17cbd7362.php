<?php $__env->startSection('title', ($post->meta_title ?: $post->title).' — '.$siteName); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-3 title-section"><?php echo e($post->title); ?></h1><br>
                <?php if($post->category): ?>
                    <a href="<?php echo e(route('blog.category', $post->category)); ?>" class="tag mb-3 d-inline-block"><?php echo e($post->category->name); ?></a>
                <?php endif; ?>
                <br>
                <img src="<?php echo e(media_url($post->featured_image, 'frontend/imgs/article.png')); ?>" class="img-fluid rounded mb-4 w-100" alt="<?php echo e($post->title); ?>">
                <div class="article-body"><?php echo $post->content; ?></div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 border rounded">
                    <img src="<?php echo e(media_url($author['image'] ?? null, 'frontend/imgs/trainer2.png')); ?>" width="68" height="68" class="rounded-circle mb-3" alt="<?php echo e($author['name']); ?>">
                    <h4><?php echo e($author['name']); ?></h4>
                    <?php if($author['title']): ?><p class="text-muted"><?php echo e($author['title']); ?></p><?php endif; ?>
                    <?php if($author['bio']): ?><p><?php echo e($author['bio']); ?></p><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/pages/blog/show.blade.php ENDPATH**/ ?>