<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - All Your Needs</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">

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
                                @awt('Free shipping on all orders over') {{ getPrice(50) }}
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

                                    <li class="account">
                                        <a href="#">
                                            @awt('My Account')
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="account_selection">
                                            @auth
                                            <li>
                                                <a href="{{ route('user.profile') }}">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    @awt('Profile')
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="{{ route('index') }}">
                                    All<span>Your</span><Span class="text-primary">Needs</Span>
                                </a>
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
                                        <a href="#">
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
                                            <span id="checkout_items" class="checkout_items">2</span>
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
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    @awt('Profile')
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                            @awt('home')
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('product.index') }}">
                            @awt('Products')
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="#">
                            @awt('blog')
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('contact') }}">
                            @awt('contact')
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        @yield('content')


        <!-- Benefit -->

        <div class="benefit">
            <div class="container">
                <div class="row benefit_row">
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>@awt('free shipping')</h6>
                                <p>@awt('Suffered Alteration in Some Form')</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>@awt('cach on delivery')</h6>
                                <p>@awt('The Internet Tend To Repeat')</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>@awt('45 days return')</h6>
                                <p>@awt('Making it Look Like Readable')</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>@awt('opening all week')</h6>
                                <p>@awt('8AM - 09PM')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                            <ul class="footer_nav">
                                <li>
                                    <a href="#">
                                        @awt('Blog')
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
                    
                    <div class="col-lg-6">
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_nav_container">
                            <div class="cr">
                                @awt('Copyright') © {{ date('Y') }} AllYourNeeds @awt('All Rights Reserverd').
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
</body>
</html>
