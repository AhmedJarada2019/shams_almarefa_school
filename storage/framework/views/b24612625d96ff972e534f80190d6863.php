<?php $__env->startSection('page_title', $post->exists ? 'تعديل مقال' : 'مقال جديد'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e($post->exists ? route('admin.blog-posts.update', $post) : route('admin.blog-posts.store')); ?>" enctype="multipart/form-data" class="card card-custom">
    <?php echo csrf_field(); ?> <?php if($post->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="<?php echo e(old('title', $post->title)); ?>" required dir="rtl"></div>
        <div class="form-group"><label>الرابط</label><input name="slug" class="form-control" value="<?php echo e(old('slug', $post->slug)); ?>" dir="ltr"></div>
        <div class="form-group"><label>التصنيف</label><select name="blog_category_id" class="form-control"><option value="">—</option><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($cat->id); ?>" <?php if(old('blog_category_id', $post->blog_category_id)==$cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        <div class="form-group"><label>مقتطف</label><textarea data-quill="true" name="excerpt" class="form-control" rows="2" dir="rtl"><?php echo e(old('excerpt', $post->excerpt)); ?></textarea></div>
        <div class="form-group"><label>المحتوى</label><textarea data-quill="true" name="content" class="form-control" rows="10" dir="rtl"><?php echo e(old('content', $post->content)); ?></textarea></div>
        <div class="form-group"><label>صورة</label><input type="file" name="featured_image"><?php if($post->featured_image): ?><img src="<?php echo e(media_url($post->featured_image)); ?>" height="60" class="d-block mt-2"><?php endif; ?></div>
        <div class="form-row">
            <div class="form-group col-md-6"><label>الحالة</label><select name="status" class="form-control"><option value="draft" <?php if(old('status',$post->status)=='draft'): echo 'selected'; endif; ?>>مسودة</option><option value="published" <?php if(old('status',$post->status)=='published'): echo 'selected'; endif; ?>>منشور</option></select></div>
            <div class="form-group col-md-6"><label>تاريخ النشر</label><input type="datetime-local" name="published_at" class="form-control" value="<?php echo e(old('published_at', optional($post->published_at)->format('Y-m-d\TH:i'))); ?>"></div>
        </div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/blog-posts/form.blade.php ENDPATH**/ ?>