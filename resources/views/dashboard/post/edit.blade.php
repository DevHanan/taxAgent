@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset('dashboard/css/custom-style.css')}}">
@endpush

@section('title')
    مقال جديد
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/posts')}}" class="m-nav__link">
            <span class="m-nav__link-text">المقالات</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{url('admin/posts/create')}}" class="m-nav__link">
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

    @if(session()->has('deleted'))

        <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">


            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <h6>{{session('deleted')}}</h6>
                    </div>

                    <button type="button" class="close btn-lg col-lg-1 text-right" data-dismiss="alert" aria-label="Close">
                    </button>

                </div>
            </div>





        </div>


    @endif

    <!--begin::Form-->
    <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_post_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        اللغة العربية
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_post_profile_tab_2" role="tab">
                                        اللغة الإنجليزية
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                            <i class="la la-gear"></i>
                                        </a>
                                     </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane active" id="m_post_profile_tab_1">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">عنوان المقال</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="عنوان المقال" id="example-text-input" name="title_ar" value="{{$post->getTranslation('title','ar')}}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">التصنيف</label>
                                        <div class="col-9">
                                            <select class="form-control m-select2" id="m_select1"  name="category_id">
                                                <option value=" ">- - -</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"  {{ $post->category->id == $category->id?'selected':''}} >{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">الألبوم <small class="text-info">-اختياري-</small></label>
                                        <div class="col-9">
                                            <select class="form-control m-select2" id="m_select2"  name="album_id">
                                                <option value=" ">بـلا</option>
                                                @foreach($albums as $album)
                                                    <option value="{{$album->id}}" {{ $post->album['id'] == $album->id?'selected':''}} >{{$album->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-40 m-form__group row">
                                        <label for="example-text-input" class="col-3 col-form-label ">نص المقال</label>
                                        <div class="col-9">
                                                 <textarea class="summernote form-control m-input" id="m_summernote_1" name="body_ar">
                                                        {!! $post->getTranslation('body','ar') !!}
                                                 </textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="m_post_profile_tab_2"  style="direction: ltr;">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body text-right">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">post title</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="post title" id="example-text-input" name="title_en" value="{{$post->getTranslation('title','en')}}">
                                        </div>
                                    </div>

                                    <div class="mb-40 m-form__group row">
                                        <label for="example-text-input" class="col-3 col-form-label ">body</label>
                                        <div class="col-9">
                                                 <textarea class="summernote form-control m-input" id="m_summernote_1" name="body_en">
                                                        {!! $post->getTranslation('body','en') !!}
                                                 </textarea>
                                        </div>
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

                <div class="m-portlet m-portlet--tab mb-25">
                    <div class="m-portlet__head p-3">

                        <label class="col-form-label col-sm-12"><h4>الصورة الرئيسية للمقال</h4></label>
                    </div>
                    <div class="m-portlet__body">
                        <img src="{{asset('storage/'.$post->image->name)}}" alt="" class="img-fluid" height="250px">
                        <label class="col-form-label col-sm-12">اختر صورة </label>
                        <div class="col-sm-12">
                            {{--                                <div class="m-dropzone dropzone" action="inc/api/dropzone/upload.php" id="m-dropzone-one">--}}
                            {{--                                    <div class="m-dropzone__msg dz-message needsclick">--}}
                            {{--                                        <h3 class="m-dropzone__msg-title">اضغط هنا لاختيار الصورة</h3>--}}
                            {{--                                        <input type="file" name="image_id">--}}
                            {{--                                    </div>--}}
                            {{--                                    --}}
                            {{--                                </div>--}}
                            <input type="file" name="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
{{--Start Post Comments--}}

    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__body">
        <div class="form-group m-form__group row align-items-center">
            <div class="row">
                <div class="col-md-12" id="ajax">
                    <table id="datatable" class="text-center table table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>العميل</th>
                            <th>نص التعليق</th>
                            <th>تاريخ التعليق</th>
                            @can('delete comment')
                            <th>خيارات</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments()->get() as $key => $comment)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><a href="{{route('clients.edit',$comment->client->id)}}">{{$comment->client->name}}</a></td>
                                <td>{{$comment->body}}</td>
                                <td>{{$post->created_at->format('d / m / Y')}}</td>
                                <td>
                                    @can('delete comment')
                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                        <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-dropdown__toggle">
                                            <button type="button" class="btn btn-info m-btn m-btn--custom w-65 h-30 fs-10 p-0">خيارات</button>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">





                                                                <li class="m-nav__item">
                                                                    <form action="{{route('comment.delete',$comment)}}" class="m-nav__link  lh"  method="post">
                                                                        @csrf @method('DELETE')
                                                                        <i class="fa fa-trash-alt m-nav__link-icon fa-1x"></i>
                                                                        <span class="m-nav__link-text fs-12 " >
                                                                        <input type="submit" value="حذف" class="btn btn-none bg-white p-0" style="color: #6f727d;" onclick="return confirm('هل أنت متأكد من عملية الحذف ؟!')">
                                                                    </span>

                                                                    </form>
                                                                </li>





                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
            </div></div></div>
{{--End Post Comments--}}
    @push('scripts')
        <script src="{{asset('dashboard/js/summernote.js')}}" type="text/javascript"></script>
        <script src="{{asset('dashboard/js/bootstrap-select.js')}}" type="text/javascript"></script>

        <script>
            $(document).ready(function() {
                $('#m_select1').select2({
                    placeholder: "اختر التصنيف",
                    dir: "rtl",

                    language: {
                        "noResults": function () {
                            return "لا توجد نتائج";
                        }
                    }
                });

                $('#m_select2').select2({
                    placeholder: "اختر الألبوم",
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