@extends('admin.layout.master')
@section('page_title', 'مكتبة الوسائط')
@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.media-items.create') }}" class="btn btn-primary">إضافة وسيط</a>
    </div>
    <div class="card card-custom">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>النوع</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                <a href="{{ route('admin.media-items.edit', $item) }}"
                                    class="btn btn-sm btn-light-primary">تعديل</a>
                                <form action="{{ route('admin.media-items.destroy', $item) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('حذف؟')">@csrf @method('DELETE')<button
                                        class="btn btn-sm btn-light-danger">حذف</button></form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>{{ $items->links() }}
        </div>
    </div>
@endsection
