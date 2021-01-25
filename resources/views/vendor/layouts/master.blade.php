
@extends('layouts.dashboard')

@section('page-title',  Auth::user()->shop->name)

@section('main-sidebar')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link @if(Route::is('shop.show')) active @endif" href="{{ route('shop.show') }}">
            <i class="material-icons">shop</i>
            <span>@awt('Shop Overview')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('shop.product.*')) active @endif" href="{{ route('shop.product.index') }}">
            <i class="material-icons">work</i>
            <span>@awt('Products')</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link @if(Route::is('shop.product.*')) active @endif" href="{{ route('shop.product.index') }}" data-toggle="collapse" data-target="#products">
            <i class="material-icons">work</i>
            <span>@awt('Products')</span>
        </a>
        <ul class="nav flex-column collapse" id="products">
            <li class="nav-item">
                <a class="nav-link @if(Route::is('shop.product.*')) active @endif" href="{{ route('shop.product.index') }}">
                    <i class="material-icons">work</i>
                    <span>@awt('List of Products')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('shop.product.*')) active @endif" href="{{ route('shop.product.index') }}">
                    <i class="material-icons">work</i>
                    <span>@awt('List of Products')</span>
                </a>
            </li>
        </ul>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link @if(Route::is('shop.subscription.*')) active @endif" href="{{ route('shop.subscription.index') }}">
            <i class="material-icons">payment</i>
            <span>@awt('Subscriptions')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('shop.blog.*')) active @endif" href="#">
            <i class="material-icons">view_module</i>
            <span>@awt('Blogs')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('shop.edit')) active @endif" href="{{ route('shop.edit') }}">
            <i class="material-icons">edit</i>
            <span>@awt('Shop Informations')</span>
        </a>
    </li>
</ul>
@endsection
