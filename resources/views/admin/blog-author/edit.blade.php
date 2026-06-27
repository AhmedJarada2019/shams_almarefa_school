@extends('admin.layout.master')
@section('page_title', 'الكاتب')
@section('content')
<form method="post" action="{{ route('admin.blog-author.update') }}" enctype="multipart/form-data" class="card card-custom">
    @csrf @method('PUT')
    <div class="card-body">
        <div class="form-group"><label>الاسم</label><input name="author_name" class="form-control" value="{{ old('author_name', $author['name']) }}" dir="rtl"></div>
        <div class="form-group"><label>المسمى</label><input name="author_title" class="form-control" value="{{ old('author_title', $author['title']) }}" dir="rtl"></div>
        <div class="form-group"><label>نبذة</label><textarea data-quill="true" name="author_bio" class="form-control" rows="4" dir="rtl">{{ old('author_bio', $author['bio']) }}</textarea></div>
        <div class="form-group"><label>الصورة</label><input type="file" name="author_image">@if(!empty($author['image']))<img src="{{ media_url($author['image']) }}" height="60" class="mt-2">@endif</div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
@endsection
