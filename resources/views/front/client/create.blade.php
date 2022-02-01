@extends('layouts.front')

    @section('content')

        <div class="title-page">
            <div class="container">
                <h3> @lang('register') </h3>
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="login_content">
                            <form action="/register/client" method="post" class="register_form">
                                @csrf
                                <h4 class="text-center mb-3">@lang('registerOur')</h4>
                                <div class="d-flex align-items-center justify-content-evenly flex-wrap mb-4">
                                    <div class="widget__item-1 mb-lg-0">
                                        <div class="widget__item-image">
                                            <img src="/front/images/img-1.jpg" alt="">
                                        </div>
                                        <h3 class="widget__item-title">@lang('businessOwner')</h3>
                                    </div>
                                    <span>@lang('or')</span>
                                    <div class="widget__item-1 mb-lg-0">
                                        <div class="widget__item-image">
                                            <img src="/front/images/img_25.png" alt="">
                                        </div>
                                        <h3 class="widget__item-title">@lang('accountant')</h3>
                                    </div>
                                    <span>@lang('or')</span>
                                    <div class="widget__item-1 mb-lg-0">
                                        <div class="widget__item-image">
                                            <img src="/front/images/img-2.jpg" alt="">
                                        </div>
                                        <h3 class="widget__item-title">@lang('company')</h3>
                                    </div>
                                </div>
                                <h4 class="text-center mb-4">@lang('enjoy')</h4>
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="@lang('fullName')" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="@lang('email')" name="email" value="{{old('email')}}">
                                </div>
                               <div class="row">
                                   
                                    <div class="form-group col-6">
                                    <input type="text" class="form-control" placeholder="@lang('phone')" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group col-6">
                                    <input type="text" class="form-control" placeholder="@lang('whatsapp')" name="whatsapp" value="{{old('whatsapp')}}">
                                </div>
                                   
                               </div>
                                <div class="row">
                                <div class="form-group col-4">
                                    <input type="text" class="form-control" placeholder="@lang('contry')" name="contry" value="{{old('contry')}}">
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" class="form-control" placeholder="@lang('city')" name="city" value="{{old('city')}}">
                                </div>
                                 <div class="form-group col-4">
                                    <input type="text" class="form-control" placeholder="@lang('street')" name="street" value="{{old('street')}}">
                                </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control selectpicker" title="@lang('typeOfRegister')" name="type">
                                        <option value="1">@lang('businessOwner')</option>
                                        <option value="0">@lang('accountant')</option>
                                        <option value="2"> @lang('company')</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="@lang('password')" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="@lang('cPassword')" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="general-btn-lg"> @lang('submitRegister')</button>
                                </div>


                                    <div class="form-group">
                                        <label class="m-checkbox"> @lang('accept') <a href="/usage" class="pr-1"> @lang('Terms&Conditions') </a>
                                            <input type="checkbox" name="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection