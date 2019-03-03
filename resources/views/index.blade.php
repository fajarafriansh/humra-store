@extends('layouts.front.front_index')
@section('content')

	<!--================ Hero banner start =================-->
	<section class="hero-banner">
		<div class="container">
			@foreach($banners as $banner)
			<div class="row no-gutters align-items-center pt-60px">
				<div class="col-5 d-none d-sm-block">
					<div class="hero-banner__img">
						<img class="img-fluid" src="{{ asset('img/frontend/home/banners/'. $banner->image) }}" alt="">
					</div>
				</div>
				<div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
					<div class="hero-banner__content">
						<h4>{{ $banner->subtitle }}</h4>
						<h1>{{ $banner->title }}</h1>
						<p>{{ $banner->description }}</p>
						<a class="button button-hero" href="{{ $banner->link }}">Browse Now</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</section>
	<!--================ Hero banner end =================-->

	<!--================ Hero Carousel start =================-->
	<section class="section-margin mt-0">
		<div class="owl-carousel owl-theme hero-carousel">
			<div class="hero-carousel__slide">
				<img src="{{ asset('img/frontend/home/hero-slide1.png') }}" alt="" class="img-fluid">
				<a href="#" class="hero-carousel__slideOverlay">
					<h3>Wireless Headphone</h3>
					<p>Accessories Item</p>
				</a>
			</div>
			<div class="hero-carousel__slide">
				<img src="{{ asset('img/frontend/home/hero-slide2.png') }}" alt="" class="img-fluid">
				<a href="#" class="hero-carousel__slideOverlay">
					<h3>Wireless Headphone</h3>
					<p>Accessories Item</p>
				</a>
			</div>
			<div class="hero-carousel__slide">
				<img src="{{ asset('img/frontend/home/hero-slide3.png') }}" alt="" class="img-fluid">
				<a href="#" class="hero-carousel__slideOverlay">
					<h3>Wireless Headphone</h3>
					<p>Accessories Item</p>
				</a>
			</div>
			<div class="hero-carousel__slide">
				<img src="{{ asset('img/frontend/home/hero-slide3.png') }}" alt="" class="img-fluid">
				<a href="#" class="hero-carousel__slideOverlay">
					<h3>Wireless Headphone</h3>
					<p>Accessories Item</p>
				</a>
			</div>
			<div class="hero-carousel__slide">
				<img src="{{ asset('img/frontend/home/hero-slide3.png') }}" alt="" class="img-fluid">
				<a href="#" class="hero-carousel__slideOverlay">
					<h3>Wireless Headphone</h3>
					<p>Accessories Item</p>
				</a>
			</div>
		</div>
	</section>
	<!--================ Hero Carousel end =================-->

	<!-- ================ Latest product section start ================= -->
	<section class="section-margin calc-60px">
		<div class="container">
			<div class="section-intro pb-60px">
				<p>New Item in the market</p>
				<h2>Latest <span class="section-intro__style">Product</span></h2>
			</div>
			<div class="row">
				@foreach($products_all as $product)
					<!-- single product -->
					<div class="col-md-6 col-lg-4 col-xl-3">
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
		</div>
	</section>
	<!-- ================ Latest product section end ================= -->

	<!-- ================ Offer section start ================= -->
	<section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
		<div class="container">
			<div class="row">
				<div class="col-xl-5">
					<div class="offer__content text-center">
						<h3>Up To 50% Off</h3>
						<h4>Winter Sale</h4>
						<p>Him she'd let them sixth saw light</p>
						<a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ Offer section end ================= -->

	<!-- ================ Best Selling item  carousel ================= -->
	<section class="section-margin calc-60px">
		<div class="container">
			<div class="section-intro pb-60px">
				<p>Best Item in the market</p>
				<h2>Best <span class="section-intro__style">Sellers</span></h2>
			</div>
			<div class="owl-carousel owl-theme" id="bestSellerCarousel">
				<div class="card text-center card-product">
					<div class="card-product__img">
						<img class="img-fluid" src="img/product/product1.png" alt="">
						<ul class="card-product__imgOverlay">
							<li><button><i class="ti-search"></i></button></li>
							<li><button><i class="ti-shopping-cart"></i></button></li>
							<li><button><i class="ti-heart"></i></button></li>
						</ul>
					</div>
					<div class="card-body">
						<p>Accessories</p>
						<h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
						<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product2.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Beauty</p>
					<h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product3.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Decor</p>
					<h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product4.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Decor</p>
					<h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product1.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Accessories</p>
					<h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product2.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Beauty</p>
					<h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product3.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Decor</p>
					<h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>

				<div class="card text-center card-product">
					<div class="card-product__img">
					<img class="img-fluid" src="img/product/product4.png" alt="">
					<ul class="card-product__imgOverlay">
					  <li><button><i class="ti-search"></i></button></li>
					  <li><button><i class="ti-shopping-cart"></i></button></li>
					  <li><button><i class="ti-heart"></i></button></li>
					</ul>
					</div>
					<div class="card-body">
					<p>Decor</p>
					<h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
					<p class="card-product__price">$150.00</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ Best Selling item  carousel end ================= -->

	<!-- ================ Blog section start ================= -->
	<section class="blog">
		<div class="container">
			<div class="section-intro pb-60px">
				<p>Popular Item in the market</p>
				<h2>Latest <span class="section-intro__style">News</span></h2>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="card card-blog">
						<div class="card-blog__img">
							<img class="card-img rounded-0" src="{{ asset('img/frontend/blog/blog1.png') }}" alt="">
						</div>
						<div class="card-body">
							<ul class="card-blog__info">
								<li><a href="#">By Admin</a></li>
								<li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
							</ul>
							<h4 class="card-blog__title"><a href="single-blog.html">The Richland Center Shooping News and weekly shooper</a></h4>
							<p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
							<a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="card card-blog">
						<div class="card-blog__img">
							<img class="card-img rounded-0" src="{{ asset('img/frontend/blog/blog2.png') }}" alt="">
						</div>
						<div class="card-body">
							<ul class="card-blog__info">
								<li><a href="#">By Admin</a></li>
								<li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
							</ul>
							<h4 class="card-blog__title"><a href="single-blog.html">The Shopping News also offers top-quality printing services</a></h4>
							<p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
							<a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="card card-blog">
						<div class="card-blog__img">
							<img class="card-img rounded-0" src="{{ asset('img/frontend/blog/blog3.png') }}" alt="">
						</div>
						<div class="card-body">
							<ul class="card-blog__info">
								<li><a href="#">By Admin</a></li>
								<li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
							</ul>
							<h4 class="card-blog__title"><a href="single-blog.html">Professional design staff and efficient equipment you’ll find we offer</a></h4>
							<p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
							<a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ Blog section end ================= -->

	<!-- ================ Subscribe section start ================= -->
	@include('layouts.front.front_subscribe')
	<!-- ================ Subscribe section end ================= -->

@endsection