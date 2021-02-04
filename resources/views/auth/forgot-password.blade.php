@extends('layouts.master')

@section('content')

<section class="mt-4 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-12"></div>
            <div class="col-md-7 col-sm-12 col-12">
                <div class="card card-body box-shadow">
                    <h2 class="text-center border-bottom pb-3">
                        @awt('Login')
                    </h2>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-contact form-labels" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-label-group">
                            <input type="text" name="email" id="email" placeholder=""
                            class="form-control required @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            <label for="email">@awt('Email')</label>
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                @awt('Send Password Reset Link')
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
</section>
@endsection
