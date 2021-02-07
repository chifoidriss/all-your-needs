@extends('layouts.master')
@section('title', awt('My favorites'))

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
@endsection

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
                                @awt('My favorites')
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
                        <b>@awt('My favorites products')</b>
                    </div>
                
                    <div class="px-4 py-3">
                        
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection
