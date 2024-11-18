<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/autoshop/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Oct 2024 22:37:45 GMT -->
<head>
<!-- Document Meta
    ============================================= -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--IE Compatibility Meta-->
<meta name="author" content="zytheme" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="construction html5 template">
<link href="assets/images/favicon/favicon.ico" rel="icon">

<!-- Fonts
    ============================================= -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CRaleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CUbuntu:300,300i,400,400i,500,500i,700,700i' rel='stylesheet' type='text/css'>

<!-- Stylesheets
    ============================================= -->
<link href="{{ asset('templates/assets/css/external.css')}}" rel="stylesheet">
<link href="{{ asset('templates/assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('templates/assets/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('templates/assets/css/custom.css')}}" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
@yield('sectioncss','')
    @yield('css','')
    <title>@yield('title', 'Admin Panel')</title>
    @livewireStyles
<!-- Document Title
    ============================================= -->
<title>Bike Shop</title>
</head>
<body>
<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="wrapper clearfix">
	@include('layouts.front.header')
	@yield('content')
	@include('layouts.front.footer')
</div>
<!-- #wrapper end -->

<!-- Footer Scripts
============================================= -->
<script src="{{ asset('templates/assets/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('templates/assets/js/plugins.js')}}"></script>
<script src="{{ asset('templates/assets/js/functions.js')}}"></script>
<script>
  $('#flash-overlay-modal').modal();
  $('div.alert').not('.alert-important').delay(20000).fadeOut(20000);
</script>
@yield('js')
</body>

<!-- Mirrored from demo.zytheme.com/autoshop/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Oct 2024 22:38:08 GMT -->
</html>