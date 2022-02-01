@extends('layouts.dashboard')

@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

@section('title')
    {{$role->name}}
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
    <form action="{{route('roles.update',$role->id)}}" method="post">
        @csrf
        @method('PUT')
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
                                            <input class="form-control m-input" type="text" placeholder="اسم الصلاحية مثال : أدمن ، كاتب محتوى" id="example-text-input" name="name" value="{{$role->name}}">
                                        </div>
                                    </div>



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

                                                        <input type="checkbox" name="permissions[]" value="create roles" {{$role->permissions->where('name','==','create roles')->first()==null?'':'checked'}}/> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show roles"  {{$role->permissions->where('name','==','show roles')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete roles"  {{$role->permissions->where('name','==','delete roles')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit roles"  {{$role->permissions->where('name','==','edit roles')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="create users" {{$role->permissions->where('name','==','create users')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show users" {{$role->permissions->where('name','==','show users')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete users" {{$role->permissions->where('name','==','delete users')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit users" {{$role->permissions->where('name','==','edit users')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="create clients" {{$role->permissions->where('name','==','create clients')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show clients" {{$role->permissions->where('name','==','show clients')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete clients" {{$role->permissions->where('name','==','delete clients')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit clients" {{$role->permissions->where('name','==','edit clients')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="show sayings" {{$role->permissions->where('name','==','show sayings')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete sayings" {{$role->permissions->where('name','==','delete sayings')->first()==null?'':'checked'}}> حذف
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
                                                        <input type="checkbox" name="permissions[]" value="create albums"  {{$role->permissions->where('name','==','create albums')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show albums"  {{$role->permissions->where('name','==','show albums')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete albums"  {{$role->permissions->where('name','==','delete albums')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit albums"  {{$role->permissions->where('name','==','edit albums')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="create categories" {{$role->permissions->where('name','==','create categories')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show categories" {{$role->permissions->where('name','==','show categories')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete categories" {{$role->permissions->where('name','==','delete categories')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit categories" {{$role->permissions->where('name','==','edit categories')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="create posts"  {{$role->permissions->where('name','==','create posts')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show posts"  {{$role->permissions->where('name','==','show posts')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete posts"  {{$role->permissions->where('name','==','delete posts')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit posts"  {{$role->permissions->where('name','==','edit posts')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="delete comments"  {{$role->permissions->where('name','==','delete comments')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> قوائم تشغيل الفيديوهات</h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create playlists"  {{$role->permissions->where('name','==','create playlists')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show playlists"  {{$role->permissions->where('name','==','show playlists')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete playlists"  {{$role->permissions->where('name','==','delete playlists')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit playlists"  {{$role->permissions->where('name','==','edit playlists')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> الفيديوهات</h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create videos"  {{$role->permissions->where('name','==','create videos')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show videos"  {{$role->permissions->where('name','==','show videos')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete videos"  {{$role->permissions->where('name','==','delete videos')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit videos"  {{$role->permissions->where('name','==','edit videos')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> عقود</h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create contracts"  {{$role->permissions->where('name','==','create contracts')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show contracts"  {{$role->permissions->where('name','==','show contracts')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete contracts"  {{$role->permissions->where('name','==','delete contracts')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit contracts"  {{$role->permissions->where('name','==','edit contracts')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="create services"  {{$role->permissions->where('name','==','create services')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show services"  {{$role->permissions->where('name','==','show services')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete services"  {{$role->permissions->where('name','==','delete services')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit services"  {{$role->permissions->where('name','==','edit services')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="show orders"  {{$role->permissions->where('name','==','show orders')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete orders"  {{$role->permissions->where('name','==','delete orders')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>


                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5>  تصنيف المنتج
                                        </h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create types"  {{$role->permissions->where('name','==','create types')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show types"  {{$role->permissions->where('name','==','show types')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete types"  {{$role->permissions->where('name','==','delete types')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit types"  {{$role->permissions->where('name','==','edit types')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> المنتجات
                                        </h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create products"  {{$role->permissions->where('name','==','create products')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show products"  {{$role->permissions->where('name','==','show products')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete products"  {{$role->permissions->where('name','==','delete products')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit products"  {{$role->permissions->where('name','==','edit products')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> طلبات الشراء
                                        </h5>
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
                                                        <input type="checkbox" name="permissions[]" value="show requests"  {{$role->permissions->where('name','==','show requests')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete requests"  {{$role->permissions->where('name','==','delete requests')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> الدورات التدريبية
                                        </h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create courses"  {{$role->permissions->where('name','==','create courses')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show courses"  {{$role->permissions->where('name','==','show courses')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete courses"  {{$role->permissions->where('name','==','delete courses')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit courses"  {{$role->permissions->where('name','==','edit courses')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5> شرائح العرض في الصفحة الرئيسية
                                        </h5>
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
                                                        <input type="checkbox" name="permissions[]" value="create sliders"  {{$role->permissions->where('name','==','create sliders')->first()==null?'':'checked'}}> اضافة
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show sliders"  {{$role->permissions->where('name','==','show sliders')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="delete sliders"  {{$role->permissions->where('name','==','delete sliders')->first()==null?'':'checked'}}> حذف
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="edit sliders"  {{$role->permissions->where('name','==','edit sliders')->first()==null?'':'checked'}}> تعديل
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
                                                        <input type="checkbox" name="permissions[]" value="edit socialMedias"  {{$role->permissions->where('name','==','edit socialMedias')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show socialMedias"  {{$role->permissions->where('name','==','show socialMedias')->first()==null?'':'checked'}}> عرض
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
                                                        <input type="checkbox" name="permissions[]" value="edit settings"  {{$role->permissions->where('name','==','edit settings')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show settings"  {{$role->permissions->where('name','==','show settings')->first()==null?'':'checked'}}> عرض
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
                                                        <input type="checkbox" name="permissions[]" value="edit usages"  {{$role->permissions->where('name','==','edit usages')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show usages"  {{$role->permissions->where('name','==','show usages')->first()==null?'':'checked'}}> عرض
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
                                                        <input type="checkbox" name="permissions[]" value="edit home_page"  {{$role->permissions->where('name','==','edit home_page')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show home_page"  {{$role->permissions->where('name','==','show home_page')->first()==null?'':'checked'}}> عرض
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <h5>  تواصل معنا</h5>
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
                                                        <input type="checkbox" name="permissions[]" value="edit contact_us"  {{$role->permissions->where('name','==','edit contact_us')->first()==null?'':'checked'}}> تعديل
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="m-checkbox">
                                                        <input type="checkbox" name="permissions[]" value="show contact_us"  {{$role->permissions->where('name','==','show contact_us')->first()==null?'':'checked'}}> عرض
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