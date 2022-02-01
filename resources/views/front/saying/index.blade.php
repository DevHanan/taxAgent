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
                <h3> @lang('testimonials') </h3>
            </div>
        </div>

        <section class="main-content">
            <div class="container">
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
                <div class="row mb-4">
                    <div class="col-lg-4 ml-auto">

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group text-right">
                            <button class="general-btn-xs rounded " data-toggle="modal" data-target="#ModalClient">نعتز بشهادتك</button>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @if($sayings->count()>0)

                        @foreach($sayings as $saying)
                            <div class="col-sm-6">
                                <div class="testimonial-block">
                                    <a href="/client/{{$saying->client['id']}}/{{$saying->client['name']}}">
                                        <div class="inner-box">
                                            <div class="content">
                                                <div class="image">
                                                    <img src="{{asset('storage/'.$saying->client->image['name'])}}" alt="">
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="title pr-0"><a href="/client/{{$saying->client['id']}}/{{$saying->client['name']}}">{{$saying->client->name}}</a> </h3>
                                                   @if(auth('client')->check()==true)
                                                        @if($saying->client->id==auth('client')->id())
                                                            <div class="head-toolbar-dropdown ">
                                                                <a href="#" class="btn btn-label-light btn-sm " data-toggle="dropdown">
                                                                    <i class="fas fa-ellipsis-v" ></i>
                                                                </a>
                                                              @if(auth("client")->id() == $saying->client_id)
                                                                <div class="dropdown-menu">
                                                                    <a href="{{route('saying.delete')}}" class="dropdown- dropdown-item">
                                                                        @lang('delete')
                                                                    </a>
                                                                </div>
                                                              @endif
                                                            </div>
                                                        @endif
                                                   @endif

                                                </div>
                                                <div class="text">{{$saying->body}}</div>

                                                <div class="info">
                                                    <ul>
                                                        <li><i class="icon-jobs pr-1"></i>الخدمات التي تلقاها:</li>
                                                        <li>{{$saying->service_id}}</li>
                                                    </ul>
                                                </div>
                                                <div class="info">
                                                    <ul>
                                                        <li><i class="fas fa-globe-europe pr-1"></i>{{$saying->client->address}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    @endif


                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{$sayings->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="ModalClient">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  @if(auth('client')->check())
                     <form action="{{route('saying.store',auth('client')->user()->name)}}" method="post" >
                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">عزيزي العميل نعتز و نفتخر بشهادتك و توصيتك ، بك نرتقي 🌹</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <select class="form-control m-select2 selectpaicker" id="m_select1"  name="service_id" title="الخدمة التي تلقيتها">
                                    <option value=""></option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="7"placeholder="@lang('testimonials')" name="body"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="general-btn-xs rounded ">@lang('submit')</button>
                        </div>
                    </form>
                    @else 
                    <a href="/login/client" class="general-btn-xs rounded"> <i class="icon-login"></i> Sign in </a>
                  @endif
                </div>
            </div>
        </div>

        @push('scripts')
             <script src="{{asset('dashboard/js/bootstrap-select.js')}}" type="text/javascript"></script>

            <script>
                $(document).ready(function() {
                    $('#m_select1').select2({
                        placeholder: "الخدمة التي تلقيتها",
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