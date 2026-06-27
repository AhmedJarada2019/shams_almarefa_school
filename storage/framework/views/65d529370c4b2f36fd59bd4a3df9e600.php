<?php $__env->startSection('title', ($post->meta_title ?: $post->title).' — '.$siteName); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .blog-post-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
    }

    .blog-post-hero::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        filter: blur(60px);
    }

    .blog-post-hero::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        filter: blur(80px);
    }

    .blog-post-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 50px rgba(111, 45, 189, 0.2);
        margin-bottom: 30px;
    }

    .blog-post-image img {
        transition: transform 0.3s ease;
    }

    .blog-post-image:hover img {
        transform: scale(1.05);
    }

    .blog-category-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .blog-category-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(111, 45, 189, 0.4);
    }

    .article-body {
        color: #555;
        font-size: 16px;
        line-height: 2;
    }

    .article-body p {
        margin-bottom: 20px;
    }

    .article-body h2,
    .article-body h3 {
        color: var(--primary);
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .author-card {
        background: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(111, 45, 189, 0.1);
        text-align: center;
    }

    .author-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
        border: 4px solid var(--primary);
        box-shadow: 0 5px 20px rgba(111, 45, 189, 0.3);
    }

    .author-card h4 {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 10px;
    }

    .author-card .author-title {
        color: var(--secondary);
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .author-card .author-bio {
        color: #666;
        font-size: 14px;
        line-height: 1.8;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="blog-post-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="color: #fff; font-size: 42px; font-weight: 800; margin-bottom: 15px;"><?php echo e($post->title); ?></h1>
                    <?php if($post->category): ?>
                        <a href="<?php echo e(route('blog.category', $post->category)); ?>" class="blog-category-badge">
                            <i class="fas fa-folder"></i>
                            <?php echo e($post->category->name); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid py-5" style="background: #f8f7ff;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="fade-in-left">
                    <div class="blog-post-image">
                        <img src="<?php echo e(media_url($post->featured_image, 'frontend/imgs/article.png')); ?>" class="img-fluid w-100" alt="<?php echo e($post->title); ?>">
                    </div>
                    <div class="article-body"><?php echo $post->content; ?></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="author-card fade-in-right">
                    <img src="<?php echo e(media_url($author['image'] ?? null, 'frontend/imgs/trainer2.png')); ?>" class="author-avatar" alt="<?php echo e($author['name']); ?>">
                    <h4><?php echo e($author['name']); ?></h4>
                    <?php if($author['title']): ?><p class="author-title"><?php echo e($author['title']); ?></p><?php endif; ?>
                    <?php if($author['bio']): ?><p class="author-bio"><?php echo $author['bio']; ?></p><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/pages/blog/show.blade.php ENDPATH**/ ?>