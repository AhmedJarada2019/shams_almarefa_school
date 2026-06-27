<?php $__env->startSection('title', ($course->meta_title ?: $course->title).' — '.$siteName); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .course-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
    }
    
    .course-hero::before {
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
    
    .course-hero::after {
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
    
    .course-image-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 50px rgba(111, 45, 189, 0.2);
    }
    
    .course-image-wrapper img {
        transition: transform 0.3s ease;
    }
    
    .course-image-wrapper:hover img {
        transform: scale(1.05);
    }
    
    .course-info-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .course-content-card {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(111, 45, 189, 0.1);
    }
    
    .course-body {
        color: #555;
        font-size: 16px;
        line-height: 2;
    }
    
    .course-body p {
        margin-bottom: 20px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="course-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="color: #fff; font-size: 42px; font-weight: 800; margin-bottom: 15px;"><?php echo e($course->title); ?></h1>
                    <?php if($course->category): ?>
                        <div class="course-info-badge">
                            <i class="fas fa-folder"></i>
                            <?php echo e($course->category->name); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid py-5" style="background: #f8f7ff;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-content-card fade-in-left">
                    <?php if($course->duration): ?>
                        <div class="course-info-badge mb-4">
                            <i class="fas fa-clock"></i>
                            المدة: <?php echo e($course->duration); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($course->excerpt): ?>
                        <p class="lead" style="color: var(--primary); font-size: 20px; font-weight: 600; margin-bottom: 30px;"><?php echo e($course->excerpt); ?></p>
                    <?php endif; ?>
                    <div class="course-body">
                       <?php echo $course->description; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="course-image-wrapper fade-in-right">
                    <img src="<?php echo e(media_url($course->featured_image, 'frontend/imgs/course2.png')); ?>" width="100%" class="img-fluid" alt="<?php echo e($course->title); ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/pages/courses/show.blade.php ENDPATH**/ ?>