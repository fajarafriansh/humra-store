@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	{{-- <section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Order Confirmation</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Confirmation</li>
						</ol>
					</nav>
				</div>
			</div>
    	</div>
	</section> --}}
	<!-- ================ end banner area ================= -->

	<!--================Checkout Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="text-center">
				<h3>Thank you!</h3>
				<p class="billing-alert">You order was successfuly completed.</p>
				<p>&mdash;</p>
			</div>
			<div class="row mb-5">
				<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
					<div class="confirmation-card">
						<h3 class="billing-title">Order Info</h3>
						<table class="order-rable">
							<tr>
								<td>Order number</td>
								<td>: {{ Session::get('order_id') }}</td>
							</tr>
							<tr>
								<td>Date</td>
								<td>: Oct 03, 2017</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>: IDR {{ Session::get('total') }} </td>
							</tr>
							<tr>
								<td>Payment method</td>
								<td>: {{ Session::get('payment_method') }}</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
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
				<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
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
			<p class="text-center"><a href="{{ url('/orders') }}" class="button primary-btn">View All Orders</a></p>
		</div>
	</section>

@endsection

<?php
	Session::forget('order_id');
	Session::forget('total');
	Session::forget('payment_method');
?>