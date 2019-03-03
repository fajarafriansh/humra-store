@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/products' ) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Add Product Attribute</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/products' ) }}">Products</a></div>
				<div class="breadcrumb-item">Add Product Attribute</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Add Product Attribute</h2>
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
						<form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-attributes/'.$product_details -> id) }}" name="add_attributes" id="add_attributes" class="needs-validation" novalidate="">{{ csrf_field() }}
							<div class="card-header">
								<h4>Add Product Attribute</h4>
							</div>
							<div class="card-body">
								<input type="hidden" name="product_id" value="{{ $product_details -> id }}">
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name</label>
									<label class="col-form-label text-md-left col-12 col-md-7">{{ $product_details -> product_name }}</label>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Code</label>
									<label class="col-form-label text-md-left col-12 col-md-7">{{ $product_details -> product_code }}</label>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Color</label>
									<label class="col-form-label text-md-left col-12 col-md-7">{{ $product_details -> product_color }}</label>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Attributes</label>
									<div class="col-sm-12 col-md-7">
										<div class="field_wrapper">
											<div class="form-row">
												<div class="form-group col-md-2">
													<input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" required>
												</div>
												<div class="form-group col-md-2">
													<input type="text" name="size[]" id="size" placeholder="Size" class="form-control" required>
												</div>
												<div class="form-group col-md-2">
													<input type="text" name="price[]" id="price" placeholder="Price" class="form-control" required>
												</div>
												<div class="form-group col-md-2">
													<input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" required>
												</div>
												<div class="form-group col-md-1">
													<a href="javascript:void(0);" class="add_button btn btn-primary input-group-text"><i class="fas fa-plus"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
									<div class="col-sm-12 col-md-7">
										<input type="submit" value="Add Attributes" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>All Attributes</h4>
						</div>
						<div class="card-body">
							<form action="{{ url('admin/edit-attributes/'.$product_details->id) }}" method="post">{{ csrf_field() }}
								<div class="table-responsive">
									<table class="table table-striped" id="table-1">
										<thead>
											<tr class="text-center">
												<th>ID</th>
												<th>SKU</th>
												<th>Size</th>
												<th>Price</th>
												<th>Stock</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($product_details['attributes'] as $attribute)
												<tr>
													<td class="text-center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
													<td><label class="col-form-label">{{ $attribute->sku }}</label></td>
													<td><label class="col-form-label">{{ $attribute->size }}</label></td>
													<td class="text-center" style="width: 200px;">
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text">
																	Rp.
																</div>
															</div>
															<input type="text" name="price[]" value="{{ $attribute->price }}" class="form-control currency">
														</div>
													</td>
													<td class="text-center" style="width: 100px;"><input type="text" name="stock[]" value="{{ $attribute->stock }}" class="form-control"></td>
													<td class="text-center">
														<input type="submit" value="Update" class="btn btn-sm btn-primary">
														<a rel="{{ $attribute -> id }}" rel1="delete-attributes" href="javascript:" class="btn btn-icon btn-sm btn-danger deleteRecord"><i class="fas fa-times"></i> Delete</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection