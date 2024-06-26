@extends('front.layouts.master')
@section('title', 'Contact Us')
@section('content')
	<!--banner-->
	<div class="contact-bnr bg-secondary">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="contact-info style-1 text-start text-white">
						<h2 class="title wow fadeInUp" data-wow-delay="0.1s">DISCOVER US</h2>
						<p class="text wow fadeInUp" data-wow-delay="0.2s">
                            <span class="text-decoration-underline text-white">
                                <a class="text-white" href="{{ route('our-team') }}">
                                    MoonCart is here to help you;</a>
                            </span>
							<br> Our experts are available to answer any questions you might have. We’ve got the
							answers..</p>
						<div class="contact-bottom wow fadeInUp" data-wow-delay="0.3s">
							<div class="contact-left">
								<h3>Call Us</h3>
								<a href="tel:{{ $settings->phone }}" class="text-white">
									{{ $settings->phone }}
								</a>
							</div>
							<div class="contact-right">
								<h3>Email Us</h3>
								<a href="mailto:{{ $settings->email }}" class="__cf_email__ text-white">
									{{ $settings->email }}
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-area1 style-1 m-r20 m-md-r0 wow fadeInUp" data-wow-delay="0.5s">
						<form method="POST" action="{{ route('contact') }}">
							@csrf
							<label for="name" class="form-label">Your Name</label>
							<div class="input-group">
								<input required type="text" class="form-control" maxlength="255" name="name"
									   placeholder="Your Name"/>
							</div>
							<label for="email" class="form-label">Email Address</label>
							<div class="input-group">
								<input required type="email" class="form-control" maxlength="255" name="email"
									   placeholder="example@mail.com"/>
							</div>
							<label for="phone" class="form-label">Phone Number</label>
							<div class="input-group">
								<input required type="tel" class="form-control" name="phone" maxlength="14"
									   placeholder="+994112223344"/>
							</div>
							<label for="text" class="form-label">Message</label>
							<div class="input-group m-b30">
                                <textarea name="text" rows="4" required class="form-control m-b10"
										  placeholder="Message"></textarea>
							</div>
							<div>
								<button name="submit" type="submit" class="btn w-100 btn-secondary btnhover">
									SUBMIT
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-inner-2 pt-0">
		<div class="map-iframe map">
		</div>
	</div>
@endsection
