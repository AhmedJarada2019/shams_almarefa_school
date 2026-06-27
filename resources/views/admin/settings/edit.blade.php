@extends('admin.layout.master')
@section('page_title', 'إعدادات '.$group)
@section('content')
<form method="post" action="{{ route('admin.settings.update', $group) }}" class="card card-custom">
    @csrf @method('PUT')
    <div class="card-body">
        @foreach($values as $key => $value)
            <div class="form-group">
                <label>{{ $key }}</label>
                <input name="{{ $key }}" class="form-control" value="{{ old($key, $value) }}" dir="rtl">
            </div>
        @endforeach
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
@endsection
