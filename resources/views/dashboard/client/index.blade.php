@extends('layouts.dashboard')


@section('title')
    عميلات المنتجات
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/clients')}}" class="m-nav__link">
            <span class="m-nav__link-text">@yield('title')</span>
        </a>
    </li>

@endsection

@section('content')
    @if(session()->has('deleted'))

        <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">


            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <h6>{{session('deleted')}}</h6>
                    </div>

                    <button client="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                    </button>

                </div>
            </div>





        </div>


    @endif


    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet m-portlet--tab">
                @can('create clients')
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <a href="{{url('/admin/clients/create')}}" class="btn btn-success" {{--data-toggle="modal" data-target="#m_modal_6"--}}><i class="fa fa-plus pr-2"></i>اضافة عميل</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endcan
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input client="text" class="form-control m-input" placeholder="بحث..." id="generalSearch" value="">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="ajax">
                            <table id="datatable" class="text-center table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>صورة العميل</th>
                                    <th>اسم العميل</th>
                                    <th>الفئة</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>رقم المحمول</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $key => $client)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><img src="{{asset('storage/'. $client->image['name']==null?$value->get('logo'):$client->image['name'] )}}" height="50px" alt="IMage"></td>
                                        <td>{{$client->name}}</td>

                                        <td>{{\App\Course::targetsArr[$client->type]}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->phone}}</td>

                                        <td>{{$client->created_at->format('d / m / Y')}}</td>
                                        <td>
                                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-dropdown__toggle">
                                                    <button client="button" class="btn btn-info m-btn m-btn--custom w-65 h-30 fs-10 p-0">خيارات</button>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">
                                                                    @can('edit clients')
                                                                        <li class="m-nav__item">
                                                                            <a href="{{url('admin/clients/'.$client->id.'/edit ')}}" class="m-nav__link  lh">
                                                                                <i class="fa fa-edit m-nav__link-icon fa-1x"></i>
                                                                                <span class="m-nav__link-text fs-12 " >
                                                                                    تعديل
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                        @can('delete clients')
                                                                            <li class="m-nav__item">
                                                                                <form action="{{route('clients.destroy',$client->id)}}" class="m-nav__link  lh"  method="post">
                                                                                    @csrf @method('DELETE')
                                                                                    <i class="fa fa-trash-alt m-nav__link-icon fa-1x"></i>
                                                                                    <span class="m-nav__link-text fs-12 " >
                                                                                     <input type="submit" value="حذف" class="btn btn-none bg-white p-0" style="color: #6f727d;" onclick="return confirm('هل أنت متأكد من عملية الحذف ؟!')">
                                                                                </span>

                                                                                </form>
                                                                            </li>
                                                                        @endcan
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            {{$clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Start Modal--}}
    {{-- <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">اضف عميل</h5>
                     <button client="button" class="close pt-4" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group m-form__group mb-25">
                         <label for="exampleInputPassword1">العميل :</label>
                         <input client="password" class="form-control m-input" id="exampleInputPassword1" placeholder="العميل">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button client="button" class="btn btn-secondary m-btn m-btn--custom" data-dismiss="modal">الغاء</button>
                     <button client="button" class="btn btn-primary m-btn m-btn--custom">حفظ</button>
                 </div>
             </div>
         </div>
     </div>--}}
    {{--End Modal--}}

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

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
                        _token:'{!! csrf_token() !!}'
                    },
                    // success: function(data){
                    //     $('table > tbody').html(data.success);
                    // }

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
        <script>
            $(document).on('click', '.pagination a', function (event) {

                event.preventDefault();
                $(this).parents('.pagination').find('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#generalSearch').val();
                getData(page, search);

            });

            function getData(page, search) {
                var container = $('#ajax');

                $.ajax(
                    {
                        url: "{{url()->current()}}"+'?page=' + page + '&q=' + search,
                        client: "get",
                    }).done(function (data) {
                    container.html(data.html);

                }).fail(function (jqXHR, ajaxOptions, thrownError) {

                });
            }
        </script>
    @endpush
@endsection