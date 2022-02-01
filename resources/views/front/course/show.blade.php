@extends('layouts.front')

    @section('content')



        <div class="main-content">
            <div class="container">
                <div class="single_blog_posts">
                    <div class="row">
                        <div class="col-md-8">
                            <article class="single-course-item">
                                <div class="single-course-header">
                                    <h1 class="course-title">{{$course->title}}</h1>
                                    <div class="course-meta">

                                        <div class="course-categories">
                                            <label>{{app()->getLocale()=="ar"?'الفئات المستهدفة':'Target Group'}}</label>
                                            <div class="value">
                                                <ul>
                                                    @foreach($course->targets as $target)
                                                        @php
                                                            if (app()->getLocale()=='en')
                                                                 $target = $target+3;
                                                        @endphp
                                                        <li>
                                                       <span class="cat-links m-3">
                                                              {{\App\Course::targetsArr[$target]}}
                                                        </span>
                                                        </li>

                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="xt-course-review">
                                            <label>{{app()->getLocale()=="ar"?'التقييم':'Rate'}}</label>
                                            <div class="data-rating d-flex align-items-center">
                        <span data-rating="5">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-payment">
                                        <div class="lp-course-buttons">
                                            <a href="{{$course->url}}" class="btn btn-success px-5 py-2">
                                                @lang('watchNow')</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-thumbnail">
                                    <a href="#" class="learn-press-single-thumbnail">
                                        <img src="/front/images/img-5.jpg" class="course-post-image">
                                    </a>
                                </div>
                                <div class="learn-press-course-tabs">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tab-1" data-toggle="tab" href="#course-tab-1"
                                               aria-selected="true">{{app()->getLocale()=="ar"?'تفاصيل الدورة':'Course Details'}}</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="course-tab-1" role="tabpanel" aria-labelledby="tab-1">
                                            <div class="course-description">
                                                <p class="mb-3">
                                                {{$course->body}}
                                                </p>

                                            </div>
                                            <div class="post_share p-3">
                                                <ul class="d-flex justify-content-end align-items-center">


                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?phone=&text={{url()->current()}}&source=&data=" target="_blank">
                                                            <img src="/front/images/share_whatsapp.png" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank">
                                                            <img src="/front/images/share_facebook.png" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$course->title}}"   target="_blank">
                                                            <img src="/front/images/share_twitter.png" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </article>

                            <h3 class="mb-4">{{app()->getLocale()=="ar"?'دورات مشابهة':'Similar Courses'}}</h3>
                            <div class="row">
                                @foreach($recentCourses as $course)
                                    <div class="col-lg-6">
                                        <article class="entry-box">
                                            <div class="entry-box-image">
                                                <a href="{{url('/courses/'.$course->slug)}}">
                                                    <picture>
                                                        <img src="{{asset('storage/'.$course->image->name  )}}" alt="">
                                                    </picture>
                                                </a>
                                            </div>
                                            <div class="entry-box-body">
                                                <div class="post_meta_top">
                                                    <span class="post_meta_date">{{$course->created_at->format('Y-m-d')}}</span>
                                                </div>
                                                <h3 class="entry-box-title">
                                                    <a href="{{url('/courses/'.$course->slug)}}">{{$course->title}}</a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="mb-4">{{app()->getLocale()=="ar"?'دورات حديثة':'Recent Courses'}} </h3>
                            <div class="row">


                                @foreach($recentCourses as $course)
                                    <div class="col-lg-12">
                                        <article class="entry-box">
                                            <div class="entry-box-image">
                                                <a href="{{url('/courses/'.$course->slug)}}">
                                                    <picture>
                                                        <img src="{{asset('storage/'.$course->image->name  )}}" alt="">
                                                    </picture>
                                                </a>
                                            </div>
                                            <div class="entry-box-body">
                                                <div class="post_meta_top">
                                                    <span class="post_meta_date">{{$course->created_at->format('Y-m-d')}}</span>
                                                </div>
                                                <h3 class="entry-box-title">
                                                    <a href="{{url('/courses/'.$course->slug)}}">{{$course->title}}</a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection