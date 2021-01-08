<!doctype html>
<html class="no-js h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard - All Your Needs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/material/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/shards-dashboards.1.1.0.min.css') }}" id="main-stylesheet" data-version="1.1.0">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/extras.1.1.0.min.css') }}">
</head>

<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="/assets/admin/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">Shards Dashboard</span>
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
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                    </div>
                </form>

                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.index') }}">
                                <i class="material-icons">dashboard</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.blogs.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Blogs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.categorie.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.collections.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Collection</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.offre.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Offers</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.themes.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Theme</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.type-shop.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Type of Shop</span>
                            </a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.super_cat.index') }}">
                                <i class="material-icons">shop_two</i>
                                <span>Super Category</span>
                            </a>
                        </li>

                       
                    </ul>
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
                            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                            </div>
                        </form>

                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item border-right dropdown notifications">
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
                                    <p>Your website’s active users count increased by <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
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
                                    <p>Last week your store’s sales count decreased by <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                                </div>
                                </a>
                                <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                            </div>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle mr-2" src="/assets/admin/images/avatars/0.jpg" alt="User Avatar"> <span class="d-none d-md-inline-block">Sierra Brooks</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small">
                                <a class="dropdown-item" href="user-profile-lite.html"><i class="material-icons">&#xE7FD;</i> Profile</a>
                                <a class="dropdown-item" href="components-blog-posts.html"><i class="material-icons">vertical_split</i> Blog Posts</a>
                                <a class="dropdown-item" href="add-new-post.html"><i class="material-icons">note_add</i> Add New Post</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">
                                <i class="material-icons text-danger">&#xE879;</i> Logout </a>
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
                            <span class="text-uppercase page-subtitle">Administration</span>
                            <h3 class="page-title">
                                @yield('page-header')
                            </h3>
                        </div>
                    </div>
                    <!-- End Page Header -->


                    @yield('content')
                </div>


                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                    </ul>
                    <span class="copyright ml-auto my-auto mr-2">
                        Copyright © 2021 By Chifo And Rvj
                        
                           
                        </a>
                    </span>
                </footer>
            </main>
        </div>
    </div>
    

    <script src="{{ asset('assets/admin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/popper.js/1.14.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/Chart.js/2.7.1/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/shards.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/Sharrre/2.0.1/jquery.sharrre.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app/app-blog-overview.1.1.0.min.js') }}"></script>

    <script>
        $('.call-to-action-form').click(function (e){
            e.preventDefault();
            $(this).next('form').trigger('submit');
        });
    </script>
</body>

</html>