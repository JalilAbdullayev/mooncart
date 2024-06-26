@extends('front.layouts.master')
@section('title', 'Register')
@section('content')
    <section class="px-3">
        <div class="row align-center-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 start-side-content">
                <div class="dz-bnr-inr-entry">
                    <h1>My Account</h1>
                    <nav aria-label="breadcrumb text-align-start" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home</a></li>
                            <li class="breadcrumb-item">Sign Up</li>
                        </ul>
                    </nav>
                </div>
                <div class="registration-media">
                    <img src="{{asset("front/images/registration/pic1.png")}}" alt="/">
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 end-side-content">
                <div class="login-area">
                    <h2 class="text-secondary text-center">Registration Now</h2>
                    <p class="text-center m-b30">Welcome please registration to your account</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" value="2"/>
                        <div class="m-b25">
                            <label for="name" class="label-title">Username</label>
                            <input name="name" required class="form-control" placeholder="Username" type="text"/>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="m-b25">
                            <label for="email" class="label-title">Email Address</label>
                            <input name="email" required class="form-control" placeholder="Email Address" type="email"/>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="m-b25">
                            <label for="password" class="label-title">Password</label>
                            <input name="password" required class="form-control" placeholder="Password"
                                   type="password"/>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="m-b40">
                            <label for="password_confirmation" class="label-title">Confirm Password</label>
                            <input name="password_confirmation" required class="form-control" placeholder="Password"
                                   type="password"/>
                        </div>
                        @error('password_confirm')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btnhover text-uppercase me-2">Register
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btnhover text-uppercase">
                                Sign In
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
