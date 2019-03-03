@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Order Details</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{ url('/orders') }}">Orders</a></li>
							<li class="breadcrumb-item active" aria-current="page">Order Details</li>
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
			<div class="order_details_table mb-5">
				{{-- <h2>Order Details</h2> --}}
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product Code</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product Size</th>
								<th scope="col">Product Color</th>
								<th scope="col">Product Price</th>
								<th scope="col">Product Quantity</th>
							</tr>
						</thead>
						<tbody>
							@foreach($order_details->orders as $product)
								<tr>
									<td>
										<p>{{ $product->product_code }}</p>
									</td>
									<td>
										{{ $product->product_name }}
									</td>
									<td>
										<p>{{ $product->product_size }}</p>
									</td>
									<td>
										<p>{{ $product->product_color }}</p>
									</td>
									<td>
										<p>{{ $product->product_price }}</p>
									</td>
									<td>
										<p>{{ $product->product_quant }}</p>
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