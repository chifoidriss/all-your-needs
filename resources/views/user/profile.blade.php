@extends('layouts.master')
@section('title', awt('My account'))

@section('content')
    <div class="container content">
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
                                @awt('My Acount')
                            </a>
                        </li>
                    </ul>
                </div>
    
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                @include('user.side-bar')
            </div>
            
            <div class="col-md-8">
                <div class="box-shadow radius-lg">
                    <div class="border-bottom px-4 py-3">
                        {{-- <h3 class="text-center">Mes informations</h3> --}}
                        <b>Mes informations</b>
                    </div>
                
                    <div class="px-4 py-3">
                        {{-- <div class="">
                            <div class="update-avatar">
                                <div>
                                    Photo de profil
                                    <small>
                                        (<i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <i>Taille optimale : 256x256px</i>)
                                </small>
                                </div>
                                <div class="avatar">
                                    <span>
                                        {{ Auth::user()->surname[0] }}
                                    </span>
                                    <div class="edit">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        Modifier
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr> --}}
    
                        <form action="{{ route('user-profile-information.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mr-3">@awt('Civility'):</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input @error('civility') is-invalid @enderror" type="radio"
                                            value="M" id="cv_m" name="civility" @if (old('civility', Auth::user()->civility) == 'M') checked @endif>
                                            <label class="custom-control-label" for="cv_m">@awt('Mr.')</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input @error('civility') is-invalid @enderror" type="radio"
                                            value="Mme" id="cv_mme" name="civility" @if (old('civility', Auth::user()->civility) == 'Mme') checked @endif>
                                            <label class="custom-control-label" for="cv_mme">@awt('Mrs.')</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input @error('civility') is-invalid @enderror" type="radio"
                                            value="Mlle" id="cv_mlle" name="civility" @if (old('civility', Auth::user()->civility) == 'Mlle') checked @endif>
                                            <label class="custom-control-label" for="cv_mlle">@awt('Ms.')</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Nom <small class="text-danger">*</small></label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nom" value="{{ old('name', Auth::user()->name) }}">
                                        @error ('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="surname">Prénom <small class="text-danger">*</small></label>
                                        <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror"
                                        placeholder="Prénom" value="{{ old('surname', Auth::user()->surname) }}">
                                        @error ('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label for="nationality">Nationalité <small class="text-danger">*</small></label>
                                        <select class="custom-select" name="nationality" id="nationality"></select>
                                    </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email <small class="text-danger">*</small></label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" value="{{ old('email', Auth::user()->email) }}">
                                        @error ('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone">Numéro <small class="text-danger">*</small></label>
                                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Numéro" value="{{ old('phone', Auth::user()->phone) }}">
                                        @error ('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="birth_day">Date de naissance <small class="text-danger">*</small></label>
                                        <input type="date" name="birth_day" id="birth_day" class="form-control @error('birth_day') is-invalid @enderror"
                                        placeholder="Date de naissance"  value="{{ old('birth_day', Auth::user()->birth_day) }}">
                                        @error ('birth_day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="col-12">
                                    <hr>
                                </div>
    
                                <div class="col-12">
                                    <div class="text-right-">
                                        <button class="btn btn-primary" type="submit">
                                            Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/countries.js') }}"></script>

    <script>
        populateCountriesWithDefault("nationality", "{{ old('nationality', Auth::user()->nationality) }}");

        $('.update-avatar .avatar').mouseenter(function () {
            $('.update-avatar .avatar span').hide();
            $('.update-avatar .avatar .edit').show();
        });
        $('.update-avatar .avatar').mouseleave(function () {
            $('.update-avatar .avatar span').show();
            $('.update-avatar .avatar .edit').hide();
        });
        
        $('.update-avatar .avatar').click(function () {
            $('#avatar-profile').trigger('click');
        });
    </script>
@endsection