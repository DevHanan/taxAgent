@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

    @section('title')
        صفحة تواصل معنا
     @endsection

    @section('path')

        <li class="m-nav__item">
            <a href="{{url('admin/settings')}}" class="m-nav__link">
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
        <form action="{{route('contact_us.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_album_profile_tab_1" role="tab">
                                            <i class="flaticon-share m--hide"></i>
                                            اللغة العربية
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_album_profile_tab_2" role="tab">
                                            اللغة الإنجليزية
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>

                        <div class="tab-content">

                            <div class="tab-pane active" id="m_album_profile_tab_1">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">العنوان</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="address_ar" value="{{$Valuestore->get('address_ar')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">رقم الهاتف</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="phone" value="{{$Valuestore->get('phone')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">البريد الإلكتروني</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="email"  name="email" value="{{$Valuestore->get('email')}}" id="example-text-input">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="m_album_profile_tab_2"  style="direction: ltr;">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body text-right">
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">Address</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="address_en" value="{{$Valuestore->get('address_en')}}" id="example-text-input">
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