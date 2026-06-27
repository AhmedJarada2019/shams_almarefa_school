<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول — لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.rtl.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            background: #f0f4ff;
        }

        /* Left decorative panel */
        .login-left {
            flex: 1;
            background: linear-gradient(145deg, #1a1464 0%, #3699FF 60%, #5b21b6 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
            position: relative;
            overflow: hidden;
        }
        .login-left::before {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            top: -100px; left: -100px;
        }
        .login-left::after {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            bottom: -80px; right: -60px;
        }
        .login-left .brand-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
            position: relative;
            z-index: 2;
            margin-bottom: 40px;
        }
        .login-left .brand-logo img {
            width: 90px;
            height: 90px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.25);
        }
        .login-left .brand-logo span {
            font-size: 26px;
            font-weight: 800;
            color: #fff;
            text-align: center;
            line-height: 1.3;
        }
        .login-left .tagline {
            color: rgba(255,255,255,0.8);
            font-size: 15px;
            text-align: center;
            position: relative;
            z-index: 2;
            line-height: 1.7;
            max-width: 320px;
        }
        .login-left .features {
            list-style: none;
            padding: 0;
            margin: 36px 0 0;
            position: relative;
            z-index: 2;
        }
        .login-left .features li {
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .login-left .features li i {
            width: 28px; height: 28px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px;
            color: #fff;
            flex-shrink: 0;
        }

        /* Right form panel */
        .login-right {
            width: 480px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #fff;
            padding: 48px 52px;
            box-shadow: -4px 0 24px rgba(0,0,0,0.08);
        }
        .login-right h2 {
            font-size: 24px;
            font-weight: 800;
            color: #1e1b4b;
            margin: 0 0 6px;
            text-align: center;
        }
        .login-right .sub {
            color: #6b7280;
            font-size: 14px;
            text-align: center;
            margin-bottom: 36px;
        }
        .form-label {
            font-weight: 600;
            font-size: 14px;
            color: #374151;
            margin-bottom: 6px;
        }
        .form-control {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 11px 16px;
            font-family: 'Cairo', sans-serif;
            font-size: 14px;
            transition: border-color .2s, box-shadow .2s;
            background: #f9fafb;
        }
        .form-control:focus {
            border-color: #3699FF;
            box-shadow: 0 0 0 3px rgba(54,153,255,0.12);
            background: #fff;
            outline: none;
        }
        .input-icon-wrap {
            position: relative;
        }
        .input-icon-wrap .icon {
            position: absolute;
            top: 50%; left: 14px;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 15px;
            pointer-events: none;
        }
        .input-icon-wrap .form-control {
            padding-left: 42px;
        }
        .btn-login {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: none;
            font-family: 'Cairo', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(135deg, #3699FF 0%, #1a5fb4 100%);
            cursor: pointer;
            transition: opacity .2s, transform .1s;
            box-shadow: 0 4px 14px rgba(54,153,255,0.35);
            margin-top: 8px;
        }
        .btn-login:hover { opacity: .92; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            color: #b91c1c;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }
        .remember-row input { accent-color: #3699FF; width: 16px; height: 16px; cursor: pointer; }
        .remember-row label { font-size: 13px; color: #6b7280; cursor: pointer; }

        @media (max-width: 900px) {
            .login-left { display: none; }
            .login-right { width: 100%; padding: 40px 28px; box-shadow: none; }
        }
    </style>
</head>
<body>

    {{-- Left Decorative Panel --}}
    <div class="login-left">
        <div class="brand-logo">
            <img src="{{ asset('frontend/imgs/ChatGPT Image Jun 5, 2026, 06_40_29 PM.png') }}" alt="شعار المدرسة">
            <span>مدرسة<br>شمس المعرفة</span>
        </div>
        <p class="tagline">منصة إدارة متكاملة لإدارة محتوى الأكاديمية والدورات والمستخدمين</p>
        <ul class="features">
            <li><i class="fas fa-book-open"></i> إدارة الدورات والمحتوى التعليمي</li>
            <li><i class="fas fa-users"></i> إدارة المشرفين والمستخدمين</li>
            <li><i class="fas fa-chart-bar"></i> متابعة الرسائل والإحصائيات</li>
            <li><i class="fas fa-cog"></i> ضبط إعدادات الموقع بالكامل</li>
        </ul>
    </div>

    {{-- Right Form Panel --}}
    <div class="login-right">
        <h2>مرحباً بعودتك 👋</h2>
        <p class="sub">أدخل بيانات حسابك للوصول إلى لوحة التحكم</p>

        @if($errors->any())
            <div class="alert-danger">
                <i class="fas fa-exclamation-circle me-1"></i>
                @foreach($errors->all() as $error){{ $error }}@endforeach
            </div>
        @endif

        <form method="post" action="{{ route('admin.login.submit') }}" style="width:100%;">
            @csrf

            <div class="mb-4">
                <label class="form-label">البريد الإلكتروني</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" name="email" class="form-control" dir="ltr"
                           value="{{ old('email') }}" placeholder="example@domain.com" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">كلمة المرور</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="password" class="form-control" dir="ltr"
                           placeholder="••••••••" required>
                </div>
            </div>

            <div class="remember-row">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">تذكرني على هذا الجهاز</label>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> تسجيل الدخول
            </button>
        </form>

        <p style="margin-top:32px;font-size:12px;color:#9ca3af;text-align:center;">
            © {{ date('Y') }} مدرسة شمس المعرفة — جميع الحقوق محفوظة
        </p>
    </div>

</body>
</html>
