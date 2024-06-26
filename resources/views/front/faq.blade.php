@extends('front.layouts.master')
@section('title', 'FAQ')
@section('content')
    <section class="content-inner main-faq-content">
        <div class="container">
            <div class="row faq-head">
                <div class="col-12 text-center">
                    <h1 class="title wow fadeInUp" data-wow-delay="0.1s">Hi! How can we help you?</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row wow fadeInUp" data-wow-delay="0.2s">
                        <ul class="breadcrumb mb-lg-4 mb-3">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                            <li class="breadcrumb-item">FAQ’s</li>
                        </ul>
                    </nav>
                    <div class="search_widget wow fadeInUp" data-wow-delay="0.3s">
                        <form class="dzSearch" method="GET" action="{{ route('faq.search') }}">
                            <div class="form-group">
                                <div class="input-group mb-0">
                                    <input name="search" type="search" class="form-control" placeholder="Search FAQ"/>
                                    <div class="input-group-addon">
                                        <button value="search" type="submit" class="btn">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.74674 16.2767C13.4286 16.2767 16.4134 13.2919 16.4134 9.61003C16.4134 5.92813 13.4286 2.94336 9.74674 2.94336C6.06485 2.94336 3.08008 5.92813 3.08008 9.61003C3.08008 13.2919 6.06485 16.2767 9.74674 16.2767Z"
                                                    stroke="#0D775E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path d="M18.0801 17.9434L14.4551 14.3184" stroke="#0D775E"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @for($i = 0; $i < count($faq); $i++)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 m-b30 m-sm-b15 wow fadeInUp"
                         data-wow-delay="0.{{$i}}s">
                        <div class="faq-content-box style-1 light">
                            <div>
                                <h3 class="dz-title">
                                    {{ $faq[$i]->question }}
                                </h3>
                                <p>
                                    {!! $faq[$i]->answer !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor
                {{ $faq->links() }}
			</div>
		</div>
	</section>
@endsection
