<head>
    <meta charset="utf-8" />
    <title>      لوحةالتحكم | @yield('title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="{{asset('dashboard/css/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

     <link href="{{asset('dashboard/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{asset('storage/'.$value->get('logo'))}}" />

    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
    @stack('css')
</head>