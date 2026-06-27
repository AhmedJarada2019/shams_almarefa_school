<?php $__env->startSection('page_title', $user->exists ? 'تعديل مشرف' : 'إضافة مشرف جديد'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">

        
        <div class="mb-4">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-sm btn-light">
                <i class="fas fa-arrow-right ml-1"></i> العودة للقائمة
            </a>
        </div>

        <div class="card card-custom shadow-sm">
            
            <div class="card-header" style="background: linear-gradient(135deg, #3699FF 0%, #1a5fb4 100%); border-radius: 8px 8px 0 0;">
                <div class="d-flex align-items-center py-1">
                    <div style="width:40px;height:40px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;" class="mr-3">
                        <i class="fas <?php echo e($user->exists ? 'fa-user-edit' : 'fa-user-plus'); ?> text-white" style="font-size:18px;"></i>
                    </div>
                    <div>
                        <h5 class="text-white mb-0 font-weight-bold"><?php echo e($user->exists ? 'تعديل بيانات المشرف' : 'إضافة مشرف جديد'); ?></h5>
                        <?php if($user->exists): ?>
                            <small class="text-white-50"><?php echo e($user->email); ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card-body p-6">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-5">
                        <strong><i class="fas fa-exclamation-triangle mr-2"></i>يوجد أخطاء:</strong>
                        <ul class="mb-0 mt-2 pr-4">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                <?php endif; ?>

                <form method="post"
                      action="<?php echo e($user->exists ? route('admin.users.update', $user) : route('admin.users.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if($user->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

                    
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-user text-primary mr-1"></i> الاسم الكامل
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" dir="rtl"
                               class="form-control form-control-solid <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               value="<?php echo e(old('name', $user->name)); ?>"
                               placeholder="أدخل الاسم الكامل" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-envelope text-primary mr-1"></i> البريد الإلكتروني
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" name="email" dir="ltr"
                               class="form-control form-control-solid <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               value="<?php echo e(old('email', $user->email)); ?>"
                               placeholder="example@domain.com" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-lock text-primary mr-1"></i> كلمة المرور
                            <?php if(!$user->exists): ?> <span class="text-danger">*</span> <?php endif; ?>
                        </label>
                        <div class="input-group">
                            <input type="password" name="password" dir="ltr" id="passwordInput"
                                   class="form-control form-control-solid <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="<?php echo e($user->exists ? 'اتركها فارغة إن لم تُرد التغيير' : 'أدخل كلمة مرور قوية'); ?>"
                                   <?php echo e($user->exists ? '' : 'required'); ?>>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php if($user->exists): ?>
                            <small class="text-muted"><i class="fas fa-info-circle mr-1"></i>اتركها فارغة إن لم تُرد تغيير كلمة المرور</small>
                        <?php endif; ?>
                    </div>

                    
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-lock text-primary mr-1"></i> تأكيد كلمة المرور
                        </label>
                        <input type="password" name="password_confirmation" dir="ltr"
                               class="form-control form-control-solid"
                               placeholder="أعد إدخال كلمة المرور">
                    </div>

                    
                    <div class="form-group mb-6">
                        <label class="font-weight-bold text-dark d-block mb-3">
                            <i class="fas fa-toggle-on text-primary mr-1"></i> حالة الحساب
                        </label>
                        <div class="d-flex align-items-center">
                            <span class="switch switch-primary switch-lg">
                                <label>
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1"
                                           <?php if(old('is_active', $user->is_active ?? true)): echo 'checked'; endif; ?>>
                                    <span></span>
                                </label>
                            </span>
                            <span class="mr-3 font-weight-500">تفعيل الحساب (السماح بتسجيل الدخول)</span>
                        </div>
                    </div>

                    
                    <div class="separator separator-dashed mb-5"></div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-light font-weight-bold px-6">
                            إلغاء
                        </a>
                        <button type="submit" class="btn btn-primary font-weight-bold px-6">
                            <i class="fas fa-save mr-2"></i>
                            <?php echo e($user->exists ? 'حفظ التغييرات' : 'إنشاء المشرف'); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('js'); ?>
<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/users/form.blade.php ENDPATH**/ ?>