<link rel="stylesheet" href="{{ asset('css/sidebar-custom.css') }}">
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
            <img alt="Logo" src="{{ asset('frontend/imgs/logo.svg') }}" width="160" />
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="my-4 aside-menu">
            <ul class="menu-nav">
                @php
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
                @endphp
                @foreach ($menu as $item)
                    @php
                        $active = request()->is($item['pattern']);
                        $url = isset($item['params']) ? route($item['route'], $item['params']) : route($item['route']);
                    @endphp
                    <li class="menu-item {{ $active ? 'menu-item-active' : '' }}">
                        <a href="{{ $url }}" class="menu-link">
                            <span class="menu-text">{{ $item['label'] }}</span>
                            @if (!empty($item['badge']) && $item['badge'] > 0)
                                <span class="label label-sm label-danger">{{ $item['badge'] }}</span>
                            @endif
                        </a>
                    </li>
                @endforeach
                <li class="menu-item">
                    <a href="{{ route('home') }}" class="menu-link" target="_blank">
                        <span class="menu-text">عرض الموقع</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
