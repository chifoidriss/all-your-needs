@extends('vendor.layouts.master')

@section('title', 'Products')
@section('page-header', awt('My Products'))

@section('content')

<div class="container-md">
    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <h6>@awt('All Products')</h6>
                <a href="{{ route('shop.product.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    @awt('Add product')
                </a>
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection