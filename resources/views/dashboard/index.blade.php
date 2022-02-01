@extends('layouts.dashboard')

    @section('title')
       لوحة التحكم
    @endsection

    @section('path')
        <li class="m-nav__item">
            <a href="{{url('admin/')}}" class="m-nav__link">
                <span class="m-nav__link-text">@yield('title')</span>
            </a>
        </li>
    @endsection

    @section('content')

        @push('css')
            <style>
                .card{
                    transition: 0.6s ease;
                }
                .card:hover
                {
                    box-shadow: 0.5px 0.5px 1px 1.5px rgba(0,0,0,0.2);
                    font-weight: bold;
                    font-size: large;
                }
            </style>
        @endpush
        @if(session()->has('login'))
            <div class="alert alert-success alert-dismissible row">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('login')}}</strong>
            </div>
        @endif
        <div class="row text-center">
            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('roles.index')}}" style="text-decoration: none;" >
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fas fa-user-shield fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">صلاحيات المستخدمين</h6>
                            <h1 class="display-4">{{Spatie\Permission\Models\Role::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->
            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('users.index')}}" style="text-decoration: none;" >
                    <div class="card bg-info text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fas fa-user-tie fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">المستخدمين</h6>
                            <h1 class="display-4">{{\App\Album::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->


            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('clients.index')}}" style="text-decoration: none;" >
                    <div class="card bg-info text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fas fa-user-tie fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">عميل</h6>
                            <h1 class="display-4">{{\App\Client::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('sayings.index')}}" style="text-decoration: none;" >
                    <div class="card bg-info text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fas fa-user-tie fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">شهادة عميل</h6>
                            <h1 class="display-4">{{\App\Saying::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('albums.index')}}" style="text-decoration: none;" >
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fas fa-images fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">ألبوم صور</h6>
                            <h1 class="display-4">{{\App\Album::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->
            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('categories.index')}}" style="text-decoration: none;" >
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fa fa-check-square fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">تصنيف مقال</h6>
                            <h1 class="display-4">{{\App\Category::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->
            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('posts.index')}}" style="text-decoration: none;" >
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body bg-dark">
                            <div class="rotate">
                                <i class="far fa-newspaper fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">مقالة و تدوينة</h6>
                            <h1 class="display-4">{{\App\Post::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->
            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('playlists.index')}}" style="text-decoration: none;" >
                    <div class="card bg-secondary text-dark h-100">
                        <div class="card-body bg-secondary">
                            <div class="rotate">
                                <i class="far fas fa-play-circle fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">قائمة تشغيل فيديو</h6>
                            <h1 class="display-4">{{\App\Playlist::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->
            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('videos.index')}}" style="text-decoration: none;" >
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body bg-dark">
                            <div class="rotate">
                                <i class="far fas fa fa-video fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase"> فيديو</h6>
                            <h1 class="display-4">{{\App\Video::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('contracts.index')}}" style="text-decoration: none;" >
                    <div class="card bg-danger text-white h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="far fas fa-file-signature fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">عقد</h6>
                            <h1 class="display-4">{{\App\Contract::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('services.index')}}" style="text-decoration: none;" >
                    <div class="card bg-info text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fas fa-server fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">خدمة</h6>
                            <h1 class="display-4">{{\App\Service::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('orders.index')}}" style="text-decoration: none;" >
                    <div class="card bg-info text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fas fa-server fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">طلب خدمة</h6>
                            <h1 class="display-4">{{\App\Order::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('courses.index')}}" style="text-decoration: none;" >
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="  fas fa-swatchbook fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">دورة تدريبية</h6>
                            <h1 class="display-4">{{\App\Course::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('sliders.index')}}" style="text-decoration: none;" >
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fab fa-slideshare fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">شريحة عرض في الصفحة الرئيسية</h6>
                            <h1 class="display-4">{{\App\Slider::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->


            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('types.index')}}" style="text-decoration: none;" >
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body bg-dark">
                            <div class="rotate">
                                <i class="fab fa-cuttlefish fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">تصنيف منتج</h6>
                            <h1 class="display-4">{{\App\Type::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->


            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('products.index')}}" style="text-decoration: none;" >
                    <div class="card bg-secondary text-dark h-100">
                        <div class="card-body bg-secondary">
                            <div class="rotate">
                                <i class="fab fab fa-product-hunt fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">منتج</h6>
                            <h1 class="display-4">{{\App\Product::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->

            <!-- Start-->
            <div class="col-xl-4 col-sm-6 py-2">
                <a href="{{route('requests.index')}}" style="text-decoration: none;" >
                    <div class="card bg-secondary text-dark h-100">
                        <div class="card-body bg-secondary">
                            <div class="rotate">
                                <i class="fab fab fa-product-hunt fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">طلب شراء</h6>
                            <h1 class="display-4">{{\App\Request::count()}}</h1>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End  -->


        </div>

    @endsection
