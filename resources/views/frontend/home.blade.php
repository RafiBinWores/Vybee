@extends('frontend.layouts.app')

{{-- page title --}}
@section('page-title')
    Vybee | Top Fashion Shop
@endsection

{{-- page content --}}
@section('content')
    <div class="slider-wrapper">
        <div class="swiper-button-prev visible-lg"></div>
        <div class="swiper-button-next visible-lg"></div>
        <div class="swiper-container" data-parallax="1" data-auto-height="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('{{ asset('front-assets/img/background-3.jpg') }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="cell-view page-height">
                                    <div class="col-xs-b40 col-sm-b80"></div>
                                    <div data-swiper-parallax-x="-600">
                                        <div class="simple-article light transparent size-3">UP TO 70% OFF</div>
                                        <div class="col-xs-b5"></div>
                                    </div>
                                    <div data-swiper-parallax-x="-500">
                                        <h1 class="h1 light">Fashion collection winter sale</h1>
                                        <div class="title-underline light left"><span></span></div>
                                    </div>
                                    <div data-swiper-parallax-x="-400">
                                        <div class="simple-article size-4 light transparent">
                                            <p>In feugiat molestie tortor a malesuada. Etiam a venenatis ipsum. Proin
                                                pharetra elit at feugiat commodo vel placerat tincidunt sapien nec</p>
                                        </div>
                                        <div class="col-xs-b30"></div>
                                    </div>
                                    <div data-swiper-parallax-x="-300">
                                        <div class="buttons-wrapper">
                                            <a class="button size-2 style-1" href="#">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                    <span class="text">Learn More</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-b40 col-sm-b80"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row-background right hidden-xs" data-swiper-parallax-x="-600">
                            <img src="{{ asset('front-assets/img/hero.png') }}" alt="" />
                        </div>
                        <div class="empty-space col-xs-b80 col-sm-b0"></div>
                    </div>
                </div>
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('front-assets/img/background-3.jpg') }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-6 col-sm-text-right">
                                <div class="cell-view page-height">
                                    <div class="col-xs-b40 col-sm-b80"></div>
                                    <div data-swiper-parallax-x="-600">
                                        <div class="simple-article light transparent size-3">UP TO 70% OFF</div>
                                        <div class="col-xs-b5"></div>
                                    </div>
                                    <div data-swiper-parallax-x="-500">
                                        <h1 class="h1 light">Fashion collection winter sale</h1>
                                        <div class="title-underline light left"><span></span></div>
                                    </div>
                                    <div data-swiper-parallax-x="-400">
                                        <div class="simple-article size-4 light transparent">
                                            <p>In feugiat molestie tortor a malesuada. Etiam a venenatis ipsum. Proin
                                                pharetra elit at feugiat commodo vel placerat tincidunt sapien nec</p>
                                        </div>
                                        <div class="col-xs-b30"></div>
                                    </div>
                                    <div data-swiper-parallax-x="-300">
                                        <div class="buttons-wrapper">
                                            <a class="button size-2 style-1" href="#">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                    <span class="text">Learn More</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-b40 col-sm-b80"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row-background left hidden-xs" data-swiper-parallax-x="-600">
                            <img src="{{ asset('front-assets/img/hero.png') }}" alt="" />
                        </div>
                        <div class="empty-space col-xs-b80 col-sm-b0"></div>
                    </div>
                </div>
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('front-assets/img/background-3.jpg') }}');">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 col-sm-text-center">
                                <div class="cell-view page-height">
                                    <div class="col-xs-b40 col-sm-b80"></div>
                                    <div data-swiper-parallax-x="-600">
                                        <div class="simple-article light transparent size-3">UP TO 70% OFF</div>
                                        <div class="col-xs-b5"></div>
                                    </div>
                                    <div data-swiper-parallax-x="-500">
                                        <h1 class="h1 light">Fashion collection winter sale</h1>
                                        <div class="title-underline light left"><span></span></div>
                                    </div>
                                    <div data-swiper-parallax-x="-400">
                                        <div class="simple-article size-4 light transparent">
                                            <p>In feugiat molestie tortor a malesuada. Etiam a venenatis ipsum. Proin
                                                pharetra elit at feugiat commodo vel placerat tincidunt sapien nec</p>
                                        </div>
                                        <div class="col-xs-b30"></div>
                                    </div>
                                    <div data-swiper-parallax-x="-300">
                                        <div class="buttons-wrapper">
                                            <a class="button size-2 style-1" href="#">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                    <span class="text">Learn More</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-b40 col-sm-b80"></div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space col-xs-b80 col-sm-b0"></div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
        </div>
    </div>

    <div class="grey-background">
        <div class="container">

            {{-- Featured category start --}}
            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="h4">featured categories</div>
            <div class="row">
                <div class="empty-space col-xs-b20"></div>

                @if (getFeaturedCategories()->isNotEmpty())
                    @foreach (getFeaturedCategories() as $featuredCategory)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xs-b25">
                            <div class="product-shortcode style-4 light clearfix">
                                <a class="preview" href="#">
                                    @if ($featuredCategory->image != '')
                                        <img src="{{ asset('storage/category/' . $featuredCategory->image) }}"
                                            alt="{{ $featuredCategory->name }}">
                                    @else
                                        <img src="{{ asset('front-assets/img/product-31.jpg') }}"
                                            alt="{{ $featuredCategory->name }}">
                                    @endif

                                </a>
                                <div class="description" style="margin-top: 25px;">
                                    <h6 class="h6 col-xs-b10"><a href="#">{{ $featuredCategory->name }}</a></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- Featured category end --}}

            {{-- Featured products start --}}
            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="h4">Featured products</div>

            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="slider-wrapper">
                <div class="swiper-button-prev hidden-xs"></div>
                <div class="swiper-button-next hidden-xs"></div>
                <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1"
                    data-sm-slides="2" data-md-slides="2" data-lt-slides="2" data-slides-per-view="3">
                    <div class="swiper-wrapper">

                        @if ($featuredProducts->isNotEmpty())
                            @foreach ($featuredProducts as $featuredProduct)
                                @php
                                    $productImage = $featuredProduct->product_images->first();
                                @endphp
                                <div class="swiper-slide">
                                    <div class="product-shortcode style-1 big">
                                        <div class="product-label green">best price</div>
                                        <div class="preview">

                                            @if (!empty($productImage->image))
                                                <img src="{{ asset('storage/product/small/' . $productImage->image) }}"
                                                    alt="{{ $featuredProduct->name }}">
                                            @endif

                                            <div class="preview-buttons valign-middle">
                                                <div class="valign-middle-content">
                                                    <a class="button size-2 style-2" href="#">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('front-assets/img/icon-1.png') }}"
                                                                    alt="Arrow Icon"></span>
                                                            <span class="text">Learn More</span>
                                                        </span>
                                                    </a>
                                                    <a class="button size-2 style-3" href="#">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img
                                                                    src="{{ asset('front-assets/img/icon-3.png') }}"
                                                                    alt="Cart icon"></span>
                                                            <span class="text">Add To Cart</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title">
                                            {{-- <div class="simple-article size-1 color col-xs-b5"><a
                                                                href="#">MODERN
                                                                EDITION</a></div> --}}
                                            <div class="h6 animate-to-green"><a
                                                    href="#">{{ $featuredProduct->name }}</a>
                                            </div>
                                        </div>
                                        <div class="description">
                                            <div class="simple-article text size-2">
                                                {{ strip_tags($featuredProduct->description) }}
                                            </div>
                                            <div class="icons">
                                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></a>
                                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="color-selection">
                                                <div class="entry active" style="color: #a7f050;"></div>
                                                <div class="entry" style="color: #50e3f0;"></div>
                                                <div class="entry" style="color: #eee;"></div>
                                            </div>
                                            <div class="simple-article size-4"><span
                                                    class="color">&#x09F3;{{ $featuredProduct->price }}</span>

                                                @if ($featuredProduct->compare_price > 0)
                                                    <span
                                                        class="line-through">&#x09F3;{{ $featuredProduct->compare_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="swiper-pagination relative-pagination visible-xs"></div>
                </div>
            </div>
            <div class="empty-space col-xs-b30 col-sm-b60"></div>
            <div class="text-center">
                <a class="button size-2 style-3" href="#">
                    <span class="button-wrapper">
                        <span class="icon"><img src="{{ asset('front-assets/img/icon-4.png') }}"
                                alt="Arrow icon"></span>
                        <span class="text">view all products</span>
                    </span>
                </a>
            </div>

            {{-- Featured products end --}}

            {{-- New arriavle start --}}
            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="tabs-block">
                <div class="row">
                    <div class="col-lg-4 col-xs-b15 col-lg-b0">
                        <div class="h4">new arriavles</div>
                    </div>
                </div>

                <div class="empty-space col-xs-b15 col-sm-b30"></div>
                <div class="row nopadding">

                    @if ($latestProducts->isNotEmpty())
                        @foreach ($latestProducts as $product)
                            @php
                                $productImage = $product->product_images->first();
                            @endphp

                            <div class="col-sm-6 col-lg-3">
                                <div class="product-shortcode style-1">
                                    <div class="title">
                                        <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART
                                                WATCHES</a></div>
                                        <div class="h6 animate-to-green"><a href="#">{{ $product->name }}</a>
                                        </div>
                                    </div>
                                    <div class="preview">

                                        @if (!empty($productImage->image))
                                            <img src="{{ asset('storage/product/small/' . $productImage->image) }}"
                                                alt="{{ $product->name }}">
                                        @endif

                                        <div class="preview-buttons valign-middle">
                                            <div class="valign-middle-content">
                                                <a class="button size-2 style-2" href="#">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img
                                                                src="{{ asset('front-assets/img/icon-1.png') }}"
                                                                alt=""></span>
                                                        <span class="text">Learn More</span>
                                                    </span>
                                                </a>
                                                <a class="button size-2 style-3" href="#">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-3.png"
                                                                alt=""></span>
                                                        <span class="text">Add To Cart</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="simple-article size-4 dark">&#x09F3;{{ $product->price }}</div>
                                    </div>
                                    <div class="description">
                                        <div class="simple-article text size-2">{!! $product->description !!}</div>
                                        <div class="icons">
                                            <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a class="entry"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="empty-space col-xs-b30 col-sm-b60"></div>
            <div class="text-center">
                <a class="button size-2 style-3" href="#">
                    <span class="button-wrapper">
                        <span class="icon"><img src="{{ asset('front-assets/img/icon-4.png') }}"
                                alt="Arrow icon"></span>
                        <span class="text">view all products</span>
                    </span>
                </a>
            </div>
            {{-- New arriavle end --}}
        </div>
    </div>

    <div class="grey-background">
        <div class="container">

            <div class="empty-space col-xs-b35 col-md-b70"></div>

            <div class="row">
                <div class="col-sm-4 col-xs-b25">
                    <div class="h4 col-xs-b25">Hot Sale</div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-31.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a>
                            </div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-32.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-33.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article dark">$4.00</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-b25">
                    <div class="h4 col-xs-b25">Top Rated</div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-34.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a>
                            </div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-35.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-36.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article dark">$4.00</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-b25">
                    <div class="h4 col-xs-b25">Popular</div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-37.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a>
                            </div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-38.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="product-shortcode style-4 light clearfix">
                        <a class="preview" href="#"><img src="img/product-39.jpg" alt=""></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article dark">$4.00</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="empty-space col-xs-b35 col-md-b70"></div>

        </div>
    </div>

    <div class="row nopadding">
        <div class="col-sm-6 col-lg-3">
            <div class="icon-description-shortcode style-4">
                <img class="icon-image" src="img/icon-22.png" alt="">
                <div class="cell-view">
                    <div class="title h6">free delivery</div>
                    <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie
                        tortor a malesuada etiam a venenatis </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="icon-description-shortcode style-4">
                <img class="icon-image" src="img/icon-23.png" alt="">
                <div class="cell-view">
                    <div class="title h6">customers support</div>
                    <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie
                        tortor a malesuada etiam a venenatis </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="icon-description-shortcode style-4">
                <img class="icon-image" src="img/icon-24.png" alt="">
                <div class="cell-view">
                    <div class="title h6">payment security</div>
                    <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie
                        tortor a malesuada etiam a venenatis </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="icon-description-shortcode style-4">
                <img class="icon-image" src="img/icon-25.png" alt="">
                <div class="cell-view">
                    <div class="title h6">world wide store</div>
                    <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie
                        tortor a malesuada etiam a venenatis </div>
                </div>
            </div>
        </div>
    </div>
@endsection
