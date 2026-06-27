@extends('admin.layout.master')
@section('page_title', 'إعدادات اتصل بنا')
@section('content')
<form method="post" action="{{ route('admin.contact-settings.update') }}" class="card card-custom">
    @csrf @method('PUT')
    <div class="card-body">
        @foreach($contact as $key => $value)
            <div class="form-group">
                <label>{{ $key }}</label>
                @if($key === 'map_embed')
                    <textarea name="{{ $key }}" class="form-control" rows="4" dir="ltr">{{ old($key, $value) }}</textarea>
                @else
                    <input name="{{ $key }}" class="form-control" value="{{ old($key, $value) }}" dir="rtl">
                @endif
            </div>
        @endforeach
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
@endsection
