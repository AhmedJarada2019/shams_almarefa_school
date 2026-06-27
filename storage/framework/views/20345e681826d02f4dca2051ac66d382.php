<?php $__env->startSection('page_title', 'إعدادات اتصل بنا'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('admin.contact-settings.update')); ?>" class="card card-custom">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="card-body">
        <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <label><?php echo e($key); ?></label>
                <?php if($key === 'map_embed'): ?>
                    <textarea name="<?php echo e($key); ?>" class="form-control" rows="4" dir="ltr"><?php echo e(old($key, $value)); ?></textarea>
                <?php else: ?>
                    <input name="<?php echo e($key); ?>" class="form-control" value="<?php echo e(old($key, $value)); ?>" dir="rtl">
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/contact-settings/edit.blade.php ENDPATH**/ ?>