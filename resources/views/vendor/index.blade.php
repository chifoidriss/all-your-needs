@extends('vendor.layouts.master')

@section('title', Auth::user()->shop->name)
@section('page-header', awt('Shop Overview'))

@section('alert')
    @if (!$subscription)
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @awt('Please you don\'t have a valid subscription. Please contact the admin for more information')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    
    @if (!$shop->status)
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @awt('Please wait until the admin confirms your store')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('content')

<!-- Small Stats Blocks -->
<div class="row">
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">
                            @awt('Products')
                        </span>
                        <h6 class="stats-small__value count my-3">
                            {{ $products }}
                        </h6>
                    </div>
                    <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                    </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-1"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">
                            @awt('Blogs')
                        </span>
                        <h6 class="stats-small__value count my-3">
                            0
                        </h6>
                    </div>
                    <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                    </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-2"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">
                            @awt('Comments')
                        </span>
                        <h6 class="stats-small__value count my-3">
                            0
                        </h6>
                    </div>
                    <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                    </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">
                            @awt('Likes')
                        </span>
                        <h6 class="stats-small__value count my-3">
                            0
                        </h6>
                    </div>
                    <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                    </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-4"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg col-md-4 col-sm-12 mb-4">
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">
                            @awt('Subscribers')
                        </span>
                        <h6 class="stats-small__value count my-3">
                            0
                        </h6>
                    </div>
                    <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
                    </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-5"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- End Small Stats Blocks -->

<div class="row">

</div>
@endsection