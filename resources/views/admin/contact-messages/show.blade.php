@extends('admin.layout.master')
@section('page_title', 'رسالة #'.$message->id)
@section('content')
<div class="card card-custom"><div class="card-body">
<p><strong>الاسم:</strong> {{ $message->name }}</p>
<p><strong>البريد:</strong> {{ $message->email }}</p>
@if($message->phone)<p><strong>الهاتف:</strong> {{ $message->phone }}</p>@endif
@if($message->subject)<p><strong>الموضوع:</strong> {{ $message->subject }}</p>@endif
<p><strong>الرسالة:</strong></p>
<p>{{ $message->message }}</p>
<form action="{{ route('admin.contact-messages.destroy', $message) }}" method="post" onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button class="btn btn-danger">حذف</button></form>
</div></div>
@endsection
