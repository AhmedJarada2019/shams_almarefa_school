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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
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
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('frontend/js/jquery-3.6.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/overlayscrollbars.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>