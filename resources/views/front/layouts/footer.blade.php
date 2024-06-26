<footer class="site-footer style-1">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="widget widget_about me-2">
                        <div class="footer-logo logo-white">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('storage/'.$settings->logo) }}" alt=""/>
                            </a>
                        </div>
                        <ul class="widget-address">
                            <li>
                                <p><span>Address</span> : {{ $settings->address }}</p>
                            </li>
                            <li>
                                <p><span>E-mail</span> : <a href="mailto:{{ $settings->email }}">
                                        {{ $settings->email }}
                                    </a>
                                </p>
                            </li>
                            <li>
                                <a href="tel:{{ $settings->phone }}"><span>Phone</span> : {{ $settings->phone }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Useful Links</h5>
                        <ul>
                            <li><a href="{{ route('our-team') }}">
                                    Our Team
                                </a></li>
                            <li><a href="{{ route('faq.index') }}">
                                    FAQ
                                </a></li>
                            <li><a href="{{ route('contact') }}">
                                    Contact Us
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="subscribe_widget">
                        <h6 class="title fw-medium text-capitalize">subscribe to our newsletter</h6>
                        <form action="{{ route('subscribe') }}" method="post">
                            @csrf
                            <div class="dzSubscribeMsg"></div>
                            <div class="form-group">
                                <div class="input-group mb-0">
                                    <input name="email" required type="email" class="form-control"
                                           placeholder="Your Email Address" maxlength="255"/>
                                    <div class="input-group-addon">
                                        <button type="submit" class="btn">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                <path d="M4.20972 10.7344H15.8717" stroke="#0D775E"
                                                      stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                                <path d="M10.0408 4.90112L15.8718 10.7345L10.0408 16.5678"
                                                      stroke="#0D775E" stroke-width="2" stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
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
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row fb-inner wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6 col-md-12 text-start">
                    <p class="copyright-text">© 2024 @if(date('Y')>2024)
                            - {{ date('Y') }}
                        @endif
                        <a href="{{ route('home') }}">
                            {{ $settings->title }}
                        </a> All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 col-md-12 text-end">
                    <div
                        class="d-flex align-items-center justify-content-center justify-content-md-center justify-content-xl-end">
                        <span class="me-3">We Accept: </span>
                        <img src="{{asset("front/images/footer-img.png")}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>
