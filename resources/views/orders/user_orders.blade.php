@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Your Orders</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Orders</li>
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
			<div class="order_details_table mb-5">
				{{-- <h2>Order Details</h2> --}}
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Order ID</th>
								<th scope="col">Ordered Products</th>
								<th scope="col">Payment Method</th>
								<th scope="col">Total</th>
								<th scope="col">Ordered On</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
								<tr>
									<td>
										<p>{{ $order->id}}</p>
									</td>
									<td>
										@foreach($order->orders as $product)
											{{ $product->product_code }}<br>
										@endforeach
									</td>
									<td>
										<p>{{ $order->payment_method }}</p>
									</td>
									<td>
										<p>{{ $order->total }}</p>
									</td>
									<td>
										<p>{{ $order->created_at }}</p>
									</td>
									<td>
										<p><a href="{{ url('/orders/'. $order->id) }}">View Detail</a></p>
									</td>
								</tr>
							@endforeach
							<tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

@endsection