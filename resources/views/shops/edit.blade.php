@extends('vendor.layouts.master')

@section('title', Auth::user()->shop->name)
@section('page-header', awt('Shop update informations'))

@section('content')
<!-- Small Stats Blocks -->
<div class="container-md">

    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <h6 class="m-0">@awt('Shop Details')</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('shop.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">@awt('Shop Name')</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="@awt('Shop Name')" value="{{ old('name', $shop->name) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type_shop_id">@awt('Shop Type')</label>
                        <select id="type_shop_id" name="type_shop_id" class="custom-select">
                            <option selected>@awt('Select one')</option>
                            @foreach ($shopTypes as $item)
                            <option value="{{ $item->id }}" @if(old('type_shop_id', $shop->type_shop_id) == $item->id) selected @endif>
                                {{ awt($item->name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email', $shop->email) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="url">URL</label>
                        <input type="url" class="form-control" name="url" id="url" placeholder="URL" value="{{ old('url', $shop->url) }}">
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Numéro de téléphone (Whatsapp)</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Numéro de téléphone (Whatsapp)" value="{{ old('phone', $shop->phone) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fax">Fax</label>
                        <input type="tel" class="form-control" name="fax" id="fax" placeholder="Fax" value="{{ old('fax', $shop->fax) }}">
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="facebook">Facebook URL</label>
                        <input type="url" class="form-control" name="facebook" id="facebook" placeholder="Facebook URL" value="{{ old('facebook', $shop->facebook) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="twitter">Twitter URL</label>
                        <input type="url" class="form-control" name="twitter" id="twitter" placeholder="Twitter URL" value="{{ old('twitter', $shop->twitter) }}">
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="{{ old('address', $shop->address) }}">
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{ old('city', $shop->city) }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="country">State</label>
                        <select id="country" name="country" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $shop->zip) }}">
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $shop->description) }}</textarea>
                    </div>
                </div>
    
                <button type="submit" class="btn btn-accent">Update Informations</button>
            </form>
        </div>
    </div>
</div>
<!-- End Small Stats Blocks -->

<div class="row">

</div>
@endsection