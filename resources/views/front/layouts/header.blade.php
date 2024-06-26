<header class="site-header mo-left header header-text-white">
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container-fluid clearfix">
                <!-- Website Logo -->
                <div class="logo-header me-md-5">
                    <a href="{{ route('home') }}" class="logo-light">
                        <img src="{{ asset('storage/'.$settings->logo) }}" alt="logo"/>
                    </a>
                </div>
                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- EXTRA NAV -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <ul class="header-right">
                            <li class="nav-item login-link">
                                <a class="nav-link"
                                   href="@auth {{ route('admin.index') }} @else {{ route('login') }}@endauth">
                                    @auth
                                        ADMIN PANEL
                                    @else
                                        LOGIN
                                    @endauth
                                </a>
                            </li>
                            @auth @else
                                <li class="nav-item login-link">
                                    <a class="nav-link"
                                       href="{{ route('signup') }}">
                                        REGISTER
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <!-- Main Nav -->
                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <div class="logo-header">
                        <a href="{{ route('home') }}">
                            <img src="{{asset("front/images/logo.svg")}}" alt=""/>
                        </a>
                    </div>
                    <ul class="nav navbar-nav dark-nav">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="sub-menu sub-menu-down"><a href="javascript:void(0);"><span>Categories</span></a>
                            <ul class="sub-menu">
                                @foreach($categories as $category)
                                <li><a href="{{ route('category', $category->slug) }}">
                                        {{ $category->title }}
                                    </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('shop.index') }}">
                                Shop
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('our-team') }}">
                                Our Team
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq.index') }}">
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>

                    <div class="dz-social-icon">
                        <ul>
                            <li>
                                <a class="fab fa-facebook-f" target="_blank" href="javascript:void(0);"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->
</header>
