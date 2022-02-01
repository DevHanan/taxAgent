@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3> @lang('contact_us') </h3>
            </div>
        </div>

        <div id="map"></div>

        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class=" widget ">
                            <div class="page_title">
                                <h3 class="text-center mb-4">{{app()->getLocale()=="ar"?'اتصل بنا':'Call Us'}}</h3>
                            </div>

                            @if(session()->has('done'))

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                            <input type="text" class="form-control" name="contry" placeholder="@lang('contry')">
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
                    <div class="col-lg-4">
                        <div class=" widget p-0 ">
                            <div class="wight-header">
                                <h3 class="title">{{app()->getLocale()=="ar"?'معلومات الاتصال':"contact information"}}</h3>
                            </div>
                            <div class="wight-body info-contact">
                                <article class="d-flex align-items-center">
                                    <div class="icon col-auto">
                                        <i class="fa fa-map-marker-alt"></i>
                                    </div>
                                    <div class="details">
                                        <p>{{app()->getLocale()=="ar"?$value->get('address_ar'):$value->get('address_en')}}</p>
                                     </div>
                                </article>
                                <article class="d-flex align-items-center">
                                    <div class="icon col-auto">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="details">
                                        <p>{{$value->get('phone')}}</p>
                                     </div>
                                </article>
                                <article class="d-flex align-items-center">
                                    <div class="icon col-auto">
                                        <i class="fas fa-at"></i>
                                    </div>
                                    <div class="details">
                                       
                                        <p>{{$value->get('email')}}</p>

                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@push('scripts')
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = { lat: 25.599033, lng: 56.271405 };
            // The map, centered at Uluru
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: uluru
            });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                // icon: "img/marker.png"
            });
        }
    </script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcTWZnmuGjZKYeBR5vX8xS6p122spkpBM&callback=initMap"></script>
@endpush
    @endsection