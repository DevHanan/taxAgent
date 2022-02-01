@extends('layouts.front')

    @section('content')

        <div class="homeIntro">
            <div class="sliderHome owl-carousel owl-theme">
                @if($slides->count()>0)

                       @foreach($slides as $slide)
                            <div class="item">
                            <div class="images">
                                <img src="{{asset('storage/'.$slide->image->name)}}" alt="">
                            </div>
                           @if(!($slide->title==null && $slide->url == null && $slide->body ==null))


                                    <div class="main_text">
                                        <div class="container position-relative">
                                            <div class="text ">
                                                <h2> Taxagentonline</h2>
                                                <h3>
                                                    {{$slide->title}}<br>
                                                    {{$slide->body}}
                                                </h3>
                                                @if($slide->url!=null)

                                                    <a href="{{$slide->url}}" class="btn btn-success px-5">@lang('slidereMore')</a>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                           @endif
                        </div>
                        @endforeach


                @endif

            </div>
        </div>
        <!-- end homeIntro -->

        <section class="section_service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <h3 class="title_section">@lang('services')</h3>
                        <div class="row">
                            @if($services->count()>0)

                                @foreach($services as $service)
                                    <div class="col-lg-4 col-sm-4">
                                    <a href="{{url('/services/'.$service->slug)}}">
                                        <div class="item text-center wow fadeInUp  animated" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                            <img src="{{asset('storage/'.$service->image->name)}}" class="mb-4" alt="">
                                            <p class="title">{{$service->title}} </p>
                                            <span class="info">
                                               {{str_limit($service->body,100)}}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                @endforeach


                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section_courses">
            <div class="container">
                <h3 class="title_section">@lang('courses')</h3>
                <div class="row">


                    @if($courses->count()>0)

                           @foreach($courses as $course)
                            <div class="col-lg-4">
                                <article class="entry-box">
                                    <div class="entry-box-image">
                                        <a href="{{url('/courses/'.$course->slug)}}">
                                            <picture>
                                                <img src="{{asset('storage/'.$course->image->name)}}" alt="">
                                            </picture>
                                        </a>
                                    </div>
                                    <div class="entry-box-body">
                                        <h3 class="entry-box-title">
                                            <a href="{{url('/courses/'.$course->slug)}}">{{$course->title}}</a>
                                        </h3>
                                    </div>
                                </article>
                            </div>
                            @endforeach

                    @endif

                </div>
                <div class="text-center mt-4">
                    <a href="/courses" class="general-btn-sm">@lang('moreCourses')</a>
                </div>
            </div>
        </section>
        <!-- end section -->


        <section class="section_contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <h3 class="title_section">@lang('contact_us')</h3>



                        @if(session()->has('done'))

                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{session('done')}} </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">


                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-11">

                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li><b>{{$error}}</b></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <button type="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                                        </button>

                                    </div>
                                </div>





                            </div>


                        @endif

                        <form action="{{route('Contacts.sendMail')}}" class="form-contact" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="@lang('name')">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="@lang('email')">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="@lang('phone')">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contry" placeholder="@lang('country')">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="msg" rows="8" placeholder="@lang('msg')"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group text-center">
                                        <button class="general-btn-sm" type="submit">@lang('submit')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>


        <section class="section_testimonial">
            <div class="container">
                <h3 class="title_section"><a href="/sayings"> @lang('testimonials') </a> </h3>
                <div class="testimonialSlider owl-carousel owl-theme">

                    @if($sayings->count()>0)
                       @foreach($sayings as $saying)
                            <div class="item-testimonial">
                                <div class="testimonial-content">
                                    <h5 class="testimonial-content-text">{{$saying->body}}</h5>
                                </div>
                                <div class="testimonial-info">
                                    <div class="testimonial-avatar">
                                        <img src="{{asset('storage/'.$saying->client->image->name)}}" alt="">
                                    </div>
                                    <div class="testimonial-author">
                                        <h4 class="testimonial-name p-1"> {{$saying->client->name}} </h4>
                                        <h4 class="testimonial-service"> {{$saying->service_id}} </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>


        <section class="information">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="item-information wow fadeInUp animate" data-wow-duration="2s" data-wow-delay="0.2s"
                             style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="image">
                                <img src="/front/images/img_30.png" alt="">
                            </div>
                            <div class="details">
                                <h2 class="number">{{\App\Service::count()}}+</h2>
                                <h2 class="text"> @lang('services')</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="item-information wow fadeInUp animate" data-wow-duration="2s" data-wow-delay="0.2s"
                             style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="image">
                                <img src="/front/images/img_31.png" alt="">
                            </div>
                            <div class="details">
                                <h2 class="number">{{\App\Client::count()}}+</h2>
                                <h2 class="text"> @lang('clients') </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="item-information wow fadeInUp animate" data-wow-duration="2s" data-wow-delay="0.2s"
                             style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="image">
                                <img src="/front/images/img_32.png" alt="">
                            </div>
                            <div class="details">
                                <h2 class="number">+{{\App\Course::count()}}</h2>
                                <h2 class="text"> @lang('courses')  </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="item-information wow fadeInUp animate" data-wow-duration="2s" data-wow-delay="0.2s"
                             style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="image">
                                <img src="/front/images/img_33.png" alt="">
                            </div>
                            <div class="details">
                                <h2 class="number">+{{\App\Post::count()}}</h2>
                                <h2 class="text">  @lang('blog') </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="text-center mt-5"> @lang('more') </h4>
            </div>
        </section>

    @endsection