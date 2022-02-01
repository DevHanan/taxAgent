@extends('layouts.dashboard')


@section('title')
   {{$playlist->title}}
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/playlists')}}" class="m-nav__link">
            <span class="m-nav__link-text">مكتبة الفيديو</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{url('admin/playlists/'.$playlist->id.'/edit')}}" class="m-nav__link">
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
    <form action="{{route('playlists.update',$playlist->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_playlist_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        اللغة العربية
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_playlist_profile_tab_2" role="tab">
                                        اللغة الإنجليزية
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="tab-content">

                        <div class="tab-pane active" id="m_playlist_profile_tab_1">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">عنوان قائمة تشفبل الفيديوهات </label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="عنوان قائمة تشفبل الفيديوهات " id="example-text-input" name="title_ar"  value="{{$playlist->getTranslation('title','ar')}}">
                                        </div>
                                    </div>
                              



                                    <div class="form-group m-form__group row mb-25">
                                        <label for="exampleFormControlTextarea1" class="col-3 col-form-label">تفاصيل قائمة تشفبل الفيديوهات</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="تفاصيل قائمة تشفبل الفيديوهات" name="body_ar">
                                                {{$playlist->getTranslation('body','ar')}}
                                            </textarea>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="m_playlist_profile_tab_2"  style="direction: ltr;">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body text-right">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">playlist title</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="playlist title" id="example-text-input" name="title_en"  value="{{$playlist->getTranslation('title','en')}}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row mb-25">
                                        <label for="exampleFormControlTextarea1" class="col-3 col-form-label">playlist details</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"    placeholder="playlist details" name="body_en" >
                                                {{$playlist->getTranslation('body','en')}}
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


                <div class="m-portlet m-portlet--tab mb-25">
                    <div class="m-portlet__head p-3">

                        <label class="col-form-label col-sm-12"><h4>الصورة البارزة </h4></label>
                    </div>
                    <div class="m-portlet__body">
                        <img src="{{asset('storage/'.$playlist->image->name)}}" alt="" class="img-fluid" height="250px">
                        <label class="col-form-label col-sm-12">اختر صورة </label>
                        <div class="col-sm-12">
                            {{--                                <div class="m-dropzone dropzone" action="inc/api/dropzone/upload.php" id="m-dropzone-one">--}}
                            {{--                                    <div class="m-dropzone__msg dz-message needsclick">--}}
                            {{--                                        <h3 class="m-dropzone__msg-title">اضغط هنا لاختيار الصورة</h3>--}}
                            {{--                                        <input type="file" name="image_id">--}}
                            {{--                                    </div>--}}
                            {{--                                    --}}
                            {{--                                </div>--}}
                            <input type="file" name="file">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>



    </form>
    <!--end::Form-->

    @push('scripts')
        <script src="{{asset('dashboard/js/bootstrap-select.js')}}" type="text/javascript"></script>

        <script>
            $(document).ready(function() {
                $('#m_select1').select2({
                    placeholder: "اختر الفئات التي ستظهر لها قائمة تشفبل الفيديوهات",
                    dir: "rtl",

                    language: {
                        "noResults": function () {
                            return "لا توجد نتائج";
                        }
                    }
                });
            });


        </script>
    @endpush
@endsection