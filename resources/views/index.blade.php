@extends('layouts.master')

@section('title', 'Bienvenue')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

@endsection

@section('content')

	<!-- Slider -->

	<div class="main_slider" > 
	
		<div class="container fill_height">
			<div class="row mt-4">
				<div class="col-md-2">
					<div class="card card-small card-post mb-4 p-2">
						<h6>@awt('Spring / Summer Collection') 2021</h6>
						<h5>@awt('Get up to 30% Off New Arrivals')</h5>
						<div class="red_button">
							<a href="{{ route('product.index') }}">
								@awt('shop now')
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-8">
				  <div class="card card-small card-post mb-4">
					 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>
  							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100 " style="max-height:400px;" src="/assets/images/vendeur1.jpg" alt="First slide">
								</div>
									<div class="carousel-item">
								<img class="d-block w-100" style="max-height:400px;" src="/assets/images/vendeur2.jpg" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" style="max-height:400px;" src="/assets/images/vendeur3.jpg" alt="Third slide">
								</div>
  							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
							</a>
					   </div>
					</div>
				</div>

		

				<div class="col-md-2">
					<div class="card card-small card-post mb-4 p-2">
						
							<div class="d-flex align-items-center">
								<div class="benefit_icons">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								<span>
									<p class="text">@awt('Sell On AllYourNeeds?')</p>
								</span>
							</div>
							<div class="d-flex align-items-center">
								<div class="benefit_icons">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<span>
									<p class="text">@awt('Sell On AllYourNeeds?')</p>
								</span>
							</div>

							<div class="d-flex align-items-center">
								<div class="benefit_icons">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								<span>
									<p class="text">@awt('Sell On AllYourNeeds?')</p>
								</span>
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div> 
 <!-- pub -->
	<div class="benefit" style=" margin-top: -10rem !important;">
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
	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				@foreach ($collections as $item)
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(/assets/images/{{ $item->id }}.jpg)">
						<div class="banner_category">
							<a href="{{ route('product.index', $item->slug) }}">
								{{ awt($item->name) }}
							</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>@awt('New Arrivals')</h2>
					</div>
				</div>
			</div>
			
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">
								@awt('all')
							</li>
							@foreach ($collections as $item)
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".{{ $item->slug }}">
								{{ awt($item->name) }}
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

							<!-- Slide X -->

							@foreach ($products as $product)
							
								@include('includes.product')
							
							@endforeach
					
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

	<!-- Deal of the week -->

	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="/assets/images/deal_ofthe_week.png" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>@awt('Deal Of The Week')</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">@awt('Day')</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">@awt('Hours')</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">@awt('Minutes')</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">@awt('Secondes')</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button">
							<a href="{{ route('product.index') }}">
								@awt('shop now')
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>@awt('Best Sellers')</h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide X -->

							@foreach ($bestSellers as $product)
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

	<!-- Blogs -->

	<div class="blogs">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>@awt('Latest Blogs')</h2>
					</div>
				</div>
			</div>
			<div class="row blogs_container">
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(/assets/images/blog_1.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(/assets/images/blog_2.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(/assets/images/blog_3.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
       

@endsection

@section('js')
<script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection