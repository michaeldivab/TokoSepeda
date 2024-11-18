@extends('layouts.appnew')

@section('content')

	<!-- Hero #1
============================================= -->

	<section id="hero" class="hero">
        @include('flash::message')
		<div id="hero-slider" class="hero-slider">
			<!-- Slide #1 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="https://themestore.sosnok.com/html/dotbike-preview/dotbike/img/slider/slider-3.jpg" alt="Background"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-icon">
									<i class="icon icon-Settings"></i>
								</div>
								<div class="slide-heading"> The Best Theme For Auto Shops </div>
								<div class="slide-title">
									<h2>Say Hello To <span class="color-theme">Bike Shop !</span></h2>
								</div>
								<div class="slide-desc"> Bike Shop is a business theme. Perfectly suited for Auto Mechanic, Bike Repair Shops, Bike Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
								{{-- <div class="slide-action">
									<a class="btn btn-primary" href="#">Check It Now</a>
									<a class="btn btn-primary btn-white" href="#">Purchase Now</a>
								</div> --}}
							</div>
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
			<!-- Slide #2 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="https://themestore.sosnok.com/html/dotbike-preview/dotbike/img/slider/slider-2.jpg" alt="Background"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-heading"> The Best product in market </div>
								<div class="slide-title">
									<h2>get all you need easily</h2>
								</div>
								<div class="slide-desc"> Bike Shop is a business theme. Perfectly suited for Auto Mechanic, Bike Repair Shops, Bike Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
								{{-- <div class="slide-action">
									<a class="btn btn-primary" href="#">Check It Now</a>
								</div> --}}
							</div>
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
			<!-- Slide #3 -->
			<div class="slide bg-overlay">
				<div class="bg-section">
					<img src="https://themestore.sosnok.com/html/dotbike-preview/dotbike/img/slider/slider-1.jpg" alt="Background"/>
				</div>
				<div class="container vertical-center">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
							<div class="slide-content">
								<div class="slide-heading"> product start from idr 100.000 </div>
								<div class="slide-title">
									<h2>get by largest <span class="color-theme">brands</span></h2>
								</div>
								<div class="slide-desc"> Bike Shop is a business theme. Perfectly suited for Auto Mechanic, Bike Repair Shops, Bike Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
							</div>
						</div>
						<!-- .col-md-12 end -->
					</div>
					<!-- .row end -->
				</div>
				<!-- .container end -->
			</div>
			<!-- .slide end -->
			
		</div>
		<!-- #hero-slider end -->
	</section>
	<!-- #hero -->
	
	<!-- Featured Items
============================================= -->
	<section id="featuredItems" class="shop">
		<div class="container">
			<div class="row product-boxes">
				<!-- Product Box #1 -->
				<div class="col-xs-12 col-sm-4 col-md-4 product-box">
					<a href="#">
					<div class="product-img">
						<img  src="https://themestore.sosnok.com/html/dotbike-preview/dotbike/img/banner/bn3.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-link">
								<h3>Bike Frame</h3>
								<p>Best Metal</p>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<!-- .product-box end -->
				
				<!-- Product Box #2 -->
				<div class="col-xs-12 col-sm-4 col-md-4 product-box">
					<a href="#">
					<div class="product-img">
						<img  src="https://themestore.sosnok.com/html/dotbike-preview/dotbike/img/banner/bn4.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-link">
								<h3>Bike Brand</h3>
								<p>Best Prices</p>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<!-- .product-box end -->
				
				<!-- Product Box #3 -->
				<div class="col-xs-12 col-sm-4 col-md-4 product-box">
					<a href="#">
					<div class="product-img">
						<img  src="https://themestore.sosnok.com/html/dotbike-preview/dotbike/img/banner/bn3.jpg" alt="Product"/>
						<div class="product-hover">
							<div class="product-link">
								<h3>Bike Factory</h3>
								<p>Best Quality</p>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					</a>
				</div>
				<!-- .product-box end -->
				
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{{-- <p class="subheading">we get</p> --}}
					<h2>New Items</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row product-carousel text-center">
				<!-- Product #1 -->
				@foreach ($viewData["bikes"] as $bike)
				<div class="product">
					<div class="product-img">
						<img src="{{ Storage::url($bike->getImage()) }}" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
                                @if($bike->stock >= 1)
								<a class="btn btn-primary" style="width: 50px;" href="{{ route('cart.add', ['id'=> $bike->getId() ]) }}"> <i class="fa fa-shopping-cart" aria-hidden="true" title="Add To Cart"></i></a>
								@endif
                                @guest
                                @else
	                                @if(App\Models\Whishlist::where('userid', Auth::id())->where('bikeid', $bike->getId())->exists())
	                                	<a class="btn btn-primary" style="width: 50px; pointer-events: none;"><i class="fa fa-heart" aria-hidden="true" title="Already On Wishlist"></i></a>
	                                @else
	                                	<a class="btn btn-primary" style="width: 50px;" href="{{ route('user.whishlist.add', ['id'=>$bike->getId()]) }}"><i class="fa fa-heart-o" aria-hidden="true" title="Add To Wishlist"></i></a>
	                                @endif
                                @endguest
								<a class="btn btn-primary" style="width: 50px;" href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}"><i class="fa fa-eye" aria-hidden="true" title="View Detail"></i></a>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					<div class="product-bio">
	                    <div class="prodcut-cat">
	                        <p>{{ $bike->getType() }} - {{ $bike->getBrand() }} - {{ $bike->stock }} stock</p>
	                    </div>
	                    <!-- .product-cat end -->
	                    <div class="prodcut-title">
	                        <h3>
	                            <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}">{{ $bike->getName() }}</a>
	                        </h3>
	                    </div>
	                    <!-- .product-title end -->
	                    <div class="product-price">
	                        <span class="symbole">Rp. </span><span>{{ number_format($bike->getPrice(),0,',','.') }}</span>
	                    </div>
	                    <!-- .product-price end -->
	                    
	                </div>
					<!-- .product-bio end -->
				</div>
				@endforeach
				<!-- .product end -->
				
			</div>
			<!-- .row end -->
			<div class="row col-xs-12 col-sm-12 col-md-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
				<a class="btn btn-primary btn-black" href="{{ route('user.bike.showAll')}}">All Product &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- .container end -->

	</section>
	<!-- #featuredItems end -->

	<!-- Featured Items
