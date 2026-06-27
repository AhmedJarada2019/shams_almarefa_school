@extends('admin.layout.master')
@section('page_title', $user->exists ? 'تعديل مشرف' : 'إضافة مشرف جديد')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">

        {{-- Breadcrumb --}}
        <div class="mb-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light">
                <i class="fas fa-arrow-right ml-1"></i> العودة للقائمة
            </a>
        </div>

        <div class="card card-custom shadow-sm">
            {{-- Card Header --}}
            <div class="card-header" style="background: linear-gradient(135deg, #3699FF 0%, #1a5fb4 100%); border-radius: 8px 8px 0 0;">
                <div class="d-flex align-items-center py-1">
                    <div style="width:40px;height:40px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;" class="mr-3">
                        <i class="fas {{ $user->exists ? 'fa-user-edit' : 'fa-user-plus' }} text-white" style="font-size:18px;"></i>
                    </div>
                    <div>
                        <h5 class="text-white mb-0 font-weight-bold">{{ $user->exists ? 'تعديل بيانات المشرف' : 'إضافة مشرف جديد' }}</h5>
                        @if($user->exists)
                            <small class="text-white-50">{{ $user->email }}</small>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-6">

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-5">
                        <strong><i class="fas fa-exclamation-triangle mr-2"></i>يوجد أخطاء:</strong>
                        <ul class="mb-0 mt-2 pr-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                @endif

                <form method="post"
                      action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}">
                    @csrf
                    @if($user->exists) @method('PUT') @endif

                    {{-- Name --}}
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-user text-primary mr-1"></i> الاسم الكامل
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" dir="rtl"
                               class="form-control form-control-solid @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}"
                               placeholder="أدخل الاسم الكامل" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-envelope text-primary mr-1"></i> البريد الإلكتروني
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" name="email" dir="ltr"
                               class="form-control form-control-solid @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}"
                               placeholder="example@domain.com" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-lock text-primary mr-1"></i> كلمة المرور
                            @if(!$user->exists) <span class="text-danger">*</span> @endif
                        </label>
                        <div class="input-group">
                            <input type="password" name="password" dir="ltr" id="passwordInput"
                                   class="form-control form-control-solid @error('password') is-invalid @enderror"
                                   placeholder="{{ $user->exists ? 'اتركها فارغة إن لم تُرد التغيير' : 'أدخل كلمة مرور قوية' }}"
                                   {{ $user->exists ? '' : 'required' }}>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        @if($user->exists)
                            <small class="text-muted"><i class="fas fa-info-circle mr-1"></i>اتركها فارغة إن لم تُرد تغيير كلمة المرور</small>
                        @endif
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="form-group mb-5">
                        <label class="font-weight-bold text-dark">
                            <i class="fas fa-lock text-primary mr-1"></i> تأكيد كلمة المرور
                        </label>
                        <input type="password" name="password_confirmation" dir="ltr"
                               class="form-control form-control-solid"
                               placeholder="أعد إدخال كلمة المرور">
                    </div>

                    {{-- Status --}}
                    <div class="form-group mb-6">
                        <label class="font-weight-bold text-dark d-block mb-3">
                            <i class="fas fa-toggle-on text-primary mr-1"></i> حالة الحساب
                        </label>
                        <div class="d-flex align-items-center">
                            <span class="switch switch-primary switch-lg">
                                <label>
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1"
                                           @checked(old('is_active', $user->is_active ?? true))>
                                    <span></span>
                                </label>
                            </span>
                            <span class="mr-3 font-weight-500">تفعيل الحساب (السماح بتسجيل الدخول)</span>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="separator separator-dashed mb-5"></div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light font-weight-bold px-6">
                            إلغاء
                        </a>
                        <button type="submit" class="btn btn-primary font-weight-bold px-6">
                            <i class="fas fa-save mr-2"></i>
                            {{ $user->exists ? 'حفظ التغييرات' : 'إنشاء المشرف' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
@endpush
@endsection
