@extends('admin.layouts.master')

@section('title', 'Subscriptions')
@section('page-header', awt('Subcription Type'))

@section('content')

<div class="container-md">
    
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <h6>@awt('All Subscriptions')</h6>
                    <a href="{{route('admin.subscription.create')}}" class="btn btn-primary">
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
                            <th scope="col" class="border-0">@awt('Shop')</th>
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
                            <td>
                                <a href="{{ route('admin.shop.show', $subscription->shop->id) }}">
                                    {{ $subscription->shop->name }}
                                </a>
                            </td>
                            <td>{{ $subscription->offer->name }}</td>
                            <td>{{ getPrice($subscription->amount) }}</td>
                            <td>{{ formatDate($subscription->start, 0, 0) }}</td>
                            <td>{{ formatDate($subscription->end, 0, 0) }}</td>
                            <td>{{ $subscription->is_active ? awt('Active') : awt('Expired') }}</td>
                            <td>
                                <form  action="{{route('admin.subscription.destroy',$subscription->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('admin.subscription.edit', $subscription->id)}}" class="btn btn-white">
                                            <span class="text-success"><i class="material-icons">more_vert</i></span>
                                            @awt('Edit')
                                        </a>
                      
                                        <button class="btn btn-white" type="submit">
                                            <span class="text-danger"><i class="material-icons">clear</i></span>
                                            @awt('Delete')
                                        </button>
                                    </div>
                                    {{-- <a href="#" class="btn btn-primary">
                                        <i class="fas fa-undo"></i>
                                        @awt('Renew subscription')
                                    </a> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
</div>

@endsection