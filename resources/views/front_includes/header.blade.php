<div class="mobile-menu-overlay"></div>

<div class="menu-mobile">
    <i class="fas fa-times p-2"></i>
    <ul class="menu">
        <li>
            <a href="/" class="active"><i class="icon-home"></i><span> @lang('home') </span></a>
        </li>
        <li>
            <a href="{{url('/posts')}}"><i class="icon-blog-svgrepo-com"></i><span> @lang('blog') </span></a>
        </li>
        <li>
            <a href="{{url('/courses')}}"><i class="icon-projects"></i><span> @lang('courses') </span></a>
        </li>
        <li>
            <a href="{{url('/playlists')}}"><i class="fas fa-film"></i><span> @lang('playlists') </span></a>
        </li>
        <li>
            <a href="{{url('/services')}}"><i class="icon-jobs"></i><span> @lang('services') </span></a>
        </li>
        <li>
            <a href="{{url('/clients')}}"><i class="icon-users"></i><span> @lang('clients') </span></a>
        </li>
        <li>
            <a href="{{url('/products')}}"><i class="icon-shopping-cart"></i><span> @lang('market') </span></a>
        </li>
        <li>
            <a href="/calc"><i class="fas fa-calculator color-gray"></i><span> @lang('calc')</span></a>
        </li>
        <li>
            <a href="{{url('/contact_us')}}"><i class="icon-envelope"></i><span> @lang('contact_us') </span></a>
        </li>
        <li>
            <a href="{{url('/change_lang')}}"><span>  {{app()->getLocale()=="ar"?'En':'العربية'}} </span></a>
        </li>
        @if(auth()->guard('client')->check()==true)

            <li>
                <a><span> محمد احمد  </span></a>
            </li>

            @else

            <li>
                <a href="{{url('/login/client')}}" class="login mr-1"><i class="icon-login"></i><span> @lang('login') </span></a>
            </li>
            <li>
                <a href="{{url('/register/client')}}" class="regsiter"><img src="/front/images/img_26.png" alt=""><span> @lang('register') </span></a>
            </li>

        @endif

    </ul>
</div>

<header class="main-header ">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="logo">
                <a href="/">
                    <img src="/front/images/logo.png" alt="" />
                </a>
            </div>
            <div class="menu-container d-flex ml-auto">
                <ul class="main-menu main-nav d-none d-lg-flex align-items-center">
                    <li>
                        <a href="{{url('/')}}" ><i class="icon-home"></i><span> @lang('home') </span></a>
                    </li>
                    <li>
                        <a href="{{url('/posts/')}}"><i class="icon-blog-svgrepo-com"></i><span>  @lang('blog') </span></a>
                    </li>
                    <li>
                        <a href="{{url('/courses')}}"><i class="icon-projects"></i><span> @lang('courses') </span></a>
                    </li>

                    <li>
                        <a href="{{url('/services')}}"><i class="icon-jobs"></i><span> @lang('services')  </span></a>
                    </li>
                    <li>
                        <a href="{{url('/clients')}}"><i class="icon-users"></i><span>  @lang('clients')  </span></a>
                    </li>
                    <li>
                        <a href="{{url('/products')}}"><i class="icon-shopping-cart"></i><span>  @lang('market')  </span></a>
                    </li>
                    <li>
                        <a href="/calc"><i class="fas fa-calculator color-gray"></i><span> @lang('calc')  </span></a>
                    </li>
                    <li>
                        <a href="{{url('/playlists')}}"><i class="fas fa-film"></i><span> @lang('playlists') </span></a>
                    </li>
                 {{--   <li>
                        <a href="{{url('/contact_us')}}"><i class="icon-envelope"></i><span> @lang('contact_us')  </span></a>
                    </li>--}}
                    <li>
                        <a href="{{url('/change_lang')}}"><span> {{app()->getLocale()=="ar"?'En':'العربية'}} </span></a>
                    </li>

                    @if(auth()->guard('client')->check()==true)

                        <li>
                            <div class="header__topbar">
                                <div class="header__topbar-item dropdown p-1">
                                    <div class="header__topbar-wrapper" data-toggle="dropdown" aria-expanded="false">
                      <span class="header__topbar-icon kt-pulse kt-pulse--brand mr-2">
                        <img src="{{auth("client")->user()->image['name']==null?asset('avatar.png'):asset('storage/'.auth("client")->user()->image['name'])}}" alt="" class="header__topbar-icon-image img-fluid">
                      </span>
                                        {{\Illuminate\Support\Facades\Auth::guard('client')->user()->name }}
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit   dropdown-menu-lg">
                                        <div class="a-notification ">
                                            <a href="{{route('client.edit',auth('client')->user()->name)}}" class="a-notification__item">
                                                <div class="a-notification__item-details">
                                                    <div class="a-notification__item-title">
                                                       بيانات الحساب
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="a-notification__item">
                                                <div class="a-notification__item-details">
                                                    <div class="a-notification__item-title">
                                                        @lang('logOut')
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @else

                        <li>
                            <a href="{{url('/login/client')}}" class="login mr-1"><i class="icon-login"></i><span> @lang('login') </span></a>
                        </li>
                        <li>
                            <a href="{{url('/register/client')}}" class="regsiter"><img src="/front/images/img_26.png" alt=""><span> @lang('register') </span></a>
                        </li>

                    @endif


                </ul>
    <!--            <div class="search_website ml-2">
                    <a class="link-search"><i class="fa fa-search"></i></a>
                    <form action="" class="inner_search_website">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="ابحث هنا ...">
                        </div>
                        <div class="form-group mb-0">
                            <button href="" class="btn btn-success w-100"> بحث</button>
                        </div>
                    </form>
                </div>-->
            </div>
            <a class="d-block d-lg-none ml-2" href="#menu" id="toggle"><span></span></a>
        </div>
    </div>
</header>
<!-- end header -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>