@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

    @section('title')
        ثوابت الموقع
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
        <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
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
                                            <label for="example-text-input" class="col-3 col-form-label">عنوان الموقع</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="title_ar" value="{{$Valuestore->get('title_ar')}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">وصف الموقع</label>
                                            <div class="col-9">
                               
                                <textarea class="summernote form-control m-input" id="m_summernote_1"  name="description_ar" placeholder="وصف الموقع">{{$Valuestore->get('description_ar')}}</textarea>

                                
                                            </div>
                                        </div>
                                       {{-- <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">كلمات دلالية</label>
                                            <div class="col-9">
                                                <input name="tags" id="tags" class="form-control m-input" value="{{$Valuestore->get('tags')}}" placeholder="الكلمات المفتاحية" />
                                            </div>
                                        </div>--}}
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">نص حقوق الملكية</label>
                                            <div class="col-9">
                                                <input name="copy_rights_ar" class="form-control m-input" type="text" placeholder="مثال : جميع الحقوق محفوظة لدينا 2019 ©" value="{{$Valuestore->get('copy_rights_ar')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">توقيع العقد</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="signature_ar" value="{{$Valuestore->get('signature_ar')}}" id="example-text-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="m_album_profile_tab_2"  style="direction: ltr;">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body text-right">
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">عنوان الموقع</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="title_en" value="{{$Valuestore->get('title_en')}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">وصف الموقع</label>
                                            <div class="col-9">
                                
                                <textarea class="summernote form-control m-input" id="m_summernote_1"  name="description_en" placeholder="وصف الموقع">{{$Valuestore->get('description_en')}}</textarea>

                                            </div>
                                        </div>
                                     {{--   <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">كلمات دلالية</label>
                                            <div class="col-9">
                                                <input name="tags" id="tags" class="form-control m-input" value="{{$Valuestore->get('tags')}}" placeholder="الكلمات المفتاحية" />
                                            </div>
                                        </div>--}}
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">نص حقوق الملكية</label>
                                            <div class="col-9">
                                                <input name="copy_rights_en" class="form-control m-input" type="text" placeholder="مثال : جميع الحقوق محفوظة لدينا 2019 ©" value="{{$Valuestore->get('copy_rights_en')}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">توقيع العقد</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text"  name="signature_en" value="{{$Valuestore->get('signature_en')}}" id="example-text-input">
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
                    <div class="m-portlet m-portlet--tab">
                        <div class="m-portlet__body">
                            <div class="m-portlet__head-title col-sm-12 p-0 ">
                                <img src="{{asset('storage/'.$Valuestore->get('logo'))}}" alt="#" class="img-fluid img-thumbnail m-0">
                            </div>
                        </div>
                        <div class="m-portlet__foot">
                            <div class="m-portlet__head-title col-sm-12">
                                <input type="file" name="file" class="btn btn-success col-sm-12">
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </form>
        <!--end::Form-->
        @push('scripts')
            <script src="{{asset('dashboard/js/jquery.tagsinput.js')}}"></script>
             <script src="{{asset('dashboard/js/summernote.js')}}" type="text/javascript"></script>
            <!--end::Global Theme Bundle -->
            <script>
                jQuery(document).ready(function(){
                    jQuery('#tags').tagsInput({
                        width:'auto',
                        defaultText: 'اضف'
                    });
                });
            </script>

        @endpush
     @endsection