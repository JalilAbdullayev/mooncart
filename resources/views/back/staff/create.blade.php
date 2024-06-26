@extends('back.layouts.master')
@section('title', 'Add New Staff')
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
                Add New Staff
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
                        <a href="{{ route('admin.staff.index') }}">
                            Staff
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
    <form class="card" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="position" id="position" placeholder="Position"
                       maxlength="255" required/>
                <label for="position" class="form-label text-white-50">
                    Position
                </label>
            </div>
            @error('position')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label text-white-50">
                    Image
                </label>
                <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                       accept="image/gif, image/jpeg, image/png, image/jpg, image/svg" required/>
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn w-100 btn-primary text-white">
                Add
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
