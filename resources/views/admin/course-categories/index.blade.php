@extends('admin.layout.master')
@section('page_title', 'تصنيفات الدورات')
@section('content')
<div class="mb-3"><a href="{{ route('admin.course-categories.create') }}" class="btn btn-primary">إضافة</a></div>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th>الرابط</th><th></th></tr></thead>
<tbody>@foreach($categories as $item)<tr><td>{{ $item->id }}</td><td>{{ $item->name }}</td><td>{{ $item->slug }}</td><td>
<a href="{{ route('admin.course-categories.edit', $item) }}" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="{{ route('admin.course-categories.destroy', $item) }}" method="post" class="d-inline" onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button class="btn btn-sm btn-light-danger">حذف</button></form>
</td></tr>@endforeach</tbody></table>{{ $categories->links() }}</div></div>
@endsection
