@extends('frontend.layouts.app')

{{-- page title --}}
@section('page-title')
    Shop Page | Top Fashion Shop
@endsection

{{-- page content --}}
@section('content')
    <div class="container">
        <div class="empty-space col-xs-b15 col-sm-b30"></div>
        <div class="breadcrumbs">
            <a href="{{ route('front.index') }}">home</a>
            <a href="{{ route('front.shop') }}">shop</a>
        </div>

        <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="align-inline spacing-1">
                    <div class="h4">
                        @if (!empty($selectedCategory) && !empty($selectedSubCategory))
                            {{ $selectedSubCategory->name }}
                        @elseif (!empty($selectedCategory))
                            {{ $selectedCategory->name }}
                        @else
                            shop
                        @endif

                    </div>
                </div>
                <div class="align-inline spacing-1">
                    <div class="simple-article size-1">SHOWING <b class="grey">{{ $products->firstItem() }} </b> TO <b
                            class="grey">{{ $products->lastItem() }}</b> OF <b class="grey">{{ $products->total() }}</b>
                        RESULTS
                    </div>
                </div>
                <div class="align-inline spacing-1 hidden-xs">
                    <a class="pagination toggle-products-view active">
                        <img src="{{ asset('front-assets/img/icon-14.png') }}" alt="Grid icon" />
                        <img src="{{ asset('front-assets/img/icon-15.png') }}" alt="Grid icon" />
                    </a>
                    <a class="pagination toggle-products-view">
                        <img src="{{ asset('front-assets/img/icon-16.png') }}" alt="List icon" />
                        <img src="{{ asset('front-assets/img/icon-17.png') }}" alt="List icon" />
                    </a>
                </div>
                <div class="align-inline spacing-1 filtration-cell-width-1">
                    <select class="SlectBox small" name="sort" id="sort">
                        <option disabled="disabled" {{ $sort == '' ? 'selected' : '' }}>Sort By</option>
                        <option value="default" {{ $sort == 'default' ? 'selected' : '' }}>Default</option>
                        <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Price (Low > How)</option>
                        <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Price (High > Low)
                        </option>
                    </select>
                </div>

                <div class="empty-space col-xs-b25 col-sm-b60"></div>

                <div class="products-content">
                    <div class="products-wrapper">
                        <div class="row nopadding">

                            @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                                    @php
                                        $productImage = $product->product_images->first();
                                    @endphp
                                    <div class="col-sm-4">
                                        <div class="product-shortcode style-1">
                                            <div class="title">
                                                <div class="simple-article size-1 color col-xs-b5"><a href="#">SMART
                                                        PHONES</a></div>
                                                <div class="h6 animate-to-green"><a href="#">{{ $product->name }}</a>
                                                </div>
                                            </div>
                                            <div class="preview">

                                                @if (!empty($productImage->image))
                                                    <img src="{{ asset('storage/product/small/' . $productImage->image) }}"
                                                        alt="{{ $product->name }}">
                                                @else
                                                    <img src="{{ asset('front-assets/img/product-47.jpg') }}"
                                                        alt="{{ $product->name }}">
                                                @endif

                                                <div class="preview-buttons valign-middle">
                                                    <div class="valign-middle-content">
                                                        <a class="button size-2 style-2" href="#">
                                                            <span class="button-wrapper">
                                                                <span class="icon">
                                                                    <img src="{{ asset('front-assets/img/icon-1.png') }}"
                                                                        alt="">
                                                                </span>
                                                                <span class="text">Learn More</span>
                                                            </span>
                                                        </a>
                                                        <a class="button size-2 style-3" href="#">
                                                            <span class="button-wrapper">
                                                                <span class="icon">
                                                                    <img src="{{ asset('front-assets/img/icon-3.png') }}"
                                                                        alt="">
                                                                </span>
                                                                <span class="text">Add To Cart</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <div class="color-selection">
                                                    <div class="entry active" style="color: #a7f050;"></div>
                                                    <div class="entry" style="color: #50e3f0;"></div>
                                                    <div class="entry" style="color: #eee;"></div>
                                                </div>
                                                <div class="simple-article size-4"><span
                                                        class="color">&#x09F3;{{ $product->price }}
                                                    </span>&nbsp;&nbsp;&nbsp;

                                                    @if ($product->compare_price > 0)
                                                        <span class="line-through">
                                                            &#x09F3;{{ $product->compare_price }}
                                                        </span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="description">
                                                <div class="simple-article text size-2">
                                                    {!! $product->description !!}
                                                </div>
                                                <div class="icons">
                                                    <a class="entry">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="entry open-popup" data-rel="3">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="entry">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="empty-space col-xs-b35 col-sm-b0"></div>

                <div class="row">
                    <div class="col-sm-3 hidden-xs">
                        <a class="button size-1 style-5" href="{{ $products->previousPageUrl() }}"
                            @if ($products->onFirstPage()) style="pointer-events: none" @endif>
                            <span class="button-wrapper">
                                <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                <span class="text">prev page</span>
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="pagination-wrapper">
                            @if ($products->lastPage() > 1)
                                <a class="pagination {{ $products->currentPage() == 1 ? 'active' : '' }}"
                                    href="{{ $products->url(1) }}">1</a>
                                @if ($products->currentPage() > 3)
                                    <span class="pagination">...</span>
                                @endif

                                @php
                                    $start = max(2, $products->currentPage() - 2);
                                    $end = min($products->lastPage(), $start + 4);
                                @endphp

                                @for ($i = $start; $i <= $end; $i++)
                                    <a class="pagination {{ $products->currentPage() == $i ? 'active' : '' }}"
                                        href="{{ $products->url($i) }}">{{ $i }}</a>
                                @endfor

                                @if ($end < $products->lastPage())
                                    <span class="pagination">...</span>
                                    <a class="pagination {{ $products->currentPage() == $products->lastPage() ? 'active' : '' }}"
                                        href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs text-right">
                        <a class="button size-1 style-5" href="{{ $products->nextPageUrl() }}"
                            @if ($products->currentPage() == $products->lastPage()) style="pointer-events: none" @endif>
                            <span class="button-wrapper">
                                <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <span class="text">next page</span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="empty-space col-xs-b35 col-md-b70"></div>
                <div class="empty-space col-md-b70"></div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                {{-- category start --}}
                <div class="h4 col-xs-b10">popular categories</div>
                <ul class="categories-menu transparent">

                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('front.shop', $category->slug) }}">{{ $category->name }}</a>
                                @if ($category->sub_category->isNotEmpty())
                                    <div class="toggle"></div>
                                    <ul>
                                        @foreach ($category->sub_category as $subCategory)
                                            <li>
                                                <a
                                                    href="{{ route('front.shop', [$category->slug, $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
                {{-- category end --}}

                <div class="empty-space col-xs-b25 col-sm-b50"></div>

                {{-- price start --}}
                <div class="h4 col-xs-b25">Price</div>
                <div id="prices-range"></div>
                <div class="simple-article size-1">
                    PRICE: <b class="grey">$<span class="min-price">{{ $minPrice }}</span> - $<span
                            class="max-price">
                            {{ $maxPrice }}</span></b>
                </div>
                {{-- price end --}}

                <div class="empty-space col-xs-b25 col-sm-b50"></div>

                {{-- Brand start --}}
                <div class="h4 col-xs-b25">Brands</div>

                @if ($brands->isNotEmpty())
                    @foreach ($brands as $brand)
                        <div class="empty-space col-xs-b10"></div>
                        <label class="checkbox-entry" for="brand-{{ $brand->id }}">
                            <input type="checkbox" class="brand-checkbox" name="brand[]" value="{{ $brand->id }}"
                                id="brand-{{ $brand->id }}" {{ in_array($brand->id, $brandArr) ? 'checked' : '' }}>
                            <span>{{ $brand->name }}</span>
                        </label>
                    @endforeach
                @endif
                {{-- brand end --}}

                <div class="empty-space col-xs-b25 col-sm-b50"></div>

                <div class="h4 col-xs-b25">Choose Color</div>
                <div class="color-selection size-1">
                    <div class="entry active" style="color: #a7f050;"></div>
                    <div class="entry" style="color: #50e3f0;"></div>
                    <div class="entry" style="color: #eee;"></div>
                    <div class="entry" style="color: #4d900c;"></div>
                    <div class="entry" style="color: #edb82c;"></div>
                    <div class="entry" style="color: #7d3f99;"></div>
                    <div class="entry" style="color: #3481c7;"></div>
                    <div class="entry" style="color: #bf584b;"></div>
                </div>

                <div class="empty-space col-xs-b25 col-sm-b50"></div>
            </div>
        </div>

        {{-- hot sales --}}
    </div>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            var minVal = parseInt($('.min-price').text());
            var maxVal = parseInt($('.max-price').text());

            $("#prices-range").slider({
                range: true,
                min: minVal,
                max: maxVal,
                step: 0.5,
                values: [minVal, maxVal],
                slide: function(event, ui) {
                    $('.min-price').text(ui.values[0]);
                    $('.max-price').text(ui.values[1]);

                    apply_filters();
                }
            });
        });

        // Handle brand checkbox changes
        $('.brand-checkbox').change(function() {
            apply_filters();
        });

        // Handle sort by
        $('#sort').change(function() {
            apply_filters();
        });


        // Filters
        function apply_filters() {
            let brands = [];

            $('.brand-checkbox:checked').each(function() {
                brands.push($(this).val());
            });

            let minPrice = $("#prices-range").slider("values", 0);
            let maxPrice = $("#prices-range").slider("values", 1);
            let url = "{{ url()->current() }}?";

            // Price range filter
            url += 'min-price=' + minPrice + '&max-price=' + maxPrice;

            //Sort filter
            url += '&sort=' + $('#sort').val();

            // Brand FIlter
            if (brands.length > 0) {
                window.location.href = url + '&brand=' + brands.toString();
            } else {
                window.location.href = url;
            }
        }
    </script>
@endsection
