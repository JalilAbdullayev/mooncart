@extends('back.layouts.master')
@section('title', 'Orders')
@section('css')
    <link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css")}}"/>
    <link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css")}}"/>
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Order
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
                        Order
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
                            @php
                                $orderProduct = $item->order_products->where('product_id', $product->id)->first();
                                echo $orderProduct ? $orderProduct->quantity : 0;
                            @endphp
                        </td>
                        <td>
                            ${{ $orderProduct->quantity * ($product->price - (($product->price * $product->discount) /
							100)) }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">
                    Total
                </td>
                <td>
                    ${{ $total }}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('js')
    <script src="{{asset("back/node_modules/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js")}}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
    </script>
@endsection
