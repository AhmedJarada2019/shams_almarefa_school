@extends('admin.layout.master')
@section('page_title', 'من نحن')
@section('content')
<form method="post" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="card card-custom">
    @csrf @method('PUT')
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="{{ old('title', $about->title) }}" required dir="rtl"></div>
        <div class="form-group"><label>المحتوى</label><textarea data-quill="true" name="content" class="form-control" rows="10" required dir="rtl">{{ old('content', $about->content) }}</textarea></div>
        <div class="form-group"><label>الصورة</label><input type="file" name="image" class="form-control-file">@if($about->image)<img src="{{ media_url($about->image) }}" height="80" class="mt-2">@endif</div>
        <div class="form-group"><label>عنوان SEO</label><input name="meta_title" class="form-control" value="{{ old('meta_title', $about->meta_title) }}" dir="rtl"></div>
        <div class="form-group"><label>وصف SEO</label><textarea data-quill="true" name="meta_description" class="form-control" rows="2" dir="rtl">{{ old('meta_description', $about->meta_description) }}</textarea></div>
        <div class="form-check"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $about->is_active))><label>نشط</label></div>
        <button class="btn btn-primary mt-3">حفظ</button>
    </div>
</form>
@endsection
