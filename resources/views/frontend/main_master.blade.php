<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<title> @yield('title') </title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- SEO meta tags -->

<meta name="title" content="https://jalla-international.com/">
<meta name="description" content="">
<meta name="keywords" content="   ">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="French">
<meta name="revisit-after" content="1 days">
<meta name="author" content="amymgroup">

<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png') }}" rel="icon">
<link href="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon/favicon.ico') }}">

<!-- NEWLLY ADDED -->
<link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />

<!-- Template Main CSS File -->
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
  

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<!--SMART -->

<!--End of Tawk.to Script-->

<!-- Google tag (gtag.js) -->

</head>
<body class="handheld-toolbar-enabled">
	<!-- ============================================== HEADER ============================================== -->
	<!-- HEADER PART PAR FROM frontend Theme copied to  resouces\view\frontend\body\header-->
	@include('frontend.body.header')
	<!-- ============================================== HEADER : END ============================================== -->
	
	@yield('main_content')
	<!-- /#top-banner-and-menu --> 

	@include('frontend.body.footer')
<!-- For demo purposes – can be removed on production --> 
<!-- For demo purposes – can be removed on production : End --> 
<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }} "></script> 

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
	@if(Session::has('message'))
		var type = "{{ Session::get('alert-type', 'info') }}"
		switch(type){
			case 'info':
				toastr.info(" {{Session::get('message') }} ");
				break;

			case 'success':
				toastr.success(" {{Session::get('message') }} ");
				break;

			case 'warning':
				toastr.warning(" {{Session::get('message') }} ");
				break;

			case 'error':
				toastr.error(" {{Session::get('message') }} ");
				break;
		}
	@endif
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
</script>

<!-- End Add to Cart Product Modal -->
</body>
</html>