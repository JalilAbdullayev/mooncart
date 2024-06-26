@extends('front.layouts.master')
@section('title', 'Home')
@section('content')
	<!--Swiper Banner Start -->
	<div class="main-slider style-2">
		<div class="main-swiper">
			<div class="swiper-wrapper">
				@foreach($campaigns as $item)
					<div class="swiper-slide bg-light">
						<div class="container">
							<div class="banner-content">
								<div class="row">
									<div class="col-xl-6 col-md-6 col-sm-7 align-self-center">
										<div class="swiper-content">
											<div class="content-info">
												<h1 class="offer-title mb-0" data-swiper-parallax="-20">
													{{ $item->title }}
												</h1>
												<h2 class="title mb-2" data-swiper-parallax="-20">
													{{ $item->subtitle }}
												</h2>
												<p class="sub-title mb-0" data-swiper-parallax="-40">
													{!! $item->text !!}
												</p>
											</div>
											<div class="content-btn" data-swiper-parallax="-60">
												<a class="btn btn-outline-secondary" href="{{ route('shop.index') }}">
													VIEW DETAILS
												</a>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-md-6 col-sm-5">
										<div class="banner-media">
											<div class="img-preview" data-swiper-parallax="-100">
												<img src="{{ 'storage/' . $item->image }}"
													 alt="@if($item->image) banner-media @endif"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="banner-social-media style-2 left">
				<ul>
					<li>
						<a href="javascript:void(0);" target="_blank">Instagram</a>
					</li>
				</ul>
			</div>
			<a href="{{ route('contact') }}" class="service-btn btn-dark">Let’s talk</a>
		</div>
	</div>
	<!--Swiper Banner End-->

	<!--Featured Section Start-->
	<section class="content-inner overlay-white-middle">
		<div class="container">
			<div class="section-head style-2 wow fadeInUp" data-wow-delay="0.1s">
				<div class="left-content">
					<h2 class="title">Featured Categories</h2>
					<p>Discover the most trending products in Mooncart.</p>
				</div>
				<a href="{{ route('shop.index') }}" class="text-secondary font-14 d-flex align-items-center gap-1">See
					all
					products
					<i class="icon feather icon-chevron-right font-18"></i>
				</a>
			</div>
			<div class="row gx-xl-4 g-3">
				@for($i = 0; $i < count($categories); $i++)
					<div class="col-xl-4 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.2s">
						<div class="category-product left">
							<a href="{{ route('category', $categories[$i]->slug) }}">
								<img src="{{ asset('storage/'.$categories[$i]->image) }}" alt=""/>
								<div class="category-badge">
									{{  $categories[$i]->title }}
								</div>
							</a>
						</div>
					</div>
				@endfor
			</div>
		</div>
	</section>
	<!--Featured Section End-->

	<!-- icon-box1 -->
	<section class="content-inner-3 overlay-white-dark"
			 style="background-image: url('{{asset("front/images/background/bg2.jpg")}}'); background-repeat: no-repeat;
             background-size: cover;">
		<div class="container">
			<div class="row justify-content-center gx-sm-1">
				<div class="col-lg-4 col-md-4 col-sm-4 p-b30 wow fadeInUp" data-wow-delay="0.1s">
					<div class="icon-bx-wraper style-1 text-center">
						<div class="icon-bx">
							<i class="flaticon flaticon-fast-delivery"></i>
						</div>
						<div class="icon-content">
							<h3 class="dz-title m-b0">FREE SHIPPING</h3>
							<div class="square"></div>
							<p class="font-20">Enjoy free shipping on all orders - no minimum purchase required.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 p-b30 wow fadeInUp" data-wow-delay="0.2s">
					<div class="icon-bx-wraper style-1 text-center">
						<div class="icon-bx">
							<i class="flaticon flaticon-message"></i>
						</div>
						<div class="icon-content">
							<h3 class="dz-title m-b0">24/7 SUPPORT</h3>
							<div class="square"></div>
							<p class="font-20">Our team is available 24/7 to help with any questions or
								concerns.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 p-b30 wow fadeInUp" data-wow-delay="0.3s">
					<div class="icon-bx-wraper style-1 text-center">
						<div class="icon-bx">
							<i class="flaticon flaticon-money-back-guarantee"></i>
						</div>
						<div class="icon-content">
							<h3 class="dz-title m-b0">MONEY BACK</h3>
							<div class="square"></div>
							<p class="font-20">We offer a 100% money-back guarantee for your satisfaction.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- icon-box1 End-->

	<!-- Tranding Start-->
	<section class="content-inner-1 overlay-white-middle overflow-hidden">
		<div class="container">
			<div class="section-head style-2 wow fadeInUp" data-wow-delay="0.1s">
				<div class="left-content">
					<h2 class="title">What's trending now</h2>
					<p>Discover the most trending products in Mooncart.</p>
				</div>
				<a href="{{ route('shop.index') }}" class="text-secondary font-14 d-flex align-items-center gap-1">See
					all products
					<i class="icon feather icon-chevron-right font-18"></i>
				</a>
			</div>
			<div class="swiper-btn-center-lr">
				<div class="swiper swiper-four">
					<div class="swiper-wrapper">
						@foreach($products as $product)
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.2s">
									<div class="dz-media">
										<img
												src="{{ $product->featuredImage ? asset('storage/products/' . $product->featuredImage->image) : '' }}"
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
											<del>${{ $product->price }}</del>
											${{ $product->price - (($product->price * $product->discount) / 100) }}
										</h6>
									</div>
									@if($product->discount)
										<div class="product-tag">
											@if($product->discount != 0)
												<span class="badge badge-secondary">
                                                    -{{ $product->discount }}%
                                                </span>
											@endif
											@if($product->quantity == 0)
												<span class="badge badge-secondary">
                                                        Out of Stock
                                                </span>
											@endif
										</div>
									@endif
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
	<!-- Tranding Stop-->

	<!--Recommend Section Start-->
	<section class="content-inner-1">
		<div class="container">
			<div class="row">
				<div class="col-xl-3">
					<div class="row">
						@for($i = 0; $i < 2; $i++)
							<div class="col-xl-12 col-md-6 col-sm-6 wow fadeInLeft text-white" data-wow-delay="0.1s">
								<div class="offer-card text-center">
									<div class="dz-media">
										<img src="{{ asset('storage/'.$campaigns[$i]->image) }}" alt="">
									</div>
									<div class="offer-content">
										<h3 class="title text-white">
											{{ $campaigns[$i]->title }}
										</h3>
										<span class="offer">
                                        {{ $campaigns[$i]->subtitle }}
                                    </span>
										<a href="{{ route('shop.index') }}" class="btn btn-outline-light">Shop
											Now</a>
									</div>
								</div>
							</div>
						@endfor
					</div>
				</div>
				<div class="col-xl-9">
					<div class="wow fadeInUp" data-wow-delay="0.3s">
						<h3 class="title">
							Newest products
						</h3>
						<div class="site-filters clearfix d-flex align-items-center">
							<ul class="filters" data-bs-toggle="buttons">
								<li class="btn active">
									<input type="radio">
									<a href="javascript:void(0);">All Products</a>
								</li>
								@foreach($categories as $category)
									<li data-filter=".{{ $category->slug }}" class="btn">
										<input type="radio">
										<a href="javascript:void(0);">{{ $category->title }}</a>
									</li>
								@endforeach
							</ul>
							<a href="{{ route('shop.index') }}"
							   class="product-link text-secondary font-14 d-flex align-items-center gap-1 text-nowrap">See
								all products
								<i class="icon feather icon-chevron-right font-18"></i>
							</a>
						</div>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="row g-xl-4 g-3">
							@foreach($products as $product)
								<li class="card-container col-6 col-xl-4 col-lg-4 col-md-4 col-sm-6 {{ $product->categories->pluck('slug')->join(' ') }}">
									<div class="shop-card">
										<div class="dz-media">
											<img
													src="{{ $product->featuredImage ? asset('storage/products/' . $product->featuredImage->image) : '' }}"
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
														${{ $product->price }}
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
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Recommend Section End-->

	<!-- Newsletter -->
	<section class="overlay-black-light newsletter-wrapper style-2"
			 style="background-image: url({{asset('front/images/background/bg4.jpg')}}); background-repeat: no-repeat;background-size: cover;">
		<div class="container">
			<div class="subscride-inner wow fadeInUp" data-wow-delay="0.2s">
				<div class="row justify-content-center text-center">
					<div class="col-xl-12 col-lg-12">
						<div class="section-head">
							<h3 class="title">SUBSCRIBE TO OUR NEWSLETTER</h3>
							<p class="sub-title">Get latest news, offers and discounts.</p>
						</div>
						<form action="{{ route('subscribe') }}" method="post">
							@csrf
							<div class="form-group">
								<div class="input-group mb-0">
									<input name="email" required type="email" class="form-control"
										   placeholder="Your Email Address" maxlength="255"/>
									<div class="input-group-addon">
										<button type="submit" class="btn">
											<svg width="21" height="21" viewBox="0 0 21 21" fill="none">
												<path d="M4.20972 10.7344H15.8717" stroke="#0D775E" stroke-width="2"
													  stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M10.0408 4.90112L15.8718 10.7345L10.0408 16.5678"
													  stroke="#0D775E" stroke-width="2" stroke-linecap="round"
													  stroke-linejoin="round"/>
											</svg>
										</button>
									</div>
								</div>
								@error('email')
								<div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter End -->
@endsection
