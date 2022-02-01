<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('front_includes.head')
<body>
<div class="brk-loader">
    <div class="brk-loader__loader"></div>
</div>
<div class="main-wrapper">

    @include('front_includes.header')

    @yield('content')

   @include('front_includes.footer')


    <div class="backTop">
        <div class="d-flex">
            <a href="https://api.whatsapp.com/send?phone={{$value->get('whatsapp')}}&text=مرحبا..%0aانا%20مهتم%20بالعمل%20معكم..%0a&source=&data=" target="_blank"><img src="/front/images/Whatsapp.png" alt=""></a>
            <a href="" target="_blank"><img src="/front/images/messanger.png" alt=""></a>
        </div>
    </div>

</div>
@include('front_includes.scripts')
</body>

</html>