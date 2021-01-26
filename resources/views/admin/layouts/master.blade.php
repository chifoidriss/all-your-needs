@extends('layouts.dashboard')

@section('page-title',  awt('Administration'))

@section('main-sidebar')
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}">
            <i class="material-icons">dashboard</i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.languages')) active @endif" href="{{ route('admin.languages') }}">
            <i class="material-icons">language</i>
            <span>@awt('Languages')</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.blog.*')) active @endif" href="{{ route('admin.languages') }}">
            <i class="material-icons">shop_two</i>
            <span>Blogs</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.categorie.*')) active @endif" href="{{ route('admin.categorie.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Categories')</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.collections.*')) active @endif" href="{{ route('admin.collections.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Collections')</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.devise.*')) active @endif" href="{{ route('admin.devise.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Devise')</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.manager_user.*')) active @endif" href="{{ route('admin.manager_user.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Management Users')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.approved_shop.*')) active @endif" href="{{ route('admin.approved_shop.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Management Shops')</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.offre.*')) active @endif" href="{{ route('admin.offre.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Offers')</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.themes.*')) active @endif" href="{{ route('admin.themes.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Themes')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.type-shop.*')) active @endif" href="{{ route('admin.type-shop.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Type of Shop')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.subscription.*')) active @endif" href="{{ route('admin.subscription.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Subscription')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if(Route::is('admin.super_cat.*')) active @endif" href="{{ route('admin.super_cat.index') }}">
            <i class="material-icons">shop_two</i>
            <span>@awt('Super Categories')</span>
        </a>
    </li>
</ul>
@endsection
