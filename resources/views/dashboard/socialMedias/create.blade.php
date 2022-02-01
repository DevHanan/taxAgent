@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

    @section('title')
        حسابات التواصل الإجتماعي
     @endsection

    @section('path')

        <li class="m-nav__item">
            <a href="{{url('admin/albums/create')}}" class="m-nav__link">
                <span class="m-nav__link-text">@yield('title')</span>
            </a>
        </li>
    @endsection

    @section('content')
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
        @if(session()->has('updated'))

            <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">


                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <h6>{{session('updated')}}</h6>
                        </div>

                        <button type="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                        </button>

                    </div>
                </div>


            </div>


        @endif

        <!--begin::Form-->
        <form action="{{route('socialMedias.update')}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

                        <div class="tab-content">

                            <div class="tab-pane active" id="m_album_profile_tab_1">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body">
                                        <!--begin::Section-->

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">facebook</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="url"  name="facebook" value="{{$Valuestore->get('facebook')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">youtube</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="url"  name="youtube" value="{{$Valuestore->get('youtube')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">twitter</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="url"  name="twitter" value="{{$Valuestore->get('twitter')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">instagram</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="url"  name="instagram" value="{{$Valuestore->get('instagram')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">whatsapp</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="phone"  name="whatsapp" value="{{$Valuestore->get('whatsapp')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="email"  name="email" value="{{$Valuestore->get('email')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">Phone Number</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="number"  name="phone" value="{{$Valuestore->get('phone')}}" id="example-text-input">
                                            </div>
                                        </div>


                                        <!--end::Section-->

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="m_album_profile_tab_2"  style="direction: ltr;">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body text-right">
                                        <!--begin::Section-->
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">album title</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text" placeholder="album title" id="example-text-input" name="title_en">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="m-portlet m-portlet--tab mb-25">
                        <div class="m-portlet__body">
                            <div class="m-portlet__head-title col-sm-12">
                                <button type="submit" class="btn btn-success col-sm-12">حفظ</button>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </form>
        <!--end::Form-->
     @endsection