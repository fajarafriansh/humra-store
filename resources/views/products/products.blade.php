@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shop Category</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shop Category</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ end banner area ================= -->

	<!-- ================ category section start ================= -->
	<section class="section-margin--small mb-5">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-5">
					@include('layouts.front.front_sidebar')
				</div>
				<div class="col-xl-9 col-lg-8 col-md-7">
					<!-- Start Filter Bar -->
					<div class="filter-bar d-flex flex-wrap align-items-center">
						<div class="sorting">
							<select>
								<option value="1">Default sorting</option>
								<option value="1">Default sorting</option>
								<option value="1">Default sorting</option>
							</select>
						</div>
						<div class="sorting mr-auto">
							<select>
								<option value="1">Show 12</option>
								<option value="1">Show 12</option>
								<option value="1">Show 12</option>
							</select>
						</div>
						<div>
							<div class="input-group filter-bar-search">
								<input type="text" placeholder="Search">
								<div class="input-group-append">
									<button type="button"><i class="ti-search"></i></button>
								</div>
							</div>
						</div>
					</div>
					<!-- End Filter Bar -->
					<!-- Start Best Seller -->
					<section class="lattest-product-area pb-40 category-list">
						<div class="row">
							@foreach($products_all as $product)
								<!-- single product -->
								<div class="col-md-6 col-lg-4">
									<div class="card text-center card-product">
										<div class="card-product__img">
											<img class="card-img" src="{{ asset('img/backend/products/small/'. $product->image) }}" alt="">
											<ul class="card-product__imgOverlay">
												<li><button><i class="ti-search"></i></button></li>
												<li><button><i class="ti-shopping-cart"></i></button></li>
												<li><button><i class="ti-heart"></i></button></li>
											</ul>
										</div>
										<div class="card-body">
											<p>{{ $product->category->name }}</p>
											<h4 class="card-product__title"><a href="{{ url('/product/hs-'. $product->id) }}">{{ $product->product_name }}</a></h4>
											<p class="card-product__price">RP.{{ $product->price }}</p>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</section>
					<!-- End Best Seller -->
				</div>
			</div>
		</div>
	</section>
	<!-- ================ category section end ================= -->

	<!-- ================ top product area start ================= -->
	@include('layouts.front.front_top_product')
	<!-- ================ top product area end ================= -->

	<!-- ================ Subscribe section start ================= -->
	@include('layouts.front.front_subscribe')
	<!-- ================ Subscribe section end ================= -->

@endsection