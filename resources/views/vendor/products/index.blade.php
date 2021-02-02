@extends('vendor.layouts.master')

@section('title', 'Products')
@section('page-header', awt('My Products'))

@section('content')

<div class="container-md">
    <div class="card card-small mb-4">
        <div class="card-header border-bottom p-2">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <h6>@awt('All Products')</h6>
                <a href="{{ route('shop.product.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    @awt('Add product')
                </a>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                {{-- <h4>@awt('All Products')</h4> --}}
                <div class="">
                    <form class="form-inline" method="GET">
                        <div class="input-group">
                            <input type="search" name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="@awt('Search')...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="">
                    <div class="btn-toolbar">
                        <div class="dropdown mr-2">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-filter"></i>
                                @awt('Filter')
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url()->current() }}">
                                    @awt('Reset Filter')
                                </a>
            
                                <h6 class="dropdown-header">@awt('Filter by')</h6>
                                <a class="dropdown-item @if($filter == 'created_at') disabled @endif"
                                    href="{{ add_query_params(['filter' => 'created_at']) }}">
                                    @awt('Date of creation')
                                </a>
                                <a class="dropdown-item @if($filter == 'name') disabled @endif"
                                    href="{{ add_query_params(['filter' => 'name']) }}">
                                    @awt('Name')
                                </a>
                                <a class="dropdown-item @if($filter == 'price') disabled @endif"
                                    href="{{ add_query_params(['filter' => 'price']) }}">
                                    @awt('Price')
                                </a>
                                <a class="dropdown-item @if($filter == 'qty') disabled @endif"
                                    href="{{ add_query_params(['filter' => 'qty']) }}">
                                    @awt('Quantity')
                                </a>
            
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">@awt('Order by')</h6>
            
                                <a class="dropdown-item @if($order == 'asc') disabled @endif"
                                href="{{ add_query_params(['order' => 'asc']) }}">
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                    @awt('Ascendant')
                                </a>
                                <a class="dropdown-item @if($order == 'desc') disabled @endif" aria-disabled="true"
                                href="{{ add_query_params(['order' => 'desc']) }}">
                                    <i class="fas fa-sort-amount-down"></i>
                                    @awt('Descendant')
                                </a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-flag"></i>
                                @awt('Show')
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item @if($per_page == '10') disabled @endif"
                                href="{{ add_query_params(['per_page' => '10']) }}">
                                    10
                                </a>
                                <a class="dropdown-item @if($per_page == '20') disabled @endif"
                                href="{{ add_query_params(['per_page' => '20']) }}">
                                    20
                                </a>
                                <a class="dropdown-item @if($per_page == '50') disabled @endif"
                                href="{{ add_query_params(['per_page' => '50']) }}">
                                    50
                                </a>
                                <a class="dropdown-item @if($per_page == '75') disabled @endif"
                                href="{{ add_query_params(['per_page' => '75']) }}">
                                    75
                                </a>
                                <a class="dropdown-item @if($per_page == '100') disabled @endif"
                                href="{{ add_query_params(['per_page' => '100']) }}">
                                    100
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="border-0">#</th>
                        <th scope="col" class="border-0">@awt('Image')</th>
                        <th scope="col" class="border-0">@awt('Name')</th>
                        <th scope="col" class="border-0">@awt('Price')</th>
                        <th scope="col" class="border-0">@awt('Old Price')</th>
                        <th scope="col" class="border-0">@awt('Quantity')</th>
                        <th scope="col" class="border-0">@awt('Categories')</th>
                        <th scope="col" class="border-0"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img class="img" src="{{ asset('storage/'.$product->image) }}" height="64px" alt="">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ getPrice($product->price) }}</td>
                        <td>{{ getPrice($product->old_price) }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->categories->implode('name', ', ') }}</td>
                        <td>
                            <div class="btn-group-">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('shop.product.status', $product->id) }}">
                                    @if ($product->status)
                                    <i class="fas fa-eye"></i>
                                    @else
                                    <i class="fas fa-eye-slash"></i>
                                    @endif
                                </a>
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('shop.product.edit', $product->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-danger call-to-action-form" href="#">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form hidden action="{{ route('shop.product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

@endsection