@extends('back.layouts.master')
@section('title', 'Product Images')
@section('css')
	<link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css")}}"/>
	<link rel="stylesheet" href="{{asset("back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css")}}"/>
	<link rel="stylesheet" href="{{asset('back/node_modules/switchery/dist/switchery.min.css')}}"/>
@endsection
@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-white-50">
				Product Images
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
						Product Images
					</li>
				</ol>
				<a href="{{ route('admin.products.create') }}" data-bs-toggle="modal" data-bs-target="#newImageModal"
				   class="btn btn-primary d-none d-lg-block m-l-15 text-white">
					<i class="ti-plus"></i> Upload New Image
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
					Featured
				</th>
				<th>
					Delete
				</th>
			</tr>
			</thead>
			<tbody>
			@foreach($data as $item)
				<tr id="{{ $item->id }}">
					<td>
						<img class="w-25" src="{{ asset('storage/products/'.$item->image) }}" alt=""/>
					</td>
					<td>
						<input type="checkbox" class="js-switch"
							   data-size="small" {{ $item->featured ? 'checked' : ''}}/>
					</td>
					<td>
						<button class="btn btn-outline-danger">
							<i class="ti-trash"></i>
						</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="newImageModal" tabindex="-1" aria-labelledby="newImageModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newImageModal">
						Upload New Image
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="POST" id="newImageForm" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<input type="file" name="images[]" id="images" multiple class="form-control"
									   accept="image/jpeg, image/png, image/jpg, image/gif" required/>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" id="saveImage" class="btn btn-primary">
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{asset("back/node_modules/datatables.net/js/jquery.dataTables.min.js")}}"></script>
	<script src="{{asset("back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js")}}"></script>
	<script src="{{asset('back/node_modules/switchery/dist/switchery.min.js')}}"></script>
	<script>
        $('#myTable').DataTable({
            ordering: false
        });
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        $('.btn-outline-danger').click(function() {
            let id = $(this).closest('tr').attr('id');

            $.ajax({
                url: '{{ route('admin.products.images.delete', ':id') }}'.replace(':id', id),
                async: false,
                success: function() {
                    $('tr#' + id + '').remove();
                },
                error: function() {
                    alert('error');
                }
            });
        });
        $('.js-switch').change(function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: '{{ route('admin.products.images.featured', ':id') }}'.replace(':id', id),
                async: false,
                success: function() {
                    location.reload();
                },
                error: function() {
                    alert('error');
                }
            });
        });
    </script>
@endsection
