@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

    @section('title')
        سياسة الخصوصية و الاستخدام
     @endsection

    @section('path')

        <li class="m-nav__item">
            <a href="{{url('admin/usage')}}" class="m-nav__link">
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
        <form action="{{route('usage.update')}}" method="post" enctype="multipart/form-data">
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
                                        <div class="col-12">
                                                 <textarea class="summernote form-control m-input" id="m_summernote_1" name="usage_ar">
                                                    {!! $Valuestore->get('usage_ar') !!}
                                                 </textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="m_album_profile_tab_2"  style="direction: ltr;">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body text-right">
                                        <div class="mb-40 m-form__group row">

                                            <div class="col-12">
                                                 <textarea class="summernote form-control m-input" id="m_summernote_1" name="usage_en">
                                                        {!! $Valuestore->get('usage_en') !!}
                                                 </textarea>
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
        @push('scripts')
            <script src="{{asset('dashboard/js/summernote.js')}}" type="text/javascript"></script>

        @endpush
     @endsection