<?php $__env->startSection('page_title', 'الشركاء'); ?>
<?php $__env->startSection('content'); ?>
<div class="mb-3"><a href="<?php echo e(route('admin.partners.create')); ?>" class="btn btn-primary">شريك جديد</a></div>
<p class="text-muted">يظهرون في الصفحة الرئيسية بشكل دوّار (نفس تصميم المدربين).</p>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th>الشعار</th><th></th></tr></thead>
<tbody><?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr>
<td><?php echo e($partner->id); ?></td><td><?php echo e($partner->name); ?></td>
<td><?php if($partner->logo): ?><img src="<?php echo e(media_url($partner->logo)); ?>" height="40"><?php endif; ?></td>
<td><a href="<?php echo e(route('admin.partners.edit', $partner)); ?>" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="<?php echo e(route('admin.partners.destroy', $partner)); ?>" method="post" class="d-inline" onsubmit="return confirm('حذف؟')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-light-danger">حذف</button></form></td>
</tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table><?php echo e($partners->links()); ?></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/partners/index.blade.php ENDPATH**/ ?>