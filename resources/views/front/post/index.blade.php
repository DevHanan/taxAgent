@extends('layouts.front')

    @section('content')

        <div class="title-page">
            <div class="container">
                <h3> @lang('blog') </h3>
            </div>
        </div>

         <div class="main-content">
            <div class="container">
                <div class="blog_posts">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                               @if($posts->count())

                                       @foreach($posts as $post)
                                        <div class="col-lg-6">
                                            <article class="entry-box">
                                                <div class="entry-box-image">
                                                    <a href="{{url('/posts/'.$post->slug)}}">
                                                        <picture>
                                                            <img src="{{asset('storage/'.$post->image->name)}}" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="entry-box-body">
                                                    <div class="post_meta_top">
                                                        <span class="post_meta_date">{{$post->created_at->format('Y-m-d')}}</span>
                                                    </div>
                                                    <h3 class="entry-box-title">
                                                        <a href="{{url('/posts/'.$post->slug)}}">{{$post->title}}</a>
                                                    </h3>
                                                </div>
                                            </article>
                                        </div>
                                        @endforeach


                               @endif

                            </div>
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
                                            <a href="{{url('/categories/'.$category->slug)}}">{{$category->title}}</a>
                                        </li>
                                     @endforeach

                                </ul>
                            </div>

                        </div>

                        <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{$posts->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection