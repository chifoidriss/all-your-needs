@extends('layouts.master')

@section('title', $product->name)

@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/single_styles.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/single_responsive.css') }}">
@endsection

@section('content')
    
<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li>
                        <a href="{{ route('index') }}">
                            @awt('Home')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ $product->categories->implode('name', ', ') }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ $product->name }}
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-12 image_col">
                        <div class="single_product_image">
                            <div class="single_product_image_background" id="product_img" style="background-image:url({{ asset('uploads/'.$product->image) }})"></div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="d-flex mt-2 galleries">
                            <span role="button" class="gallery border border-primary radius p-1 mr-1">
                                <img height="64px" src="{{ asset('uploads/'.$product->image) }}" onclick="changeImage(this)" data-image="{{ asset('uploads/'.$product->image) }}">
                            </span>
                            @foreach ($product->galleries as $item)
                            <span role="button" class="gallery border radius p-1 mx-1">
                                <img height="64px" src="{{ asset('uploads/'.$item->image) }}" onclick="changeImage(this)" data-image="{{ asset('uploads/'.$item->image) }}">
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{ $product->name }}</h2>
                            <p>
                                <b>@awt('Disponibility') :</b>
                                {{ $product->qty }}
                                @awt('in stock')
                            </p>
                        </div>

                        <div class="original_price">{{ getPrice($product->old_price) }}</div>
                        <div class="product_price">{{ getPrice($product->price) }}</div>
                        <ul class="star_rating">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                        
                        {{-- <div class="product_color">
                            <span>Select Color:</span>
                            <ul>
                                <li style="background: #e54e5d"></li>
                                <li style="background: #252525"></li>
                                <li style="background: #60b3f3"></li>
                            </ul>
                        </div> --}}
        
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <span>@awt('Quantity'):</span>
                            <div class="quantity_selector">
                                <span class="minus">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </span>
                                <span id="quantity_value">1</span>
                                <span class="plus">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="red_button add_to_cart_button">
                                <a href="#">
                                    @awt('add to cart')
                                </a>
                            </div>
                            <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
                        </div>
        
                        <div class="mt-4">
                            <div class="d-flex flex-column">
                                @if ($product->shop->phone)
                                <a class="btn btn-block btn-outline-success" target="tab" href="https://api.whatsapp.com/send?phone={{ $product->shop->phone }}&text=@awt('Hi, I am interested in') [ {{ $product->name }} ] @awt('in') AllYourNeeds.">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    Whatsapp ({{ $product->shop->phone }})
                                </a>
                                @endif
                                
                                @if ($product->shop->facebook)
                                <a class="btn btn-block btn-outline-primary" target="tab" href="http://m.me/{{ $product->shop->facebook }}?ref=AllYourNeeds&source=@awt('Hi, I am interested in') [ {{ $product->name }} ] @awt('in') AllYourNeeds.">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    Messenger ({{ $product->shop->facebook }})
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="free_delivery mt-0 px-2 d-flex align-items-center justify-content-start">
                        <span class="ti-truck"></span>
                        <span>@awt('free delivery')</span>
                    </div>
                    <div class="free_delivery mt-0 px-2 d-flex align-items-center justify-content-start">
                        <span class="ti-money"></span>
                        <span>@awt('cach on delivery')</span>
                    </div>
                    <div class="free_delivery mt-0 px-2 d-flex align-items-center justify-content-start">
                        <span class="ti-back-left"></span>
                        <span>@awt('45 days return')</span>
                    </div>
                    <div class="free_delivery mt-0 mb-2 px-2 d-flex align-items-center justify-content-start">
                        <span class="ti-time"></span>
                        <span>@awt('opening all week')</span>
                    </div>

                    <div class="p-2 d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="">
                                <b>{{ $product->shop->follows->count() }}</b>
                                @awt('Followers')
                            </div>
                            <div class="">
                                <b>{{ $product->likes->count() }}</b>
                                @awt('Likes')
                            </div>
                            <div class="">
                                <b>{{ $product->shop->products->count() }}</b>
                                @awt('Products')
                            </div>
                        </div>
                        <div class="">
                            <a href="#" class="btn btn-sm btn-outline-info">
                                @awt('Follow')
                            </a>
                        </div>
                    </div>

                    <div class="py-2">
                        @awt('Sell on')
                        <a href="{{ route('shop.create') }}">
                            <span class="text-uppercase font-weight-bold">
                                <span class="text-secondary">All</span><span class="text-danger">Your</span><span class="text-primary">Needs</span>
                            </span>
                            ?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs -->

<div class="tabs_section_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabs_container">
                    <ul class="tabs d-flex align-items-center justify-content-start">
                        <li class="tab active" data-active-tab="tab_1">
                            <span>@awt('Description')</span>
                        </li>
                        {{-- <li class="tab" data-active-tab="tab_2">
                            <span>@awt('Additional Information')</span>
                        </li> --}}
                        <li class="tab" data-active-tab="tab_3">
                            <span>@awt('Reviews') (2)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <!-- Tab Description -->

                <div id="tab_1" class="tab_container active">
                    <div class="row">
                        <div class="col desc_col">
                            <div class="tab_title">
                                <h4>@awt('Description')</h4>
                            </div>
                            <div class="tab_text_block">
                                {!! $product->description !!}    
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Additional Info -->

                {{-- <div id="tab_2" class="tab_container">
                    <div class="row">
                        <div class="col additional_info_col">
                            <div class="tab_title additional_info_title">
                                <h4>@awt('Additional Information')</h4>
                            </div>
                            <p>COLOR:<span>Gold, Red</span></p>
                            <p>SIZE:<span>L,M,XL</span></p>
                        </div>
                    </div>
                </div> --}}

                <!-- Tab Reviews -->

                <div id="tab_3" class="tab_container">
                    <div class="row">

                        <!-- User Reviews -->

                        <div class="col-lg-6 reviews_col">
                            <div class="tab_title reviews_title">
                                <h4>@awt('Reviews') (2)</h4>
                            </div>

                            <!-- User Review -->

                            <div class="user_review_container d-flex flex-column flex-sm-row">
                                <div class="user">
                                    <div class="user_pic"></div>
                                    <div class="user_rating">
                                        <ul class="star_rating">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="review_date">27 Aug 2016</div>
                                    <div class="user_name">Brandon William</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Add Review -->

                        <div class="col-lg-6 add_review_col">

                            <div class="add_review">
                                <form id="review_form" action="" method="POST">
                                    @csrf
                                    <div>
                                        <h1>@awt('Add Review')</h1>
                                        <input id="review_name" class="form_input input_name" type="text" name="name" placeholder="@awt('Name')*" required="required" data-error="@awt('Name is required.')">
                                        <input id="review_email" class="form_input input_email" type="email" name="email" placeholder="@awt('Email')*" required="required" data-error="@awt('Valid email is required.')">
                                    </div>
                                    <div>
                                        <h1>@awt('Your Rating'):</h1>
                                        <ul class="user_star_rating">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                        <textarea id="review_message" class="input_review" name="message"  placeholder="@awt('Your Review')" rows="4" required data-error="@awt('Please, leave us a review.')"></textarea>
                                    </div>
                                    <div class="text-left text-sm-right">
                                        <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">
                                            @awt('submit')
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Similar products -->

<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>@awt('Similar Products')</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider">

                        <!-- Slide X -->

                        @foreach ($similar as $product)
                        <div class="owl-item product_slider_item">
                            @include('includes.product')
                        </div>
                        @endforeach
                    </div>

                    <!-- Slider Navigation -->

                    <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/single_custom.js') }}"></script>

<script>
    var product_img = document.getElementById('product_img');
    function changeImage(img) {
        var image = img.getAttribute('data-image');
        $('.galleries .gallery').removeClass('border-primary');
        product_img.style.backgroundImage = "url("+image+")";
        img.parentElement.classList.add('border-primary');
    }
</script>
@endsection