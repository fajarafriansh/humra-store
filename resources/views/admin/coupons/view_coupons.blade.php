@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Coupons</h1>
			<div class="section-header-button">
				<a href="{{ url('/admin/add-coupon' ) }}" class="btn btn-primary">Add New</a>
			</div>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ url('/admin/coupons' ) }}">Coupons</a></div>
				<div class="breadcrumb-item">All Coupons</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">The Coupons</h2>
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
											<th>Code</th>
											<th>Amount Type</th>
											<th>Amount</th>
											<th>Created Date</th>
											<th>Expiry Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($coupons as $coupon)
											<tr>
												<td class="text-center">{{ $coupon->id }}</td>
												<td>{{ $coupon->coupon_code }}</td>
												<td class="text-center">{{ $coupon->amount_type }}</td>
												<td class="text-center">
													{{ $coupon->amount }}
													@if($coupon->amount_type == "Percentage") % @else IDR @endif
												</td>
												<td class="text-center">{{ $coupon->created_at }}</td>
												<td class="text-center">{{ $coupon->expiry_date }}</td>
												<td class="text-center">
													@if($coupon->status == "1")
														<div class="badge badge-primary">Active</div>
													@else
														<div class="badge badge-danger">Inactive</div>
													@endif
												</td>
												<td class="text-center">
													<a href="{{ url('/admin/edit-coupon/'. $coupon->id) }}" class="btn btn-icon btn-sm btn-primary"><i class="far fa-edit"> Edit</i></a>
													<a rel="{{ $coupon->id }}" rel1="delete-coupon" href="javascript:" class="btn btn-icon btn-sm btn-danger deleteRecord"><i class="fas fa-trash"></i> Delete</a>
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