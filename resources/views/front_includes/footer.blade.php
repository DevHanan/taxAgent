<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="logo mb-3">
                    <a href="index.html">
                        <img src="/front/images/logo.png" alt="">
                    </a>
                </div>
                <p class="info pl-4">
                 {!! \app()->getLocale()==="en" ?$value->get('description_en')  :$value->get('description_ar')!!}
                </p>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="title-footer">
                    <h3>@lang('pages')</h3>
                </div>
                <ul class="link-footer">
                    <li>
                        <a href="/"> @lang('home') </a>
                    </li>
                    <li>
                        <a href="/posts">  @lang('blog')  </a>
                    </li>
                    <li>
                        <a href="/courses"> @lang('courses')   </a>
                    </li>
                    <li>
                        <a href="/usage">   @lang('privacy')  </a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="title-footer">
                    <h3> </h3>
                </div>
                <ul class="link-footer">
                    <li>
                        <a href="/services"> @lang('services')  </a>
                    </li>
                    <li>
                        <a href="/clients"> @lang('clients') </a>
                    </li>
                    <li>
                        <a href="/products"> @lang('market') </a>
                    </li>
                    <li>
                        <a href="/contact_us"> @lang('contact_us')</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="title-footer">
                    <h3> @lang('sm') </h3>
                </div>
                <ul class="socail">
                    <li class="face">
                        <a href="{{$value->get('facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="tw">
                        <a href="{{$value->get('twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="you">
                        <a href="{{$value->get('youtube')}}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li class="face">
                        <a href="{{$value->get('instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->