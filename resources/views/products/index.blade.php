@extends('layouts.master')

@section('title', awt('Products'))

@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/categories_styles.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/categories_responsive.css') }}">
@endsection

@section('content')

<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li>
                        <a href="{{ route('index') }}">
                            @awt('Home')
                        </a>
                    </li>
                    <li class="@if(!$collection && !$superCategory && !$category) active @endif">
                        <a href="{{ route('product.index') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            @awt('Products')
                        </a>
                    </li>
                    @if ($collection)
                    <li class="@if(!$superCategory && !$category) active @endif">
                        <a href="{{ route('product.index') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ awt($collection->name) }}
                        </a>
                    </li>
                    @endif
                    @if ($superCategory)
                    <li class="@if(!$category) active @endif">
                        <a href="{{ route('product.index') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ awt($superCategory->name) }}
                        </a>
                    </li>
                    @endif
                    @if ($category)
                    <li class="active">
                        <a href="{{ route('product.index') }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            {{ awt($category->name) }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

            <!-- Sidebar -->

            <div class="sidebar">
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <h5>@awt('Product Category')</h5>
                    </div>
                    <ul class="sidebar_categories">
                        @foreach ($categories as $category)
                        <li class="@if($category == $category->slug) active @endif">
                            <a href="{{ route('product.index',[$category->superCategory->collection->slug, $category->superCategory->slug, $category->slug]) }}">
                                <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                {{ awt($category->name) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Price Range Filtering -->
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <h5>@awt('Filter by Price')</h5>
                    </div>
                    <p>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range"></div>
                    <div class="filter_button">
                        <span>@awt('filter')</span>
                    </div>
                </div>
            </div>

            <!-- Main Content -->

            <div class="main_content">

                <!-- Products -->

                <div class="products_iso">
                    <div class="row">
                        <div class="col">

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_top">
                                <ul class="product_sorting">
                                    <li>
                                        <span class="type_sorting_text">@awt('Default Sorting')</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_type">
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>
                                                <span>@awt('Default Sorting')</span>
                                            </li>
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>
                                                <span>@awt('Price')</span>
                                            </li>
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>
                                                <span>@awt('Product Name')</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span>@awt('Show')</span>
                                        <span class="num_sorting_text">8</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn">
                                                <span>8</span>
                                            </li>
                                            <li class="num_sorting_btn">
                                                <span>12</span>
                                            </li>
                                            <li class="num_sorting_btn">
                                                <span>24</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="pages d-flex flex-row align-items-center">
                                    <div class="page_current">
                                        <span>1</span>
                                        <ul class="page_selection">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="page_total">
                                        <span>@awt('of')</span> 3
                                    </div>
                                    
                                    <div id="next_page" class="page_next">
                                        <a href="#">
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Grid -->

                            <div class="product-grid">
                                @foreach ($products as $product)
                                    @include('includes.product')
                                @endforeach
                            </div>

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                <ul class="product_sorting">
                                    <li>
                                        <span>@awt('Show'):</span>
                                        <span class="num_sorting_text">04</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn"><span>01</span></li>
                                            <li class="num_sorting_btn"><span>02</span></li>
                                            <li class="num_sorting_btn"><span>03</span></li>
                                            <li class="num_sorting_btn"><span>04</span></li>
                                        </ul>
                                    </li>
                                </ul>

                                <span class="showing_results">
                                    @awt('Showing') 1–3 @awt('of') 12 @awt('results')
                                </span>
                                
                                <div class="pages d-flex flex-row align-items-center">
                                    <div class="page_current">
                                        <span>1</span>
                                        <ul class="page_selection">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="page_total">
                                        <span>@awt('of')</span> 3
                                    </div>

                                    <div id="next_page_1" class="page_next">
                                        <a href="#">
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/categories_custom.js') }}"></script>
@endsection