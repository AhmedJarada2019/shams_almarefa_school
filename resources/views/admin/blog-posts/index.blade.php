@extends('admin.layout.master')
@section('page_title', 'المقالات')
@section('content')
<div class="mb-3"><a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary">مقال جديد</a></div>
<div class="card card-custom"><div class="card-body table-responsive">
<table class="table table-bordered"><thead><tr><th>#</th><th>العنوان</th><th>التصنيف</th><th>الحالة</th><th></th></tr></thead>
<tbody>@foreach($posts as $post)<tr><td>{{ $post->id }}</td><td>{{ $post->title }}</td><td>{{ $post->category?->name }}</td><td>{{ $post->status }}</td><td>
<a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn btn-sm btn-light-primary">تعديل</a>
<form action="{{ route('admin.blog-posts.destroy', $post) }}" method="post" class="d-inline" onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button class="btn btn-sm btn-light-danger">حذف</button></form>
</td></tr>@endforeach</tbody></table>{{ $posts->links() }}</div></div>
@endsection
