@extends('admin.layout.master')
@section('page_title', 'الرسائل')
@section('content')
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th>البريد</th><th>مقروء</th><th></th></tr></thead>
<tbody>@foreach($messages as $message)<tr class="{{ $message->is_read ? '' : 'font-weight-bold' }}">
<td>{{ $message->id }}</td><td>{{ $message->name }}</td><td>{{ $message->email }}</td><td>{{ $message->is_read ? 'نعم' : 'لا' }}</td>
<td><a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-light-primary">عرض</a></td>
</tr>@endforeach</tbody></table>{{ $messages->links() }}</div></div>
@endsection
