@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3> الملف الشخصي </h3>
            </div>
        </div>


        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="portlet">
                            <div class="portlet-head">
                                <div class="portlet-head-label">
                                    <h3 class="portlet-head-title">تعديل ملفي الشخصي </h3>
                                </div>
                            </div>
                            <div class="portlet-body main-profile">
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

                                                    <button client="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                                                    </button>

                                                </div>
                                            </div>





                                        </div>


                                    @endif
                                <form action="{{route('client.update', $client->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="الاسم كامل" value="{{$client->name}}" name="name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="البريد الالكرتوني" value="{{$client->email}}" name="email" >
                                            </div>

                                           <div class="row">
                                   
                                    <div class="form-group col-6">
                                    <input type="text" class="form-control" placeholder="@lang('phone')" name="phone" value="{{$client->phone }}">
                                </div>
                                <div class="form-group col-6">
                                    <input type="text" class="form-control" placeholder="@lang('whatsapp')" name="whatsapp" value="{{$client->whatsapp }}">
                                </div>
                                   
                               </div>
                                                <div class="row">
                                <div class="form-group col-4">
                                    <input type="text" class="form-control" placeholder="@lang('contry')" name="contry" value="{{ $client->contry }}">
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" class="form-control" placeholder="@lang('city')" name="city" value="{{ $client->city }}">
                                </div>
                                 <div class="form-group col-4">
                                    <input type="text" class="form-control" placeholder="@lang('street')" name="street" value="{{  $client->street }}">
                                </div>
                                </div>
                                            <div class="form-group">
                                                <select class="form-control selectpicker" title="نوع التسجيل" name="type" >
                                                    <option value="0" {{$client->type==0?'selected':''}}>@lang('businessOwner')</option>
                                                    <option value="1" {{$client->type==1?'selected':''}}>@lang('accountant')</option>
                                                    <option value="2" {{$client->type==2?'selected':''}}> @lang('company')</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea rows="7"  class="form-control" title=" وصف تعريفي" name="about" placeholder="وصف تعريفي">{{$client->about}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="edit-imageProfile text-center my-5 my-lg-0">
                                                <img src="{{$client->image['name']==null?asset('avatar.png'):asset('storage/'.$client->image['name'])}}" id="imgshow" class=" d-block mx-auto" alt="">
                                                <label for="imgload" class="btn_edit_profile d-block pointer p-0"><span>رفع صورة شخصية</span>
                                                    <i class="fas fa-cloud-upload-alt d-block mt-1"></i>

                                                <input id="imgload" style="display:none;" type="file" name="file">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button class="general-btn-sm">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection