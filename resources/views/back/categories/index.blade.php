@extends('back.layouts.master')
@section('title', 'Categories')
@section('css')
	<link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css")}}"/>
	<link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css")}}"/>
	<link rel="stylesheet" href="{{asset("back/node_modules/dropify/dist/css/dropify.min.css")}}"/>
@endsection
@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-white-50">
				Categories
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
						Categories
					</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row">
		<form class="card col-3" method="POST" enctype="multipart/form-data"
			  action="{{ route('admin.categories.store') }}">
			@csrf
			<div class="card-body">
				<div class="card-title">
					Create Category
				</div>
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
		<div class="col-9">
			<div class="table-responsive">
				<table id="myTable" class="table table-striped border">
					<thead>
					<tr>
						<th>
							Title
						</th>
						<th>
							Slug
						</th>
						<th>
							Image
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
								{{ $item->title }}
							</td>
							<td>
								{{ $item->slug }}
							</td>
							<td>
								<img class="w-25" src="{{ asset('storage/'. $item->image) }}" alt=""/>
							</td>
							<td>
								<a href="{{ route('admin.categories.edit', $item->id) }}"
								   class="btn btn-outline-warning">
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
		</div>
	</div>
@endsection
@section('js')
	<script src="{{asset("back/node_modules/datatables.net/js/jquery.dataTables.min.js")}}"></script>
	<script src="{{asset("back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js")}}"></script>
	<script src="{{asset("back/node_modules/dropify/dist/js/dropify.min.js")}}"></script>
	<script>
        $('#myTable').DataTable({
            ordering: false
        });
        $('.dropify').dropify();
        $('.btn-outline-danger').click(function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '{{ route('admin.categories.delete', ':id') }}'.replace(':id', id),
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
