@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/products' ) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Add New Banner</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/banners' ) }}">Banners</a></div>
				<div class="breadcrumb-item">Add New Banner</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">The Banners</h2>
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
						<form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-banner' )}}" name="add_banner" id="add_banner" class="needs-validation" novalidate="">{{ csrf_field() }}
							<div class="card-header">
								<h4>Add New Banner</h4>
							</div>
							<div class="card-body">
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
									<div class="col-sm-12 col-md-7">
										<div id="image-preview" class="image-preview">
											<label for="image-upload" id="image-label">Choose Image</label>
											<input type="file" name="image" id="image-upload" required/>
										</div>
										<div class="invalid-feedback">
											Please choose product image
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Title</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="title" id="title" class="form-control" required>
										<div class="invalid-feedback">
											Please fill in banner title
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Subtitle</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="subtitle" id="subtitle" class="form-control" required>
										<div class="invalid-feedback">
											Please fill in banner subtitle
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="link" id="link" class="form-control" required>
										<div class="invalid-feedback">
											Please fill in banner link
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
									<div class="col-sm-12 col-md-7">
										<textarea name="description" id="description" class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
									<div class="col-sm-12 col-md-7">
										<select name="status" class="form-control selectric">
											<option value="1">Enable</option>
											<option value="0">Disable</option>
										</select>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
									<div class="col-sm-12 col-md-7">
										<input type="submit" value="Add Banner" class="btn btn-primary">
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