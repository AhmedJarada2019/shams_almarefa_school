@extends('admin.layout.master')
@section('page_title', $item->exists ? 'تعديل وسيط' : 'وسيط جديد')
@section('content')
    <form method="post"
        action="{{ $item->exists ? route('admin.media-items.update', $item) : route('admin.media-items.store') }}"
        enctype="multipart/form-data" class="card card-custom">
        @csrf @if ($item->exists)
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group"><label>العنوان</label><input name="title" class="form-control"
                    value="{{ old('title', $item->title) }}" required dir="rtl"></div>
            <div class="form-group"><label>التصنيف</label><select name="media_category_id" class="form-control">
                    <option value="">—</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('media_category_id', $item->media_category_id) == $cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select></div>
            <div class="form-group"><label>النوع</label><select name="type" class="form-control">
                    <option value="image" @selected(old('type', $item->type) == 'image')>صورة</option>
                    <option value="video" @selected(old('type', $item->type) == 'video')>فيديو</option>
                </select></div>
            <div class="form-group"><label>الملف</label><input type="file" name="file"
                    {{ $item->exists ? '' : 'required' }}></div>
            <div class="form-group"><label>صورة مصغرة</label><input type="file" name="thumbnail"></div>

             @if ($item->thumbnail_path)
                    <img src="{{ media_url($item->thumbnail_path) }}" height="60" class="d-block mt-2">
                @endif
            <div class="form-group"><label>رابط فيديو خارجي (embed)</label><input name="external_url" class="form-control"
                    value="{{ old('external_url', $item->external_url) }}" dir="ltr"></div>
            <div class="form-group"><label>الوصف</label>
                <textarea data-quill="true" name="description" class="form-control" dir="rtl">{{ old('description', $item->description) }}</textarea>
            </div>
            <div class="form-group"><label>الترتيب</label><input type="number" name="sort_order" class="form-control"
                    value="{{ old('sort_order', $item->sort_order ?? 0) }}"></div>
            <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1"
                    @checked(old('is_active', $item->is_active ?? true))><label>نشط</label></div>
            <button class="btn btn-primary">حفظ</button>
        </div>
    </form>
@endsection
