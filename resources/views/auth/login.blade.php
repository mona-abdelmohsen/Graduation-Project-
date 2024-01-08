<!DOCTYPE html>
<html lang="arabic">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>

    @include('layouts.css_links')
    <link rel="stylesheet" href="{{asset('assets/css/sakany(register).css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/sakany(login).css') }}">


</head>

<body>
    <div class="container">
        <svg id="visual" viewBox="0 0 900 530" width="900" height="530" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
            <path
                d="M648 540L620.8 522C593.7 504 539.3 468 514.5 432C489.7 396 494.3 360 524.8 324C555.3 288 611.7 252 608.7 216C605.7 180 543.3 144 540.3 108C537.3 72 593.7 36 621.8 18L650 0L960 0L960 18C960 36 960 72 960 108C960 144 960 180 960 216C960 252 960 288 960 324C960 360 960 396 960 432C960 468 960 504 960 522L960 540Z"
                fill="#fff" stroke-linecap="round" stroke-linejoin="miter"></path>
        </svg>
        <div class="left">
            <h1>
                سكٌنى يساعد الطلاب علي إيجاد أفضل الأماكن المناسبة
            </h1>
        </div>
        <form class="right" method="POST" action="{{ route('login') }}">
            @csrf
            <img class="img_1" src="{{ asset('assets/images/logo sakany.png') }}" alt="">
            <h1> تسجيل الدخول</h1>
            <div class="input_label">
                <label for="userName">:البريد الالكتروني</label>
                <input id="email" type="email" style="border: 1px solid #c9c6c6;" class="form-control @error('email') is-invalid @enderror "name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="ادخل البريد الالكتروني" required>
                @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
            </div>

            <div class="input_label">
                <label for="password">:كلمة السر</label>
                <input placeholder="ادخل كلمة السر" style="border: 1px solid #c9c6c6;"  id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password"  autocomplete="new-password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>


            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 forget"
                    style="padding-top: 5px ; color:blue" href="{{ route('password.request') }}">
                    {{ __('هل نسيت كلمة السر ؟') }}
                </a>
            @endif
            <span>هل ليس لديك حساب ؟<a href="{{ route('register') }}" style="color:blue;"> انشاء حساب   </a></span>

            <button class="login" type="submit"><span id="login">تسجيل الدخول</span> </button>
            <img class="img_2" src="{{ asset('assets/images/img (3).png') }}" alt="">
        </form>
        @include('layouts.js_links')
        <script src="{{URL::asset('assets/js/all.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{ url('assets/js/login.js') }}"></script>
</body>

</html>
