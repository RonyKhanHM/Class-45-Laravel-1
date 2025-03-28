@extends('frontend.master')

@section('content')
    <!-- /Home Slider -->
    <section class="home-slider-section">
        <div class="container">
            <div class="home__slider-sec-wrap">
                <div class="home__category-outer">
                    <ul class="header__category-list">
                        @foreach ($allCategories as $category)
                            <li class="header__category-list-item item-has-submenu">
                                <a href="{{ url('category-products/' . $category->slug . '/' . $category->id) }}"
                                    class="header__category-list-item-link">
                                    <img src="{{ asset('backend/images/category/' . $category->image) }}" alt="category">
                                    {{ $category->name }}
                                </a>
                                <ul class="header__nav-item-category-submenu">
                                    @foreach ($category->subCategory as $subCategory)
                                        <li class="header__category-submenu-item">
                                            <a href="{{ url('subcategory-products/' . $subCategory . '/' . $subCategory->id) }}"
                                                class="header__category-submenu-item-link">
                                                {{ $subCategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>


                {{-- <div class="home__slider-items-wrapper">
                    <div class="home__slider-item-outer">
                        <img src="{{ asset('backend/images/settings/' . $siteSettings->banner) }}" alt="image"
                            class="home__slider-item-image">
                    </div>
                </div> --}}

                <style>
                    .carousel-indicators img {
                        width: 70px;
                        display: block;
                    }

                    .carousel-indicators button {
                        width: max-content !important;
                    }

                    .carousel-indicators {
                        position: unset;
                    }

                    .carousel-indicators button.active img {
                        border: 2px solid red;
                    }
                </style>

                {{-- <div class="carousel slide mt-2" id="carouselDemo" data-bs-wrap="true" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('backend/images/sliderBanner/banner1.jpg') }}" alt="image" width="100">
                            <div class="carousel-caption">
                                <h4>Slitede Title</h4>
                                <p>
                                    In the latest episode of Talk To Experts series, Dr. Dao Huu Hung, Head of Industrial AI
                                    and Mr. Nguyen Cong Minh.
                                </p>
                            </div>
                        </div>
                        
                        <div class="carousel-item">
                            <img src="{{ asset('backend/images/sliderBanner/banner2.jpg') }}" alt="image" width="100">
                            <div class="carousel-caption">
                                <h4>Slitede Title</h4>
                                <p>
                                    In the latest episode of Talk To Experts series, Dr. Dao Huu Hung, Head of Industrial AI
                                    and Mr. Nguyen Cong Minh.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('backend/images/sliderBanner/banner3.jpg') }}" alt="image" width="100">
                            <div class="carousel-caption">
                                <h4>Slitede Title</h4>
                                <p>
                                    In the latest episode of Talk To Experts series, Dr. Dao Huu Hung, Head of Industrial AI
                                    and Mr. Nguyen Cong Minh.
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    <div class="carousel-indicators">
                        <button type="button" class="active" data-bs-target="#carouselDemo" data-bs-slide-to="0">
                            <img src="{{ asset('backend/images/sliderBanner/banner1.jpg') }}" alt="image" width="100">
                        </button>
                        <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="1">
                            <img src="{{ asset('backend/images/sliderBanner/banner2.jpg') }}" alt="image" width="100">
                        </button>
                        <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="2">
                            <img src="{{ asset('backend/images/sliderBanner/banner3.jpg') }}" alt="image"
                                width="100">
                        </button>
                    </div>
                </div> --}}
                
                <div class="carousel slide mt-2" id="carouselDemo" data-bs-wrap="true" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $index => $slide)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('backend/images/sliderBanner/' . $slide->image) }}" alt="image"
                                    width="100%">
                                <div class="carousel-caption">
                                    <h4>{{$slide->title}}</h4>
                                    <p>{!!ucfirst($slide->description)!!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                    <div class="carousel-indicators">
                        @foreach ($sliders as $index => $slide)
                            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('backend/images/sliderBanner/'. $slide->image) }}"
                                    alt="Slide {{ $index }}" width="100">
                            </button>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- /Home Slider -->

    <!-- Categoris Slider -->
    <section class="categoris-slider-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Categories
                </h1>
            </div>
            <div class="categoris-items-wrapper owl-carousel">
                @foreach ($allCategories as $category)
                    <a href="{{ url('category-products/' . $category->slug . '/' . $category->id) }}"
                        class="categoris-item">
                        <img src="{{ asset('backend/images/category/' . $category->image) }}" alt="category" />
                        <h6 class="categoris-name">
                            {{ $category->name }}
                        </h6>
                        {{-- <span class="items-number">1 items</span> --}}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Categoris Slider -->
    <!-- Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                @foreach ($banners as $banner)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="banner-item-outer">
                            <img src="{{ asset('backend/images/banner/' . $banner->image) }}" alt="banner image"
                                class="home__slider-item-image" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Banner -->
    <!-- Hot Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Hot Products
                </h1>
                <a href="{{ url('type-products/hot') }}" class="product-view-all-btn">
                    View All
                </a>
            </div>
            <div class="product-items-wrapper">

                @foreach ($hotproducts as $product)
                    <div class="product__item-outer">
                        <div class="product__item-image-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-image-inner">
                                <img src="{{ asset('backend/images/product/' . $product->image) }}" alt="Product Image" />
                            </a>
                            <div class="product__item-add-cart-btn-outer">
                                <a href="{{ url('add-to-cart/' . $product->id) }}"
                                    class="product__item-add-cart-btn-inner">
                                    Add to Cart
                                </a>
                            </div>
                            <div class="product__type-badge-outer">
                                <span class="product__type-badge-inner">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            </div>
                        </div>
                        <div class="product__item-info-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-name">
                                {{ $product->name }}
                            </a>
                            <div class="product__item-price-outer">
                                <div class="product__item-discount-price">
                                    <del>{{ $product->regular_price }} Tk.</del>
                                </div>
                                <div class="product__item-regular-price">
                                    <span>{{ $product->discount_price }} Tk.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Popular Product -->
    <!-- New Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    New Arrival
                </h1>
                <a href="{{ url('type-products/new') }}" class="product-view-all-btn">
                    View All
                </a>
            </div>
            <div class="product-items-wrapper">
                @foreach ($newproducts as $product)
                    <div class="product__item-outer">
                        <div class="product__item-image-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-image-inner">
                                <img src="{{ asset('backend/images/product/' . $product->image) }}" alt="Product Image" />
                            </a>
                            <div class="product__item-add-cart-btn-outer">
                                <a href="{{ url('add-to-cart/' . $product->id) }}"
                                    class="product__item-add-cart-btn-inner">
                                    Add to Cart
                                </a>
                            </div>
                            <div class="product__type-badge-outer">
                                <span class="product__type-badge-inner">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            </div>
                        </div>
                        <div class="product__item-info-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-name">
                                {{ $product->name }}
                            </a>
                            <div class="product__item-price-outer">
                                <div class="product__item-discount-price">
                                    <del>{{ $product->regular_price }} Tk.</del>
                                </div>
                                <div class="product__item-regular-price">
                                    <span>{{ $product->discount_price }} Tk.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Popular Product -->
    <!-- Discount Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Discount Products
                </h1>
                <a href="{{ url('type-products/discount') }}" class="product-view-all-btn">
                    View All
                </a>
            </div>
            <div class="product-items-wrapper">
                @foreach ($discountproducts as $product)
                    <div class="product__item-outer">
                        <div class="product__item-image-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-image-inner">
                                <img src="{{ asset('backend/images/product/' . $product->image) }}"
                                    alt="Product Image" />
                            </a>
                            <div class="product__item-add-cart-btn-outer">
                                <a href="{{ url('add-to-cart/' . $product->id) }}"
                                    class="product__item-add-cart-btn-inner">
                                    Add to Cart
                                </a>
                            </div>
                            <div class="product__type-badge-outer">
                                <span class="product__type-badge-inner">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            </div>
                        </div>
                        <div class="product__item-info-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-name">
                                {{ $product->name }}
                            </a>
                            <div class="product__item-price-outer">
                                <div class="product__item-discount-price">
                                    <del>{{ $product->regular_price }} Tk.</del>
                                </div>
                                <div class="product__item-regular-price">
                                    <span>{{ $product->discount_price }} Tk.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Discount Product -->
    <!-- Regular Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Regular Products
                </h1>
                <a href="{{ url('type-products/regular') }}" class="product-view-all-btn">
                    View All
                </a>
            </div>
            <div class="product-items-wrapper">
                @foreach ($regularproducts as $product)
                    <div class="product__item-outer">
                        <div class="product__item-image-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-image-inner">
                                <img src="{{ asset('backend/images/product/' . $product->image) }}"
                                    alt="Product Image" />
                            </a>
                            <div class="product__item-add-cart-btn-outer">
                                <a href="{{ url('add-to-cart/' . $product->id) }}"
                                    class="product__item-add-cart-btn-inner">
                                    Add to Cart
                                </a>
                            </div>
                            <div class="product__type-badge-outer">
                                <span class="product__type-badge-inner">
                                    {{ ucfirst($product->product_type) }}
                                </span>
                            </div>
                        </div>
                        <div class="product__item-info-outer">
                            <a href="{{ url('/product/details/' . $product->slug) }}" class="product__item-name">
                                {{ $product->name }}
                            </a>
                            <div class="product__item-price-outer">
                                <div class="product__item-discount-price">
                                    <del>{{ $product->regular_price }} Tk.</del>
                                </div>
                                <div class="product__item-regular-price">
                                    <span>{{ $product->discount_price }} Tk.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Regular Product -->
@endsection
