@extends('admin.layout.master')
@section('page_title', $post->exists ? 'تعديل مقال' : 'مقال جديد')
@section('content')
<form method="post" action="{{ $post->exists ? route('admin.blog-posts.update', $post) : route('admin.blog-posts.store') }}" enctype="multipart/form-data" class="card card-custom">
    @csrf @if($post->exists) @method('PUT') @endif
    <div class="card-body">
        <div class="form-group"><label>العنوان</label><input name="title" class="form-control" value="{{ old('title', $post->title) }}" required dir="rtl"></div>
        <div class="form-group"><label>الرابط</label><input name="slug" class="form-control" value="{{ old('slug', $post->slug) }}" dir="ltr"></div>
        <div class="form-group"><label>التصنيف</label><select name="blog_category_id" class="form-control"><option value="">—</option>@foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('blog_category_id', $post->blog_category_id)==$cat->id)>{{ $cat->name }}</option>@endforeach</select></div>
        <div class="form-group"><label>مقتطف</label><textarea data-quill="true" name="excerpt" class="form-control" rows="2" dir="rtl">{{ old('excerpt', $post->excerpt) }}</textarea></div>
        <div class="form-group"><label>المحتوى</label><textarea data-quill="true" name="content" class="form-control" rows="10" dir="rtl">{{ old('content', $post->content) }}</textarea></div>
        <div class="form-group"><label>صورة</label><input type="file" name="featured_image">@if($post->featured_image)<img src="{{ media_url($post->featured_image) }}" height="60" class="d-block mt-2">@endif</div>
        <div class="form-row">
            <div class="form-group col-md-6"><label>الحالة</label><select name="status" class="form-control"><option value="draft" @selected(old('status',$post->status)=='draft')>مسودة</option><option value="published" @selected(old('status',$post->status)=='published')>منشور</option></select></div>
            <div class="form-group col-md-6"><label>تاريخ النشر</label><input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"></div>
        </div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
@endsection
