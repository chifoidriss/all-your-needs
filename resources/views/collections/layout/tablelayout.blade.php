<!doctype html>
<html class="no-js h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shards Dashboard Lite</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/material/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/shards-dashboards.1.1.0.min.css') }}" id="main-stylesheet" data-version="1.1.0">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/extras.1.1.0.min.css') }}">
</head>

<body class="h-100">
   <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                @yield('button_create')
            </div>
    </div>
  <div class="main-content-container container-fluid px-2">
    @yield('table')
  </div>



    <script src="assets/admin/js/jquery-3.3.1.min.js"></script>
    <script src="assets/admin/js/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="assets/admin/js/shards.min.js"></script>
    <script src="assets/admin/js/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="assets/admin/js/extras.1.1.0.min.js"></script>
    <script src="assets/admin/js/shards-dashboards.1.1.0.min.js"></script>
    <script src="assets/admin/js/app/app-blog-overview.1.1.0.min.js"></script>
</body>

</html>