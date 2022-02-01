@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3>  @lang('login') </h3>
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
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
                        <div class="login_content">
                            <div class="image text-center mb-4">
                                <img src="/front/images/login.png" alt="">
                            </div>
                            <form action="/login/client" class="login_form" accept-charset="UTF-8" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="@lang('email')" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="@lang('password')" name="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="general-btn-lg"> @lang('submitLogin')</button>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between mt-4 ">
                                        <!--<a href="" class="link">@lang('forgetPassword')</a>-->
                                        <a href="{{url('/register/client')}}" class="link">@lang('submitRegister')</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection