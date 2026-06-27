<?php $__env->startSection('page_title', $partner->exists ? 'تعديل شريك' : 'شريك جديد'); ?>
<?php $__env->startSection('content'); ?>
    <form method="post"
        action="<?php echo e($partner->exists ? route('admin.partners.update', $partner) : route('admin.partners.store')); ?>"
        enctype="multipart/form-data" class="card card-custom">
        <?php echo csrf_field(); ?> <?php if($partner->exists): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="card-body">
            <div class="form-group"><label>الاسم</label><input name="name" class="form-control"
                    value="<?php echo e(old('name', $partner->name)); ?>" required dir="rtl"></div>
            <div class="form-group"><label>الوصف (يظهر تحت الاسم)</label><input name="description" class="form-control"
                    value="<?php echo e(old('description', $partner->description)); ?>" dir="rtl"></div>
            <div class="form-group"><label>الشعار</label><input type="file" name="logo"
                    <?php echo e($partner->exists ? '' : 'required'); ?>>
                <?php if($partner->logo): ?>
                    <img src="<?php echo e(media_url($partner->logo)); ?>" height="60" class="d-block mt-2">
                <?php endif; ?>
            </div>
            <div class="form-group"><label>الموقع</label><input name="website_url" class="form-control"
                    value="<?php echo e(old('website_url', $partner->website_url)); ?>" dir="ltr"></div>
            <div class="form-group"><label>الترتيب</label><input type="number" name="sort_order" class="form-control"
                    value="<?php echo e(old('sort_order', $partner->sort_order ?? 0)); ?>"></div>
            <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1"
                    <?php if(old('is_active', $partner->is_active ?? true)): echo 'checked'; endif; ?>><label>نشط</label></div>
            <button class="btn btn-primary">حفظ</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/partners/form.blade.php ENDPATH**/ ?>