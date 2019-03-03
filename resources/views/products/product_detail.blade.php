@extends('layouts.front.front_index')
@section('content')

	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Detail</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shop Single</li>
						</ol>
					</nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
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
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
									<img src="{{ asset('img/backend/products/tiny/'. $product_details->image) }}" alt="">
								</li>
								<?php $i = 0 ?>
								@foreach($product_alt_images as $alt_image )
									<li data-target="#carouselExampleIndicators" data-slide-to="{{ ++$i }}">
										<img src="{{ asset('img/backend/products/tiny/'. $alt_image->image) }}" alt="">
									</li>
								@endforeach
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
										<a style="overflow: hidden;" href="{{ asset('img/backend/products/large/'. $product_details->image) }}">
											<img class="d-block w-100" src="{{ asset('img/backend/products/medium/'. $product_details->image) }}" alt="First slide">
										</a>
									</div>
								</div>
								@foreach($product_alt_images as $alt_image )
									<div class="carousel-item">
										<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
											<a href="{{ asset('img/backend/products/large/'. $alt_image->image) }}">
												<img class="d-block w-100" src="{{ asset('img/backend/products/medium/'. $alt_image->image) }}" alt="Second slide">
											</a>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<form name="add_to_cart" id="add_to_cart" action="{{ url('add-cart') }}" method="post">{{ csrf_field() }}
						<input type="hidden" name="product_id" value="{{ $product_details->id }}">
						<input type="hidden" name="product_name" value="{{ $product_details->product_name }}">
						<input type="hidden" name="product_code" value="{{ $product_details->product_code }}">
						<input type="hidden" name="product_color" value="{{ $product_details->product_color }}">
						<input type="hidden" name="price" id="price_cart" value="{{ $product_details->price }}">

						<div class="s_product_text">
							<h3>{{ $product_details->product_name }}</h3>
							{{-- <h2 id="product_price">RP.{{ $product_details->price }}</h2> --}}
							<ul class="list">
								<li><a class="active" href="#"><span>Category</span> : {{ $product_details->category->name }}</a></li>
							</ul>
							<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>
							<div class="select-box d-flex mt-50 mb-30">
			                	<div class="input-group mb-3 mr-5 product-count" style="max-width: 120px;">
									<div class="input-group-prepend">
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="btn btn-outline-primary js-btn-minus reduced items-count" type="button">&minus;</button>
									</div>
									<input type="text" name="quantity" id="sst" maxlength="12" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
									<div class="input-group-append">
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="btn btn-outline-primary js-btn-plus increase items-count" type="button">&plus;</button>
									</div>
				            	</div>
								<select name="size" id="product_size" class="mr-5">
									<option value="">Size: </option>
								    @foreach ($product_details->attributes as $size)
										<option value="{{ $product_details->id }}-{{ $size->size }}">{{ $size->size }}</option>
									@endforeach
								</select>
								<select id="productColor">
									<option value="value">Color: Black</option>
									<option value="value">Color: White</option>
									<option value="value">Color: Red</option>
									<option value="value">Color: Purple</option>
								</select>
			                </div>
							<h2 id="product_price">RP.{{ $product_details->price }}</h2>
							<ul class="list">
								<li><span>Availibility</span> : <span id="availibility">@if ($total_stock > 0) In Stock @else Out Of Stock @endif</span></li>
							</ul>
							<div class="card_area d-flex align-items-center">
								@if ($total_stock > 0)
									<button type="submit" class="button primary-btn" id="cart_button">Add to Cart</button>
								@endif
								<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
								<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Comments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
						and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
						Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
						London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
						officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
						job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
						showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
						child’s painting set for her birthday and it was with this that she produced her first significant work, a
						half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
						named ‘Hangover’ by Beryl’s husband and</p>
					<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
						more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
						the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
						more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
						streamlined plan of cooking that is more efficient for one person creating less</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-1.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-2.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-3.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Post a comment</h4>
								{{-- <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
									</div>
								</form> --}}
								<form action="#/" class="form-contact form-review mt-3">
									<div class="form-group">
										<input class="form-control" name="name" type="text" placeholder="Enter your name" required>
									</div>
									<div class="form-group">
										<input class="form-control" name="email" type="email" placeholder="Enter email address" required>
									</div>
									<div class="form-group">
										<input class="form-control" name="number" type="text" placeholder="Phone Number">
									</div>
									<div class="form-group">
										<textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Comment"></textarea>
									</div>
									<div class="form-group text-center text-md-right mt-3">
										<button type="submit" class="button button--active button-review">Submit Now</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Overall</h5>
										<h4>4.0</h4>
										<h6>(03 Reviews)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on 3 Reviews</h3>
										<ul class="list">
											<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-1.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-2.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-3.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								<p>Your Rating:</p>
								<ul class="list">
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
								</ul>
								<p>Outstanding</p>
								<form action="#/" class="form-contact form-review mt-3">
									<div class="form-group">
										<input class="form-control" name="name" type="text" placeholder="Enter your name" required>
									</div>
									<div class="form-group">
										<input class="form-control" name="email" type="email" placeholder="Enter email address" required>
									</div>
									<div class="form-group">
										<input class="form-control" name="subject" type="text" placeholder="Enter Subject">
									</div>
									<div class="form-group">
										<textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
									</div>
									<div class="form-group text-center text-md-right mt-3">
										<button type="submit" class="button button--active button-review">Submit Now</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<!--================ Start related Product area =================-->
	<section class="section-margin calc-60px">
		<div class="container">
			<div class="section-intro pb-60px">
				<p>In the same category</p>
				<h2>Recommended <span class="section-intro__style">Items</span></h2>
			</div>
			<div class="owl-carousel owl-theme" id="bestSellerCarousel">
				@foreach($related_products as $product)
					<div class="card text-center card-product">
						<div class="card-product__img">
							<img class="img-fluid" src="{{ asset('img/backend/products/small/'. $product->image) }}" alt="">
							<ul class="card-product__imgOverlay">
								<li><button><i class="ti-search"></i></button></li>
								<li><button><i class="ti-shopping-cart"></i></button></li>
								<li><button><i class="ti-heart"></i></button></li>
							</ul>
						</div>
						<div class="card-body">
							<p>Accessories</p>
							<h4 class="card-product__title"><a href="{{ url('/product/hs-'. $product->id) }}">{{ $product->product_name }}</a></h4>
							<p class="card-product__price">RP.{{ $product->price }}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--================ end related Product area =================-->

	<!--================ Start top Product area =================-->
	@include('layouts.front.front_top_product')
	<!--================ end top Product area =================-->

@endsection