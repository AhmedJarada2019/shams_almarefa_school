<?php $__env->startSection('title', $siteName); ?>

<?php $__env->startSection('content'); ?>
    <?php if($hero): ?>

        <div class="hero-home container-fluid">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto">
                        <div class="text">
                            <h1 class="mb-2rem"><?php echo e($hero->title); ?></h1>
                            <?php if($hero->subtitle): ?>
                                <p class="lead"><?php echo e($hero->subtitle); ?></p>
                            <?php endif; ?>
                            <?php if($hero->description): ?>
                                <p class="mb-2rem"><?php echo e($hero->description); ?></p>
                            <?php endif; ?>
                            <?php if($hero->button_text): ?>
                                <div class="d-inline-flex align-items-center">
                                    <a href="<?php echo e($hero->button_url ?: route('courses.index')); ?>"
                                        class="btn btn-lg"><?php echo e($hero->button_text); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <img src="<?php echo e(media_url($hero->image, 'frontend/imgs/hero_img.png')); ?>" alt="<?php echo e($hero->title); ?>">
        </div>
    <?php endif; ?>

    <div class="some-courses container-fluid py-4 py-lg-5">
        <div class="container py-4">
            <div class="row d-flex align-items-center mb-4 mb-lg-5">
                <div class="col-lg-6">
                    <h2 class="title-section mb-2">من نحن</h2>
                    <p>برامج تدريبية متطورة لبناء مهاراتك</p>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-6 about-content">
                    <p>نحن شمس المعرفة نسجنا خيوط ُ امل لمستقبل طلابنا فمحونا جهل كاد ان يتفشى بعقول ابنائنا لنرسخ عقائد
                        ايمانية بعلم وعمل وتربية واخلاق لنتحدى انفسنا بأنفسنا ونرتقى بطلابنا نحو العلا متشبثين باقلامنا
                        وكتبنا لنكون صفوة في العلم والخلق نحن نصنع التميز ولا ننتظره</p>
                    <a href="<?php echo e(route('about')); ?>" class="btn btn-lg btn-outline mt-2">عرض المزيد</a>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo e(media_url($hero->image, 'frontend/imgs/hero_img.png')); ?>" alt="" width="100%"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <?php if($featuredCourses->isNotEmpty()): ?>

        <!-- Courses Slider -->
        <div class="some-courses container-fluid py-4 py-lg-5">
            <div class="container py-4">

                <!-- Header -->
                <div class="row align-items-center mb-4 mb-lg-5">
                    <div class="col-lg-6">
                        <h2 class="title-section mb-2">دوراتنا المميزة</h2>
                        <p>قم ببناء مهاراتك العمليّة من خلال برامج تدريبيّة متطوّرة</p>
                    </div>

                    <div class="col-lg-6 d-inline-flex justify-content-lg-end mt-4 mt-lg-0">
                        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-lg btn-outline">
                            عرض الكل
                        </a>
                    </div>
                </div>

                <!-- Slider -->
                <style>
                    /* الحاوية الخارجية المحيطة بكل شيء */
                    .swiper-container-wrapper {
                        position: relative;
                        width: 100%;
                        /* السماح برؤية العناصر التي تخرج قليلاً على الأطراف كالأزرار */
                        overflow: visible !important;
                    }

                    /* حاوية الـ Swiper نفسها نقوم بضمان وجود مساحة كافية داخلها */
                    .swiper-container-wrapper .swiper {
                        overflow: hidden;
                        /* لحماية حركة السلايدر الداخلية */
                        position: relative;
                    }

                    /* أزرار التحكم المخصصة */
                    .custom-swiper-nav {
                        width: 44px !important;
                        height: 44px !important;
                        background-color: #ffffff !important;
                        color: #6f42c1 !important;
                        /* لون الأكاديمية البنفسجي */
                        border-radius: 50% !important;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
                        transition: all 0.3s ease !important;

                        /* حل مشكلة الاختفاء: رفع طبقة السهم ليظهر فوق الكروت */
                        /* z-index: 1000 !important; */

                        /* التموضع الرأسي في منتصف الكروت تماماً */
                        top: 40% !important;
                        margin-top: 0 !important;

                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                    }

                    /* تأثير عند تمرير الماوس */
                    .custom-swiper-nav:hover {
                        background-color: #6f42c1 !important;
                        color: #ffffff !important;
                        transform: scale(1.08);
                    }

                    /* تصغير حجم السهم الداخلي الافتراضي لـ Swiper */
                    .custom-swiper-nav::after {
                        font-size: 16px !important;
                        font-weight: bold !important;
                    }

                    /* تحديد الأماكن بدقة على الأطراف الخارجية */
                    /* ملاحظة: في نظام الـ RTL (العربي) يعكس الـ Swiper اتجاه الأزرار تلقائياً */
                    .swiper-container-wrapper .swiper-button-next {
                        left: -15px !important;
                        /* دفع السهم خارج حدود الكروت جهة اليسار */
                        right: auto !important;
                    }

                    .swiper-container-wrapper .swiper-button-prev {
                        right: -15px !important;
                        /* دفع السهم خارج حدود الكروت جهة اليمين */
                        left: auto !important;
                    }

                    /* في الشاشات الصغيرة جداً، نلغي الأسهم ونعتمد على سحب الإصبع (Touch) منعاً للتداخل */
                    @media (max-width: 767.98px) {
                        .custom-swiper-nav {
                            display: none !important;
                        }

                        .swiper-container-wrapper {
                            padding-left: 0 !important;
                            padding-right: 0 !important;
                        }
                    }
                </style>
                <div class="position-relative swiper-container-wrapper px-md-5 px-4">
                    <div class="swiper coursesSwiper pb-5">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $featuredCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide h-auto">
                                    <a href="<?php echo e(route('courses.show', $course)); ?>"
                                        class="box-course d-block h-100 bg-white shadow-sm rounded-4 overflow-hidden border-0">
                                        <div class="img mb-1 position-relative">
                                            <img src="<?php echo e(media_url($course->featured_image, 'frontend/imgs/course2.png')); ?>"
                                                alt="<?php echo e($course->title); ?>" class="w-100 object-fit-cover"
                                                style="height: 200px;">
                                        </div>

                                        <div class="p-3">
                                            <div class="info mb-3">
                                                <h5 class="fw-bold text-dark lh-base mb-0 text-truncate-2">
                                                    <?php echo e($course->title); ?>

                                                </h5>
                                            </div>

                                            <div class="others d-flex align-items-center gap-2 mb-3">
                                                <span class="badge bg-light text-muted fw-normal px-2 py-1">
                                                    <i class="far fa-clock me-1"></i> <?php echo e($course->duration ?? 0); ?> ساعة
                                                </span>
                                                <span class="badge bg-light text-primary fw-semibold px-2 py-1">
                                                    <?php echo e($course->category->name ?? 'بدون تصنيف'); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>

                    <div class="swiper-button-prev custom-swiper-nav z-0">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="swiper-button-next custom-swiper-nav z-0">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php endif; ?>

    <?php if($latestPosts->isNotEmpty()): ?>
        <div class="container-fluid py-4 py-lg-5">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <h2 class="title-section mb-2">أحدث المقالات</h2>
                    </div>
                    <div class="col-lg-6 text-lg-end d-flex justify-content-end" style="padding: 30px 30px">
                        <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-lg btn-outline">جميع المقالات</a>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.partials.blog-card', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script>
        const swiper = new Swiper('.coursesSwiper', {
            rtl: true, // تفعيل محاذاة اليمين لليسار
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,

            // ربط الأزرار بدقة
            navigation: {
                nextEl: '.swiper-container-wrapper .swiper-button-next',
                prevEl: '.swiper-container-wrapper .swiper-button-prev',
            },

            // التجاوب مع الشاشات
            breakpoints: {
                576: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                }
            }
        });
    </script>
    <?php echo $__env->make('frontend.partials.partners-carousel', ['partners' => $partners], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.contact-part', ['contact' => $contact], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>