============================================= -->
	<section id="featuredItems" class="shop">

		<!-- .container end -->
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{{-- <p class="subheading">we get</p> --}}
					<h2>Hot Items</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row product-carousel text-center">
				<!-- Product #1 -->
				@foreach ($viewData["hotbikes"] as $bike)
				<div class="product">
					<div class="product-img">
						<img src="{{ Storage::url($bike->getImage()) }}" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
								@if($bike->stock >= 1)
                                <a class="btn btn-primary" style="width: 50px;"> <i class="fa fa-exclamation-circle" aria-hidden="true" title="out of stock"></i></a>
                                @endif
                                @guest
                                @else
	                                @if(App\Models\Whishlist::where('userid', Auth::id())->where('bikeid', $bike->getId())->exists())
	                                	<a class="btn btn-primary" style="width: 50px; pointer-events: none;"><i class="fa fa-heart" aria-hidden="true" title="Already On Wishlist"></i></a>
	                                @else
	                                	<a class="btn btn-primary" style="width: 50px;" href="{{ route('user.whishlist.add', ['id'=>$bike->getId()]) }}"><i class="fa fa-heart-o" aria-hidden="true" title="Add To Wishlist"></i></a>
	                                @endif
                                @endguest
								<a class="btn btn-primary" style="width: 50px;" href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}"><i class="fa fa-eye" aria-hidden="true" title="View Detail"></i></a>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					<div class="product-bio">
	                    <div class="prodcut-cat">
	                        <p>{{ $bike->getType() }} - {{ $bike->getBrand() }} - {{ $bike->stock }} stock</p>
	                        <p style="font-weight: bold; color: black;"><i class="fa fa-line-chart" aria-hidden="true"></i> {{ $bike->viewcount }} - <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ $bike->ordercount }}</p>
	                    </div>
	                    <!-- .product-cat end -->
	                    <div class="prodcut-title">
	                        <h3>
	                            <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}">{{ $bike->getName() }}</a>
	                        </h3>
	                    </div>
	                    <!-- .product-title end -->
	                    <div class="product-price">
	                        <span class="symbole">Rp. </span><span>{{ number_format($bike->getPrice(),0,',','.') }}</span>
	                    </div>
	                    <!-- .product-price end -->
	                    
	                </div>
					<!-- .product-bio end -->
				</div>
				@endforeach
				<!-- .product end -->
				
			</div>
			<!-- .row end -->
			<div class="row col-xs-12 col-sm-12 col-md-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
				<a class="btn btn-primary btn-black" href="{{ route('user.bike.showAll')}}">All Product &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- .container end -->

	</section>
	<!-- #featuredItems end -->

	<!-- Featured Items
