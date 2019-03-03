@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Products</h1>
			<div class="section-header-button">
				<a href="{{ url('/admin/add-product' ) }}" class="btn btn-primary">Add New</a>
			</div>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ url('/admin/categories' ) }}">Products</a></div>
				<div class="breadcrumb-item">All Products</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Products</h2>
			<p class="section-lead">
				Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
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
						<div class="card-header">
							<h4>All Products</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr class="text-center">
											<th>ID</th>
											<th>Image</th>
											<th>Name</th>
											<th>Category</th>
											<th>Code</th>
											<th>Color</th>
											<th>Price</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($products as $product)
											<tr>
												<td class="text-center">{{ $product -> id }}</td>
												<td class="text-center">
													@if (!empty($product -> image))
														<img src="{{ asset('/img/backend/products/small/'.$product -> image) }}" alt="{{ $product -> image }}" style="width: 70px;">
													@endif
												</td>
												<td>{{ $product -> product_name }}</td>
												<td>{{ $product -> category_name }}</td>
												<td>{{ $product -> product_code }}</td>
												<td>{{ $product -> product_color }}</td>
												<td>Rp.{{ $product -> price }}</td>
												<td class="text-center">
													@if($product->status == "1")
														<div class="badge badge-primary">Enable</div>
													@else
														<div class="badge badge-danger">Disable</div>
													@endif
												</td>
												<td width="150px" class="text-center">
													<a href="#exampleModal{{ $product -> id }}" class="btn btn-icon btn-sm btn-info" data-toggle="modal"><i class="fas fa-info-circle"></i></a>
													<a href="{{ url('/admin/edit-product/'. $product -> id) }}" class="btn btn-icon btn-sm btn-primary"><i class="far fa-edit"></i></a>
													<a href="{{ url('/admin/add-attributes/'. $product -> id) }}" class="btn btn-icon btn-sm btn-success"><i class="far fa-file"></i></a>
													<a href="{{ url('/admin/add-images/'. $product -> id) }}" class="btn btn-icon btn-sm btn-success"><i class="far fa-image"></i></a>
													<a rel="{{ $product -> id }}" rel1="delete-product" href="javascript:" class="btn btn-icon btn-sm btn-danger deleteRecord"><i class="fas fa-trash"></i></a>
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

@foreach($products as $product)
	<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $product -> id }}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{ $product -> product_name }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Product ID</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">: {{ $product -> id }}</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Product Name</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">: {{ $product -> product_name }}</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Product Category</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">: {{ $product -> category_name }}</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Product Code</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">: {{ $product -> product_code }}</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Product Color</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">: {{ $product -> product_color }}</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Product Price</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">: {{ $product -> price }}</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Fabric</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">:</div>
					</div>
					<div class="row mb-2">
						<div class="col-form-label text-md-left col-12 col-md-4">Material</div>
						<div class="col-form-label text-md-left col-sm-12 col-md-6">:</div>
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<a href="{{ url('/admin/edit-product/'. $product -> id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit Product</a>
					<a href="{{ url('/admin/add-attributes/'. $product -> id) }}" class="btn btn-icon icon-left btn-success"><i class="far fa-file"></i> Add Attributes</a>
					<a href="{{ url('/admin/add-images/'. $product -> id) }}" class="btn btn-icon btn-success"><i class="far fa-image"></i> Add Images</a>
				</div>
			</div>
		</div>
	</div>
@endforeach

@endsection