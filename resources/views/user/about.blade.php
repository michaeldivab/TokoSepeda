@extends('layouts.appnew')

@section('content')

<!-- Page Title
============================================= -->
	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>about</h1>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="{{url('/')}}">Home</a>
						</li>
						<li class="active">about</li>
					</ol>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #page-title end -->

<!-- Featured #1
============================================= -->
	<section id="featured1" class="featured featured-1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="heading">
						<p class="subheading">History</p>
						<h2>The Company</h2>
					</div>
					<!-- .heading end -->
					<div class="about-accordion">
						<div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">
							
							<!-- Panel 01 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-1" aria-expanded="true" aria-controls="collapse02-1">About COMPANY</a>
										<span class="icon"></span>
									</h4>
								</div>
								<div id="collapse02-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
									<div class="panel-body">
										<div class="pull-left pr-30">
											<img src="assets/images/shortcode/2.jpg" alt="about">
										</div>
										<div> Duis dapibus aliquam mi, Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. Duis dapibus aliqiuam mi, egeet euismod sceler ut. </div>
									</div>
								</div>
							</div>
							
							<!-- Panel 02 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-2" aria-expanded="false" aria-controls="collapse02-2"> Our Mission </a>
									</h4>
								</div>
								<div id="collapse02-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
									<div class="panel-body"> Duis dapibus aliquam mi, eget euismod scelerisque ut. Vivamus at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. Duis dapibus aliqiuam mi, egeet euismod sceler ut.
										Duis dapibus aliquam mi, eget euismod scelerisque ut. Vivamus at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. egeet euismod sceler ut. </div>
								</div>
							</div>
							
							<!-- Panel 03 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-3" aria-expanded="false" aria-controls="collapse02-3">Our VISION</a>
									</h4>
								</div>
								<div id="collapse02-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
									<div class="panel-body"> Duis dapibus aliquam mi, eget euismod scelerisque ut. Vivamus at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. Duis dapibus aliqiuam mi, egeet euismod sceler ut.
										Duis dapibus aliquam mi, eget euismod scelerisque ut. Vivamus at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. egeet euismod sceler ut. </div>
								</div>
							</div>
							
							<!-- Panel 04 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-4" aria-expanded="false" aria-controls="collapse02-4"> Our Goals </a>
									</h4>
								</div>
								<div id="collapse02-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
									<div class="panel-body"> Duis dapibus aliquam mi, eget euismod scelerisque ut. Vivamus at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. Duis dapibus aliqiuam mi, egeet euismod sceler ut.
										Duis dapibus aliquam mi, eget euismod scelerisque ut. Vivamus at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blansadit. Duis dapibus aliquam mi, eget euismod sceler ut.Duis dapibus aliquam mi, eget euismod scelseerisque at elit quis urna adipiscing , Curabitur vitae velit in neque dictum blandit. egeet euismod sceler ut. </div>
								</div>
							</div>
						</div>
						<!-- .accordion end -->
					</div>
					<!-- .about-accordion end -->
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="heading">
						<p class="subheading">We Are Good</p>
						<h2>Our Features</h2>
					</div>
					<!-- .heading end -->
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel">
								<div class="feature-icon">
									<i class="icon icon-Time"></i>
								</div>
								<h4 class="text-uppercase">Always Available</h4>
								<p>Duis dapibus aliquam mi, et euismod scelerisque ut. Vivamus elit quis urna adipiscing ...</p>
							</div>
						</div>
						<!-- .col-md-6 end -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel">
								<div class="feature-icon">
									<i class="icon icon-Shield"></i>
								</div>
								<h4 class="text-uppercase">Qualified Agents</h4>
								<p>Duis dapibus aliquam mi, et euismod scelerisque ut. Vivamus elit quis urna adipiscing ...</p>
							</div>
						</div>
						<!-- .col-md-6 end -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel mb-0">
								<div class="feature-icon">
									<i class="icon icon-Wallet"></i>
								</div>
								<h4 class="text-uppercase">Fair Prices</h4>
								<p>you can be 100% sure that it will be delivered right on time, within the set budget limits</p>
							</div>
						</div>
						<!-- .col-md-6 end -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="feature-panel mb-0">
								<div class="feature-icon">
									<i class="icon icon-Star"></i>
								</div>
								<h4 class="text-uppercase">Best Offers</h4>
								<p>Duis dapibus aliquam mi, et euismod scelerisque ut. Vivamus elit quis urna adipiscing ...</p>
							</div>
						</div>
					</div>
				</div>
				<!-- .col-md-6 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #featured1 end -->
	
	<!-- Team
