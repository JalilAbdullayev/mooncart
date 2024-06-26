@php use Illuminate\Support\Facades\Auth; @endphp
@extends('back.layouts.master')
@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">
				Home
			</h4>
		</div>
		<div class="col-md-7 align-self-center text-end">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb justify-content-end">
					<li class="breadcrumb-item active">
						Home
					</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Info box -->
	<!-- ============================================================== -->
	<div class="row g-0">
		<div class="@if(Auth::user()->role < 2) col-lg-4 @endif col-md-6">
			<div class="card border">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex no-block align-items-center">
								<div>
									<h3>
										<i class="@if(Auth::user()->role < 2) icon-envelope @else icon-basket-loaded @endif"></i>
									</h3>
									<p class="text-muted text-uppercase">
										@if(Auth::user()->role < 2)
											MESSAGES
										@else
											Orders
										@endif
									</p>
								</div>
								<div class="ms-auto">
									<h2 class="counter text-purple">
										@if(Auth::user()->role < 2)
											{{ $messages }}
										@else
											{{ $orders }}
										@endif
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="@if(Auth::user()->role < 2) col-lg-4 @endif col-md-6">
			<div class="card border">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex no-block align-items-center">
								<div>
									<h3>
										<i class="@if(Auth::user()->role < 2) icon-people @else icon-bag @endif"></i>
									</h3>
									<p class="text-muted text-uppercase">
										@if(Auth::user()->role < 2)
											SUBSCRIBERS
										@else
											Products in Cart
										@endif
									</p>
								</div>
								<div class="ms-auto">
									<h2 class="counter text-primary">
										@if(Auth::user()->role < 2)
											{{ $subscribers }}
										@else
											{{ $total }}
										@endif
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if(Auth::user()->role < 2)
			<div class="col-lg-4 col-md-12">
				<div class="card border">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="d-flex no-block align-items-center">
									<div>
										<h3><i class="icon-bag"></i></h3>
										<p class="text-muted text-uppercase">
											AVAILABLE PRODUCTS
										</p>
									</div>
									<div class="ms-auto">
										<h2 class="counter text-success">
                                            {{ $noProducts }}/{{ $products }}
										</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
@endsection
