@extends('admin.layout.master')
@section('page_title', 'الدورات')
@section('content')
<div class="mb-3"><a href="{{ route('admin.courses.create') }}" class="btn btn-primary">إضافة دورة</a></div>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>العنوان</th><th>التصنيف</th><th>الحالة</th><th></th></tr></thead>
<tbody>
@foreach($courses as $course)
<tr>
<td>{{ $course->id }}</td>
<td>{{ $course->title }}</td>
<td>{{ $course->category?->name }}</td>
<td>{{ $course->status }}</td>
<td>
<a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="{{ route('admin.courses.destroy', $course) }}" method="post" class="d-inline" onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button class="btn btn-sm btn-light-danger">حذف</button></form>
</td>
</tr>
@endforeach
</tbody></table>
{{ $courses->links() }}
</div></div>
@endsection
