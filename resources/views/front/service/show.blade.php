@extends('layouts.front')

    @section('content')


        <div class="main-single-service">
            <div class="header_service" style="background:url('/front/images/service-3-1.jpg')">
                <div class="container">
                    <h1 class="title">{{$service->title}} </h1>
                    <div class="image">
                        <img src="{{asset('storage/'.$service->image->name)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="body_service">
                <div class="container">
                    <div class="row align-items-center">
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="image">--}}
{{--                                <img src="{{asset('storage/'.$service->image->name)}}" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-lg-12">
                            <div class="text">
                                <h4 class="info mb-4">
                                    {{$service->body}}
                                </h4>
                                <a href="{{url('/order/'.$service->id)}}" class="general-btn-sm">@lang('RequestService')</a>
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
                                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$service->title}}"   target="_blank">
                                            <img src="/front/images/share_twitter.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection