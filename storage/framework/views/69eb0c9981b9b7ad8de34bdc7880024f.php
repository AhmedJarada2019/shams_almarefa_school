<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title><?php echo $__env->yieldContent('title', 'لوحة التحكم'); ?> — مدرسة شمس المعرفة</title>
    <?php echo $__env->make('admin.layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="flex-row d-flex flex-column-fluid page">
            <?php echo $__env->make('admin.layout.main-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <?php echo $__env->make('admin.layout.main-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="py-2 subheader py-lg-4 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between">
                            <h5 class="text-dark font-weight-bold mb-0"><?php echo $__env->yieldContent('page_title'); ?></h5>
                        </div>
                    </div>
                    <div class="container-fluid px-3">
                        <?php echo $__env->make('admin.layout.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>
                <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/layout/master.blade.php ENDPATH**/ ?>