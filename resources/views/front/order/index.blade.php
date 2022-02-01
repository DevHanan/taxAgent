@extends('layouts.front')

@section('content')



    <div class="title-page">
        <div class="container">
            <h3> @lang('RequestService') </h3>
        </div>
    </div>



    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
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
                                        <h4>{{session('stored')}}</h4>
                                    </div>

                                    <button client="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                                    </button>

                                </div>
                            </div>





                        </div>


                    @endif
                    <div class=" widget ">
                        <form action="{{route('orders.store')}}" method="post" class="form_req">
                            @csrf
                            <div class="form-group">
                                <label for="الاسم"> @lang('name') </label>
                                <input type="text" class="form-control" name="title" placeholder="ادخل اسم مقدم الطلب أو الشركة" value="{{auth()->guard('client')->user()->name}}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('phone') </label>
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="ادخل رقم الهاتف مبدوءً بمقدمة الدولة" value="{{auth()->guard('client')->user()->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('email') </label>
                                        <input type="email" class="form-control" name="email" placeholder="ادخل بريدك او بريد شركتك" value="{{auth()->guard('client')->user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>   @lang('service') </label>
                                        <input type="text" class="form-control" name="service" value="{{$service->title}}"  readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>  @lang('budget') </label>
                                        <input type="number" class="form-control" name="budget"
                                               placeholder="@lang('enterBudget')">


                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="m-checkbox"> @lang('signature')  <a href="{{url('pdf/'.$service->contract->id)}}" target="_blank" class="pr-1"> @lang('ContractAgreement')</a>
                                            <input type="checkbox" name="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="general-btn-sm">@lang('submit')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection