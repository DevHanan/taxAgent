@extends('layouts.dashboard')


@section('title')
    قالوا عنا
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/sayings')}}" class="m-nav__link">
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

                    <button saying="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                    </button>

                </div>
            </div>





        </div>


    @endif


    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet m-portlet--tab">


                <div class="m-portlet__body">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input saying="text" class="form-control m-input" placeholder="بحث..." id="generalSearch" value="">
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
                                     <th>اسم القائل</th>
                                     <th>الخدمة التي تلقاها</th>
                                    <th>ماذا قال عنا ؟</th>
                                    <th>تاريخ القول</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sayings as $key => $saying)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><a href="{{route('clients.edit',$saying->client->id)}}">{{$saying->client->name}}</a></td>
                                        <td>{{$saying->service_id}}</td>
                                        <td>{{$saying->body}}</td>
                                        <td>{{$saying->created_at->format('d / m / Y')}}</td>
                                        <td>
                                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-dropdown__toggle">
                                                    <button saying="button" class="btn btn-info m-btn m-btn--custom w-65 h-30 fs-10 p-0">خيارات</button>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">


                                                                    @can('delete sayings')
                                                                        <li class="m-nav__item">
                                                                            <form action="{{route('sayings.destroy',$saying->id)}}" class="m-nav__link  lh"  method="post">
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
                            {{$sayings->links() }}
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
                     <h5 class="modal-title" id="exampleModalLongTitle">اضف قول</h5>
                     <button saying="button" class="close pt-4" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group m-form__group mb-25">
                         <label for="exampleInputPassword1">القول :</label>
                         <input saying="password" class="form-control m-input" id="exampleInputPassword1" placeholder="القول">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button saying="button" class="btn btn-secondary m-btn m-btn--custom" data-dismiss="modal">الغاء</button>
                     <button saying="button" class="btn btn-primary m-btn m-btn--custom">حفظ</button>
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
                        saying: "get",
                    }).done(function (data) {
                    container.html(data.html);

                }).fail(function (jqXHR, ajaxOptions, thrownError) {

                });
            }
        </script>
    @endpush
@endsection