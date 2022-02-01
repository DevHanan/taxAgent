

<script src="{{asset('front/js/jquery.js')}}" ></script>
<script src="{{asset('front/js/popper.js')}}" ></script>
<script src="{{asset('front/js/bootstrap.min.js')}}" ></script>
<script src="{{asset('front/js/jqueryValidate.min.js')}}" ></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}" ></script>
<script src="{{asset('front/js/fancybox.min.js')}}" ></script>
<script src="{{asset('front/js/bootstrap-select.js')}}" ></script>
<script src="{{asset('front/js/mCustomScrollbar.min.js')}}" ></script>
@stack('scripts')
@if(app()->getLocale()!="ar")
    <script src="{{asset('front/js/function-ltr.js')}}" ></script>
@else
    <script src="{{asset('front/js/function.js')}}" ></script>
@endif
