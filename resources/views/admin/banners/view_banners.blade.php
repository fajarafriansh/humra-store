@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Banners</h1>
			<div class="section-header-button">
				<a href="{{ url('/admin/add-banner' ) }}" class="btn btn-primary">Add New</a>
			</div>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ url('/admin/banners' ) }}">Banners</a></div>
				<div class="breadcrumb-item">All Banners</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">The Banners</h2>
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
							<h4>All Banners</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr class="text-center">
											<th>ID</th>
											<th>Image</th>
											<th>Title</th>
											<th>Subtitle</th>
											<th>Link</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($banners as $banner)
											<tr>
												<td class="text-center">{{ $banner->id }}</td>
												<td class="text-center">
													@if (!empty($banner->image))
														<img src="{{ asset('img/frontend/home/banners/'.$banner->image) }}" alt="{{ $banner->image }}" style="width: 70px;">
													@endif
												</td>
												<td>{{ $banner->title }}</td>
												<td>{{ $banner->subtitle }}</td>
												<td>{{ $banner->link }}</td>
												<td class="text-center">
													@if($banner->status == "1")
														<div class="badge badge-primary">Enable</div>
													@else
														<div class="badge badge-danger">Disable</div>
													@endif
												</td>
												<td width="150px" class="text-center">
													<a href="{{ url('/admin/edit-banner/'. $banner->id) }}" class="btn btn-icon btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
													<a rel="{{ $banner->id }}" rel1="delete-banner" href="javascript:" class="btn btn-icon btn-sm btn-danger deleteRecord"><i class="fas fa-trash"></i> Delete</a>
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