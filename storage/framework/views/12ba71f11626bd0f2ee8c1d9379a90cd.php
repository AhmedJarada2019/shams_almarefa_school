<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-grid.rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/hamburgers-menu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/overlayscrollbars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/main.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <title><?php echo $__env->yieldContent('title', $siteName ?? 'مدرسة شمس المعرفة'); ?></title>
    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        /* ===================================
   SHAMS AL MAARIFAH THEME
=================================== */

        :root {
            --primary: #6F2DBD;
            --primary-light: #8A4DE0;

            --secondary: #8BC53F;
            --secondary-dark: #6DA72D;

            --accent: #EC008C;
            --warning: #F7D000;

            --dark: #2D2D2D;
            --text: #555;
            --light: #FFFFFF;
            --gray: #F6F7FA;
        }

        /* ===== GENERAL ===== */

        body {
            color: var(--text);
            scroll-behavior: smooth;
        }

        /* Smooth Scroll Animation for Elements */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-in-left {
            opacity: 0;
            transform: translateX(-30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .fade-in-right {
            opacity: 0;
            transform: translateX(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .scale-in {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scale-in.visible {
            opacity: 1;
            transform: scale(1);
        }

        a {
            transition: .3s;
        }

        .title-section {
            color: var(--primary);
            font-weight: 800;
            position: relative;
            display: inline-block;
        }

        .title-section::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: var(--warning);
            margin-top: 10px;
            border-radius: 20px;
        }

        /* ===== HEADER ===== */

        header {
            background: #fff;
            border-bottom: 3px solid var(--primary);
            box-shadow: 0 3px 15px rgba(0, 0, 0, .04);
        }

        header .nav-links ul li {
            border-radius: 8px;
        }

        header .nav-links ul li a {
            color: #555;
            font-weight: 600;
        }

        header .nav-links ul li.active {
            background: var(--primary);
        }

        header .nav-links ul li.active a {
            color: #fff;
        }

        /* ===== HERO ===== */
        /*
.hero-home{
    position:relative;
}

.hero-home::before{
    content:'';
    position:absolute;
    inset:0;
    background:
    linear-gradient(
        rgba(111,45,189,.78),
        rgba(111,45,189,.58)
    );
    z-index:1;
}

.hero-home .container{
    position:relative;
    z-index:2;
}

.hero-home h1{
    color:#fff;
    font-weight:800;
}

.hero-home p{
    color:#f3f3f3;
} */

        /* ===== BUTTONS ===== */

        .btn {
            border-radius: 50px;
            transition: .3s;
        }

        .btn-lg {
            padding: 12px 30px;
        }

        .hero-home .btn,
        .btn-primary {
            background: var(--secondary);
            color: #fff;
            border: none;
        }

        .hero-home .btn:hover,
        .btn-primary:hover {
            background: var(--primary);
            color: #fff;
        }

        .btn-outline {
            border: 2px solid var(--secondary);
            color: var(--secondary);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--secondary);
            color: #fff;
        }

        /* ===== COURSES ===== */

        .box-course {
            background: #fff;
            border: 1px solid rgba(111, 45, 189, .12);
            border-radius: 18px;
            overflow: hidden;
            transition: .35s;
            display: block;
        }

        .box-course:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(111, 45, 189, .12);
        }

        .box-course h2 {
            color: var(--primary);
            font-size: 18px;
            font-weight: 700;
        }

        .box-course .text-muted {
            color: var(--secondary) !important;
            font-weight: 600;
        }

        /* ===== ARTICLES ===== */

        .box-article {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid rgba(111, 45, 189, .10);
            transition: .3s;
        }

        .box-article:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(111, 45, 189, .12);
        }

        .box-article h3 a {
            color: var(--primary);
        }

        .box-article .tag {
            background: #EDF8E1;
            color: var(--secondary-dark);
            border-radius: 30px;
            padding: 6px 14px;
            font-size: 13px;
        }

        .box-article .more {
            color: var(--accent);
            font-weight: 700;
        }

        /* ===== PARTNERS ===== */

        .box-trainer {
            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            /* border:1px solid rgba(111,45,189,.12); */
            transition: .3s;
            height: 100%;
        }

        .box-trainer:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 30px rgba(111, 45, 189, .15);
        }

        .box-trainer .img {
            background: var(--primary);
            /* padding:25px; */
            text-align: center;
        }



        .box-trainer h4 {
            color: var(--primary);
            font-weight: 700;
        }

        .box-trainer span {
            color: #666;
        }

        /* ===== SECTIONS ===== */

        .some-courses {
            background: #fff;
        }

        .trainers {
            background: #fafafa;
        }

        /* ===== FOOTER ===== */

        footer {
            background:
                linear-gradient(135deg,
                    #6F2DBD 0%,
                    #8BC53F 100%);
        }

        footer,
        footer a,
        footer p,
        footer li {
            color: #080808;
        }

        footer ul li:first-child {
            color: #F7D000;
            font-weight: 700;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #fff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: .3s;
        }

        .social-icon:hover {
            background: var(--warning);
            color: var(--primary);
            transform: translateY(-4px);
        }

        /* ===== MOBILE ===== */

        @media(max-width:991px) {

            .hero-home h1 {
                font-size: 32px;
            }

            .title-section {
                font-size: 28px;
            }

            .box-course,
            .box-article,
            .box-trainer {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php
        $fbUrl = 'https://www.facebook.com/profile.php?id=61584609052448';
        $twUrl = '#';
        $igUrl = 'https://www.instagram.com/almaarefashams?igsh=dTcwaGw3cDN6c2ty';
        $liUrl = '#';
        $ytUrl = 'https://youtube.com/@hams770?si=iTtdQhAzgLxSeVvT';
    ?>
    <div id="fixed-social"
        style="
        position: fixed;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 0;
        border-radius: 0 10px 10px 0;
        overflow: hidden;
        box-shadow: 3px 3px 14px rgba(0,0,0,0.18);
    ">
        <?php $__currentLoopData = [['url' => $ytUrl, 'icon' => 'fa-youtube', 'bg' => '#FF0000', 'label' => 'YouTube'], ['url' => $fbUrl, 'icon' => 'fa-facebook-f', 'bg' => '#1877F2', 'label' => 'Facebook'], ['url' => $igUrl, 'icon' => 'fa-instagram', 'bg' => '#E1306C', 'label' => 'Instagram']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($social['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e($social['label']); ?>"
                class="fixed-social-btn"
                style="width:44px;height:44px;background:<?php echo e($social['bg']); ?>;color:#fff;
                  display:flex;align-items:center;justify-content:center;
                  text-decoration:none;font-size:16px;transition:width .2s ease;">
                <i class="fab <?php echo e($social['icon']); ?>"></i>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <style>
        .fixed-social-btn:hover {
            width: 60px !important;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            #fixed-social {
                display: none !important;
            }
        }
    </style>

    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('frontend/js/jquery-3.6.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/overlayscrollbars.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script>
        // Smooth Scroll Animation Observer
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe all animated elements
            const animatedElements = document.querySelectorAll(
                '.fade-in-up, .fade-in-left, .fade-in-right, .scale-in');
            animatedElements.forEach(el => observer.observe(el));
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>