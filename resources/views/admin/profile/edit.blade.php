@extends('admin.layout.master')
@section('page_title', 'ملفي')
@section('content')
<form method="post" action="{{ route('admin.profile.update') }}" class="card card-custom">
    @csrf @method('PUT')
    <div class="card-body">
        <div class="form-group"><label>الاسم</label><input name="name" class="form-control" value="{{ old('name', $user->name) }}" required dir="rtl"></div>
        <div class="form-group"><label>البريد</label><input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required dir="ltr"></div>
        <div class="form-group"><label>كلمة المرور الجديدة</label><input type="password" name="password" class="form-control" dir="ltr"></div>
        <div class="form-group"><label>تأكيد كلمة المرور</label><input type="password" name="password_confirmation" class="form-control" dir="ltr"></div>
        <button class="btn btn-primary">حفظ</button>
    </div>
</form>
@endsection
