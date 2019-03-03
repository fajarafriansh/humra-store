<?php
use App\Http\Controllers\Controller;
$main_categories = Controller::mainCategories();
?>

<header class="header_area">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('img/frontend/logo.png') }}" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="{{ url('/') }}">Home</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							  aria-expanded="false">Shop</a>
							<ul class="dropdown-menu">
								@foreach($main_categories as $category)
									@if ($category->status == "1")
										<li class="nav-item">
											<a class="nav-link" href="{{ url('/products/'. $category->url) }}">{{ $category->name }}</a>
										</li>
									@endif
								@endforeach
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li class="nav-item">
									<a class="nav-link" href="blog.html">Blog</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="single-blog.html">Blog Details</a>
								</li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li class="nav-item">
									<a class="nav-link" href="login.html">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="register.html">Register</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="tracking-order.html">Tracking</a>
								</li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
					</ul>

					<ul class="nav-shop">
						<li class="nav-item">
							<button><i class="ti-search"></i></button>
						</li>
						<li class="nav-item">
							<button><a href="{{ url('/cart') }}"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></a></button>
						</li>
						@if(empty(Auth::check()))
							<li class="nav-item">
								<button><a href="{{ url('/user/login') }}"><i class="fa fa-sign-out-alt"></i> Login</a></button>
							</li>
							{{-- <li class="nav-item">
								<a class="button button-header" href="{{ url('/user/Register') }}">Buy Now</a>
							</li> --}}
						@else
							<li class="nav-item">
								<button><a href="{{ url('/user/profile') }}"><i class="fa fa-user"></i></a></button>
							</li>
							<li class="nav-item">
								<button><a href="{{ url('/user/logout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a></button>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>