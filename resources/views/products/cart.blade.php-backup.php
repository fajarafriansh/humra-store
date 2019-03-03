@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
						</ol>
					</nav>
				</div>
			</div>
    	</div>
	</section>
	<!-- ================ end banner area ================= -->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
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
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>

						  	@foreach($user_cart as $cart)
								<tr>
									<td>
										<div class="media">
											<div class="d-flex">
												<img style="width: 80px; height: 80px;" src="{{ asset('img/backend/products/small/'. $cart->image) }}" alt="">
											</div>
											<div class="media-body">
												<p>{{ $cart->product_name }}</p>
												<p>Size: {{ $cart->size }}</p>
											</div>
										</div>
									</td>
									<td>
										<h5>Rp.{{ $cart->price }}</h5>
									</td>
									<td>
										<div class="product_count">
											<input type="text" name="quantity" id="sst-{{ $cart->id }}" maxlength="12" value="{{ $cart->quantity }}" title="Quantity:" class="input-text qty">
											<button onclick="var result = document.getElementById('sst-{{ $cart->id }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
											<button onclick="var result = document.getElementById('sst-{{ $cart->id }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
										</div>
									</td>
									<td>
										<h5>Rp.{{ $cart->price*$cart->quantity }}</h5>
									</td>
									<td>
										<a href="{{ url('/cart/delete-product/hs-'. $cart->id) }}" class="btn btn-icon btn-sm btn-danger"><i class="fa fa-times"></i></a>
									</td>
								</tr>
						    @endforeach

							<tr class="bottom_button">
								<td><a class="button" href="#">Update Cart</a></td>
								<td></td>
								<td></td>
								<td>
									<div class="cupon_text d-flex align-items-center">
										<input type="text" placeholder="Coupon Code">
										<a class="primary-btn" href="#">Apply</a>
										<a class="button" href="#">Have a Coupon?</a>
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<h5>$2160.00</h5>
								</td>
							</tr>
							<tr class="shipping_area">
								<td class="d-none d-md-block"></td>
								<td></td>
								<td>
									<h5>Shipping</h5>
								</td>
								<td>
									<div class="shipping_box">
										<ul class="list">
											<li><a href="#">Flat Rate: $5.00</a></li>
											<li><a href="#">Free Shipping</a></li>
											<li><a href="#">Flat Rate: $10.00</a></li>
											<li class="active"><a href="#">Local Delivery: $2.00</a></li>
										</ul>
										<h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
										<select class="shipping_select">
											<option value="1">Bangladesh</option>
											<option value="2">India</option>
											<option value="4">Pakistan</option>
										</select>
										<select class="shipping_select">
											<option value="1">Select a State</option>
											<option value="2">Select a State</option>
											<option value="4">Select a State</option>
										</select>
										<input type="text" placeholder="Postcode/Zipcode">
										<a class="gray_btn" href="#">Update Details</a>
									</div>
								</td>
							</tr>
							<tr class="out_button_area">
								<td class="d-none-l"></td>
								<td class=""></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner d-flex align-items-center">
										<a class="gray_btn" href="#">Continue Shopping</a>
										<a class="primary-btn ml-2" href="#">Proceed to checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->

@endsection