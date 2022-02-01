@extends('layouts.dashboard')


@section('title')
   {{$album->title}}
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/albums')}}" class="m-nav__link">
            <span class="m-nav__link-text">معرض الصور</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{url('admin/albums/'.$album->id.'/edit')}}" class="m-nav__link">
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
    <!--begin::Form-->
    <form action="{{route('albums.update',$album->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_album_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        اللغة العربية
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_album_profile_tab_2" role="tab">
                                        اللغة الإنجليزية
                                    </a>
                                </li>

                            </ul>
                        </div>
                       {{-- <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                            <i class="la la-gear"></i>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__section m-nav__section--first">
                                                                <span class="m-nav__section-text">Quick Actions</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Create Post</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Send Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                    <span class="m-nav__link-text">Upload File</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__section">
                                                                <span class="m-nav__section-text">Useful Links</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit m--hide">
                                                            </li>
                                                            <li class="m-nav__item m--hide">
                                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>--}}
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane active" id="m_album_profile_tab_1">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">عنوان الألبوم</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="عنوان الألبوم" id="example-text-input" name="title_ar" value="{{$album->getTranslation('title','ar')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="m_album_profile_tab_2"  style="direction: ltr;">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body text-right">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">album title</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="album title" id="example-text-input" name="title_en" value="{{$album->getTranslation('title','en')}}">
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
             </div>
        </div>
    </form>
    <!--end::Form-->

    <form action="{{route('Images.store' )}}" class="dropzone"  id="album" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="album_id" value="{{$album->id}}">
        <div class="dz-message" data-dz-message><span>أسحب / أضغظ لرفع الصور / ة</span></div>

        <div class="fallback">
            <input name="file" type="file" multiple />

        </div>
    </form>
    @push('scripts')
        <!--end::Global Theme Bundle -->


        <script>
            Dropzone.options.album = {
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks : true,
                dictRemoveFileConfirmation:"هل أنت متأكد من حذف الصورة ؟! ",
                removedfile: function(file)
                {
                    var name = file.name;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route("Images.delete") }}',
                        data: {
                            filename: name,
                            _token:'{!! csrf_token() !!}',
                        },
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                init: function () {
                    var thisIs = this;
                    /*START DISPLAY IMAGES */
                    jQuery.ajax({
                        url: "{{route('Images.getAllImages')}}",
                        method: 'POST',
                        data: {
                            _token: '{!! csrf_token() !!}',
                            album_id: '{{$album->id}}',
                        },
                        success: function (data) {

                            $.each(data, function (index, item) {
                                //// Create the mock file:

                                var mockFile = {
                                    name: item.name,
                                };
                                // Call the default addedfile event handler
                                thisIs.emit("addedfile", mockFile);
                                // And optionally show the thumbnail of the file:
                                thisIs.emit("thumbnail", mockFile, "/storage/" + item.name);
                            });


                        }
                    });

                    /*END DISPLAY IMAGES */
                },
            }

        </script>

    @endpush
@endsection