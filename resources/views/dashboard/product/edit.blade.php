@extends('layouts.dashboard')


@section('title')
   {{$product->title}}
@endsection

@section('path')
    <li class="m-nav__item">
        <a href="{{url('admin/products')}}" class="m-nav__link">
            <span class="m-nav__link-text">المنتجات</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="m-nav__link">
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
    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_product_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        اللغة العربية
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_product_profile_tab_2" role="tab">
                                        اللغة الإنجليزية
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="tab-content">

                        <div class="tab-pane active" id="m_product_profile_tab_1">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">عنوان المنتج </label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="عنوان المنتج " id="example-text-input" name="title_ar"  value="{{$product->getTranslation('title','ar')}}">
                                        </div>
                                    </div>


                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">التصنيف</label>
                                        <div class="col-9">
                                            <select class="form-control m-select2" id="m_select1"  name="type_id" >
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}"{{$type->id==$product->id?'selected':''}}>{{$type->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">سعر المنتج</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="number" placeholder="سعر المنتج" id="example-text-input" name="price"  value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">نسبة الخصم</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="number" placeholder="نسبة الخصم " id="example-text-input" name="discount"  value="{{$product->discount}}">
                                        </div>
                                    </div>




                                    <div class="form-group m-form__group row mb-25">
                                        <label for="exampleFormControlTextarea1" class="col-3 col-form-label">تفاصيل المنتج</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="تفاصيل المنتج" name="body_ar">
                                                {{$product->getTranslation('body','ar')}}
                                            </textarea>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="m_product_profile_tab_2"  style="direction: ltr;">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__body text-right">
                                    <!--begin::Section-->
                                    <div class="form-group m-form__group row mb-25">
                                        <label for="example-text-input" class="col-3 col-form-label">product title</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" placeholder="product title" id="example-text-input" name="title_en"  value="{{$product->getTranslation('title','en')}}">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row mb-25">
                                        <label for="exampleFormControlTextarea1" class="col-3 col-form-label">product details</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"    placeholder="product details" name="body_en" >
                                                {{$product->getTranslation('body','en')}}
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

                        <label class="col-form-label col-sm-12"><h4>الصورة البارزة للمنتج</h4></label>
                    </div>
                    <div class="m-portlet__body">
                        <img src="{{asset('storage/'.$product->image->name)}}" alt="" class="img-fluid" height="250px">
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
    <form action="{{route('ImagesOfProducts.store' )}}" class="dropzone"  id="product" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="dz-message" data-dz-message><span>أسحب / أضغظ لرفع الصور / ة</span></div>

        <div class="fallback">
            <input name="file" type="file" multiple />

        </div>
    </form>

    @push('scripts')


        <script>
            Dropzone.options.product = {
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
                        url: '{{ route("Images.destroyOfProduct") }}',
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
                        url: "{{route('Images.getAllImagesOfProduct')}}",
                        method: 'POST',
                        data: {
                            _token: '{!! csrf_token() !!}',
                            product_id: '{{$product->id}}',
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


        <script src="{{asset('dashboard/js/bootstrap-select.js')}}" type="text/javascript"></script>

        <script>
            $(document).ready(function() {
                $('#m_select1').select2({
                    placeholder: "اختر تصنيف المنتج",
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