@extends('layouts.master')

@section('title', awt('Login'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/contact_responsive.css') }}">
@endsection

@section('content')
<div class="container contact_container">
    <div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li>
                        <a href="{{ route('index') }}">@awt('Home')</a>
                    </li>
					<li class="active">
                        <a href="#">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            @awt('Login')
                        </a>
                    </li>
				</ul>
			</div>

		</div>
	</div>

    <div class="row">
        <div class="col-md-7 col-sm-12 col-12"></div>
        <div class="col-md-5 col-sm-12 col-12">
            <div class="p-4 box-shadow">
                <h2 class="text-center border-bottom pb-3">
                    @awt('Login')
                </h2>

                <form class="form-contact form-labels" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-label-group">
                        <label for="email">@awt('Email')</label>
                        <input type="text" name="email" id="email" placeholder=""
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-label-group">
                        <label for="password">@awt('Password')</label>
                        <input type="password" name="password" id="password" placeholder=""
                        class="form-control required @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-between flex-wrap">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember" role="button">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <a class="text-danger" href="{{ route('password.request') }}">
                            @awt('Forgot your password ?')
                        </a>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="red_button message_submit_btn trans_300">
                            @awt('Login')
                        </button>
                    </div>
                </form>
                
                <div class="mt-3 mb-1">
                    @awt("Do not have an account yet ?")
                    <a class="text-primary" href="{{ route('register') }}">
                        @awt('Create an account')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
