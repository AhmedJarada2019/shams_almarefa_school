<header class="container-fluid py-3 py-lg-0">
    <div class="container-fluid container-lg">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <a href="{{ route('home') }}" class="d-flex align-items-center box-logo">
                    <img src="{{ asset('frontend/imgs/ea79c0c9-3ab8-4587-b678-bde6b217be0e.jpg') }}" width="48"
                        height="48" alt="{{ $siteName }}">
                </a>
            </div>
            <div class="nav-links col-12 col-lg-auto d-lg-flex align-items-center justify-content-center">
                <ul class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <li class="me-lg-2 {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="me-lg-2 {{ request()->routeIs('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}">من نحن</a>
                    </li>
                    <li class="me-lg-2 {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                        <a href="{{ route('courses.index') }}">الدورات</a>
                    </li>
                    <li class="me-lg-2 {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                        <a href="{{ route('blog.index') }}">المقالات</a>
                    </li>
                    <li class="me-lg-2 {{ request()->routeIs('media.*') ? 'active' : '' }}">
                        <a href="{{ route('media.index') }}">مكتبة الوسائط</a>
                    </li>
                    <li class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">
                        <a href="{{ route('contact.show') }}">اتصل بنا</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto d-flex align-items-center justify-content-end">
                @php
                    $donationUrl = \App\Models\Setting::get('social', 'donation_url', '#');
                    $whatsappUrl = \App\Models\Setting::get('social', 'whatsapp', '#');
                @endphp
                <!-- When Not Login -->
                <div class="login d-none d-sm-flex me-2">
                    <a href="{{ route('apps') }}" target="_blank" class="btn btn-outline">
                        تبرع الان
                    </a>
                </div>
                <a href="https://wa.me/972599172676" target="_blank" class="register btn d-none d-sm-flex">
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
