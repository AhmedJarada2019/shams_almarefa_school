<?php $__env->startSection('page_title', 'قسم البطل'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('admin.hero.update')); ?>" enctype="multipart/form-data" class="card card-custom">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="<?php echo e(old('title', $hero->title)); ?>" required dir="rtl"></div>
        <div class="form-group"><label>العنوان الفرعي</label><input name="subtitle" class="form-control" value="<?php echo e(old('subtitle', $hero->subtitle)); ?>" dir="rtl"></div>
        <div class="form-group"><label>الوصف</label><textarea data-quill="true" name="description" class="form-control" rows="4" dir="rtl"><?php echo e(old('description', $hero->description)); ?></textarea></div>
        <div class="form-row">
            <div class="form-group col-md-6"><label>نص الزر</label><input name="button_text" class="form-control" value="<?php echo e(old('button_text', $hero->button_text)); ?>" dir="rtl"></div>
            <div class="form-group col-md-6"><label>رابط الزر</label><input name="button_url" class="form-control" value="<?php echo e(old('button_url', $hero->button_url)); ?>" dir="ltr"></div>
        </div>
        <div class="form-group"><label>الصورة</label><input type="file" name="image" class="form-control-file"><?php if($hero->image): ?><img src="<?php echo e(media_url($hero->image)); ?>" height="80" class="mt-2"><?php endif; ?></div>
        <div class="form-check"><input type="checkbox" name="is_active" value="1" class="form-check-input" <?php if(old('is_active', $hero->is_active)): echo 'checked'; endif; ?>><label class="form-check-label">نشط</label></div>
        <button class="btn btn-primary mt-3">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/hero/edit.blade.php ENDPATH**/ ?>