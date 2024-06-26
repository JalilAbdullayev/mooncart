@php use Illuminate\Support\Facades\Route; @endphp
@extends('front.layouts.master')
@section('title', 'Shop')
@section('content')
    <!--banner-->
    <div class="dz-bnr-inr style-1" style="background-image:url({{asset("front/images/background/bg-shape.jpg")}});">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Shop</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                        <li class="breadcrumb-item">
                            @if(Route::is('category'))
                                <a href="{{ route('shop.index') }}">
                                    Shop
                                </a>
                            @else
                                Shop
                            @endif
                        </li>
                        @if(Route::is('shop.search'))
                            <li class="breadcrumb-item">
                                Search
                            </li>
                        @elseif(Route::is('category'))
                            <li class="breadcrumb-item">
                                {{ $category->title }}
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <section class="content-inner-1 pt-3 z-index-unset">
        <div class="container-fluid">
            <div class="row">
                <div class="col-20 col-xl-3">
                    <div class="sticky-xl-top">
                        <a href="javascript:void(0);" class="panel-close-btn">
                            <svg width="35" height="35" viewBox="0 0 51 50" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M37.748 12.5L12.748 37.5" stroke="white" stroke-width="1.25"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.748 12.5L37.748 37.5" stroke="white" stroke-width="1.25"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <div class="shop-filter mt-xl-2 mt-0">
                            <aside>
                                <div class="d-flex align-items-center justify-content-between m-b30">
                                    <h6 class="title mb-0 fw-normal">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"
                                             width="20" height="20">
                                            <g id="Layer_29" data-name="Layer 29">
                                                <path
                                                    d="M2.54,5H15v.5A1.5,1.5,0,0,0,16.5,7h2A1.5,1.5,0,0,0,20,5.5V5h2.33a.5.5,0,0,0,0-1H20V3.5A1.5,1.5,0,0,0,18.5,2h-2A1.5,1.5,0,0,0,15,3.5V4H2.54a.5.5,0,0,0,0,1ZM16,3.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path>
                                                <path
                                                    d="M22.4,20H18v-.5A1.5,1.5,0,0,0,16.5,18h-2A1.5,1.5,0,0,0,13,19.5V20H2.55a.5.5,0,0,0,0,1H13v.5A1.5,1.5,0,0,0,14.5,23h2A1.5,1.5,0,0,0,18,21.5V21h4.4a.5.5,0,0,0,0-1ZM17,21.5a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5v-2a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5Z"></path>
                                                <path
                                                    d="M8.5,15h2A1.5,1.5,0,0,0,12,13.5V13H22.45a.5.5,0,1,0,0-1H12v-.5A1.5,1.5,0,0,0,10.5,10h-2A1.5,1.5,0,0,0,7,11.5V12H2.6a.5.5,0,1,0,0,1H7v.5A1.5,1.5,0,0,0,8.5,15ZM8,11.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path>
                                            </g>
                                        </svg>
                                        Filter
                                    </h6>
                                </div>
                                <div class="widget widget_search">
                                    <div class="form-group">
                                        <form method="GET" action="{{ route('shop.search') }}" class="input-group">
                                            <input name="search" required type="search" class="form-control"
                                                   placeholder="Search Product">
                                            <div class="input-group-addon">
                                                <button name="submit" value="Submit" type="submit" class="btn">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                                                            stroke="#0D775E" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M17.5 17.5L13.875 13.875" stroke="#0D775E"
                                                              stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="site-filters">
                                    <div class="widget widget_categories">
                                        <h6 class="widget-title">Category</h6>
                                        <ul class="filters" data-bs-toggle="buttons">
                                            <li>
                                                <input type="radio"/>
                                                <a href="javascript:void(0);">
                                                    All Products
                                                </a>
                                                ({{ $products->count() }})
                                            </li>
                                            @foreach($categories as $category)
                                                <li class="cat-item cat-item-26"
                                                    data-filter=".{{ $category->slug }}">
                                                    <input type="radio"/>
                                                    <a href="javascript:void(0);">
                                                        {{ $category->title }}
                                                    </a>
                                                    ({{  $category->products->count() }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="widget widget_tag_cloud">
                                        <h6 class="widget-title">Tags</h6>
                                        <ul class="tagcloud filters" data-bs-toggle="buttons">
                                            <li>
                                                <input type="radio"/>
                                                <a href="javascript:void(0);">
                                                    All Products ({{ $products->count() }})
                                                </a>
                                            </li>
                                            @foreach($tags as $tag)
                                                <li data-filter=".{{ $tag->slug }}">
                                                    <input type="radio"/>
                                                    <a href="javascript:void(0);">
                                                        {{ $tag->title }} ({{ $tag->products->count() }})
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-80 col-xl-9">
                    <div class="filter-wrapper">
                        <div class="filter-right-area">
                            <a href="javascript:void(0);" class="panel-btn me-2">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="20"
                                     height="20">
                                    <g id="Layer_28" data-name="Layer 28">
                                        <path
                                            d="M2.54,5H15v.5A1.5,1.5,0,0,0,16.5,7h2A1.5,1.5,0,0,0,20,5.5V5h2.33a.5.5,0,0,0,0-1H20V3.5A1.5,1.5,0,0,0,18.5,2h-2A1.5,1.5,0,0,0,15,3.5V4H2.54a.5.5,0,0,0,0,1ZM16,3.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path>
                                        <path
                                            d="M22.4,20H18v-.5A1.5,1.5,0,0,0,16.5,18h-2A1.5,1.5,0,0,0,13,19.5V20H2.55a.5.5,0,0,0,0,1H13v.5A1.5,1.5,0,0,0,14.5,23h2A1.5,1.5,0,0,0,18,21.5V21h4.4a.5.5,0,0,0,0-1ZM17,21.5a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5v-2a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5Z"></path>
                                        <path
                                            d="M8.5,15h2A1.5,1.5,0,0,0,12,13.5V13H22.45a.5.5,0,1,0,0-1H12v-.5A1.5,1.5,0,0,0,10.5,10h-2A1.5,1.5,0,0,0,7,11.5V12H2.6a.5.5,0,1,0,0,1H7v.5A1.5,1.5,0,0,0,8.5,15ZM8,11.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path>
                                    </g>
                                </svg>
                                Filter
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 tab-content shop-" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="tab-list-grid" role="tabpanel"
                                 aria-labelledby="tab-list-grid-btn">
                                <div id="masonry" class="row gx-xl-4 g-3">
                                    @foreach($products as $product)
                                        <div
                                            class="col-6 col-xl-3 col-lg-4 col-md-4 col-sm-6 m-md-b15 m-b30 {{$product->categories()->pluck('slug')->join(' ') . ' ' . $product->tags()->pluck('slug')->join(' ') }}">
                                            <div class="shop-card">
                                                <div class="dz-media">
                                                    <img
                                                        src="{{ $product->featuredImage ?asset('storage/products/'.$product->featuredImage->image) : ''}}"
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
                                                        </a>
                                                    </h5>
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
                        </div>
                    </div>
                    <div class="row page mt-0">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
