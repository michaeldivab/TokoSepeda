@extends('layouts.appnew')

@section('content')

<!-- Page Title
============================================= -->
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>contact</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="{{url('/')}}">Home</a>
						</li>
						<li class="active">contact</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->
	
	<!-- Google Maps
============================================= -->
	<section class="google-maps pb-0">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div id="googleMap" style="width:100%;height:447px;">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- .google-maps end -->
	
	<!-- Contact #1
============================================= -->
	<section class="contact">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 widget-contact pl-0 pr-0 p-none-xs p-none-sm">
					<form id="contact-form" action="https://demo.zytheme.com/autoshop/assets/php/sendmail.php" method="post">
						<div class="col-md-6">
							<input type="text" class="form-control mb-30" name="contact-name" id="name" placeholder="Name :" required/>
						</div>
						<div class="col-md-6">
							<input type="email" class="form-control mb-30" name="contact-email" id="email" placeholder="Email :" required/>
						</div>
						<div class="col-md-12">
							<textarea class="form-control mb-30" name="contact-message" id="message" rows="4" placeholder="Message" required></textarea>
						</div>
						<div class="col-md-12">
							<button type="submit" id="submit-message" class="btn btn-primary btn-block">Send Message</button>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
							<!--Alert Message-->
							<div id="contact-result">
							</div>
						</div>
					</form>
				</div>
				<!-- .col-md-8 end -->
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="contct-widget-content">
						<p class="mb-0">Lorem ipsum dolor sit amet, adipiscing condimentum tristique vel, eleifend sed turpis. Amet, consectetur adipising elit Integer.</p>
						<div class="widget-contact-info mt-md">
							<div class="col-xs-12 col-sm-12 col-md-6 pl-0 mb-30-xs mb-30-sm">
								<h6>Phone :</h6>
								<p><i class="fa fa-phone"></i>+ 2 01065370701</p>
								<p class="mb-0"><i class="fa fa-fax"></i>+ 2 01065370701</p>
							</div>
							<!-- .col-md-6 end -->
							<div class="col-xs-12 col-sm-12 col-md-6">
								<h6>Email :</h6>
								<p class="mb-0"><i class="fa fa-envelope"></i>7oroof@7oroof.com</p>
							</div>
							<!-- .col-md-6 end -->
							<div class="col-xs-12 col-sm-12 col-md-12 pl-0 mt-30 mb-30-xs mb-30-sm">
								<h6>Address :</h6>
								<p class="mb-0"><i class="fa fa-map-marker"></i>2 AlBahr St, Tanta , AlGharbia, Egypt.</p>
							</div>
							<!-- .col-md-12 end -->
						</div>
					</div>
				</div>
				<!-- .col-md-4 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>

@endsection
