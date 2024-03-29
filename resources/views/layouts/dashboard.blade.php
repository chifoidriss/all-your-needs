<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="robots" content="noindex,nofollow"/>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('page-title') - All Your Needs
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/material/material-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/extras.1.1.0.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/intTelInput/css/intlTelInput.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/notify.css') }}">

    <style>
        .iti { width: 100%; }
    </style>

    @yield('css')
</head>

<body class="h-100">
    @include('includes.notify')

    <div class="container-fluid">
        <div class="row">

            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="{{ route('index') }}" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('logo.png') }}">
                                <span class="d-none d-md-inline ml-1">
                                    <span class="text-uppercase font-weight-bold">
                                        <span class="text-secondary">All</span><span class="text-danger">Your</span><span class="text-primary">Needs</span>
                                    </span>
                                </span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>

                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="@awt('Search for something')..." aria-label="Search">
                    </div>
                </form>

                <div class="nav-wrapper">
                    @yield('main-sidebar')
                </div>
            </aside>
            <!-- End Main Sidebar -->

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <!-- Main Navbar -->
                <div class="main-navbar sticky-top bg-white">
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input class="navbar-search form-control" type="text" placeholder="@awt('Search for something')..." aria-label="Search">
                            </div>
                        </form>



                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item border-right dropdown text-uppercase notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <div class="nav-link-icon__wrapper">
                                            <i class="material-icons">euro_symbol</i>
                                            <span class="badge badge-pill badge-danger">
                                                {{ Cookie::get('devise', 'eur') }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    @foreach (App\Models\Devise::all() as $item)
                                        @if ($item->name != Cookie::get('devise', 'eur'))
                                        <a class="dropdown-item" href="{{ route('devise', $item->name) }}">
                                            {{ $item->name }}
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            
                            <li class="nav-item border-right dropdown text-uppercase notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <div class="nav-link-icon__wrapper">
                                            <i class="material-icons">language</i>
                                            <span class="badge badge-pill badge-danger">
                                                {{ Cookie::get('locale', 'en') }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    @foreach (config('app.locales') as $key => $value)
                                        @if (config('app.locale') != $key)
                                        <a class="dropdown-item" href="{{ route('locale', $key) }}">
                                            {{ $value }}
                                        </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            
                            {{-- <li class="nav-item border-right dropdown notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <i class="material-icons">&#xE7F4;</i>
                                        <span class="badge badge-pill badge-danger">2</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">&#xE6E1;</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Analytics</span>
                                            <p>
                                                Your website’s active users count increased by
                                                <span class="text-success text-semibold">28%</span>
                                                in the last week. Great job!
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">&#xE8D1;</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Sales</span>
                                            <p>Last week your store’s sales count decreased by
                                                <span class="text-danger text-semibold">5.52%</span>.
                                                It could have been worse!
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item notification__all text-center" href="#">
                                        @awt('View all Notifications')
                                    </a>
                                </div>
                            </li> --}}

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="/assets/admin/images/avatars/0.jpg" alt="User Avatar">
                                    <span class="d-none d-md-inline-block">
                                        {{ ucfirst(Auth::user()->fullName) }}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="material-icons">&#xE7FD;</i>
                                        @awt('Profile')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('shop.show') }}">
                                        <i class="material-icons">shop</i>
                                        @awt('My Shop')
                                    </a>
                                    @if (Auth::user()->isAdmin)
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        <i class="material-icons">dashboard</i>
                                        @awt('Administration')
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('index') }}">
                                        <i class="material-icons">home</i>
                                        @awt('Home Page')
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger call-to-action-form" href="#">
                                        <i class="material-icons text-danger">&#xE879;</i>
                                        @awt('Logout')
                                    </a>
                                    <form action="{{ route('logout') }}" style="display: none;" method="post" hidden>
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>

                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->


                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">
                                @yield('page-title')
                            </span>
                            <h3 class="page-title">
                                @yield('page-header')
                            </h3>
                        </div>
                    </div>

                    <!-- End Page Header -->

                    @yield('alert')

                    @yield('content')
                </div>


                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">@awt('Home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">@awt('About')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">@awt('Products')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">@awt('Blog')</a>
                        </li>
                    </ul>
                    <span class="copyright ml-auto my-auto mr-2">
                        @awt('Copyright') © {{ date('Y') }}
                        <a href="{{ route('index') }}" rel="nofollow">
                            <span class="text-uppercase font-weight-bold">
                                <span class="text-secondary">All</span><span class="text-danger">Your</span><span class="text-primary">Needs</span>
                            </span>
                        </a>
                        @awt('All rights reserved.')
                        {{-- By Chif<a href="homedeve.com" target="blank">@Homedeve</a> and Rvj. --}}
                    </span>
                </footer>
            </main>
        </div>
    </div>
    

    <script src="{{ asset('assets/admin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/popper.js/1.14.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/shards.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/Sharrre/2.0.1/jquery.sharrre.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/shards-dashboards.1.1.0.js') }}"></script>

    <script src="{{ asset('js/notify.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/intTelInput/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/general.js') }}"></script>

    @yield('js')
</body>

</html>