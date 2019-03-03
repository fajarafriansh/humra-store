<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Dashboard &mdash; Humra Store</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/codemirror/lib/codemirror.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/codemirror/theme/duotone-dark.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/jquery-selectric/selectric.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/prism/prism.css') }}">
	<link rel="stylesheet" href="{{ asset('modules/dropzonejs/dropzone.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/visual-pass-strength/css/passtrength.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('modules/izitoast/css/iziToast.min.css') }}"> --}}

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('css/backend/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/backend/components.css') }}">

	<!-- Start GA -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA -->

</head>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">

			@include('layouts.admin.admin_header')

			@include('layouts.admin.admin_sidebar')

			@yield('content')

			@include('layouts.admin.admin_footer')

		</div>
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
	<script src="{{ asset('modules/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('modules/chart.min.js') }}"></script>
	<script src="{{ asset('modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
	<script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
	<script src="{{ asset('modules/codemirror/lib/codemirror.js') }}"></script>
	<script src="{{ asset('modules/codemirror/mode/javascript/javascript.js') }}"></script>
	<script src="{{ asset('modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
	<script src="{{ asset('modules/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
	<script src="{{ asset('modules/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
	<script src="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('modules/cleave-js/dist/cleave.min.js') }}"></script>
	<script src="{{ asset('modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
	<script src="{{ asset('modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
	<script src="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('modules/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('modules/prism/prism.js') }}"></script>
	<script src="{{ asset('modules/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('modules/dropzonejs/min/dropzone.min.js') }}"></script>
	<script src="{{ asset('modules/jquery-validate/jquery.validate.js') }}"></script>
	<script src="{{ asset('vendors/visual-pass-strength/js/jquery.passtrength.min.js') }}"></script>
	{{-- <script src="{{ asset('modules/izitoast/js/iziToast.min.js') }}"></script> --}}

	<!-- Page Specific JS File -->
	<script src="{{ asset('js/backend/page/dashboard-ecommerce.js') }}"></script>
	<script src="{{ asset('js/backend/page/components-table.js') }}"></script>
	<script src="{{ asset('js/backend/page/modules-datatables.js') }}"></script>
	<script src="{{ asset('js/backend/page/features-post-create.js') }}"></script>
	<script src="{{ asset('js/backend/page/forms-advanced-forms.js') }}"></script>
	<script src="{{ asset('js/backend/page/bootstrap-modal.js') }}"></script>
	<script src="{{ asset('js/backend/page/modules-sweetalert.js') }}"></script>
	<script src="{{ asset('js/backend/page/components-multiple-upload.js') }}"></script>
	{{-- <script src="{{ asset('js/backend/page/modules-toastr.js') }}"></script> --}}

	<!-- Template JS File -->
	<script src="{{ asset('js/backend/scripts.js') }}"></script>
	<script src="{{ asset('js/backend/custom.js') }}"></script>

	<!-- Other JS File -->
	<script src="{{ asset('js/backend/form_validation.js') }}"></script>
</body>
</html>