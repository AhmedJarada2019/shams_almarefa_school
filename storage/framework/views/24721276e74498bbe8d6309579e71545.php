<?php $__env->startSection('page_title', 'إعدادات '.$group); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('admin.settings.update', $group)); ?>" class="card card-custom">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="card-body">
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <label><?php echo e($key); ?></label>
                <input name="<?php echo e($key); ?>" class="form-control" value="<?php echo e(old($key, $value)); ?>" dir="rtl">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>