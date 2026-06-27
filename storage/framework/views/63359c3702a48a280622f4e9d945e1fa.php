<?php $__env->startSection('page_title', 'المقالات'); ?>
<?php $__env->startSection('content'); ?>
<div class="mb-3"><a href="<?php echo e(route('admin.blog-posts.create')); ?>" class="btn btn-primary">مقال جديد</a></div>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>العنوان</th><th>التصنيف</th><th>الحالة</th><th></th></tr></thead>
<tbody><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td><?php echo e($post->id); ?></td><td><?php echo e($post->title); ?></td><td><?php echo e($post->category?->name); ?></td><td><?php echo e($post->status); ?></td><td>
<a href="<?php echo e(route('admin.blog-posts.edit', $post)); ?>" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="<?php echo e(route('admin.blog-posts.destroy', $post)); ?>" method="post" class="d-inline" onsubmit="return confirm('حذف؟')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-light-danger">حذف</button></form>
</td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table><?php echo e($posts->links()); ?></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/blog-posts/index.blade.php ENDPATH**/ ?>