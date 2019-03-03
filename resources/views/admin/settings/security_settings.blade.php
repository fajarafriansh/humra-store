@extends('layouts.admin.admin_index')
@section('content')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="{{ url('/admin/settings') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
			</div>
			<h1>Security Settings</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ url('/admin/settings') }}">Settings</a></div>
				<div class="breadcrumb-item">Security Settings</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">All About Security Settings</h2>
			<p class="section-lead">
				Security settings such as firewalls, server accounts and others.
			</p>

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

			<div id="output-status"></div>
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<h4>Jump To</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column">
								<li class="nav-item"><a href="#" class="nav-link">General</a></li>
								<li class="nav-item"><a href="#" class="nav-link">SEO</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Email</a></li>
								<li class="nav-item"><a href="#" class="nav-link">System</a></li>
								<li class="nav-item"><a href="{{ url('/admin/settings/security') }}" class="nav-link active">Security</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Automation</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<form method="POST" action="{{ url('/admin/update-pass' )}}" name="update_password" id="update_password" class="needs-validation" novalidate="">{{ csrf_field() }}
						<div class="card" id="settings-card">
							<div class="card-header">
								<h4>Admin Security Settings</h4>
							</div>
							<div class="card-body">
								<div class="form-group row align-items-center">
									<label for="current-password" class="form-control-label col-sm-3 text-md-right">Current Password</label>
									<div class="col-sm-6 col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-lock"></i>
												</div>
											</div>
											<input type="password" name="current_pass" id="current_pass" class="form-control" required="">
										</div>
										<span id="chkPass"></span>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label for="new-password" class="form-control-label col-sm-3 text-md-right">New Password</label>
									<div class="col-sm-6 col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-lock"></i>
												</div>
											</div>
											<input type="password" name="new_pass" id="new_pass" class="form-control pwstrength" data-indicator="pwindicator" required="">
										</div>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<label for="new-password" class="form-control-label col-sm-3 text-md-right">Confirm Password</label>
									<div class="col-sm-6 col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-lock"></i>
												</div>
											</div>
											<input type="password" name="confirm_pass" id="confirm_pass" class="form-control" required="">
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer bg-whitesmoke text-md-right form-actions">
								<input type="submit" value="Save Changes" class="btn btn-primary">
								<button class="btn btn-secondary" type="button">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection