@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Categories</h1>
			<div class="section-header-button">
				<a href="{{ url('/admin/add-category' ) }}" class="btn btn-primary">Add New</a>
			</div>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ url('/admin/categories' ) }}">Categories</a></div>
				<div class="breadcrumb-item">All Categories</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Categories</h2>
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
							<h4>All Categories</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr class="text-center">
											<th>ID</th>
											<th>Category Name</th>
											<th>Parent Category</th>
											<th>Category URL</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($categories as $category)
											<tr>
												<td class="text-center">{{ $category->id }}</td>
												<td>
													{{ $category->name }}
													{{-- @if($category->parent_id == 0)
														{{ $category->name }}
													@else
														&mdash;&nbsp;{{ $category->name }}
													@endif --}}
												</td>
												<td>{{ $category->parent_name() }}
												</td>
												<td>{{ $category->url }}</td>
												<td class="text-center">
													@if($category->status == "1")
														<div class="badge badge-primary">Enable</div>
													@else
														<div class="badge badge-danger">Disable</div>
													@endif
												</td>
												<td class="text-center">
													<a href="{{ url('/admin/edit-category/'. $category->id) }}" class="btn btn-sm btn-primary ">Edit</a>
													<a rel="{{ $category->id }}" rel1="delete-category" href="javascript:" class="btn btn-sm btn-danger deleteRecord">Delete</a>
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

@endsection