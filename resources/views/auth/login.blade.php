<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>لوحة تحكم موقع  {{$value->get('title_ar')}}     </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="shortcut icon" href="{{asset('logo.png')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('dashboard/css/vendors.bundle.rtl.css')}}">
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('dashboard/css/style.bundle.rtl.css')}}">
    <style>
        @import  url('https://fonts.googleapis.com/css?family=Mada:400,500|Cairo');
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2"
         id="m_login" >
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                @if(session()->has('logout'))

                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{session('logout')}}</strong>
                    </div>

                @endif

                <div class="m-login__logo">
                    <a href="http://arapeak.com/ar">
                        <img src="{{asset('storage/'.$value->get('logo'))}}" height="100px">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title" style="font-family: Mada,sans-serif;font-size: 23px;">لوحة تحكم موقع
                            {{$value->get('title_ar')}}</h3>
                    </div>
                    <form method="POST" action="{{route('login')}}" accept-charset="UTF-8" class="m-login__form m-form"><input name="_token" type="hidden" value="Z5gyl4Xa4jvmCYVCGEY0qk2wS6e3oBN2jqKQYq4a">
                        @csrf
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text"
                                   style="font-family: Mada,sans-serif;font-size: 15px;" placeholder="البريد الإلكتروني"
                                   name="email" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password"
                                   style="font-family: Mada,sans-serif;font-size: 15px;" placeholder="كلمة المرور"
                                   name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--focus"
                                       style="font-family: Mada,sans-serif;font-size: 14px;">
                                    <input type="checkbox" name="remember"> تذكرني
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn btn-danger btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn" style="font-family: Mada,sans-serif"> تسجيل الدخول</button>
                        </div>
                    </form>
                  {{--  @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('هل نسيت كلمة المرور ؟') }}
                        </a>
                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('dashboard/js/vendors.bundle.js')}}"></script>
<script src="{{asset('dashboard/js/scripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/js/login.js')}}"></script>
</body>

</html>