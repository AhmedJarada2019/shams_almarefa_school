<?php $__env->startSection('page_title', 'الرسائل'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th>البريد</th><th>مقروء</th><th></th></tr></thead>
<tbody><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr class="<?php echo e($message->is_read ? '' : 'font-weight-bold'); ?>">
<td><?php echo e($message->id); ?></td><td><?php echo e($message->name); ?></td><td><?php echo e($message->email); ?></td><td><?php echo e($message->is_read ? 'نعم' : 'لا'); ?></td>
<td><a href="<?php echo e(route('admin.contact-messages.show', $message)); ?>" class="btn btn-sm btn-light-primary">عرض</a></td>
</tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table><?php echo e($messages->links()); ?></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/contact-messages/index.blade.php ENDPATH**/ ?>