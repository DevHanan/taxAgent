<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> {{app()->getLocale()=="ar"?$value->get('title_ar'):$value->get('title_en')}} </title>
    <meta name="description" content="{{app()->getLocale()=="ar"?$value->get('description_ar'):$value->get('description_en')}}" />
    <meta name="copyright" content="{{app()->getLocale()=="ar"?$value->get('copy_rights_ar'):$value->get('copy_rights_en')}}" />
    <link rel="shortcut icon" href="{{asset('storage/'.$value->get('logo'))}}" />
    <link rel="stylesheet" href="{{asset('front/css/mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style-font.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/fontawesome.css')}}" />
    @if(app()->getLocale()!="ar")
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('front/css/main.css')}}" />
        <link rel="stylesheet" href="{{asset('front/css/main-ltr.css')}}" />
    @else
        <link rel="stylesheet" href="{{asset('front/css/bootstrap-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/main.css')}}" />
    @endif

    @stack('css')
    
    <style>
        .section_service .item img , .header_service .image img{
        
            filter:none;
        }
    </style>
</head>
