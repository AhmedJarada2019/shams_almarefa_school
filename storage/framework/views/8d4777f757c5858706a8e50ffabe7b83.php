<header class="container-fluid py-3 py-lg-0">
    <div class="container-fluid container-lg">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center box-logo">
                    <img src="<?php echo e(asset('frontend/imgs/ea79c0c9-3ab8-4587-b678-bde6b217be0e.jpg')); ?>" width="48"
                        height="48" alt="<?php echo e($siteName); ?>">
                </a>
            </div>
            <div class="nav-links col-12 col-lg-auto d-lg-flex align-items-center justify-content-center">
                <ul class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <li class="me-lg-2 <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('home')); ?>">الرئيسية</a>
                    </li>
                    <li class="me-lg-2 <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('about')); ?>">من نحن</a>
                    </li>
                    <li class="me-lg-2 <?php echo e(request()->routeIs('courses.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('courses.index')); ?>">الدورات</a>
                    </li>
                    <li class="me-lg-2 <?php echo e(request()->routeIs('blog.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('blog.index')); ?>">المقالات</a>
                    </li>
                    <li class="me-lg-2 <?php echo e(request()->routeIs('media.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('media.index')); ?>">مكتبة الوسائط</a>
                    </li>
                    <li class="<?php echo e(request()->routeIs('contact.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('contact.show')); ?>">اتصل بنا</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto d-flex align-items-center justify-content-end">
                <!-- When Not Login -->
                <div class="login d-none d-sm-flex me-2">
                    <a href="" class="btn btn-outline">
                        تبرع الان
                    </a>
                </div>
                <a href="" class="register btn d-none d-sm-flex">
                    واتساب
                </a>
                <div class="hamburger d-flex d-lg-none p-0 hamburger--spin ms-2 ms-lg-3">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/partials/header.blade.php ENDPATH**/ ?>