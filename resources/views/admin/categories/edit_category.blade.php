@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/categories' ) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Edit Category</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/categories' )}}">Categories</a></div>
				<div class="breadcrumb-item">Edit Category</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Edit Category</h2>
			<p class="section-lead">
				Form validation using default from Bootstrap 4
			</p>

			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card">
						<form method="post" action="{{ url('/admin/edit-category/'. $categoryDetail -> id) }}" name="edit_category" id="edit_category" class="needs-validation" novalidate="">{{ csrf_field() }}
							<div class="card-header">
								<h4>Edit Your Category</h4>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>Category Name</label>
									<input type="text" name="category_name" id="category_name" class="form-control" value="{{ $categoryDetail -> name}}" required>
									<div class="invalid-feedback">
										Please fill category name
									</div>
								</div>
								<div class="form-group">
									<label>URL</label>
									<input type="text" name="url" id="url" class="form-control" value="{{ $categoryDetail -> url}}" required>
									<div class="invalid-feedback">
										Please fill category url
									</div>
								</div>
								<div class="form-group">
									<label>Category Level</label>
									<select name="parent_id" class="form-control selectric">
										<option value="0">Main Category</option>
										@foreach($levels as $val)
											<option value="{{ $val -> id }}" @if($val -> id == $categoryDetail -> parent_id) selected @endif>{{ $val -> name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea name="description" id="description" class="form-control">{{ $categoryDetail -> description}}</textarea>
								</div>
								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control selectric">
										<option value="1">Enable</option>
										<option value="0" @if($categoryDetail->status == "0") selected @endif>Disable</option>
									</select>
								</div>
							</div>
							<div class="card-footer text-right form-actions">
								<input type="submit" value="Update Category" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection