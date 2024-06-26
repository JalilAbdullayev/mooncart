@extends('front.layouts.master')
@section('title', 'Our Team')
@section('content')
	<!--banner-->
	<div class="dz-bnr-inr" style="background-image:url({{asset("front/images/background/bg-shape.jpg")}});">
		<div class="container">
			<div class="dz-bnr-inr-entry">
				<h1>Our Team</h1>
				<nav aria-label="breadcrumb" class="breadcrumb-row">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
						<li class="breadcrumb-item">Our Team</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<section class="content-inner">
		<div class="container">
			<div class="row g-3 g-xl-4">
				<div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
					<div class="section-head ">
						<h2 class="title">Meet our team of creators, designers, and world-class problem solvers</h2>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have
							suffered alteration in some form, by injected humour, or randomised words.</p>
						<a class="btn btn-secondary me-3" href="{{ route('signup') }}">Join Our Team</a>
					</div>
				</div>
				@for($i = 0; $i < count($staff); $i++)
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.{{ $i + 1}}s">
						<div class="dz-team style-1 m-md-b0 m-sm-b0 m-b30">
							<div class="dz-media">
								<img src="{{ 'storage/' . $staff[$i]->image }}" alt=""/>
							</div>
							<div class="dz-content">
								<h5 class="title">
									{{ $staff[$i]->name }}
								</h5>
								<span>
                                    {{ $staff[$i]->position }}
                                </span>
							</div>
						</div>
					</div>
				@endfor
			</div>
		</div>
	</section>
@endsection
