<div class="col-lg-4 col-md-6 mb-4">
    <div class="box-article">
        <a href="<?php echo e(route('blog.show', $post)); ?>" class="w-100">
            <img src="<?php echo e(media_url($post->featured_image, 'frontend/imgs/article.png')); ?>" alt="<?php echo e($post->title); ?>">
        </a>
        <div class="p-3">
            <?php if($post->category): ?>
                <a href="<?php echo e(route('blog.category', $post->category)); ?>" class="tag me-3 d-inline-flex align-items-center"><?php echo e($post->category->name); ?></a>
            <?php endif; ?>
            <h3 class="mb-2"><a href="<?php echo e(route('blog.show', $post)); ?>"><?php echo e($post->title); ?></a></h3>
            <?php if($post->excerpt): ?>
                <p class="desc-content"><?php echo e(Str::limit(strip_tags($post->excerpt), 100)); ?></p>
            <?php endif; ?>
            <a href="<?php echo e(route('blog.show', $post)); ?>" class="more">اقرأ المزيد</a>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/partials/blog-card.blade.php ENDPATH**/ ?>