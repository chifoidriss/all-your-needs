<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title') - All Your Needs</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="All Your Needs">
    <meta name="keywords" content="all-your-needs, shopping,e-commerce,vendre,vendeur,Wally le génie, ALL YOUR NEEDS, mèches, perruques,vetements,bijoux" />
	<meta name="author" content="Rvj && Chifo" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    
    @yield('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/default.css') }}">
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">
                                @awt('Contact us at') : +237 671 50 40 37 / +237 691 67 48 09
                            </div>
                        </div>

                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- Currency / Language / My Account -->

                                    <li class="currency">
                                        <a href="#">
                                            {{ Cookie::get('devise', 'eur') }}
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="currency_selection">
                                            @foreach (App\Models\Devise::all() as $item)
                                                @if ($item->name != Cookie::get('devise', 'eur'))
                                                <li>
                                                    <a href="{{ route('devise', $item->name) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="language">
                                        <a href="#">
                                            {{ collect(config('app.locales'))->get(app()->getLocale()) }}
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="language_selection">
                                            @foreach (config('app.locales') as $key => $value)
                                                @if (config('app.locale') != $key)
                                                <li>
                                                    <a href="{{ route('locale', $key) }}">
                                                        {{ $value }}
                                                    </a>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="account text-left" style="min-width: 150px !important;">
                                        <a href="#">
                                            @awt('My Account')
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            @auth
                                            <li>
                                                <a href="{{ route('user.profile') }}">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    @awt('Profile')
                                                </a>
                                            </li>
                                            @if (Auth::user()->isAdmin)
                                                <li>
                                                    <a href="{{ route('admin.index') }}">
                                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                                        @awt('Admin')
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="#" class="call-to-action-form">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                    @awt('Logout')
                                                </a>
                                                <form action="{{ route('logout') }}" style="display: none;" method="post" hidden>
                                                    @csrf
                                                </form>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ route('login') }}">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    @awt('Login')
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                    @awt('Register')
                                                </a>
                                            </li>
                                            @endauth
                                        </ul>
                                    </li>

                                    <li class="account">
                                        <a href="{{ route('shop.create') }}">
                                            @awt('Shop')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right position-relative">
                            <div class="logo_container">
                                <!-- <a href="{{ route('index') }}">
                                    All<span>Your</span><Span class="text-primary">Needs</Span>
                                </a> -->
                                <span class="btn btn-white btn-categories">
                                    {{-- <i class="fa fa-ellipsis-v" aria-hidden="true"></i> --}}
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                </span>
                                <a href="{{ route('index') }}">
                                    <img class="logo-img" src="{{asset('assets/images/all-your-needs.webp')}}" alt="logo AllYourNeeds">
                                </a>
                            </div>

                            <div class="search-bar" id="search-bar">
                                <form action="{{ route('product.index') }}" method="GET" class="form-inline">
                                    <div class="input-group w-100">
                                        <input type="text" name="q" class="form-control" placeholder="@awt('Search something')..." value="{{ request()->q }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit">
                                                <i class="fa fa-search"></i>
                                                <span class="d-md-inline d-none">@awt('Search ')</span>
                                            </button>
                                            <button class="btn btn-outline-danger close-search-bar" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <nav class="navbar">

                                <ul class="navbar_menu">
                                    <li>
                                        <a href="{{ route('index') }}">
                                            @awt('home')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product.index') }}">
                                            @awt('Products')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            @awt('blog')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">
                                            @awt('contact')
                                        </a>
                                    </li>
                                </ul>

                                <ul class="navbar_user">
                                    <li>
                                        <a href="#" class="btn-search-input">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="checkout">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="checkout_items" class="checkout_items">0</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="fs_menu_overlay"></div>
        
        <div class="hamburger_menu">
            <div class="hamburger_close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    <li class="menu_item has-children">
                        <a href="#">
                            {{ Cookie::get('devise', 'eur') }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="menu_selection">
                            @foreach (App\Models\Devise::all() as $item)
                                @if ($item->name != Cookie::get('devise', 'eur'))
                                <li>
                                    <a href="{{ route('devise', $item->name) }}">
                                        {{ $item->name }}
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                    <li class="menu_item has-children">
                        <a href="#">
                            {{ collect(config('app.locales'))->get(app()->getLocale()) }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="menu_selection">
                            @foreach (config('app.locales') as $key => $value)
                                @if (config('app.locale') != $key)
                                <li>
                                    <a href="{{ route('locale', $key) }}">
                                        {{ $value }}
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                    <li class="menu_item has-children">
                        <a href="#">
                            @awt('My Account')
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="menu_selection">
                            @auth
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    @awt('Profile')
                                </a>
                            </li>
                            @if (Auth::user()->isAdmin)
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    @awt('Administration')
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    @awt('Logout')
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    @awt('Login')
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    @awt('Register')
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </li>

                    <li class="menu_item">
                        <a href="{{ route('shop.create') }}">
                            @awt('Shop')
                        </a>
                    </li>
                    
                    <li class="menu_item">
                        <a href="{{ route('index') }}">
                            @awt('Home')
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('product.index') }}">
                            @awt('Products')
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="#">
                            @awt('Blog')
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('contact') }}">
                            @awt('Contact')
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        @yield('content')


        <!-- Partners -->

        <div class="container text-center mt-4">
			<div class="section_title">
				<h2>@awt('Partners')</h2>
			</div>
        </div>
        
        <div class="owl-carousel owl-theme product_slider mt-4">

            <!-- Slide partners -->
             <div class="owl-item">
              <a href="">
               <img src="{{asset('assets/images/logo/allo.png')}}" alt="" width="200px" height="150px">
              </a>
            </div>

            <div class="owl-item">
             <a href="">
                <img src="{{asset('assets/images/logo/Rvj.png')}}" alt="" width="200px" height="150px">
             </a>
            </div>
            <div class="owl-item">
             <a href="https://www.homedeve.com/">
                <img src="{{asset('assets/images/logo/homedeve.png')}}" alt="" width="200px" height="150px">
             </a>
            </div>
            <div class="owl-item">
             <a href="https://www.stoready.com/en/">
                <img src="{{asset('assets/images/logo/stoready.png')}}" alt="" width="200px" height="150px">
             </a>
            </div>
            <div class="owl-item ">
             <a href="https://www.kikuu.cm/">
                <img src="{{asset('assets/images/logo/kiku.png')}}" alt="" width="200px" height="150px">
             </a>
            </div>
		</div> 

        <!-- cookie -->
                

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                            <h4>@awt('Newsletter')</h4>
                            <p>@awt('Subscribe to our newsletter and get 20% off your first purchase')</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="@awt('Your email')" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">
                                @awt('subscribe')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer" style="background:#1e1e27;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                            <ul class="footer_nav">
                                <li>
                                    <a href="#">
                                        @awt('Home')
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @awt('FAQs')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        @awt('Contact us')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- <div class="col-lg-4">
                        <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-skype" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->

                    <div class="col-lg-6">
                        <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center mr-2">
                            <ul class="footer_nav">
                                <li>
                                    <a href="{{ route('shop.create') }}">
                                        @awt('Sell on') AllYourNeeds
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @awt('About us')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        @awt('Contact us')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                

                <div class="row" >
                    <div class="col-lg-3">
                        <div class="footer_nav_container">
                            <div class="cr">
                                @awt('Copyright') © {{ date('Y') }} RvjCorp && Homedeve @awt('All Rights Reserverd').
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="footer_nav_container">
                            <div class="cr">
                                 @awt('We are distributed throughout the national territory as well as on the international territory').
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_nav_container">
                            <div class="cr">
                                @awt('Contact us at') :+237 671 50 40 37 / +237 691 67 48 09 Douala-Cameroon (Cité des Palmiers).
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </footer>
    </div>
    


    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/css/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('assets/css/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/plugins/easing/easing.js') }}"></script>
    
    @yield('js')

    <script src="{{ asset('assets/js/countries.js') }}"></script>

    <script>
        $(document).ready(function () {
            // bsCustomFileInput.init();

            var searchBar = document.getElementById('search-bar');
            
            $('.call-to-action-form').click(function (e) {
                e.preventDefault();
                $(this).next('form').trigger('submit');
            });
            
            $('.btn-search-input').click(function (e) {
                e.preventDefault();
                $('.search-bar').slideDown('slow');
            });
            
            $('.close-search-bar').click(function (e) {
                e.preventDefault();
                $('.search-bar').slideUp('slow');
            });

            // window.onclick = function(event) {
            //     if (event.target == modal) {
            //         searchBar.style.display = "none";
            //     }
            // }
        })
    </script>
</body>
</html>
