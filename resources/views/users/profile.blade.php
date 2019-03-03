@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Profile</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Profile</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ end banner area ================= -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
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
			<div class="row">
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Update Account</h3>
						<form class="row login_form val_form" method="POST" action="{{ url('/user/profile') }}" id="account_form" name="account_form">@csrf
							<div class="col-md-12 form-group">
								<input type="text" value="{{ $user_details->name }}" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->address }}" class="form-control" id="address" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->city }}" class="form-control" id="city" name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->state }}" class="form-control" id="state" name="state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">
							</div>
							<div class="col-md-12 form-group">
								<select class="form-control" id="country" name="country">
									<option value="">Select Country</option>
									@foreach($countries as $country)
										<option value="{{ $country->country_name }}" @if($country->country_name == $user_details->country) selected @endif>{{ $country->country_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->zipcode }}" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip Code'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->mobile }}" class="form-control" id="mobile" name="mobile" placeholder="Mobile" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" class="button button-login w-100">Update</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Update Password</h3>
						<form class="row login_form val_form" method="POST" action="{{ url('/user/update-password') }}" id="password_form" name="password_form">@csrf
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Current Password'">
								<span id="check_password"></span>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control pwstrength" id="new_password" name="new_password" placeholder="New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" class="button button-login w-100">Update Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

@endsection