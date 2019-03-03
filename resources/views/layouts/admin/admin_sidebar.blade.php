<?php $url = url() -> current(); ?>

<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ url('/admin') }}">Stisla</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="dashboard-ecommerce.html">St</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="dropdown <?php if (preg_match("/dashboard/i", $url)) { ?> active <?php } ?>">
				<a href="{{ url('/admin') }}" class="nav-link{{--  has-dropdown --}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
				{{-- <ul class="dropdown-menu">
					<li><a class="nav-link" href="dashboard-general.html">General Dashboard</a></li>
					<li class=active><a class="nav-link" href="dashboard-ecommerce.html">Ecommerce Dashboard</a></li>
				</ul> --}}
			</li>
			<li class="menu-header">Product</li>
			<li class="dropdown <?php if (preg_match("/categor/i", $url)) { ?> active <?php } ?>">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder"></i> <span>Categories</span></a>
				<ul class="dropdown-menu" <?php if (preg_match("/categor/i", $url)) { ?> style="display: block;" <?php } ?>>
					<li <?php if (preg_match("/categories/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/categories' ) }}">All Categories</a></li>
					<li <?php if (preg_match("/add-category/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/add-category' ) }}">Add New Category</a></li>
				</ul>
			</li>
			<li class="dropdown <?php if (preg_match("/product/i", $url)) { ?> active <?php } ?>">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i> <span>Products</span></a>
				<ul class="dropdown-menu" <?php if (preg_match("/product/i", $url)) { ?> style="display: block;" <?php } ?>>
					<li <?php if (preg_match("/products/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/products' ) }}">All Products</a></li>
					<li <?php if (preg_match("/add-product/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/add-product' )}}">Add New Product</a></li>
				</ul>
			</li>
			<li class="dropdown <?php if (preg_match("/coupon/i", $url)) { ?> active <?php } ?>">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Coupons</span></a>
				<ul class="dropdown-menu" <?php if (preg_match("/coupon/i", $url)) { ?> style="display: block;" <?php } ?>>
					<li <?php if (preg_match("/coupons/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/coupons' ) }}">All Coupons</a></li>
					<li <?php if (preg_match("/add-coupon/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/add-coupon' )}}">Add New Coupon</a></li>
				</ul>
			</li>
			<li class="menu-header">Appearance</li>
			<li class="dropdown <?php if (preg_match("/banner/i", $url)) { ?> active <?php } ?>">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i> <span>Hero Banner</span></a>
				<ul class="dropdown-menu" <?php if (preg_match("/banner/i", $url)) { ?> style="display: block;" <?php } ?>>
					<li <?php if (preg_match("/banners/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/banners' ) }}">All Banners</a></li>
					<li <?php if (preg_match("/add-banner/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/add-banner' )}}">Add New Banner</a></li>
				</ul>
			</li>
			<li class="dropdown <?php if (preg_match("/slider/i", $url)) { ?> active <?php } ?>">
				<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i> <span>Hero Slider</span></a>
				<ul class="dropdown-menu" <?php if (preg_match("/slider/i", $url)) { ?> style="display: block;" <?php } ?>>
					<li <?php if (preg_match("/sliders/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/sliders' ) }}">All Sliders</a></li>
					<li <?php if (preg_match("/add-banner/i", $url)) { ?> class="active" <?php } ?>><a class="nav-link" href="{{ url('/admin/add-slider' )}}">Add New Slider</a></li>
				</ul>
			</li>
			<li class="menu-header">Pages</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
				<ul class="dropdown-menu">
					<li><a href="auth-forgot-password.html">Forgot Password</a></li>
					<li><a href="auth-login.html">Login</a></li>
					<li><a href="auth-register.html">Register</a></li>
					<li><a href="auth-reset-password.html">Reset Password</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="errors-503.html">503</a></li>
					<li><a class="nav-link" href="errors-403.html">403</a></li>
					<li><a class="nav-link" href="errors-404.html">404</a></li>
					<li><a class="nav-link" href="errors-500.html">500</a></li>
				</ul>
			</li>
			<li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
		</ul>

		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="{{ url('') }}" class="btn btn-primary btn-lg btn-block btn-icon-split" target="_blank">
				<i class="fas fa-rocket"></i> Visit Site
			</a>
		</div>
	</aside>
</div>