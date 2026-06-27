    <link href="<?php echo e(asset('assets/bg/favicon.png')); ?>" rel="icon" type="image/png" />

    <!--begin::Fonts (font-display: swap لتحسين الأداء - النص يظهر فوراً بخط احتياطي ثم يُستبدل)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    <!--end::Fonts-->

    
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="لوحة تحكم مدرسة شمس المعرفة">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="#">
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    

    
    <?php
        $cssBundlePath = public_path('assets/css/vendor.bundle.rtl.min.css');
        $useCssBundle = app()->environment('production') && file_exists($cssBundlePath);
    ?>
    <?php if($useCssBundle): ?>
    <link href="<?php echo e(asset('assets/css/vendor.bundle.rtl.min.css')); ?>" rel="stylesheet" type="text/css">
    <?php else: ?>
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?php echo e(asset('assets/plugins/global/plugins.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/style.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?php echo e(asset('assets/css/themes/layout/header/base/light.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/themes/layout/header/menu/light.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/themes/layout/brand/dark.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/css/themes/layout/aside/dark.rtl.css')); ?>" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!--end::Layout Themes-->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-styles.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
    <style>
        /* Quill Editor RTL Support */
        .ql-toolbar { direction: rtl; text-align: right; }
        .ql-container { direction: rtl; }
        .ql-editor { direction: rtl; text-align: right; font-family: 'Cairo', sans-serif; min-height: 120px; }
        .ql-editor.ql-blank::before { right: 15px; left: auto; font-family: 'Cairo', sans-serif; }
        .quill-wrapper { border: 1px solid #E4E6EF; border-radius: 0.42rem; overflow: hidden; }
        .quill-wrapper .ql-toolbar { border-bottom: 1px solid #E4E6EF; border-top: none; border-left: none; border-right: none; background: #f8f9fa; }
        .quill-wrapper .ql-container { border: none; font-size: 14px; }
    </style>
    <style>
        /* تحسين تصميم السايدبار */
        .aside {
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
        }

        .brand {
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem 1rem;
        }

        .brand-logo {
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.05);
        }

        .menu-section h4 {
            color: #fff !important;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1rem 1.5rem 0.5rem;
            opacity: 0.8;
        }

        .menu-link {
            color: rgba(255, 255, 255, 0.7) !important;
            border-radius: 10px;
            margin: 0.25rem 1rem;
            transition: all 0.3s ease;
        }

        .menu-link:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            color: #fff !important;
            transform: translateX(5px);
        }

        .menu-item-active > .menu-link {
            background: linear-gradient(90deg, #2E7D32 0%, #1B5E20 100%) !important;
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(46, 125, 50, 0.3);
        }

        .menu-icon {
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .menu-link:hover .menu-icon {
            background: rgba(255, 255, 255, 0.1);
        }

        .menu-text {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .menu-arrow {
            transition: transform 0.3s ease;
        }

        .menu-item-open > .menu-link .menu-arrow {
            transform: rotate(180deg);
        }

        /* تحسين تصميم القوائم الفرعية */
        .menu-submenu {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            margin: 0.5rem 1rem;
        }

        .menu-submenu .menu-link {
            padding-left: 3rem;
            font-size: 0.9rem;
        }

        .menu-bullet {
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        /* تحسين تصميم زر تبديل السايدبار */
        .brand-toggle {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .brand-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(180deg);
        }

        /* توحيد تصميم البوب أب (المودالات) — لون الهوية primary #2E7D32 */
        .modal-header {
            background: linear-gradient(135deg, #2E7D32 0%, #1B5E20 100%);
            border: none;
        }
        .modal-header .modal-title {
            color: #fff;
            font-weight: 700;
        }
        .modal-header .close {
            color: #fff;
            opacity: 1;
            text-shadow: none;
        }
        .modal-header .close:hover {
            color: #fff;
            opacity: 0.8;
        }
        .modal-body {
            padding: 2rem;
        }
        .modal-body .form-group {
            margin-bottom: 1.25rem;
        }
        .modal-body .form-control-solid,
        .modal-body .form-control {
            border-radius: 0.42rem;
        }
        .modal-footer {
            border-top: none;
            padding: 1rem 2rem;
        }
        .modal-footer .btn {
            font-weight: 700;
            padding: 0.75rem 2rem;
        }
    </style>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/layout/head.blade.php ENDPATH**/ ?>