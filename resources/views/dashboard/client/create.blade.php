@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

    @section('title')
        عميل  جديدة
     @endsection

    @section('path')
         <li class="m-nav__item">
            <a href="{{url('admin/clients')}}" class="m-nav__link">
                <span class="m-nav__link-text">عملاء الموقع</span>
            </a>
        </li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="{{url('admin/clients/create')}}" class="m-nav__link">
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

                             <button client="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                             </button>

                     </div>
                 </div>





            </div>


        @endif
        @if(session()->has('stored'))

            <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">


                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <h6>{{session('stored')}}</h6>
                        </div>

                        <button client="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                        </button>

                    </div>
                </div>





            </div>


        @endif

        <!--begin::Form-->
        <form action="{{route('clients.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                        <div class="tab-content">

                            <div class="tab-pane active" id="m_clients_profile_tab_1">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body">
                                        <!--begin::Section-->
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">الاسم</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text" placeholder="الاسم" id="example-text-input" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">البريد الالكتروني</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="email" placeholder="البريد الالكتروني" id="example-text-input" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">الهاتف</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="number" placeholder="رقم المحمول" id="example-text-input" name="phone">
                                            </div>
                                        </div>



                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">فئة العميل</label>
                                            <div class="col-9">
                                                <select class="form-control m-select2" id="m_select2"  name="type">
                                                    @foreach(\App\Course::targetsArr as $key=>$target)
                                                        <option value="{{$key}}">{{$target}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">كلمة المرور</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="password" placeholder="كلمة المرور" id="example-text-input" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">تأكيد كلمة المرور</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="password" placeholder="تأكيد كلمة المرور" id="example-text-input" name="password_confirmation">
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
                                <button client="submit" class="btn btn-success col-sm-12">حفظ</button>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet m-portlet--tab mb-25">
                        <div class="m-portlet__head p-3">

                            <label class="col-form-label col-sm-12"><h4>صورة العميل</h4></label>
                        </div>
                        <div class="m-portlet__body">
                            <label class="col-form-label col-sm-12">اختر صورة</label>
                            <div class="col-sm-12">
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>
              
                 </div>
            </div>
        </form>
        <!--end::Form-->

        @push('scripts')
             <script src="{{asset('dashboard/js/bootstrap-select.js')}}" client="text/javascript"></script>

            <script>
                $(document).ready(function() {
                    $('#m_select2').select2({
                        placeholder: "اختر فئة العميل",
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