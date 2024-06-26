@extends('back.layouts.master')
@section('title', 'Cart')
@section('css')
    <link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css")}}"/>
    <link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css")}}"/>
    <link rel="stylesheet"
          href="{{asset("back/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css")}}"/>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Cart
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
                        Cart
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="table-responsive">
        <table id="myTable" class="table table-striped border">
            <thead>
            <tr>
                <th>
                    Product
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Price
                </th>
                <th>
                    Operations
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                @foreach($item->products as $product)
                    <tr>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            <form method="POST" class="d-inline-flex"
                                  action="{{ route('admin.changeQuantity', $product->id) }}">
                                @csrf
                                <input type="number" value="@php
                                $cartProduct = $item->cart_products->where('product_id', $product->id)->first();
                                echo $cartProduct ? $cartProduct->quantity : 0;
                            @endphp" name="quantity" min="1" max="{{ $product->quantity }}"
                                       data-bts-button-down-class="btn btn-secondary btn-outline"
                                       data-bts-button-up-class="btn btn-secondary btn-outline"/>
                                <button type="submit" class="btn btn-outline-warning submit">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </form>
                            @if(session('error'))
                                <div class="alert alert-danger mt-1">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </td>
                        <td>
                            ${{ $cartProduct->quantity * ($product->price - (($product->price * $product->discount) /
							100)) }}
                        </td>
                        <td>
                            <a href="{{ route('admin.deleteFromCart', $product->id) }}" class="btn btn-outline-danger">
                                <i class="ti-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            @if($data->count() > 0)
                <tfoot>
                <tr>
                    <td colspan="2">
                        Total
                    </td>
                    <td>
                        ${{ $total }}
                    </td>
                    <td>
                        <a href="{{ route('admin.emptyCart') }}" class="btn btn-outline-danger">
                            Empty Cart
                        </a>
                        <form action="{{ route('admin.submitCart') }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Order
                            </button>
                        </form>
                    </td>
                </tr>
                </tfoot>
            @endif
        </table>
    </div>
@endsection
@section('js')
    <script src="{{asset("back/node_modules/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("back/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js")}}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        $("input[name='quantity']").TouchSpin();
    </script>
@endsection
