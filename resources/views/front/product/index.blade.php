@extends('layouts.front')

    @section('content')


        <div class="title-page">
            <div class="container">
                <h3> @lang('market') </h3>
            </div>
        </div>

        <section class="section_products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class=" widget ">
                            <h5 class="widget-title">التصنيفات</h5>
                            <ul class="category-list list-unstyled mb-0">
                                <li>
                                    <a href=""> الكل </a>
                                </li>
                                @foreach($types as $type)
                                    <li>
                                        <a href="{{url('/types/'.$type->slug)}}"> {{$type->title}} </a>
                                    </li>
                                 @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">

                            @if($products->count()>0)

                                    @foreach($products as $product)
                                        <div class="col-lg-4">
                                        <div class="item-product">
                                            <span class="product-price-sale">-{{$product->discount}}%</span>
                                            <div class="product-image-area">
                                                <div class="product-image">
                                                    <img src="/front/images/img-5.jpg" alt="">
                                                </div>
                                                <div class="product-details-btn">
                                                    <a href="{{url('/products/'.$product->slug)}}">التفاصيل</a>
                                                </div>
                                                <div class="product-price">
                                                    ${{$product->price}}
                                                </div>
                                            </div>
                                            <div class="product-details">
                                                <h3 class="product-title">
                                                    <a href="{{url('/products/'.$product->slug)}}">{{$product->title}}</a>
                                                </h3>
                                                <p class="category_product"><i class="fas fa-stream pr-1"></i>{{$product->type->title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                     @endforeach

                            @endif

                            <div class="col-lg-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{$products->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    @endsection