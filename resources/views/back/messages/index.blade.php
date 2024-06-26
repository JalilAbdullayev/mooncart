@extends('back.layouts.master')
@section('title', 'Messages')
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
                Messages
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
                        Messages
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
                    Name
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Phone
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
                        {{ $item->email }}
                    </td>
                    <td>
                        {{ $item->phone }}
                    </td>
                    <td>
                        <a href="{{ route('admin.messages.read', $item->id) }}" class="btn btn-outline-warning">
                            <i class="ti-eye"></i>
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
                url: '{{ route('admin.messages.delete', ':id') }}'.replace(':id', id),
                async: false,
                success: function() {
                    $('tr#' + id + '').remove();
                },
                error: function() {
                    alert('error');
                }
            })
        });
    </script>
@endsection
