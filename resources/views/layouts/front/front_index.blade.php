<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Humra Store</title>
	<link rel="icon" href="{{ asset('img/frontend/Fevicon.png') }}" type="image/png">

	<link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/easyzoom/css/easyzoom.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/visual-pass-strength/css/passtrength.css') }}">

	<link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
	<style type="text/css" media="screen">
		.coupon-form {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			/* flex-wrap: wrap; */
			margin-right: -5px;
			margin-left: -5px;
		}
	</style>
</head>

<body>

	@include('layouts.front.front_header')

	<main class="site-main">
		@yield('content')
	</main>

	@include('layouts.front.front_footer')

	<script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('vendors/skrollr.min.js') }}"></script>
	<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('vendors/mail-script.js') }}"></script>
	<script src="{{ asset('vendors/easyzoom/js/easyzoom.js') }}"></script>
	<script src="{{ asset('vendors/jquery.validate.js') }}"></script>
	<script src="{{ asset('vendors/visual-pass-strength/js/jquery.passtrength.min.js') }}"></script>

	<script src="{{ asset('js/frontend/main.js') }}"></script>
</body>

</html>