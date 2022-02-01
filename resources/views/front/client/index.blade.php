@extends('layouts.front')
@push('css')
    <style>
        .testimonial-block{
            -webkit-box-shadow: 7px 11px 40px 0px rgba(0, 0, 0, 0.02);
            box-shadow: 7px 11px 40px 0px rgba(0, 0, 0, 0.02);
            -webkit-transition: .2s ease-in-out;
            transition: .2s ease-in-out;
        }
        .testimonial-block:hover{
            -webkit-box-shadow: 7px 16px 40px 0px rgba(0, 0, 0, 0.09);
            box-shadow: 7px 16px 40px 0px rgba(0, 0, 0, 0.07);
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
        }

        .testimonial-block .info ul li {
            color: #2c2c2c;
        }
    </style>
    @endpush
    @section('content')


        <div class="title-page">
            <div class="container">
                <h3> @lang('clients') </h3>
            </div>
        </div>

        <section class="main-content">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-4 mx-auto">
                        <div class="form-group">
                            <div class="input-icon">
                                <input type="text" class="form-control bg-white" id="generalSearch" placeholder="@lang('searchAboutClient')">
                                <span class="input-icon__icon">
                   <i class="fa fa-search"></i>
                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="ajax">

                    @if($clients->count()>0)

                           @foreach($clients as $client)
                            <div class="col-sm-6">

                                <a href="{{url('client/'.$client->id.'/'.$client->name)}}">
                                    <div class="testimonial-block">
                                        <div class="inner-box">
                                            <div class="content">
                                                <div class="image">
                                                    <img src="{{$client->image['name']==null?asset('avatar.png'):asset('storage/'.$client->image->name)}}" alt="No Image">
                                                </div>
                                                <h3 class="title"> {{$client->name}} </h3>
                                                <div class="text">
                                                    {{str_limit($client->about==null?'- - -':$client->about,300)}}
                                                </div>

                                                <div class="info">
                                                    <ul>
                                                        <li><i class="icon-jobs pr-1"></i> </li>
                                                        <li>{{\App\Course::targetsArr[$client->type]}}</li>
                                                    </ul>
                                                </div>
                                                <div class="info">
                                                    <ul>
                                                        <li><i class="fas fa-globe-europe pr-1"></i>{{ $client->contry }}-{{ $client->city }}-{{$client->street}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            @endforeach


                    @endif

                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{$clients->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        @push('scripts')


            <script>

                $('#generalSearch').on('keyup', function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ url()->current() }}',
                        method: 'GET',
                        data: {
                            q:$('#generalSearch').val(),
                            _token:'{!! csrf_token() !!}',
                        },


                    })
                        .done(function(data){
                            // alert(data.success);
                            $('#ajax').html(data.html);
                        })
                        .fail(function(){
                            alert("فشلت عملية البحث");
                        });


                });
            </script>

        @endpush


    @endsection