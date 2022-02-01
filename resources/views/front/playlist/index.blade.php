@extends('layouts.front')

@section('content')



    <div class="title-page">
        <div class="container">
            <h3> @lang('playlists') </h3>
        </div>
    </div>

    <div class="main-content">
        <div class="section_playlists page_playlists">
            <div class="container">

                <div class="row">

                    @if(true)

                        @foreach($playlists as $playlist)
                            <div class="col-lg-4">
                                <article class="entry-box">
                                    <div class="entry-box-image">
                                        <a href="{{url('/playlists/'.$playlist->slug)}}">
                                            <picture>
                                                <img src="{{asset('storage/'.$playlist->image['name'])}}" alt="">
                                            </picture>
                                        </a>
                                    </div>
                                    <div class="entry-box-body">
                                        <h3 class="entry-box-title">
                                            <a href="{{url('/playlists/'.$playlist->slug)}}">{{$playlist->title}}</a>
                                        </h3>
                                    </div>
                                </article>
                            </div>
                        @endforeach


                    @endif

                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{$playlists->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->


@endsection