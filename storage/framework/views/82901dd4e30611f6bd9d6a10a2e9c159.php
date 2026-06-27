<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول — لوحة التحكم</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/global/plugins.bundle.rtl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.bundle.rtl.css')); ?>">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4">لوحة تحكم الأكاديمية</h3>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($error); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo e(route('admin.login.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label>البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required dir="ltr">
                        </div>
                        <div class="form-group mb-3">
                            <label>كلمة المرور</label>
                            <input type="password" name="password" class="form-control" required dir="ltr">
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">تذكرني</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block w-100">دخول</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>