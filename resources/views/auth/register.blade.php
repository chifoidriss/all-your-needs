@extends('layouts.master')

@section('title', awt('Register'))

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
                            @awt('Register')
                        </a>
                    </li>
				</ul>
			</div>
		</div>
	</div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-12">
            <div class="p-4 box-shadow">
                <h2 class="text-center border-bottom pb-3">
                    @awt('Create an account')
                </h2>

                <form class="form-contact form-labels" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="mr-3">@awt('Civility'):</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input @error('civility') is-invalid @enderror" type="radio"
                            value="M" id="cv_m" name="civility" @if (old('civility') == 'M') checked @endif>
                            <label class="custom-control-label" for="cv_m">@awt('Mr.')</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input @error('civility') is-invalid @enderror" type="radio"
                            value="Mme" id="cv_mme" name="civility" @if (old('civility') == 'Mme') checked @endif>
                            <label class="custom-control-label" for="cv_mme">@awt('Mrs.')</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input @error('civility') is-invalid @enderror" type="radio"
                            value="Mlle" id="cv_mlle" name="civility" @if (old('civility') == 'Mlle') checked @endif>
                            <label class="custom-control-label" for="cv_mlle">@awt('Ms.')</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6 col-12">
                            <label for="name">@awt('Last Name')</label>
                            <input type="text" name="name" id="name"
                            class="form-control required @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ awt($message) }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6 col-12">
                            <label for="surname">@awt('First Name')</label>
                            <input type="text" name="surname" id="surname"
                            class="form-control required @error('surname') is-invalid @enderror" value="{{ old('surname') }}">
                            @error('surname')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ awt($message) }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="email">@awt('Email Address')</label>
                            <input type="email" name="email" id="email"
                            class="form-control required @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ awt($message) }}</strong>
                                </div>
                            @enderror
                        </div>
                    
                        <div class="form-group col-sm-6 col-12">
                            <label for="password">@awt('Password')</label>
                            <input type="password" name="password" id="password"
                            class="form-control required @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ awt($message) }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6 col-12">
                            <label for="password_confirmation">@awt('Password Confirmation')</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control required @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ awt($message) }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="red_button message_submit_btn trans_300">
                            {{ awt('Register') }}
                        </button>
                    </div>
                </form>

                <div class="mt-3 mb-1">
                    @awt('Already have an account ?')
                    <a class="text-primary" href="{{ route('login') }}">
                        @awt('Login')
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-12"></div>
    </div>
</div>
@endsection