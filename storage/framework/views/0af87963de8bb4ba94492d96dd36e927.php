<?php $__env->startSection('page_title', 'رسالة #'.$message->id); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-custom"><div class="card-body">
<p><strong>الاسم:</strong> <?php echo e($message->name); ?></p>
<p><strong>البريد:</strong> <?php echo e($message->email); ?></p>
<?php if($message->phone): ?><p><strong>الهاتف:</strong> <?php echo e($message->phone); ?></p><?php endif; ?>
<?php if($message->subject): ?><p><strong>الموضوع:</strong> <?php echo e($message->subject); ?></p><?php endif; ?>
<p><strong>الرسالة:</strong></p>
<p><?php echo e($message->message); ?></p>
<form action="<?php echo e(route('admin.contact-messages.destroy', $message)); ?>" method="post" onsubmit="return confirm('حذف؟')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-danger">حذف</button></form>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/contact-messages/show.blade.php ENDPATH**/ ?>