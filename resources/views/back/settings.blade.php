@extends('back.layouts.master')
@section('title', 'Settings')
@section('css')
    <link rel="stylesheet" href="{{asset("back/node_modules/dropify/dist/css/dropify.min.css")}}"/>
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Settings
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
                    <li class="breadcrumb-item active">
                        Settings
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <form class="card" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required
                      maxlength="255" value="{{ $settings->title }}"/>
                <label for="title" class="form-label text-white-50">
                    Title
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="author" id="author" placeholder="Author" required
                      maxlength="255" value="{{ $settings->author }}"/>
                <label for="author" class="form-label text-white-50">
                    Author
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Keywords" required
                      maxlength="255" value="{{ $settings->keywords }}"/>
                <label for="author" class="form-label text-white-50">
                    Keywords
                </label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" id="description" required
                          placeholder="Description">{{ $settings->description }}</textarea>
                <label for="description" class="form-label text-white-50">
                    Description
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required
                       maxlength="255" value="{{ $settings->address }}"/>
                <label for="address" class="form-label text-white-50">
                    Address
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required
                       maxlength="255" value="{{ $settings->email }}"/>
                <label for="email" class="form-label text-white-50">
                    E-mail
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required
                       maxlength="14" value="{{ $settings->phone }}"/>
                <label for="phone" class="form-label text-white-50">
                    Phone
                </label>
            </div>
            <div class="mb-3">
                <label for="favicon" class="form-label text-white-50">
                    Favicon
                </label>
                <input type="file" name="favicon" id="favicon" class="dropify" data-show-remove="false"
                       data-default-file="{{ asset('storage/'. $settings->favicon) }}"/>
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label text-white-50">
                    Logo
                </label>
                <input type="file" name="logo" id="logo" class="dropify" data-show-remove="false"
                       data-default-file="{{ asset('storage/'. $settings->logo) }}"/>
            </div>
            <button type="submit" class="btn w-100 btn-primary text-white">
                Update
            </button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{asset("back/node_modules/dropify/dist/js/dropify.min.js")}}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
