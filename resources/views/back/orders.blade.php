@extends('back.layouts.master')
@section('title', 'Orders')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Orders
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
                        Orders
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="list-group">
        @for($i = 0; $i < count($data); $i++)
            <a href="{{ route('admin.order.index', $data[$i]->id) }}" class="list-group-item list-group-item-action
            d-flex justify-content-between">
                Order #{{ $i + 1 }} <span>
                    {{ $data[$i]->created_at }}
                </span>
            </a>
        @endfor
    </div>
@endsection
