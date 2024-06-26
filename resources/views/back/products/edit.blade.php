@extends('back.layouts.master')
@section('title', 'Edit Product')
@section('css')
    <link rel="stylesheet" href="{{asset("back/node_modules/select2/dist/css/select2.min.css")}}"/>
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
                Edit Product
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
                        <a href="{{ route('admin.products.index') }}">
                            Products
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <form class="card" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" maxlength="255"
                       value="{{ $product->name }}" required/>
                <label for="name" class="form-label text-white-50">
                    Name
                </label>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" min="0"
                       value="{{ $product->quantity }}" required/>
                <label for="quantity" class="form-label text-white-50">
                    Quantity
                </label>
            </div>
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="price" id="price" placeholder="Price" min="0"
                       value="{{ $product->price }}" required/>
                <label for="price" class="form-label text-white-50">
                    Price
                </label>
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="discount" id="discount" placeholder="Discount" min="0"
                       max="100" value="{{ $product->discount }}"/>
                <label for="discount" class="form-label text-white-50">
                    Discount
                </label>
            </div>
            @error('discount')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="size" id="size" placeholder="Size"
                       maxlength="255" value="{{ $product->size }}" required/>
                <label for="size" class="form-label text-white-50">
                    Size
                </label>
            </div>
            @error('size')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="color" class="form-control" name="color" id="color" value="{{ $product->color }}"
                       maxlength="255" required/>
                <label for="color" class="form-label text-white-50">
                    Color
                </label>
            </div>
            @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="description" id="description" placeholder="Description"
                       maxlength="255" value="{{ $product->description }}" required/>
                <label for="description" class="form-label text-white-50">
                    Description
                </label>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="about" class="form-label text-white-50">
                    About
                </label>
                <textarea class="form-control" name="about" id="about" placeholder="About"
                          required>{!! $product->about !!}</textarea>
            </div>
            @error('about')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="categories" class="form-label">
                    Categories
                </label>
                <select name="categories[]" id="categories" class="select2 select2-multiple w-100" multiple>
                    @foreach($categories as $k => $v)
                        <option value="{{ $k }}"
                                @if(in_array($k, $product->categories->pluck('id')->toArray(), true)) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">
                    Tags
                </label>
                <select name="tags[]" id="tags" class="select2 select2-multiple w-100" multiple>
                    @foreach($tags as $k => $v)
                        <option value="{{ $k }}"
                                @if(in_array($k, $product->tags->pluck('id')->toArray(), true)) selected @endif>
                            {{ $v }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn w-100 btn-primary text-white">
                Update
            </button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{asset("back/node_modules/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('back/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        $(".select2").select2();
        var about = CKEDITOR.replace('about', {
            extraAllowedContent: 'div',
            height: 150,
        });
    </script>
@endsection