============================================= -->
	<section id="featuredItems" class="shop" >
		<!-- .container end -->
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					{{-- <p class="subheading">we get</p> --}}
					<h2>Sale's Items</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="row product-carousel text-center">
				<!-- Product #1 -->
				@foreach ($viewData["salesbikes"] as $bike)
				<div class="product">
					<div class="product-img">
						<img src="{{ Storage::url($bike->getImage()) }}" alt="Product"/>
						<div class="product-hover">
							<div class="product-action">
								@if($bike->stock >= 1)
                                <a class="btn btn-primary" style="width: 50px;"> <i class="fa fa-exclamation-circle" aria-hidden="true" title="out of stock"></i></a>
                                @endif
                                @guest
                                @else
	                                @if(App\Models\Whishlist::where('userid', Auth::id())->where('bikeid', $bike->getId())->exists())
	                                	<a class="btn btn-primary" style="width: 50px; pointer-events: none;"><i class="fa fa-heart" aria-hidden="true" title="Already On Wishlist"></i></a>
	                                @else
	                                	<a class="btn btn-primary" style="width: 50px;" href="{{ route('user.whishlist.add', ['id'=>$bike->getId()]) }}"><i class="fa fa-heart-o" aria-hidden="true" title="Add To Wishlist"></i></a>
	                                @endif
                                @endguest
								<a class="btn btn-primary" style="width: 50px;" href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}"><i class="fa fa-info-circle" aria-hidden="true" title="View Detail"></i></a>
							</div>
						</div>
						<!-- .product-overlay end -->
					</div>
					<!-- .product-img end -->
					<div class="product-bio">
	                    <div class="prodcut-cat">
	                        <p>{{ $bike->getType() }} - {{ $bike->getBrand() }} - {{ $bike->stock }} stock</p>
	                    </div>
	                    <!-- .product-cat end -->
	                    <div class="prodcut-title">
	                        <h3>
	                            <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}">{{ $bike->getName() }}</a>
	                        </h3>
	                    </div>
	                    <!-- .product-title end -->
	                    <div class="product-price">
	                    	<small class="discount" style="font-size: 15px;"><s>{{ number_format($bike->price_discount,0,',','.') }}</s></small>
	                        <span class="symbole">Rp. </span><span>{{ number_format($bike->getPrice(),0,',','.') }}</span>
	                    </div>
	                    <!-- .product-price end -->
	                    
	                </div>
					<!-- .product-bio end -->
				</div>
				@endforeach
				<!-- .product end -->
				
			</div>
			<!-- .row end -->
			<div class="row col-xs-12 col-sm-12 col-md-12 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
				<a class="btn btn-primary btn-black" href="{{ route('user.bike.showAll')}}">All Product &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- .container end -->
	</section>
	<!-- #featuredItems end -->
	
	<!-- Clients
============================================= -->
	<section id="clients" class="clients bg-gray">
		<div class="container heading">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<p class="subheading">Awesome</p>
					<h2>Our Brands</h2>
				</div>
				<!-- .col-md-12 end -->
			</div>
			<!-- .row end -->
			
			{{-- <div class="row heading-desc">
				<div class="col-xs-12 col-sm-12 col-md-10">
					<p>Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres.</p>
				</div>
				<!-- .col-md-10 end -->
				<!-- .client end -->
			</div> --}}
			<!-- .row end -->
			
		</div>
		<!-- .container end -->
		<div class="container">
			<div class="clients-bg">
				<div class="row">
					<div class="col-xs-12 colsm-12 col-md-12 client-carousel">
						<!-- Client #1 -->
						<div class="client">
							<img src="{{ asset('templates/assets/images/clients/b1.png')}}" alt="Polygon Bikes">
						</div>
						<!-- .client end -->
						
						<!-- Client #2 -->
						<div class="client">
							<img src="{{ asset('templates/assets/images/clients/b2.png')}}" alt="United Bikes">
						</div>
						<!-- .client end -->
						
						<!-- Client #3 -->
						<div class="client">
							<img src="{{ asset('templates/assets/images/clients/b3.png')}}" alt="Giant Bikes">
						</div>
						<!-- .client end -->
						
						<!-- Client #4 -->
						<div class="client">
							<img src="{{ asset('templates/assets/images/clients/b4.jpg')}}" alt="Trek Bikes">
						</div>
						<!-- .client end -->
						
						<!-- Client #5 -->
						<div class="client">
							<img src="{{ asset('templates/assets/images/clients/b5.png')}}" alt="Specialized Bikes">
						</div>
						<!-- .client end -->
						
						<!-- Client #6 -->
						<div class="client">
							<img src="{{ asset('templates/assets/images/clients/b7.jpg')}}" alt="Thrill Bikes">
						</div>
						<!-- .client end -->
						<!-- Client #4 -->
						{{-- <div class="client">
							<img src="{{ asset('templates/assets/images/clients/4.png')}}" alt="Pacific Bikes">
						</div> --}}
						<!-- .client end -->
						
					</div>
				</div>
				<!-- .row end -->
			</div>
		</div>
		<!-- .container end -->
	</section>
	<!-- #clients end -->

@endsection
