@extends('back.layouts.master')
@section('title', 'Add New User')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Add New User
            </h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.faq.index') }}">
                            Users
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Add
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <form class="card" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" maxlength="255"
                       required/>
                <label for="name" class="form-label text-white-50">
                    Name
                </label>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" maxlength="255"
                       required/>
                <label for="email" class="form-label text-white-50">
                    E-mail
                </label>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                       maxlength="255" required autocomplete="new-password"/>
                <label for="password" class="form-label text-white-50">
                    Password
                </label>
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                       placeholder="Confirm Password" required maxlength="255" autocomplete="new-password"/>
                <label for="password-confirm" class="form-label text-white-50">
                    Confirm Password
                </label>
            </div>
            @error('password_confirm')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="role" class="form-label text-white-50">
                    Admin
                </label>
                <select class="form-control" name="role" id="role" required>
                    <option value="0">
                        Admin
                    </option>
                    <option value="1">
                        Moderator
                    </option>
                    <option value="2">
                        Customer
                    </option>
                </select>
            </div>
            <button type="submit" class="btn w-100 btn-primary text-white">
                Add
            </button>
        </div>
    </form>
@endsection