============================================= -->
	<section id="team" class="team">
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">Creatives</p>
					<h2>Our Team</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
			<div class="row heading-desc">
				<div class="col-xs-12 col-sm-12 col-md-10">
					<p>Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres.</p>
				</div>
				<!-- .col-md-10 end -->
				<div class="col-xs-12 col-sm-12 col-md-2">
					<a class="btn btn-primary btn-block" href="#">Check All Creatives</a>
				</div>
				<!-- .col-md-2 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row">
				<!-- Member #1 -->
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="member">
						<div class="member-img">
							<img src="assets/images/team/1.jpg" alt="member"/>
							<div class="member-hover">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								<div class="member-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<!-- .member-hover end -->
						</div>
						<!-- .member-img end -->
						<div class="member-info">
							<h5>Mahmoud Baghagho</h5>
							<h6>Art Director</h6>
						</div>
						<!-- .memebr-info end -->
					</div>
					<!-- .member end -->
				</div>
				
				<!-- Member #2 -->
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="member">
						<div class="member-img">
							<img src="assets/images/team/2.jpg" alt="member"/>
							<div class="member-hover">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								<div class="member-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<!-- .member-hover end -->
						</div>
						<!-- .member-img end -->
						<div class="member-info">
							<h5>Ahmed abd - Alhaleem</h5>
							<h6>Branding</h6>
						</div>
						<!-- .memebr-info end -->
					</div>
					<!-- .member end -->
				</div>
				
				<!-- Member #3 -->
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="member">
						<div class="member-img">
							<img src="assets/images/team/3.jpg" alt="member"/>
							<div class="member-hover">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								<div class="member-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<!-- .member-hover end -->
						</div>
						<!-- .member-img end -->
						<div class="member-info">
							<h5>Mostafa Amin</h5>
							<h6>Graphic Design</h6>
						</div>
						<!-- .memebr-info end -->
					</div>
					<!-- .member end -->
				</div>
				
				<!-- Member #4 -->
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="member">
						<div class="member-img">
							<img src="assets/images/team/4.jpg" alt="member"/>
							<div class="member-hover">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								<div class="member-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<!-- .member-hover end -->
						</div>
						<!-- .member-img end -->
						<div class="member-info">
							<h5>Ahmed Hassan</h5>
							<h6>Web Developing</h6>
						</div>
						<!-- .memebr-info end -->
					</div>
					<!-- .member end -->
				</div>
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #team end -->
	
	<!--  Testimonials
============================================= -->
	<section id="testimonials" class="testimonial  bg-gray">
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">People Say</p>
					<h2>Testimonials</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
			<div class="row heading-desc">
				<div class="col-xs-12 col-sm-12 col-md-10">
					<p>Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres.</p>
				</div>
				<!-- .col-md-10 end -->
				<div class="col-xs-12 col-sm-12 col-md-2">
					<a class="btn btn-primary btn-block" href="#">Check All talks</a>
				</div>
				<!-- .col-md-2 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div id="testimonial-oc" class="testimonial-carousel">
						
						<!-- testimonial item #1 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/1.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>Begha</h6>
									<p>UI Designer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #2 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/2.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>Omar Elnagar</h6>
									<p>Civil Engineer , 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #3 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/3.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>Ahmed Abd Alhaleem</h6>
									<p>Graphic Designer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #4 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/2.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>ayman fikry</h6>
									<p>web developer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #5 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/3.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>mohamed fikry</h6>
									<p>web developer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #6 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/2.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>Begha</h6>
									<p>UI Designer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #7 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/2.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>Omar Elnagar</h6>
									<p>Civil Engineer , 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #8 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/3.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>Ahmed Abd Alhaleem</h6>
									<p>Graphic Designer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
						<!-- testimonial item #9 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<i class="fa fa-quote-left"></i>
								<p>Lorem ipsum dolor sit consctetur adipiscing elit. Se lore quam, adipiscing in condimentum tristique vel, eleifend sed turpis.</p>
							</div>
							<div class="testimonial-meta">
								<img src="assets/images/testimonials/2.jpg" alt="author">
								<div class="testimonial-bio">
									<h6>ayman fikry</h6>
									<p>web developer, 7oroof Agency</p>
								</div>
							</div>
						</div>
						<!-- .testimonial-item end -->
						
					</div>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #testimonials end -->

@endsection
