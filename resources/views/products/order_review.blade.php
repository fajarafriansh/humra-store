@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Order Review</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Review</li>
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
			<div class="row mb-5">
				<div class="col-md-6 col-xl-6 mb-6 mb-xl-0">
					<div class="confirmation-card">
						<h3 class="billing-title">Billing Details</h3>
						<table class="order-rable">
							<tr>
								<td>Name</td>
								<td>: {{ $user_details->name }}</td>
							</tr>
							<tr>
								<td>Street</td>
								<td>: {{ $user_details->address }}</td>
							</tr>
							<tr>
								<td>City</td>
								<td>: {{ $user_details->city }}</td>
							</tr>
							<tr>
								<td>Country</td>
								<td>: {{ $user_details->country }}</td>
							</tr>
							<tr>
								<td>Postcode</td>
								<td>: {{ $user_details->zipcode }}</td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>: {{ $user_details->mobile }}</td>
							</tr>
						</table>
					</div>
				</div>
		        <div class="col-md-6 col-xl-6 mb-6 mb-xl-0">
					<div class="confirmation-card">
						<h3 class="billing-title">Shipping Details</h3>
						<table class="order-rable">
							<tr>
								<td>Name</td>
								<td>: {{ $shipping_details->name }}</td>
							</tr>
							<tr>
								<td>Street</td>
								<td>: {{ $shipping_details->address }}</td>
							</tr>
							<tr>
								<td>City</td>
								<td>: {{ $shipping_details->city }}</td>
							</tr>
							<tr>
								<td>Country</td>
								<td>: {{ $shipping_details->country }}</td>
							</tr>
							<tr>
								<td>Postcode</td>
								<td>: {{ $shipping_details->zipcode }}</td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>: {{ $shipping_details->mobile }}</td>
							</tr>
						</table>
					</div>
		        </div>
			</div>
			<div class="order_details_table mb-5">
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
							<?php $total_amount = 0; ?>
							@foreach($user_cart as $item)
								<tr>
									<td>
										<p>{{ $item->product_name}}</p>
									</td>
									<td>
										<h5>&times; {{ $item->quantity}}</h5>
									</td>
									<td>
										<p>Rp.{{ $item->price*$item->quantity }}</p>
									</td>
								</tr>
								<?php $total_amount = $total_amount + ($item->price * $item->quantity); ?>
							@endforeach
							<tr>
								<td>
									<h5></h5>
								</td>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<p>Rp.{{ $total_amount }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<h5></h5>
								</td>
								<td>
									<h4>Coupon Discount</h4>
								</td>
								<td>
									@if(!empty(Session::get('coupon_amount')))
										<p>Rp.{{ Session::get('coupon_amount') }}</p>
									@else
										<p>RP.0</p>
									@endif
								</td>
							</tr>
							<tr>
								<td>
									<h5></h5>
								</td>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<p>Free</p>
								</td>
							</tr>
							<tr>
								<td>
									<h5></h5>
								</td>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h4>Rp.{{ $total = $total_amount - Session::get('coupon_amount') }}</h4>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<form class="row mb-5" name="payment_form" id="payment_form" action="{{ url('/place-order') }}" method="POST">@csrf
				<input type="hidden" name="total" value="{{ $total }}">
				<div class="col-md-6 col-xl-12 mb-12 mb-xl-0">
					<div class="confirmation-card">
						<h2 class="billing-title">Payment Method</h2>
						<div class="payment_item">
							<div class="radion_btn">
								<input type="radio" id="COD" value="Cash on Delivery" name="payment_method">
								<label for="COD">Cash on Delivery</label>
								<div class="check"></div>
							</div>
							<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                        </div>
						<div class="payment_item">
							<div class="radion_btn">
								<input type="radio" id="paypal" value="Paypal" name="payment_method">
								<label for="paypal">Paypal </label>
								<img src="img/product/card.jpg" alt="">
								<div class="check"></div>
							</div>
							<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
						</div>
						<div class="payment_item">
							<div class="radion_btn">
								<input type="radio" id="check" value="check" name="payment_method">
								<label for="check">Check Payment</label>
								<div class="check"></div>
							</div>
							<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                        </div>{{--
                        <div class="creat_account">
							<input type="checkbox" id="f-option4" name="selector">
							<label for="f-option4">I’ve read and accept the </label>
							<a href="#">terms & conditions*</a>
						</div> --}}
						<div class="text-left">
							<button type="submit" class="button primary-btn" onclick="return selectPaymentMethod();">Place Order</button>
						</div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
					<div class="confirmation-card">
						<div class="creat_account">
							<input type="checkbox" id="f-option4" name="selector">
							<label for="f-option4">I’ve read and accept the </label>
							<a href="#">terms & conditions*</a>
						</div>
						<div class="text-center">
							<button class="button button-paypal">Place Order</button>
						</div>
					</div>
				</div> --}}
			</form>
		</div>
	</section>

@endsection