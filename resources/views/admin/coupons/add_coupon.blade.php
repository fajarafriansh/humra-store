@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/coupons' ) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Add New Coupon</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/categories' )}}">Coupons</a></div>
				<div class="breadcrumb-item">Add New Coupon</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">The Coupons</h2>
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
						<form method="post" action="{{ url('/admin/add-coupon' )}}" name="add_coupon" id="add_coupon" class="needs-validation" novalidate="">{{ csrf_field() }}
							<div class="card-header">
								<h4>Add New Coupon</h4>
							</div>
							<div class="card-body">
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Code</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="coupon_code" id="coupon_code" class="form-control" minlength="5" maxlength="15" required>
										<div class="invalid-feedback">
											Please fill in coupon code between 5 to 15 alphanumeric
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount Type</label>
									<div class="col-sm-12 col-md-7">
										<select name="amount_type" id="amount_type" class="form-control selectric">
											<option value="Percentage">Percentage</option>
											<option value="Fixed">Fixed</option>
										</select>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
									<div class="col-sm-12 col-md-7">
										<input type="number" name="amount" id="amount" class="form-control" min="0" required>
										<div class="invalid-feedback">
											Please fill in coupon amount
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expiry Date</label>
									<div class="col-sm-12 col-md-7">
										<input type="text" name="expiry_date" id="expiry_date" class="form-control datepicker" required>
										<div class="invalid-feedback">
											Please fill in coupon expiry date
										</div>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
									<div class="col-sm-12 col-md-7">
										<select name="status" class="form-control selectric">
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>
								</div>
								<div class="form-group row mb-4">
									<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
									<div class="col-sm-12 col-md-7">
										<input type="submit" value="Add Coupon" class="btn btn-primary">
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