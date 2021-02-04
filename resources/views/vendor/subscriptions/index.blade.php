@extends('vendor.layouts.master')

@section('title', 'Subscriptions')
@section('page-header', awt('Subcription Type'))

@section('content')

<div class="container-md">
    <div class="row">
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">
                            {{getPrice(92)}} / @awt('ago')
                            </span>
                            <h6 class="stats-small__value count my-3">
                                @awt('Low')
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--decrease">@awt('Subscription')</span>
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
                                {{getPrice(120)}} / @awt('ago')
                            </span>
                            <h6 class="stats-small__value count my-3">
                            @awt('Medium')
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase"> @awt('Subscription')</span>
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
                                {{getPrice(140) }} / @awt('ago')
                            </span>
                            <h6 class="stats-small__value count my-3">
                                @awt('High')
                            </h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase"> @awt('Subscription')</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <h6>@awt('All Subscriptions')</h6>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    @awt('Add subscription now')
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">@awt('Offer')</th>
                        <th scope="col" class="border-0">@awt('Amount payed')</th>
                        <th scope="col" class="border-0">@awt('Start at')</th>
                        <th scope="col" class="border-0">@awt('End at')</th>
                        <th scope="col" class="border-0">@awt('Status')</th>
                        <th scope="col" class="border-0"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriptions as $subscription)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subscription->offer->name }}</td>
                        <td>{{ getPrice($subscription->amount) }}</td>
                        <td>{{ formatDate($subscription->start, 0, 1) }}</td>
                        <td>{{ formatDate($subscription->end, 0, 1) }}</td>
                        <td>{{ $subscription->is_active ? awt('Active') : awt('Expired') }}</td>
                        <td>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-undo"></i>
                                @awt('Renew subscription')
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> -->
    
    <div class="d-flex justify-content-center col-md-12">
        <a href="https://api.whatsapp.com/send?phone=+237691247618&text=Bonjour AllYourNeeds j'aimerais effectuer une nouvelle subscription.">
        <button class="btn btn-success">@awt('Make a Subscription')</button>
        </a>
    </div>
    <div class="text-center mt-4">
        <h3 class="font-weight-bold">
            @awt('Read this carefully before making a subscription')
        </h3>
    </div>
</div>

@endsection