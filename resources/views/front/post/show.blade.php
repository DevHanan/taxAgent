@extends('layouts.front')

    @section('content')
@push('css')
    <style>
        .media ,
        .media_send_post{
            background-color: #FFF;
            padding: 20px;
            border-radius: 8px;
            -webkit-box-shadow: 7px 11px 40px 0px rgba(0, 0, 0, 0.02);
            box-shadow: 7px 11px 40px 0px rgba(0, 0, 0, 0.02);
            margin-bottom: 20px;
        }
        .media .image-avatar
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: contain;
        }

        .media h6 {
            font-size: 14px;
            color: #828282;
            line-height: 22px;
        }
        .head-toolbar-dropdown{
            position: relative;
        }
        .head-toolbar-dropdown .dropdown-menu{
            min-width: 150px;
            width: 150px;
            left: 0 !important;
            right: auto !important;
        }

        .list-image-blog .row{
            margin-left: -5px;
            margin-right: -5px;
        }

        .list-image-blog .row .col-sm-6{
            padding-left: 5px;
            padding-right: 5px;
        }

        .list-image-blog .thumb{
            margin-bottom: 10px;
        }
        .list-image-blog .thumb img{
            border-radius: 5px;
        }
    </style>
    @endpush


        <div class="main-content">
            <div class="container">
                <div class="single_blog_posts">
                    <div class="row">
                        <div class="col-md-8">
                            <article class="entry-box bg-white pt-4 mb-5">
                                <h5 class="single_post_title text-center">
                                    {{$post->title}}
                                </h5>
                                <div class="post_meta_top text-center mb-3">
{{--                                    <span class="post_meta_date">18 ابريل 2019</span>--}}
                                    <span class="post_meta_date">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="entry-box-image">
                                    <picture>
                                        <img src="{{asset('storage/'.$post->image->name)}}" alt="">
                                    </picture>
                                </div>
                                <div class="post_text">
                                    <p class="mb-3">
                                        {!! $post->body !!}
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
                                            <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$post->title}}"   target="_blank">
                                                <img src="/front/images/share_twitter.png" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                            <div class="media_send_post">
                                <h3 class="mb-3">@lang('writeComment')</h3>
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
                                @if(session()->has('stored'))

                                    <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">


                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-11">
                                                    <h6>{{session('stored')}}</h6>
                                                </div>

                                                <button type="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                                                </button>

                                            </div>
                                        </div>





                                    </div>


                                @endif
                                <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <textarea rows="6" class="form-control" name="body"></textarea>
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success px-4">نشر</button>
                                    </div>
                                </form>
                            </div>

                            <ul class="list-unstyled">

                             @foreach($post->comments()->get() as $comment)
                                    <li class="media">

                                        <div class="media-body">
                                            <h4 class="mb-2"><a href="{{url('/client/'.$comment->client['id'].'/'.$comment->client['name'])}}">{{$comment->client['name']}}</a></h4>
                                            <span>{{$comment->created_at->diffForHumans()}}</span>
                                            <h6>
                                                {{$comment->body}}
                                            </h6>
                                         </div>

                                      @if(auth()->guard('client')->check()==true)
                                            @if($comment->client_id == auth()->guard('client')->id())
                                                <div class="head-toolbar-dropdown ">
                                                    <a href="#" class="btn btn-label-light btn-sm " data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v" ></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                                                           @csrf
                                                            @method('delete')
                                                            <input type="submit"   class="dropdown- dropdown-item" onclick="return confirm('@lang("confirmation")')" value="@lang('delete')">
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif

                                      @endif
                                    </li>
                              @endforeach

                            </ul>

                        </div>
                        <div class="col-lg-4">

                            <div class=" widget ">
                                <h5 class="widget-title">@lang('categories')</h5>
                                <ul class="category-list list-unstyled mb-0">
                                    <li>
                                        <a href="/posts"> @lang('all') </a>
                                    </li>

                                    @foreach($categories as $category)
                                        <li>
                                            <a class="active" href="{{url('/categories/'.$category->slug)}}">{{$category->title}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class=" widget ">
                                <h5 class="widget-title">{{app()->getLocale()=="ar"?'أحدث التدوينات':'Recent Posts'}}</h5>
                                <ul class="category-list list-unstyled mb-0">
                                    @foreach($recentPosts as $post)
                                        <li>
                                            <a href="{{url('/posts/'.$post->slug)}}"> {{$post->title}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if($post->album)
                                <div class=" widget ">
                                    <h5 class="widget-title">صور ...</h5>
                                    <div class="list-image-blog">
                                        <div class="row">

                                            @foreach($post->album->images()->get() as $img)
                                                <div class="col-sm-6">
                                                    <div class="thumb">
                                                        <a href="{{asset('storage/'.$img->name)}}" data-fancybox="gallery"><img src="{{asset('storage/'.$img->name)}}" alt=""></a>
                                                    </div>
                                                </div>
                                             @endforeach

                                        </div>
                                    </div>

                                </div>
                            @endif








                        </div>

                    </div>
                </div>
            </div>
        </div>



    @endsection