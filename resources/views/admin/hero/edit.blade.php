@extends('admin.layout.master')
@section('page_title', 'قسم البطل')
@section('content')
<form method="post" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="card card-custom">
    @csrf @method('PUT')
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="{{ old('title', $hero->title) }}" required dir="rtl"></div>
        <div class="form-group"><label>العنوان الفرعي</label><input name="subtitle" class="form-control" value="{{ old('subtitle', $hero->subtitle) }}" dir="rtl"></div>
        <div class="form-group"><label>الوصف</label><textarea data-quill="true" name="description" class="form-control" rows="4" dir="rtl">{{ old('description', $hero->description) }}</textarea></div>
        <div class="form-row">
            <div class="form-group col-md-6"><label>نص الزر</label><input name="button_text" class="form-control" value="{{ old('button_text', $hero->button_text) }}" dir="rtl"></div>
            <div class="form-group col-md-6"><label>رابط الزر</label><input name="button_url" class="form-control" value="{{ old('button_url', $hero->button_url) }}" dir="ltr"></div>
        </div>
        <div class="form-group"><label>الصورة</label><input type="file" name="image" class="form-control-file">@if($hero->image)<img src="{{ media_url($hero->image) }}" height="80" class="mt-2">@endif</div>
        <div class="form-check"><input type="checkbox" name="is_active" value="1" class="form-check-input" @checked(old('is_active', $hero->is_active))><label class="form-check-label">نشط</label></div>
        <button class="btn btn-primary mt-3">حفظ</button>
    </div>
</form>
@endsection
