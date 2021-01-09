@extends('vendor.layouts.master')

@section('title', 'Subscriptions')
@section('page-header', 'My Subscriptions')

@section('content')

<div class="container-md">
    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <h6>All Subscriptions</h6>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Add subscription now
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">Offer</th>
                        <th scope="col" class="border-0">Amount payed</th>
                        <th scope="col" class="border-0">Start at</th>
                        <th scope="col" class="border-0">End at</th>
                        <th scope="col" class="border-0">Status</th>
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
                        {{-- <td>{{ $subscription->isActive() }}</td> --}}
                        <td>{{ $subscription->is_active ? 'Active' : 'Expired' }}</td>
                        <td>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-undo"></i>
                                Renew subscription
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection