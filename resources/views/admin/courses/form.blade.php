@extends('admin.layout.master')
@section('page_title', $course->exists ? 'تعديل دورة' : 'إضافة دورة')
@section('content')
<form method="post" action="{{ $course->exists ? route('admin.courses.update', $course) : route('admin.courses.store') }}" enctype="multipart/form-data" class="card card-custom">
    @csrf
    @if($course->exists) @method('PUT') @endif
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="{{ old('title', $course->title) }}" required dir="rtl"></div>
        <div class="form-group"><label>الرابط (slug)</label><input name="slug" class="form-control" value="{{ old('slug', $course->slug) }}" dir="ltr"></div>
        <div class="form-group"><label>التصنيف</label>
            <select name="course_category_id" class="form-control"><option value="">—</option>
            @foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('course_category_id', $course->course_category_id)==$cat->id)>{{ $cat->name }}</option>@endforeach
            </select>
        </div>
        <div class="form-group"><label>مقتطف</label><textarea data-quill="true" name="excerpt" class="form-control" rows="2" dir="rtl">{{ old('excerpt', $course->excerpt) }}</textarea></div>
        <div class="form-group"><label>الوصف</label><textarea data-quill="true" name="description" class="form-control" rows="8" dir="rtl">{{ old('description', $course->description) }}</textarea></div>
        <div class="form-group"><label>المدة</label><input name="duration" class="form-control" value="{{ old('duration', $course->duration) }}" dir="rtl"></div>
        <div class="form-group"><label>صورة</label><input type="file" name="featured_image">@if($course->featured_image)<img src="{{ media_url($course->featured_image) }}" height="60" class="d-block mt-2">@endif</div>
        <div class="form-row">
            <div class="form-group col-md-4"><label>الحالة</label><select name="status" class="form-control"><option value="draft" @selected(old('status',$course->status)=='draft')>مسودة</option><option value="published" @selected(old('status',$course->status)=='published')>منشور</option></select></div>
            <div class="form-group col-md-4"><label>تاريخ النشر</label><input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', optional($course->published_at)->format('Y-m-d\TH:i')) }}"></div>
            <div class="form-group col-md-4"><label>الترتيب</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $course->sort_order ?? 0) }}"></div>
        </div>
        <div class="form-check mb-3"><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $course->is_featured))><label>مميزة في الرئيسية</label></div>
        <button class="btn btn-primary">حفظ</button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">رجوع</a>
    </div>
</form>
@endsection
