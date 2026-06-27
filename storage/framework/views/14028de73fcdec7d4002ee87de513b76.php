<?php $__env->startSection('page_title', 'الكاتب'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('admin.blog-author.update')); ?>" enctype="multipart/form-data" class="card card-custom">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
    <div class="card-body">
        <div class="form-group"><label>الاسم</label><input name="author_name" class="form-control" value="<?php echo e(old('author_name', $author['name'])); ?>" dir="rtl"></div>
        <div class="form-group"><label>المسمى</label><input name="author_title" class="form-control" value="<?php echo e(old('author_title', $author['title'])); ?>" dir="rtl"></div>
        <div class="form-group"><label>نبذة</label><textarea name="author_bio" class="form-control" rows="4" dir="rtl"><?php echo e(old('author_bio', $author['bio'])); ?></textarea></div>
        <div class="form-group"><label>الصورة</label><input type="file" name="author_image"><?php if(!empty($author['image'])): ?><img src="<?php echo e(media_url($author['image'])); ?>" height="60" class="mt-2"><?php endif; ?></div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/blog-author/edit.blade.php ENDPATH**/ ?>