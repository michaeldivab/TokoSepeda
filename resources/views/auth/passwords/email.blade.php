@extends('layouts.appnew')

@section('content')
<section id="page-title" class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <h1>Reset Password Form</h1>
            </div>
            <!-- .col-md-6 end -->
            <div class="col-xs-12 col-sm-12 col-md-6">
                <ol class="breadcrumb text-right" style="font-size: 25px;">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">Reset Password</li>
                </ol>
            </div>
            <!-- .col-md-6 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #page-title end -->
    <br><br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12  col-sm-12  col-md-12">
                <div class="sign-form">
					<form class="mb-0" method="POST" action="{{ route('password.email') }}">
                        @csrf
						<div class="form-group">
							<label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						
						<button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
					</form>
				</div>
            </div>
        </div>
    </div>
    <br><br>

@endsection
