@extends('admin.layout.master')
@section('page_title', 'الشركاء')
@section('content')
<div class="mb-3"><a href="{{ route('admin.partners.create') }}" class="btn btn-primary">شريك جديد</a></div>
<p class="text-muted">يظهرون في الصفحة الرئيسية بشكل دوّار (نفس تصميم المدربين).</p>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th>الشعار</th><th></th></tr></thead>
<tbody>@foreach($partners as $partner)<tr>
<td>{{ $partner->id }}</td><td>{{ $partner->name }}</td>
<td>@if($partner->logo)<img src="{{ media_url($partner->logo) }}" height="40">@endif</td>
<td><a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="{{ route('admin.partners.destroy', $partner) }}" method="post" class="d-inline" onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button class="btn btn-sm btn-light-danger">حذف</button></form></td>
</tr>@endforeach</tbody></table>{{ $partners->links() }}</div></div>
@endsection
