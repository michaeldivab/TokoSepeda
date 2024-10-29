@extends('layouts.appnew')

@section('content')
<section id="page-title" class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <h1>Confirm Password Form</h1>
            </div>
            <!-- .col-md-6 end -->
            <div class="col-xs-12 col-sm-12 col-md-6">
                <ol class="breadcrumb text-right" style="font-size: 25px;">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="active">Confirm Password</li>
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
                {{ __('Please confirm your password before continuing.') }}
                <div class="sign-form">
					<form class="mb-0" method="POST" action="{{ route('password.confirm') }}">
                        @csrf
						<div class="form-group">
							<label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
							@error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						
						<button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
					</form>
				</div>
            </div>
        </div>
    </div>
    <br><br>

@endsection
