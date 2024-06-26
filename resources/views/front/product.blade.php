@php use App\Models\Cart;use Illuminate\Support\Facades\Auth; @endphp
@extends('front.layouts.master')
@section('title', $product->name)
@section('css')
    <style>
        .btn-quantity, .alert {
            margin: 1rem 0;
        }
    </style>
@endsection
@section('content')
    <div class="d-sm-flex justify-content-between container-fluid py-3">
        <nav aria-label="breadcrumb" class="breadcrumb-row">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop.index') }}"> Shop</a></li>
                <li class="breadcrumb-item">
                    {{ $product->name }}
                </li>
            </ul>
        </nav>
    </div>

    <section class="content-inner py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="dz-product-detail sticky-top">
                        <div class="swiper-btn-center-lr">
                            <div class="swiper product-gallery-swiper2">
                                <div class="swiper-wrapper" id="lightgallery">
                                    @foreach($product->images as $item)
                                        <div class="swiper-slide">
                                            <div class="dz-media DZoomImage">
                                                <a class="mfp-link lg-item"
                                                   href="{{ asset('storage/products/'. $item->image) }}"
                                                   data-src="{{ asset('storage/products/'. $item->image) }}">
                                                    <i class="feather icon-maximize dz-maximize top-left"></i>
                                                </a>
                                                <img src="{{ asset('storage/products/'. $item->image) }}" alt="image"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper product-gallery-swiper thumb-swiper-lg">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $item)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/products/'. $item->image) }}" alt="image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="dz-product-detail style-2 p-t20 ps-0">
                                <div class="dz-content">
                                    <div class="dz-content-footer">
                                        <div class="dz-content-start">
                                            @if($product->discount != 0)
                                                <span class="badge bg-purple mb-2">
                                                    SALE {{ $product->discount }}% Off
                                                </span>
                                            @endif
                                            <h4 class="title mb-1">
                                                <a href="{{ route('product', $product->slug) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="para-text">
                                        {{ $product->description }}
                                    </p>
                                    <div class="meta-content m-b20 d-flex align-items-end">
                                        <div class="me-3">
                                            <span class="price-name">Price</span>
                                            <span class="price-num">
                                                @if($product->discount != 0)
                                                    ${{ $priceWithDiscount }}
                                                @else
                                                    ${{ $product->price }}
                                                @endif
                                                @if($product->discount != 0)
                                                    <del>
                                                    {{ $product->price }}
                                                </del>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-num">
                                        <div class="d-block">
                                            <label class="form-label">Size</label>
                                            <div class="btn-group product-size mb-0">
                                                <input type="radio" class="btn-check" name="btnradio1" id="btnradio11"
                                                       checked/>
                                                <label class="btn btn-light" for="btnradio11">
                                                    {{ $product->size }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="meta-content">
                                            <label class="form-label">Color</label>
                                            <div class="d-flex align-items-center color-filter">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radioNoLabel"
                                                           id="radioNoLabel1" value="{{ $product->color }}"
                                                           aria-label="..." checked/>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dz-info">
                                        <ul>
                                            <li>
                                                <strong>Category:</strong>
                                                @foreach($category as $cats)
                                                    <span>
                                                        <a href="{{ route('category', $cats->slug) }}">
                                                        {{ $cats->title }}
                                                        </a>
                                                    </span>
                                                @endforeach
                                            </li>
                                            <li>
                                                <strong>Tags:</strong>
                                                @foreach($tags as $tag)
                                                    <span>
                                                        <a href="{{ route('tag', $tag->slug) }}">
                                                            {{ $tag->title }}
                                                        </a>
                                                    </span>
                                                @endforeach
                                            </li>
                                            <li>
                                                <strong>Share:</strong>
                                                <span>
														<a href="javascript:void(0);" target="_blank">
															<i class="fa-brands fa-facebook-f"></i>
														</a>
													</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="banner-social-media">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);">Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="cart-detail">
                                <div class="icon-bx-wraper style-4 m-b15">
                                    <div class="icon-bx">
                                        <i class="flaticon flaticon-ship"></i>
                                    </div>
                                    <div class="icon-content">
                                        <span class="text-primary font-14">Easy Returns</span>
                                        <h6 class="dz-title">30 Days</h6>
                                    </div>
                                </div>
                                <div class="icon-bx-wraper style-4 m-b30">
                                    <div class="icon-bx">
                                        <img src="{{asset("front/images/shop/shop-cart/icon-box/pic2.png")}}" alt="/"/>
                                    </div>
                                    <div class="icon-content">
                                        <h6 class="dz-title">Enjoy The Product</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                                    </div>
                                </div>
                                @if(Auth::user()->role == 2)
                                    @if(Cart::whereUserId(Auth::user()->id)->first()->products->where('id', $product->id)->count() > 0)
                                        <div class="save-text">
                                            <i class="icon feather icon-check-circle"></i>
                                            <span class="m-l10">You have {{ Cart::whereUserId(Auth::user()->id)
                                            ->first()->cart_products->where('product_id', $product->id)->pluck
                                            ('quantity')->first() }}  pcs
                                                of this product in your cart.</span>
                                        </div>
                                    @endif
                                @endif
                                <table>
                                    <tbody>
                                    <tr class="total">
                                        <td>
                                            <h6 class="mb-0">
                                                Stock
                                            </h6>
                                        </td>
                                        <td class="price">
                                            {{ $product->quantity }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="btn-quantity quantity-sm light d-xl-none d-blcok d-sm-block">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" value="1" name="demo_vertical2"/>
                                        @if(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ session('error') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="btn-quantity light d-xl-block d-sm-none d-none">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" value="1" name="demo_vertical2"/>
                                        @if(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ session('error') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-secondary w-100">ADD TO CART</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-inner-3 pb-0">
        <div class="container">
            <div class="product-description">
                <div class="dz-tabs">
                    <ul class="nav nav-tabs center" id="myTab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Description
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                             aria-labelledby="home-tab" tabindex="0">
                            <div class="detail-bx text-center">
                                <p class="para-text">
                                    {!! $product->about !!}
                                </p>
                            </div>
                            <div class="row g-lg-4 g-3">
                                @foreach($product->images as $item)
                                    <div class="col-xl-4 col-md-4 col-sm-4 col-6">
                                        <div class="related-img dz-media">
                                            <img src="{{ asset('storage/products/'. $item->image) }}" alt="/"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-inner-1 overlay-white-middle overflow-hidden">
        <div class="container">
            <div class="section-head style-2">
                <div class="left-content">
                    <h2 class="title mb-0">Related products</h2>
                </div>
                <a href="{{ route('shop.index') }}" class="text-secondary font-14 d-flex align-items-center gap-1">
                    See all products
                    <i class="icon feather icon-chevron-right font-18"></i>
                </a>
            </div>
            <div class="swiper-btn-center-lr">
                <div class="swiper swiper-four">
                    <div class="swiper-wrapper">
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <div class="shop-card">
                                    <div class="dz-media">
                                        <img
                                            src="{{ $product->featuredImage ? asset('storage/products/'. $product->featuredImage->image) : '-' }}"
                                            alt="image"/>
                                        <div class="shop-meta">
                                            <a href="{{ route('product', $product->slug) }}"
                                               class="btn btn-secondary btn-icon">
                                                <i class="fa-solid fa-eye d-md-none d-block"></i>
                                                <span class="d-md-block d-none">View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dz-content">
                                        <h5 class="title"><a href="{{ route('product', $product->slug) }}">
                                                {{ $product->name }}
                                            </a></h5>
                                        <h6 class="price">
                                            @if($product->discount != 0)
                                                <del>
                                                    {{ $product->price }}
                                                </del>
                                            @endif
                                            @if($product->discount != 0)
                                                ${{ $product->price - (($product->price * $product->discount) / 100) }}
                                            @else
                                                ${{ $product->price }}
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="product-tag">
                                        @if($product->discount != 0)
                                            <span
                                                class="badge badge-secondary">-{{ $product->discount }}%</span>
                                        @endif
                                        @if($product->quantity == 0)
                                            <span class="badge badge-secondary">
                                                        Out of Stock
                                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination-align">
                    <div class="tranding-button-prev btn-prev">
                        <i class="flaticon flaticon-left-chevron"></i>
                    </div>
                    <div class="tranding-button-next btn-next">
                        <i class="flaticon flaticon-chevron"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
