@extends('back.layouts.master')
@section('title', 'Create Campaign')
@section('css')
    <link rel="stylesheet" href="{{asset("back/node_modules/dropify/dist/css/dropify.min.css")}}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}"/>
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Create Campaign
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
                        <a href="{{ route('admin.campaigns.index') }}">
                            Campaigns
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Create
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
                       maxlength="255"/>
                <label for="title" class="form-label text-white-50">
                    Title
                </label>
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle" required
                       maxlength="255"/>
                <label for="subtitle" class="form-label text-white-50">
                    Subtitle
                </label>
            </div>
            @error('subtitle')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="text" class="form-label text-white-50">
                    Text
                </label>
                <textarea class="form-control" name="text" id="text" placeholder="Text" required></textarea>
            </div>
            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label text-white-50">
                    Image
                </label>
                <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                       accept="image/gif, image/jpeg, image/png, image/jpg, image/svg"/>
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn w-100 btn-primary text-white">
                Create
            </button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{asset("back/node_modules/dropify/dist/js/dropify.min.js")}}"></script>
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('back/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
        var about = CKEDITOR.replace('text', {
            extraAllowedContent: 'div',
            height: 150,
        });
    </script>
@endsection
