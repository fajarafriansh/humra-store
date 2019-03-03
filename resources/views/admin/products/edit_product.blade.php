@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/products' ) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Edit Product</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/products' ) }}">Products</a></div>
				<div class="breadcrumb-item">Edit Product</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Edit Product</h2>
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
						<form enctype="multipart/form-data" method="post" action="{{ url('/admin/edit-product/'. $product_details -> id )}}" name="edit_product" id="edit_product" class="needs-validation" novalidate="">{{ csrf_field() }}
							<div class="card-header">
								<h4>Edit Your Product</h4>
							</div>
							<div class="card-body">
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product_details -> product_name }}" required>
										<div class="invalid-feedback">
											Please fill in product name
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Category</label>
									<div class="col-sm-12 col-md-7">
										<select name="category_id" id="category_id" class="form-control selectric">
											<?php echo $categories_dropdown; ?>
										</select>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Code</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="product_code" id="product_code" class="form-control" value="{{ $product_details -> product_code }}" required>
										<div class="invalid-feedback">
											Please fill in product code
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Color</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="product_color" id="product_color" class="form-control" value="{{ $product_details -> product_color }}" required>
										<div class="invalid-feedback">
											Please fill in product color
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
									<div class="col-sm-12 col-md-7">
										<textarea name="description" id="description" class="summernote-simple">{{ $product_details -> description }}</textarea>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Material & Care</label>
									<div class="col-sm-12 col-md-7">
										<textarea name="care" id="care" class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
									<div class="col-sm-12 col-md-7">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													Rp.
												</div>
											</div>
											<input type="text" name="price" id="price" class="form-control currency" value="{{ $product_details -> price }}" required>
											<div class="invalid-feedback">
												Please fill in product price
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
									<div class="col-sm-12 col-md-7">
										<select name="status" class="form-control selectric">
											<option value="1">Enable</option>
											<option value="0" @if($product_details->status == "0") selected @endif>Disable</option>
										</select>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Image</label>
									<div class="col-sm-12 col-md-3">
										<div id="image-preview" class="image-preview">
											<label for="image-upload" id="image-label">Choose New Image</label>
											<input type="file" name="image" id="image-upload" />
											<input type="hidden" name="current_image" id="image-upload" value="{{ $product_details -> image }}"/>
										</div>
									</div>
									@if (!empty($product_details -> image))
										<div class="col-sm-12 col-md-4">
											<div id="image-preview" class="image-preview">
												<a href="{{ url('/admin/delete-product-image/'. $product_details -> id) }}"><label>Remove Image</label></a>
												<img style="width: 246px;" src="{{ asset('img/backend/products/small/'. $product_details -> image) }}" alt="">
											</div>
										</div>
									@endif
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
									<div class="col-sm-12 col-md-7">
										<input type="submit" value="Edit Product" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection