<link rel="stylesheet" href="<?php echo e(asset('css/sidebar-custom.css')); ?>">
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="brand-logo">
            <img alt="Logo" src="<?php echo e(asset('frontend/imgs/logo.svg')); ?>" width="160" />
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="my-4 aside-menu">
            <ul class="menu-nav">
                <?php
                    $menu = [
                        // ['route' => 'admin.dashboard', 'label' => 'لوحة التحكم', 'pattern' => 'admin'],
                        ['route' => 'admin.hero.edit', 'label' => 'قسم البطل', 'pattern' => 'admin/hero*'],
                        ['route' => 'admin.about.edit', 'label' => 'من نحن', 'pattern' => 'admin/about*'],
                        ['route' => 'admin.course-categories.index', 'label' => 'تصنيفات الدورات', 'pattern' => 'admin/course-categories*'],
                        ['route' => 'admin.courses.index', 'label' => 'الدورات', 'pattern' => 'admin/courses*'],
                        ['route' => 'admin.blog-categories.index', 'label' => 'تصنيفات المدونة', 'pattern' => 'admin/blog-categories*'],
                        ['route' => 'admin.blog-posts.index', 'label' => 'المقالات', 'pattern' => 'admin/blog-posts*'],
                        ['route' => 'admin.blog-author.edit', 'label' => 'الكاتب', 'pattern' => 'admin/blog-author*'],
                        ['route' => 'admin.media-categories.index', 'label' => 'تصنيفات الوسائط', 'pattern' => 'admin/media-categories*'],
                        ['route' => 'admin.media-items.index', 'label' => 'مكتبة الوسائط', 'pattern' => 'admin/media-items*'],
                        ['route' => 'admin.partners.index', 'label' => 'الشركاء', 'pattern' => 'admin/partners*'],
                        ['route' => 'admin.contact-settings.edit', 'label' => 'إعدادات اتصل بنا', 'pattern' => 'admin/contact-settings*'],
                        ['route' => 'admin.contact-messages.index', 'label' => 'الرسائل', 'pattern' => 'admin/contact-messages*', 'badge' => $unreadMessagesCount ?? 0],
                        ['route' => 'admin.settings.edit', 'label' => 'إعدادات الموقع', 'pattern' => 'admin/settings/site*', 'params' => ['group' => 'site']],
                        ['route' => 'admin.users.index', 'label' => 'المشرفون', 'pattern' => 'admin/users*'],
                        ['route' => 'admin.profile.edit', 'label' => 'ملفي', 'pattern' => 'admin/profile*'],
                    ];
                ?>
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $active = request()->is($item['pattern']);
                        $url = isset($item['params']) ? route($item['route'], $item['params']) : route($item['route']);
                    ?>
                    <li class="menu-item <?php echo e($active ? 'menu-item-active' : ''); ?>">
                        <a href="<?php echo e($url); ?>" class="menu-link">
                            <span class="menu-text"><?php echo e($item['label']); ?></span>
                            <?php if(!empty($item['badge']) && $item['badge'] > 0): ?>
                                <span class="label label-sm label-danger"><?php echo e($item['badge']); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="menu-item">
                    <a href="<?php echo e(route('home')); ?>" class="menu-link" target="_blank">
                        <span class="menu-text">عرض الموقع</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/admin/layout/main-sidebar.blade.php ENDPATH**/ ?>