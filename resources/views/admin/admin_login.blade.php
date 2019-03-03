<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login &mdash; Stisla</title>

	<link rel="stylesheet" href="{{ asset('css/backend/humra-style.css') }}">

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{ asset('modules/bootstrap-social/bootstrap-social.css') }}">

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('css/backend/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/backend/components.css') }}">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<img src="{{ asset('img/backend/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
						</div>

						<div class="card card-primary">
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
	    					<div class="card-header"><h4>Login</h4></div>

							<div class="card-body">
								<form method="POST" action="{{ url('admin/login') }}" class="needs-validation" novalidate="">{{ csrf_field() }}
									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
										<div class="invalid-feedback">
											Please fill in your email
										</div>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
											<div class="float-right">
												<a href="auth-forgot-password.html" class="text-small">
													Forgot Password?
												</a>
											</div>
										</div>
										<input id="password" type="password" class="form-control" name="password" tabindex="2" class="form-control password" required>
										{{-- <button class="unmask" type="button" title="Mask/Unmask password to check content">Unmask</button> --}}
										<div class="invalid-feedback">
											please fill in your password
										</div>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
												<label class="custom-control-label" for="remember-me">Remember Me</label>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Login
										</button>
									</div>
								</form>
								{{-- <div class="text-center mt-4 mb-3">
									<div class="text-job text-muted">Login With Social</div>
								</div>
								<div class="row sm-gutters">
									<div class="col-6">
										<a class="btn btn-block btn-social btn-facebook">
											<span class="fab fa-facebook"></span> Facebook
										</a>
									</div>
									<div class="col-6">
										<a class="btn btn-block btn-social btn-twitter">
											<span class="fab fa-twitter"></span> Twitter
										</a>
									</div>
								</div> --}}
							</div>
						</div>
						<div class="mt-5 text-muted text-center">
							Don't have an account? <a href="auth-register.html">Create One</a>
						</div>
						<div class="simple-footer">
							Copyright &copy; Stisla 2018
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="{{ asset('modules/jquery.min.js') }}"></script>
	<script src="{{ asset('modules/popper.js') }}"></script>
	<script src="{{ asset('modules/tooltip.js') }}"></script>
	<script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('modules/moment.min.js') }}"></script>
	<script src="{{ asset('js/backend/stisla.js') }}"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="{{ asset('js/backend/scripts.js') }}"></script>
	<script src="{{ asset('js/backend/custom.js') }}"></script>

	<script src="{{ asset('js/backend/humra-script.js') }}"></script>
</body>
</html>