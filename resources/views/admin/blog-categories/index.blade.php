@extends('admin.layout.master')
@section('page_title', 'تصنيفات المدونة')
@section('content')
<div class="mb-3"><a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">إضافة</a></div>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>الاسم</th><th></th></tr></thead>
<tbody>@foreach($categories as $item)<tr><td>{{ $item->id }}</td><td>{{ $item->name }}</td><td>
<a href="{{ route('admin.blog-categories.edit', $item) }}" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="{{ route('admin.blog-categories.destroy', $item) }}" method="post" class="d-inline" onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button class="btn btn-sm btn-light-danger">حذف</button></form>
</td></tr>@endforeach</tbody></table>{{ $categories->links() }}</div></div>
@endsection
