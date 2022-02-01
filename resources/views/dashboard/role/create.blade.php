@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

    @section('title')
        صلاحية جديدة
     @endsection

    @section('path')
         <li class="m-nav__item">
            <a href="{{url('admin/roles')}}" class="m-nav__link">
                <span class="m-nav__link-text">الصلاحيات</span>
            </a>
        </li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item">
            <a href="{{url('admin/roles/create')}}" class="m-nav__link">
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

        @if(session()->has('stored'))

            <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">


                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <h6>{{session('stored')}}</h6>
                        </div>

                        <button type="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                        </button>

                    </div>
                </div>





            </div>


        @endif
        <!--begin::Form-->
        <form action="{{route('roles.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

                        <div class="tab-content">

                            <div class="tab-pane active" id="m_role_profile_tab_1">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body">
                                        <!--begin::Section-->
                                        <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">اسم الصلاحية</label>
                                            <div class="col-9">
                                                <input class="form-control m-input" type="text" placeholder="اسم الصلاحية مثال : أدمن ، كاتب محتوى" id="example-text-input" name="name">
                                            </div>
                                        </div>

                                 {{--      <div class="form-group m-form__group row mb-25">
                                            <label for="example-text-input" class="col-3 col-form-label">مجموعة الصلاحيات</label>
                                            <div class="col-9">
                                                <select class="form-control m-select2" id="m_select2" multiple="multiple" name="param">
                                                    <option value="">محرر</option>
                                                    <option value="2">مدير</option>
                                                    <option value="3">متدرب</option>
                                                    <option value="4">كاتب</option>
                                                    <option value="56">محرر</option>
                                                    <option value="6">محرر</option>
                                                </select>
                                            </div>
                                        </div>--}}

                                        <div class="form-group">
                                            <h5>صلاحيات المستخدمين</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create roles"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show roles"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete roles"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit roles"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>المستخدمين</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create users"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show users"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete users"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit users"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>العملاء</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create clients"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show clients"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete clients"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit clients"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>قالوا عنا</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                     <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show sayings"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete sayings"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>


                                        <div class="form-group">
                                            <h5>معرض الصور</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create albums"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show albums"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete albums"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit albums"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>تصنيفات المقالات</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create categories"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show categories"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete categories"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit categories"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5> المقالات</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create posts"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show posts"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete posts"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit posts"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5> التعليقات</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">

                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete comments"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>قائمة تشغيل فيديوهات</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create playlists"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show playlists"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete playlists"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit playlists"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>فيديو</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create videos"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show videos"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete videos"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit videos"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>العقود</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create contracts"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show contracts"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete contracts"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit contracts"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5> الخدمات</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create services"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show services"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete services"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit services"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5> طلبات الخدمات</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">

                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show orders"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete orders"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>  تصنيف المنتج</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create types"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show types"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete types"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit types"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>  المنتج</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create products"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show products"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete products"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit products"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <h5> طلبات الشراء</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">

                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show requests"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete requests"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5> الدورات التدريبية</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create courses"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show courses"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete courses"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit courses"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5> شرائح العرض في الصفحة الرئيسية</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="create sliders"> اضافة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show sliders"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="delete sliders"> حذف
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit sliders"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>التواصل الإجتماعي</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit socialMedias"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show socialMedias"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>ثوابت الموقع</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit settings"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show settings"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>سياسة الخصوصية و الاستخدام</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit usages"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show usages"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>الصفحة الرئيسية</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit home_page"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show home_page"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <h5>تواصل معنا</h5>
                                            <fieldset>
                                                <legend>
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" class="checkAll">
                                                        <span class="first"></span>
                                                    </label>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="edit contact_us"> تعديل
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <label class="m-checkbox">
                                                            <input type="checkbox" name="permissions[]" value="show contact_us"> عرض
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
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
                 {{--   <div class="m-portlet m-portlet--tab mb-25">
                        <div class="m-portlet__body">
                            <label class="col-form-label col-sm-12">اختر صورة</label>
                            <div class="col-sm-12">
                                <div class="m-dropzone dropzone" action="inc/api/dropzone/upload.php" id="m-dropzone-one">
                                    <div class="m-dropzone__msg dz-message needsclick">
                                        <h3 class="m-dropzone__msg-title">اضغط هنا لاختيار الصورة</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </form>
        <!--end::Form-->
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#m_select2').select2({
                placeholder: "اختر الصلاحيات",
                dir: "rtl",
                language: {
                    "noResults": function () {
                        return "لا توجد نتائج";
                    }
                }
            });
        });
    </script>

    <script>

        $(".checkAll").click(function () {
            $(this).closest('.form-group').find('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
    @endsection