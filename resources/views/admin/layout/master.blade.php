<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>@yield('title', 'لوحة التحكم') — مدرسة شمس المعرفة</title>
    @include('admin.layout.head')
    @yield('css')
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="flex-row d-flex flex-column-fluid page">
            @include('admin.layout.main-sidebar')
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('admin.layout.main-header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="py-2 subheader py-lg-4 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between">
                            <h5 class="text-dark font-weight-bold mb-0">@yield('page_title')</h5>
                        </div>
                    </div>
                    <div class="container-fluid px-3">
                        @include('admin.layout.error')
                    </div>
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
                @include('admin.layout.footer')
            </div>
        </div>
    </div>
    @include('admin.layout.script')
    @yield('js')
</body>
</html>
