<?php $__env->startSection('page_title', $category->exists ? 'تعديل' : 'جديد'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e($category->exists ? route('admin.media-categories.update', $category) : route('admin.media-categories.store')); ?>" class="card card-custom">
    <?php echo csrf_field(); ?> <?php if($category->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
    <div class="card-body">
        <div class="form-group"><label>الاسم</label><input name="name" class="form-control" value="<?php echo e(old('name', $category->name)); ?>" required dir="rtl"></div>
        <div class="form-group"><label>الرابط</label><input name="slug" class="form-control" value="<?php echo e(old('slug', $category->slug)); ?>" dir="ltr"></div>
        <div class="form-group"><label>الترتيب</label><input type="number" name="sort_order" class="form-control" value="<?php echo e(old('sort_order', $category->sort_order ?? 0)); ?>"></div>
        <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1" <?php if(old('is_active', $category->is_active ?? true)): echo 'checked'; endif; ?>><label>نشط</label></div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/media-categories/form.blade.php ENDPATH**/ ?>