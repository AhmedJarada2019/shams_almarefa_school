<?php $__env->startSection('page_title', 'تصنيفات الوسائط'); ?>
<?php $__env->startSection('content'); ?>
<div class="mb-3"><a href="<?php echo e(route('admin.media-categories.create')); ?>" class="btn btn-primary">إضافة</a></div>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th></th></tr></thead>
<tbody><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td><?php echo e($item->id); ?></td><td><?php echo e($item->name); ?></td><td>
<a href="<?php echo e(route('admin.media-categories.edit', $item)); ?>" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="<?php echo e(route('admin.media-categories.destroy', $item)); ?>" method="post" class="d-inline" onsubmit="return confirm('حذف؟')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-light-danger">حذف</button></form>
</td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table><?php echo e($categories->links()); ?></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/media-categories/index.blade.php ENDPATH**/ ?>