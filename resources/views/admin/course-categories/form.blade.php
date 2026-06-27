@extends('admin.layout.master')
@section('page_title', $category->exists ? 'تعديل تصنيف' : 'تصنيف جديد')
@section('content')
<form method="post" action="{{ $category->exists ? route('admin.course-categories.update', $category) : route('admin.course-categories.store') }}" class="card card-custom">
    @csrf @if($category->exists) @method('PUT') @endif
    <div class="card-body">
        <div class="form-group"><label>الاسم</label><input name="name" class="form-control" value="{{ old('name', $category->name) }}" required dir="rtl"></div>
        <div class="form-group"><label>الرابط</label><input name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" dir="ltr"></div>
        <div class="form-group"><label>الوصف</label><textarea data-quill="true" name="description" class="form-control" dir="rtl">{{ old('description', $category->description) }}</textarea></div>
        <div class="form-group"><label>الترتيب</label><input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $category->sort_order ?? 0) }}"></div>
        <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $category->is_active ?? true))><label>نشط</label></div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
@endsection
