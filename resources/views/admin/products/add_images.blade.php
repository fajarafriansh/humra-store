@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/products' ) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Add Alternate Images</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/products' ) }}">Products</a></div>
				<div class="breadcrumb-item">Add Product Images</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Product Alternate Images</h2>
			<p class="section-lead">
				Form validation using default from Bootstrap 4
			</p>
			@if (Session::has('flash_message_error'))
				<div class="alert alert-danger alert-dismissible show fade">
					<div class="alert-body">
						<button class="close" data-dismiss="alert">
							<span>&times;</span>
						</button>
						{!! session('flash_message_error') !!}
					</div>
				</div>
			@endif
			@if (Session::has('flash_message_success'))
				<div class="alert alert-success alert-dismissible show fade">
					<div class="alert-body">
						<button class="close" data-dismiss="alert">
							<span>&times;</span>
						</button>
						{!! session('flash_message_success') !!}
					</div>
				</div>
			@endif

			<div class="row">
				<div class="col-12">
					<div class="card">
						<form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-images/'.$product_details->id) }}" name="add_images" id="add_images" class="needs-validation" novalidate="">{{ csrf_field() }}
							<div class="card-header">
								<h4>Add Alternate Images</h4>
							</div>
							<div class="card-body">
								<input type="hidden" name="product_id" value="{{ $product_details->id }}">
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name</label>
									<label class="col-form-label text-md-left col-12 col-md-7">{{ $product_details->product_name }}</label>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Code</label>
									<label class="col-form-label text-md-left col-12 col-md-7">{{ $product_details->product_code }}</label>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Color</label>
									<label class="col-form-label text-md-left col-12 col-md-7">{{ $product_details->product_color }}</label>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alternate Image(s)</label>
									<div class="col-12 col-md-4">
										<div class="custom-file">
											<input type="file" name="image[]" class="custom-file-input" id="image" multiple>
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
									{{-- <div class="col-12 col-md-7 dropzone" id="mydropzone">
										<div class="fallback">
											<input name="images[]" id="images" type="file" multiple />
										</div>
									</div> --}}
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
									<div class="col-sm-12 col-md-7">
										<input type="submit" value="Add Images" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>View Images</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr class="text-center">
											<th>ID</th>
											<th>Images</th>
											<th>File Name</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($products_images as $image)
											<tr>
												<td class="text-center">{{ $image->id }}</td>
												<td class="text-center"><img src="{{ asset('img/backend/products/small/'. $image->image) }}" style="width: 70px;"></td>
												<td>{{$image->image }}</td>
												<td class="text-center">
													<a href="#exampleModal{{ $image->id }}" class="btn btn-icon btn-sm btn-info" data-toggle="modal"><i class="fas fa-info-circle"></i> View</a>
													<a rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-icon btn-sm btn-danger deleteRecord"><i class="fas fa-times"></i> Delete</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@foreach($products_images as $image)
	<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $image->id }}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{ $image->image }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<img src="{{ asset('img/backend/products/medium/'. $image->image) }}" style="width: 100%; height: 100%;">
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<a rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-icon btn-danger deleteRecord"><i class="fas fa-times"></i> Delete</a>
				</div>
			</div>
		</div>
	</div>
@endforeach

@endsection