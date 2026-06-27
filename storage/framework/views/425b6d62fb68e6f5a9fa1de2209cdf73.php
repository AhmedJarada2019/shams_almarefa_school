<a href="<?php echo e(route('courses.show', $course)); ?>" class="box-course">
    <div class="img mb-1">
        <img src="<?php echo e(media_url($course->featured_image, 'frontend/imgs/course2.png')); ?>" alt="<?php echo e($course->title); ?>">
    </div>
    <div class="p-10px">
        <div class="info mb-2">
            <h2 class="mb-2"><?php echo e($course->title); ?></h2>
            <?php if($course->duration): ?>
                <span class="text-muted"><?php echo e($course->duration); ?></span>
            <?php endif; ?>
        </div>
        <?php if($course->excerpt): ?>
            <p class="mb-0 small desc-content"><?php echo e(Str::limit(strip_tags($course->excerpt), 80)); ?></p>
        <?php endif; ?>
    </div>
</a>
<?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/partials/course-card.blade.php ENDPATH**/ ?>