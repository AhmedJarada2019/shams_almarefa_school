<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center">
            <h4 class="text-dark font-weight-bold mb-0">مدرسة شمس المعرفة — لوحة التحكم</h4>
        </div>
        <div class="topbar d-flex align-items-center">
            <span class="text-muted mr-4">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-light-primary">تسجيل الخروج</button>
            </form>
        </div>
    </div>
</div>
