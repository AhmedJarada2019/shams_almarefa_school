@extends('admin.layout.master')
@section('page_title', 'إدارة المشرفين')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="font-weight-bold text-dark mb-1">المشرفون</h5>
        <span class="text-muted" style="font-size:13px;">إجمالي المشرفين: <strong>{{ $users->total() }}</strong></span>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fas fa-user-plus mr-2"></i> مشرف جديد
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
@endif

<div class="card card-custom shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background: linear-gradient(135deg, #3699FF 0%, #1a5fb4 100%);">
                    <tr>
                        <th class="text-white border-0 py-3 px-4" style="width:50px;">#</th>
                        <th class="text-white border-0 py-3">المشرف</th>
                        <th class="text-white border-0 py-3">البريد الإلكتروني</th>
                        <th class="text-white border-0 py-3 text-center">الحالة</th>
                        <th class="text-white border-0 py-3 text-center">تاريخ الإنشاء</th>
                        <th class="text-white border-0 py-3 text-center" style="width:160px;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="{{ $user->id === auth()->id() ? 'table-light' : '' }}">
                        <td class="px-4 py-3 text-muted">{{ $user->id }}</td>
                        <td class="py-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-35 symbol-light-primary mr-3">
                                    <span class="symbol-label font-weight-bold"
                                        style="width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,#3699FF,#1a5fb4);color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:15px;">
                                        {{ mb_substr($user->name, 0, 1) }}
                                    </span>
                                </div>
                                <div class="mr-2">
                                    <span class="font-weight-bold text-dark">{{ $user->name }}</span>
                                    @if($user->id === auth()->id())
                                        <span class="label label-sm label-light-success ml-2">أنت</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="py-3" dir="ltr">{{ $user->email }}</td>
                        <td class="py-3 text-center">
                            @if($user->is_active)
                                <span class="label label-lg label-light-success label-inline">
                                    <i class="fas fa-circle text-success mr-1" style="font-size:8px;"></i> نشط
                                </span>
                            @else
                                <span class="label label-lg label-light-danger label-inline">
                                    <i class="fas fa-circle text-danger mr-1" style="font-size:8px;"></i> معطّل
                                </span>
                            @endif
                        </td>
                        <td class="py-3 text-center text-muted" style="font-size:13px;">
                            {{ $user->created_at?->format('Y/m/d') ?? '—' }}
                        </td>
                        <td class="py-3 text-center">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-light-primary mr-1" title="تعديل">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="d-inline"
                                  onsubmit="return confirm('هل أنت متأكد من حذف هذا المشرف؟')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-light-danger" title="حذف">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            @else
                            <button class="btn btn-sm btn-secondary" disabled title="لا يمكن حذف حسابك">
                                <i class="fas fa-lock"></i>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-users fa-3x mb-3 d-block opacity-30"></i>
                            لا يوجد مشرفون بعد
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($users->hasPages())
    <div class="card-footer d-flex justify-content-center py-3">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
