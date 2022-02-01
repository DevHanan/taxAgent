@extends('layouts.front')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="single_blog_posts">
                <div class="row">
                    <div class="col-md-8">
                        <article class="single-course-item">
                            <div class="single-course-header">
                                <h1 class="course-title">{{$playlist->title}}</h1>


                            </div>
                            <div class="course-thumbnail">
                                <a href="#" class="learn-press-single-thumbnail">
                                    <img src="{{asset('storage/'.$playlist->image->name)}}" class="course-post-image">
                                </a>
                            </div>
                            <div class="learn-press-course-tabs">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-1" data-toggle="tab" href="#course-tab-1"
                                           aria-selected="true"> @lang('videodescription') </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-2" data-toggle="tab" href="#course-tab-2"
                                           aria-selected="true"> @lang('videos') </a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="course-tab-1" role="tabpanel" aria-labelledby="tab-1">
                                        <div class="course-description">
                                            <p class="mb-3">
                                                {{$playlist->body}}
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
                                                    <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$playlist->title}}"   target="_blank">
                                                        <img src="/front/images/share_twitter.png" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="course-tab-2" role="tabpanel" aria-labelledby="tab-2">
                                        <ul class="course-syllabus">
                                           @foreach($playlist->videos()->get() as $video)
                                                <li class="course-item-lp_lesson">
                                                    <a class="course-item-link" data-toggle="collapse" href="#{{$video->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        <span class="item-name">
                                                        <i class="fa fa-file-alt pl-2"></i>
                                                            {{$video->title}}
                                                        </span>
                                                    </a>


                                                    <div class="collapse" id="{{$video->id}}">
                                                        <div class="card card-body">{{$video->body}}

                                                            <div class="course-item-meta ">
                                                                <a data-fancybox  href="{{$video->url}}">
                                                                    @lang('watchNow')
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </article>

                        <h3 class="mb-4">@lang('simiPlaylists')</h3>
                        <div class="row">
                            @foreach($recentPlaylists as $playlist)
                                <div class="col-lg-6">
                                    <article class="entry-box">
                                        <div class="entry-box-image">
                                            <a href="{{url('/playlists/'.$playlist->slug)}}">
                                                <picture>
                                                    <img src="{{asset('storage/'.$playlist->image->name  )}}" alt="">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="entry-box-body">
                                            <div class="post_meta_top">
                                                <span class="post_meta_date">{{$playlist->created_at->format('Y-m-d')}}</span>
                                            </div>
                                            <h3 class="entry-box-title">
                                                <a href="{{url('/playlists/'.$playlist->slug)}}">{{$playlist->title}}</a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb-4">@lang('recentPlaylists') </h3>
                        <div class="row">


                            @foreach($recentPlaylists as $playlist)
                                <div class="col-lg-12">
                                    <article class="entry-box">
                                        <div class="entry-box-image">
                                            <a href="{{url('/playlists/'.$playlist->slug)}}">
                                                <picture>
                                                    <img src="{{asset('storage/'.$playlist->image->name  )}}" alt="">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="entry-box-body">
                                            <div class="post_meta_top">
                                                <span class="post_meta_date">{{$playlist->created_at->format('Y-m-d')}}</span>
                                            </div>
                                            <h3 class="entry-box-title">
                                                <a href="{{url('/playlists/'.$playlist->slug)}}">{{$playlist->title}}</a>
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