<header id="navbar-spy" class="header header-1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @error('email')
                    <div class="alert alert-warning alert-dismissible invalid-feedback" role="alert">
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror

                @error('password')
                    <div class="alert alert-warning alert-dismissible invalid-feedback" role="alert">
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
            </div>
        </div>
    </div>

	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-5">
					<ul class="list-inline top-contact">
						<li><span>Phone :</span> + 111111111111</li>
						<li><span>Email :</span> admin@example.com</li>
					</ul>
				</div>
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</div>

	<div class="modal model-sign fade login-modal-lg" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<p>Welcome Back</p>
					<h6>Login Area</h6>
					<div class="sign-form">
						<form class="mb-0" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="form-group">
								<input style="text-transform: lowercase;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
							</div>
							<div class="form-group">
								<input style="text-transform: lowercase;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
							</div>
							<div class="checkbox pull-left">
								<label>
									<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									Remember me</label>
							</div><br><br>
                            @if (Route::has('password.request'))
                            <div class="pull-left text-right">
                                <a class="text-white pull-right text-right" href="{{ route('password.request') }}" target="_blank">
                                    {{ __('auth.Forgot Your Password?') }}
                                </a>
                            </div>
                            @endif
                            <br>
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
							<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
						</form>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>

	<div class="modal model-sign fade register-modal-lg" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<p>Hello</p>
					<h6>Register Form</h6>
					<div class="register-form">
						<form class="mb-0" method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group">
								<input style="text-transform: lowercase;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
							</div>
							<div class="form-group">
								<input style="text-transform: lowercase;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input style="text-transform: lowercase;" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
							</div>
							<div class="form-group">
								<input style="text-transform: lowercase;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" minlength="8">
							</div>
							<div class="form-group">
								<input style="text-transform: lowercase;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" minlength="8">
							</div>
							<button type="submit" class="btn btn-primary btn-block mt-30">Register</button>
							<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
						</form>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>


	<!-- .top-bar end -->
	<nav id="primary-menu" class="navbar navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="logo" href="{{url('/')}}">
				<img src="https://htmldemo.net/rideo/img/logo.webp" alt="Autoshop">
				</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="header-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a href="{{url('/')}}">Home</a>
					</li>
					<!-- li end -->
					<li>
						<a href="{{ route('user.bike.showAll')}}">shop</a>
					</li>
					@guest
					<li>
						<a style="cursor: pointer;" data-toggle="modal" data-target=".login-modal-lg" type="button">Login</a>
					</li>
					<li>
						<a style="cursor: pointer;" data-toggle="modal" data-target=".register-modal-lg" type="button">Register</a>
					</li>
					@else
					<li>
						<a href="{{ route('user.whishlist.showAll') }}">wishlist</a>
					</li>
					<li>
						<a href="{{ route('user.order.showAll') }}">orders</a>
					</li>
					<li>
						<a role="button" style="color: #d9534f;" 
								onclick="document.getElementById('logout').submit();">Log out <span style="color: #5bc0de">({{Auth::user()->name}})</span></a>
						<form id="logout" action="{{ route('logout') }}" method="POST" class="d-flex">
							@csrf
						</form>
					</li>
					@endguest
					<!-- li end -->
				</ul>
				
				<!-- Mod-->
				<div class="module module-search pull-left">
					<div class="search-icon">
						<i class="fa fa-search"></i>
						<span class="title">search</span>
					</div>
					<div class="search-box">
						<form class="search-form" method="GET" action="{{route('user.bike.showAll')}}">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type Your Search Words" name="search">
								<span class="input-group-btn">
								<button class="btn" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
							<!-- /input-group -->
						</form>
					</div>
				</div>
				<!-- .module-search-->
				<!-- .module-cart -->
                @if(request()->is('password/reset'))
                @else
				<div class="module module-cart pull-left">
					<div class="cart-icon">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">shop cart</span>
						<span class="cart-label">{{$viewData["cartCount"]}}</span>
					</div>
					<div class="cart-box">
						<div class="cart-overview">
							<ul class="list-unstyled">
								@if(isset($viewData["cartBike"]))
								@foreach($viewData["cartBike"] as $key => $bike)
								<li>
									<img class="img-responsive" src="{{ asset('public/storage/'.$bike->getImage()) }}" alt="product"/>
									<div class="product-meta">
										<h5 class="product-title">{{$bike->name}}</h5>
										<p class="product-price">Price: Rp. {{ number_format($bike->getPrice(),0,',','.') }} </p>
										<p class="product-quantity">Quantity: {{$viewData["cartBikeData"][$bike->getId()]}}</p>
									</div>
									<a class="cancel" href="{{ route('cart.remove', ['id'=> $bike->getId() ]) }}">cancel</a>
									
								</li>
								@endforeach
								@endif
							</ul>
						</div>
						<div class="cart-total">
							<div class="total-desc">
								<h5>CART SUBTOTAL :</h5>
							</div>
							<div class="total-price">
								@if(isset($viewData['total']))
								<h5>Rp. {{ number_format($viewData['total'],0,',','.') }}</h5>
								@else
								<h5>Rp. 00.00</h5>
								@endif
							</div>
						</div>
						<div class="clearfix">
						</div>
						<div class="cart-control">
							<a class="btn btn-primary btn-block" href="{{ route('cart.removeAll') }}">remove all</a>
							<a class="btn btn-primary btn-block" href="{{ route('cart.index') }}">view cart</a>
						</div>
					</div>
				</div>
                @endif
				<!-- .module-cart end -->
				
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->


	</nav>
</header>