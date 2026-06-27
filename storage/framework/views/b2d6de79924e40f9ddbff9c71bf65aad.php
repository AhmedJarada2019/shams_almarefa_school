 <?php
    $footerAbout = \App\Models\Setting::get(
        'site',
        'footer_text',
        'مدرسة شمس المعرفة تقدم دورات تدريبية مميزة في مختلف المجالات.',
    );
    $facebookUrl = 'https://www.facebook.com/share/r/1PRFLzhbXP/';
    $twitterUrl = '#';
    $instagramUrl = 'https://www.instagram.com/almaarefashams?igsh=dTcwaGw3cDN6c2ty';
    $linkedinUrl = '#';
    $youtubeUrl = 'https://youtube.com/@hams770?si=iTtdQhAzgLxSeVvT';
?>
<footer class="container-fluid" style="background: #f3f0fa;">
    <div class="container py-5">
        <div class="row">
            
            <div class="col-lg-5 col-md-6 mb-4 mb-md-0" dir="rtl">
                <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center gap-2 text-decoration-none mb-3">
                    <img src="<?php echo e(asset('frontend/imgs/ChatGPT Image Jun 5, 2026, 06_40_29 PM.png')); ?>" width="52"
                        height="52" alt="logo" style="border-radius: 12px;">
                    <span
                        style="font-size: 18px; font-weight: 700; color: #5b21b6; line-height: 1.2;">مدرسة<br>شمس المعرفة</span>
                </a>
                <p class="text-muted" style="font-size: 14px; line-height: 1.7;">
                    <?php echo e($footerAbout); ?>

                </p>
                <div class="d-flex gap-2 mt-3 flex-wrap">
                    <?php $__currentLoopData = [['url' => $youtubeUrl, 'icon' => 'fa-youtube', 'label' => 'YouTube'], ['url' => $instagramUrl, 'icon' => 'fa-instagram', 'label' => 'Instagram'],['url' => $facebookUrl, 'icon' => 'fa-facebook-f', 'label' => 'Facebook']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($s['url']); ?>" target="_blank" aria-label="<?php echo e($s['label']); ?>"
                            style="width:42px;height:42px;border-radius:50%;background:#5b21b6;color:#fff;
                              display:flex;align-items:center;justify-content:center;font-size:16px;
                              text-decoration:none;">
                            <i class="fab <?php echo e($s['icon']); ?>"></i>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 offset-lg-1" dir="rtl">
                <ul class="list-unstyled">
                    <li class="mb-3 fw-bold" style="color:#5b21b6; font-size:15px;">الصفحات</li>
                    <li class="mb-2"><a href="<?php echo e(route('home')); ?>" class="text-decoration-none text-dark"
                            style="font-size:14px;">الرئيسية</a></li>
                    <li class="mb-2"><a href="<?php echo e(route('courses.index')); ?>" class="text-decoration-none text-dark"
                            style="font-size:14px;">جميع الدورات</a></li>
                    <li class="mb-2"><a href="<?php echo e(route('about')); ?>" class="text-decoration-none text-dark"
                            style="font-size:14px;">من نحن</a></li>
                    <li class="mb-2"><a href="<?php echo e(route('blog.index')); ?>" class="text-decoration-none text-dark"
                            style="font-size:14px;">المقالات</a></li>
                    <li class="mb-2"><a href="<?php echo e(route('contact.show')); ?>" class="text-decoration-none text-dark"
                            style="font-size:14px;">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <ul class="list-unstyled">
                    <li class="mb-3 fw-bold" style="color:#5b21b6; font-size:15px;">احدث الدورات</li>
                    <?php $__currentLoopData = $featuredCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="mb-2"><a href="<?php echo e(route('courses.show', $course)); ?>"
                                class="text-decoration-none text-dark" style="font-size:14px;"><?php echo e($course->title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>

    
    <div style="border-top: 1px solid #ddd4f5; background: #f3f0fa;" class="text-center py-3">
        <p class="mb-0 text-muted" style="font-size: 13px;" dir="rtl">
            © 2025 <a href="<?php echo e(route('home')); ?>" class="fw-bold text-decoration-none" style="color:#5b21b6;">أكاديمية
                الكفاءة</a>. جميع الحقوق محفوظة.
        </p>
    </div>
</footer>
<?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>