@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Checkout</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
    	</div>
	</section>
	<!-- ================ end banner area ================= -->

	<!--================Checkout Box Area =================-->
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
			<div class="billing_details">
	            <div class="row">
	                <div class="col-lg-7">
	                    <h3>Billing Details</h3>
	                    <form class="row contact_form" method="POST" action="{{ url('/checkout') }}" id="checkout_form" name="checkout_form">@csrf
	                        <div class="col-md-12 form-group">
								<input type="text" value="{{ $user_details->name }}" class="form-control" id="billing_name" name="billing_name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->address }}" class="form-control" id="billing_address" name="billing_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->city }}" class="form-control" id="billing_city" name="billing_city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->state }}" class="form-control" id="billing_state" name="billing_state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">
							</div>
							<div class="col-md-12 form-group">
								<select class="form-control" id="billing_country" name="billing_country">
									<option value="">Select Country</option>
									@foreach($countries as $country)
										<option value="{{ $country->country_name }}" @if($country->country_name == $user_details->country) selected @endif>{{ $country->country_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->zipcode }}" class="form-control" id="billing_zipcode" name="billing_zipcode" placeholder="Zip Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip Code'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text"  value="{{ $user_details->mobile }}" class="form-control" id="billing_mobile" name="billing_mobile" placeholder="Mobile" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account" style="text-align: left;">
									<input type="checkbox" id="billtoShip">
									<label for="billtoShip">Shipping Address Same As Billing Address</label>
								</div>
							</div>
	                        <div class="col-md-12 form-group mb-0">
                                <h3>Shipping Details</h3>
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" @if(!empty($shipping_details->name)) value="{{ $shipping_details->name }}" @else value=""  @endif class="form-control" id="shipping_name" name="shipping_name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" @if(!empty($shipping_details->address)) value="{{ $shipping_details->address }}" @else value="" @endif class="form-control" id="shipping_address" name="shipping_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" @if(!empty($shipping_details->city)) value="{{ $shipping_details->city }}" @else value="" @endif class="form-control" id="shipping_city" name="shipping_city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" @if(!empty($shipping_details->name)) value="{{ $shipping_details->state }}" @else value="" @endif class="form-control" id="shipping_state" name="shipping_state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">
							</div>
							<div class="col-md-12 form-group">
								<select class="form-control" id="shipping_country" name="shipping_country">
									<option value="">Select Country</option>
									@foreach($countries as $country)
										<option value="{{ $country->country_name }}" @if(!empty($shipping_details->country) && $country->country_name == $shipping_details->country) selected @endif>{{ $country->country_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" @if(!empty($shipping_details->zipcode)) value="{{ $shipping_details->zipcode }}" @else value="" @endif class="form-control" id="shipping_zipcode" name="shipping_zipcode" placeholder="Zip Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip Code'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" @if(!empty($shipping_details->mobile)) value="{{ $shipping_details->mobile }}" @else value="" @endif class="form-control" id="shipping_mobile" name="shipping_mobile" placeholder="Mobile" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile'">
							</div>
							<div class="col-md-12 form-group">
                            	<textarea class="form-control" id="shipping_notes" name="shipping_notes" rows="1" placeholder="Order Notes">@if(!empty($shipping_details->botes)) {{ $shipping_details->notes }} @endif</textarea>
                            </div>
							<div class="col-md-12 form-group">
								<button type="submit" class="button button-login w-100">Checkout</button>
							</div>
	                    </form>
	                </div>
	                <div class="col-lg-5">
                        <div class="order_details_table">
					        <h2>Order Details</h2>
					        <div class="table-responsive">
					          <table class="table">
					            <thead>
					              <tr>
					                <th scope="col">Product</th>
					                <th scope="col">Quantity</th>
					                <th scope="col">Total</th>
					              </tr>
					            </thead>
					            <tbody>
					              <tr>
					                <td>
					                  <p>Pixelstore fresh Blackberry</p>
					                </td>
					                <td>
					                  <p><i class="fa fa-times" aria-hidden="true"></i> 02</p>
					                </td>
					                <td>
					                  <p>$720.00</p>
					                </td>
					              </tr>
					              <tr>
					                <td>
					                  <p>Pixelstore fresh Blackberry</p>
					                </td>
					                <td>
					                  <h5>x 02</h5>
					                </td>
					                <td>
					                  <p>$720.00</p>
					                </td>
					              </tr>
					              <tr>
					                <td>
					                  <p>Pixelstore fresh Blackberry</p>
					                </td>
					                <td>
					                  <h5>x 02</h5>
					                </td>
					                <td>
					                  <p>$720.00</p>
					                </td>
					              </tr>
					              <tr>
					                <td>
					                  <h4>Subtotal</h4>
					                </td>
					                <td>
					                  <h5></h5>
					                </td>
					                <td>
					                  <p>$2160.00</p>
					                </td>
					              </tr>
					              <tr>
					                <td>
					                  <h4>Shipping</h4>
					                </td>
					                <td>
					                  <h5></h5>
					                </td>
					                <td>
					                  <p>Flat rate: $50.00</p>
					                </td>
					              </tr>
					              <tr>
					                <td>
					                  <h4>Total</h4>
					                </td>
					                <td>
					                  <h5></h5>
					                </td>
					                <td>
					                  <h4>$2210.00</h4>
					                </td>
					              </tr>
					            </tbody>
					          </table>
					        </div>
					    </div>
	                </div>
	            </div>
	        </div>
		</div>
	</section>

	<!--================Login Box Area =================-->
	{{-- <section class="login_box_area section-margin">
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
			<form class="row contact_form val_form" method="POST" action="{{ url('/user/checkout') }}" id="checkout_form" name="checkout_form">@csrf
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Billing Details</h3>
						<div class="col-md-12 form-group">
							<input type="text" value="{{ $user_details->name }}" class="form-control" id="billing_name" name="billing_name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->address }}" class="form-control" id="billing_address" name="billing_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->city }}" class="form-control" id="billing_city" name="billing_city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->state }}" class="form-control" id="billing_state" name="billing_state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">
						</div>
						<div class="col-md-12 form-group">
							<select class="form-control" id="billing_country" name="billing_country">
								<option value="">Select Country</option>
								@foreach($countries as $country)
									<option value="{{ $country->country_name }}" @if($country->country_name == $user_details->country) selected @endif>{{ $country->country_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->zipcode }}" class="form-control" id="billing_zipcode" name="billing_zipcode" placeholder="Zip Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip Code'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->mobile }}" class="form-control" id="billing_mobile" name="billing_mobile" placeholder="Mobile" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile'">
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account" style="text-align: left;">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Shipping Address Same As Billing Address</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Shipping Details</h3>
						<div class="col-md-12 form-group">
							<input type="text" value="{{ $user_details->name }}" class="form-control" id="shipping_name" name="shipping_name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->address }}" class="form-control" id="shipping_address" name="shipping_address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->city }}" class="form-control" id="shipping_city" name="shipping_city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->state }}" class="form-control" id="shipping_state" name="shipping_state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">
						</div>
						<div class="col-md-12 form-group">
							<select class="form-control" id="shipping_country" name="shipping_country">
								<option value="">Select Country</option>
								@foreach($countries as $country)
									<option value="{{ $country->country_name }}" @if($country->country_name == $user_details->country) selected @endif>{{ $country->country_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->zipcode }}" class="form-control" id="shipping_zipcode" name="shipping_zipcode" placeholder="Zip Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip Code'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text"  value="{{ $user_details->mobile }}" class="form-control" id="shipping_mobile" name="shipping_mobile" placeholder="Mobile" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile'">
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" class="button button-login w-100">Checkout</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section> --}}
	<!--================End Checkout Box Area =================-->

@endsection