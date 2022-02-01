@extends('layouts.front')

    @section('content')
        <div class="title-page">
            <div class="container">

                <h3> {{$client->name}} </h3>
            </div>
        </div>
{{--        {{dd($client->type)}}--}}

        <section class="main-content">
            <div class="container">
                <div class="testimonial-block">
                    <div class="text-right mb-2">
                        <button type="button" class="btn btn-dark py-2 px-4 btn_url" data-url="{{url()->current()}}" data-toggle="tooltip" data-placement="bottom" title=" @lang('copyProfileLinke')">@lang('profileLinke')</button>
                         @if(auth()->guard('client')->check() && auth('client')->id()==$client->id)
                          <a href="{{route('client.edit',$client->name)}}"  class="btn btn-default ">تعديل الملف الشخصي</a>
                        @endif
                    </div>
                    <div class="inner-box">
                        <div class="content p-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="title mb-3"> {{$client->name}} </h3>
                                    <div class="info">
                                        <ul class="flex-column align-items-start">
                                            <li class="mb-2"><i class="fas fa-briefcase"></i><span class="px-2">{{\App\Course::targetsArr[$client->type]}}</span> </li>
                                            <li class="mb-2"><i class="fas fa-globe-europe"></i><span class="px-2">{{ $client->contry }}-{{ $client->city }}-{{$client->street}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="text">
                                        {{$client->about}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="image-company text-center">
                                        <img src="{{$client->image['name']==null?asset('avatar.png'):asset('storage/'.$client->image['name'])}}" alt="No Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@push('scripts')
    <script>

        $('[data-toggle="tooltip"]').tooltip()

        $('.btn_url').click(function (e) {
            e.preventDefault();

            var copyText = $(this).attr('data-url');

            var textarea = document.createElement("textarea");
            textarea.textContent = copyText;
            textarea.style.position = "fixed";
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);


            $('[data-toggle="tooltip"]').tooltip('hide').attr('data-original-title', '@lang("done")').tooltip('show');

        });


        $('.btn_url').mouseleave(function(){
            $('[data-toggle="tooltip"]').tooltip('hide').attr('data-original-title', '@lang("copyProfileLinke")')
        })
    </script>
@endpush
    @endsection