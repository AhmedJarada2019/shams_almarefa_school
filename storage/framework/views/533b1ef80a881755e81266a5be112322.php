<?php $__env->startSection('page_title', 'من نحن'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('admin.about.update')); ?>" enctype="multipart/form-data" class="card card-custom">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="<?php echo e(old('title', $about->title)); ?>" required dir="rtl"></div>
        <div class="form-group"><label>المحتوى</label><textarea data-quill="true" name="content" class="form-control" rows="10" required dir="rtl"><?php echo e(old('content', $about->content)); ?></textarea></div>
        <div class="form-group"><label>الصورة</label><input type="file" name="image" class="form-control-file"><?php if($about->image): ?><img src="<?php echo e(media_url($about->image)); ?>" height="80" class="mt-2"><?php endif; ?></div>
        <div class="form-group"><label>عنوان SEO</label><input name="meta_title" class="form-control" value="<?php echo e(old('meta_title', $about->meta_title)); ?>" dir="rtl"></div>
        <div class="form-group"><label>وصف SEO</label><textarea data-quill="true" name="meta_description" class="form-control" rows="2" dir="rtl"><?php echo e(old('meta_description', $about->meta_description)); ?></textarea></div>
        <div class="form-check"><input type="checkbox" name="is_active" value="1" <?php if(old('is_active', $about->is_active)): echo 'checked'; endif; ?>><label>نشط</label></div>
        <button class="btn btn-primary mt-3">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/about/edit.blade.php ENDPATH**/ ?>