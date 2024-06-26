@extends('back.layouts.master')
@section('title', 'Products')
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
                Products
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
                        Products
                    </li>
                </ol>
                <a href="{{ route('admin.products.create') }}"
                   class="btn btn-primary d-none d-lg-block m-l-15 text-white"><i
                        class="ti-plus"></i> Create New
                </a>
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
                    Name
                </th>
                <th>
                    Image
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Price
                </th>
                <th>
                    Discount
                </th>
                <th>
                    Price with Discount
                </th>
                <th>
                    Size
                </th>
                <th>
                    Color
                </th>
                <th>
                    Categories
                </th>
                <th>
                    Tags
                </th>
                <th>
                    Operations
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr id="{{ $item->id }}">
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        <a href="{{ route('admin.products.images.index', $item->id) }}">
                            <img class="w-25"
                                src="{{ $item->featuredImage ?asset('storage/products/'.$item->featuredImage->image)
                                : ''}}"
                                alt=""/>
                        </a>
                    </td>
                    <td>
                        {{ $item->quantity }}
                    </td>
                    <td>
                        ${{ $item->price }}
                    </td>
                    <td>
                        {{ $item->discount }}%
                    </td>
                    <td>
                        @if($item->discount != 0)
                            ${{ $item->price * (100 - $item->discount) / 100 }}
                        @else
                            ${{ $item->price}}
                        @endif
                    </td>
                    <td>
                        {{ $item->size }}
                    </td>
                    <td>
                        <div style="width: 20px; height: 20px; background-color: {{ $item->color }}"></div>
                    </td>
                    <td>
                        {{ $item->categories()->pluck('title')->join(', ') }}
                    </td>
                    <td>
                        {{ $item->tags()->pluck('title')->join(', ') }}
                    </td>
                    <td>
                        <a href="{{ route('admin.products.images.index', $item->id) }}" class="btn btn-outline-purple">
                            <i class="ti-gallery"></i>
                        </a>
                        <a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-outline-warning">
                            <i class="ti-pencil-alt"></i>
                        </a>
                        <button class="btn btn-outline-danger">
                            <i class="ti-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
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
        $('.btn-outline-danger').click(function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '{{ route('admin.products.delete', ':id') }}'.replace(':id', id),
                async: false,
                success: function() {
                    $('tr#' + id + '').remove();
                },
                error: function() {
                    alert('error');
                }
            });
        });
    </script>
@endsection
