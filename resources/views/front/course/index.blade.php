@extends('layouts.front')

    @section('content')



        <div class="title-page">
            <div class="container">
                <h3> @lang('courses') </h3>
            </div>
        </div>

         <div class="main-content">
            <div class="section_courses page_courses">
                <div class="container">
                    <div class="row">

                        @if(true)

                            @foreach($courses as $course)
                                 <div class="col-lg-4">
                                <article class="entry-box">
                                    <div class="entry-box-image">
                                        <a href="{{url('/courses/'.$course->slug)}}">
                                            <picture>
                                                <img src="{{asset('storage/'.$course->image['name'])}}" alt="">
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

                        <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{$courses->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section -->


    @endsection