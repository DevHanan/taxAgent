@extends('layouts.dashboard')


@section('title')
   {{$video->title}}
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/playlists')}}" class="m-nav__link">
            <span class="m-nav__link-text">مكتبة الفيديوهات</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{url('admin/videos')}}" class="m-nav__link">
            <span class="m-nav__link-text">الفيديوهات</span>
        </a>
    </li>

    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{url('admin/videos/'.$video->id.'/edit')}}" class="m-nav__link">
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
    <form action="{{route('videos.update',$video->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_video_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        اللغة العربية
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_video_profile_tab_2" role="tab">
                                        اللغة الإنجليزية
                                    </a>
                                </li>

                            </ul>
                        </div>
                   
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane active" id="m_video_profile_tab_1">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">عنوان الفيديو</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="عنوان الفيديو" id="example-text-input" name="title_ar" value="{{$video->getTranslation('title','ar')}}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">رابط الفيديو</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="رابط الفيديو" id="example-text-input" name="url" value="{{$video->url}}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">قائمة تشغيل الفيديو</label>
                                        <div class="col-9">
                                            <select class="form-control m-select2" id="m_select1"  name="playlist_id" >
                                                <option value="null">- - -</option>
                                                @foreach($playlists as $playlist)
                                                    <option value="{{$playlist->id}}" {{$playlist->id == $video->playlist->id ? 'selected':''}}>{{$playlist->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group m-form__group row mb-25">
                                        <label for="exampleFormControlTextarea1" class="col-3 col-form-label">وصف الفيديو</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="وصف الفيديو" name="body_ar">{{$video->getTranslation('body','ar')}}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="m_video_profile_tab_2"  style="direction: ltr;">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body text-right">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">video title</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="video title" id="example-text-input" name="title_en" value="{{$video->getTranslation('title','en')}}">
                                        </div>
                                    </div>


                                    <div class="form-group m-form__group row mb-25">
                                        <label for="exampleFormControlTextarea1" class="col-3 col-form-label">video details</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="وصف الفيديو" name="body_en">{{$video->getTranslation('body','en')}}</textarea>
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
        <script src="{{asset('dashboard/js/bootstrap-select.js')}}" type="text/javascript"></script>

        <script>
            $(document).ready(function() {
                $('#m_select1').select2({
                    placeholder: "اختر قائمة تشغيل فيديوهات ",
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