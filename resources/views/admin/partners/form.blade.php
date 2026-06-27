@extends('admin.layout.master')
@section('page_title', $partner->exists ? 'تعديل شريك' : 'شريك جديد')
@section('content')
    <form method="post"
        action="{{ $partner->exists ? route('admin.partners.update', $partner) : route('admin.partners.store') }}"
        enctype="multipart/form-data" class="card card-custom">
        @csrf @if ($partner->exists)
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group"><label>الاسم</label><input name="name" class="form-control"
                    value="{{ old('name', $partner->name) }}" required dir="rtl"></div>
            <div class="form-group"><label>الوصف (يظهر تحت الاسم)</label><input name="description" class="form-control"
                    value="{{ old('description', $partner->description) }}" dir="rtl"></div>
            <div class="form-group"><label>الشعار</label><input type="file" name="logo"
                    {{ $partner->exists ? '' : 'required' }}>
                @if ($partner->logo)
                    <img src="{{ media_url($partner->logo) }}" height="60" class="d-block mt-2">
                @endif
            </div>
            <div class="form-group"><label>الموقع</label><input name="website_url" class="form-control"
                    value="{{ old('website_url', $partner->website_url) }}" dir="ltr"></div>
            <div class="form-group"><label>الترتيب</label><input type="number" name="sort_order" class="form-control"
                    value="{{ old('sort_order', $partner->sort_order ?? 0) }}"></div>
            <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1"
                    @checked(old('is_active', $partner->is_active ?? true))><label>نشط</label></div>
            <button class="btn btn-primary">حفظ</button>
        </div>
    </form>
@endsection
