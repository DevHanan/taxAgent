@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3> @lang('services') </h3>
            </div>
        </div>

        <section class="section_service">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            @if($services->count()>0)

                                    @foreach($services as $service)
                                        <div class="col-lg-4 col-sm-4">
                                        <a href="{{url('/services/'.$service->slug)}}">
                                            <div class="item text-center wow fadeInUp  animated" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                                <img src="{{asset('storage/'.$service->image->name)}}" class="mb-4" alt="">
                                                <p class="title">{{$service->title}} </p>
                                                <span class="info">{{str_limit($service->body,100)}}</span>
                                            </div>
                                        </a>
                                    </div>
                                     @endforeach


                            @endif

                            <div class="col-lg-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{$services->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @endsection