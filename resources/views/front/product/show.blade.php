@extends('layouts.front')

    @section('content')


        <section class="main-content">
            <div class="container">
                <div class="single_section_products">
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
                    <div class="row">

                        <div class="col-lg-7">
                            <div class="master-single-product-gallary">
                                <div class="slider-2 owl-carousel owl-theme">
                                    <div class="image">
                                        <a href="{{asset('storage/'.$product->image->name)}}" data-fancybox="gallery">
                                            <img src="{{asset('storage/'.$product->image->name)}}" alt="">
                                        </a>
                                    </div>
                                    @foreach($product->images()->get() as $image)
                                        <div class="image">
                                            <a href="{{asset('storage/'.$image->name)}}" data-fancybox="gallery">
                                                <img src="{{asset('storage/'.$image->name)}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class=" images-single-product-gallary">
                                <div class="slider owl-carousel owl-theme">
                                    <div class="image">
                                        <img src="{{asset('storage/'.$product->image->name)}}" alt="">
                                    </div>
                                    @foreach($product->images()->get() as $key=>$image)
                                        <div class="image">
                                            <a href="{{asset('storage/'.$image->name)}}" data-fancybox="gallery" >
                                                <img src="{{asset('storage/'.$image->name)}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="wight-product-details border-bottom mb-3 pb-3">
                                <h1 class="title">
                                   {{$product->title}}
                                </h1>
                                <div class="data-rating d-flex align-items-center mb-3">
                  <span data-rating="5">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                                </div>
                                <div class="productPrice">
                  <span>
                    <span class="preReductionPrice text-line-through">${{$product->price}}</span>
                    <span class="discountBadge ml-5">
                      <span class="bg ">{{$product->discount}}%-</span>
                    </span>
                  </span>
                                    <span class="sellingPrice">${{((int)($product->price*(100-$product->discount))/100)}} </span>
                                </div>
                            </div>
                            <div class="wight-product-details border-bottom mb-3 pb-3">
                                <div class="product-action">
                                    <button class="btn-action" data-toggle="modal" data-target="#productModal">اطلب الأن</button>
                                </div>
                            </div>
                            <div class="post_share p-3">
                                <ul class="d-flex justify-content-end align-items-center">

                                    <li class="pr-2">

                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone=&text={{url()->current()}}%a&source=&data=" target="_blank">
                                            <img src="/front/images/share_whatsapp.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank">
                                            <img src="/front/images/share_facebook.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}&text={{$product->title}}"   target="_blank">
                                            <img src="/front/images/share_twitter.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pannel pannel_products mb-5">
                    <div class="pannel-header">
                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                            <li class="nav-item">
                                <h3 class="nav-link pointer active show" id="about-tab" data-toggle="tab" href="#about" role="tab"
                                    aria-controls="about" aria-selected="true">
                                    عن المنتج
                                </h3>
                            </li>
                        </ul>
                    </div>
                    <div class="pannel-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <div class="text-about-product">
                                    <ul class="list-features">
                                        <li>
                                           <p>
                                               {{$product->body}}
                                           </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mb-4">منتجات مشابهة</h3>
                <div class="row">

                    @foreach($product->type->products->take(3) as $sProduct)
                        <div class="col-lg-4">
                            <div class="item-product">
                                <span class="product-price-sale">-{{$sProduct->discount}}%</span>
                                <div class="product-image-area">
                                    <div class="product-image">
                                        <img
                                                src="{{asset('storage/'.$sProduct->image->name)}}"
                                                alt="">
                                    </div>
                                    <div class="product-details-btn">
                                        <a href="{{url('/products/'.$sProduct->slug)}}">التفاصيل</a>
                                    </div>
                                    <div class="product-price">
                                        ${{$sProduct->price}}
                                    </div>
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">
                                        <a href="{{url('/products/'.$sProduct->slug)}}">{{$sProduct->title}}</a>
                                    </h3>
                                    <p class="category_product"><i class="fas fa-stream pr-1"></i>{{$sProduct->type->title}}</p>
                                </div>
                            </div>
                        </div>
                     @endforeach

                </div>
            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{route('request.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">شراء المنتج</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>الكمية</label>
                                <div class="quantity xs_input_number">
                                    <input type="text" class="form-control text-center" minlength="1" maxlength="100" value="1" name="quantity"
                                           id="input_id"><span class="sub"><img src="/front/images/minus.png" alt=""></span><span class="add"><img
                                                src="/front/images/plus.png" alt=""></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>العنوان</label>
                                <input type="text" class="form-control"  placeholder="عنوان الاستلام :   الدولة > المدينة > المنطقة > الشارع > رقم المينى" name="address">
                            </div>
                            <div class="form-group">
                                <label>اختياري</label>
                                <input type="text" class="form-control" name="notes" placeholder="ملاحظات أخرى ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-success mr-2">حفظ </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    @endsection