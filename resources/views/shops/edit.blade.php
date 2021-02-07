@extends('vendor.layouts.master')

@section('title', Auth::user()->shop->name)
@section('page-header', awt('Shop update informations'))

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection

@section('content')
<!-- Small Stats Blocks -->
<div class="container-md">

    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <h6 class="m-0">@awt('Shop Logo and Cover')</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('shop.update.images') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="logo">@awt('Logo to my Shop')</label>
                    <div class="custom-file">
                        <input id="logo" name="logo" class="custom-file-input @error('logo') is-invalid @enderror"
                            type="file" accept="image/*" onchange="preview_image(event, 'preview-logo')">
                        <label for="logo" class="custom-file-label">@awt('Select Image File')</label>
                        @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2">
                        <img src="{{ asset('uploads/'.$shop->logo) }}"
                            id="preview-logo" class="img" height="64px">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="banner">@awt('Background cover')</label>
                    <div class="custom-file">
                        <input id="banner" name="banner" class="custom-file-input @error('banner') is-invalid @enderror"
                            type="file" accept="image/*" onchange="preview_image(event, 'preview-cover')">
                        <label for="banner" class="custom-file-label">@awt('Select Image File')</label>
                        @error('banner')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2">
                        <img src="{{ asset('uploads/'.$shop->banner) }}"
                            id="preview-cover" class="img" height="196px">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-accent">
                        @awt('Update')
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <h6 class="m-0">@awt('Shop Details')</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('shop.update') }}" method="POST" id="form-informations">
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
                        <label for="email">@awt('Email')</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="@awt('Email')" value="{{ old('email', $shop->email) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="url">@awt('Website')</label>
                        <input type="url" class="form-control" name="url" id="url" placeholder="@awt('Website')" value="{{ old('url', $shop->url) }}">
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">@awt('Phone number') (Whatsapp)</label>
                        <input type="text" class="form-control" id="number" placeholder="(Whatsapp)" value="{{ old('phone', $shop->phone) }}">
                        <input type="hidden" name="phone" id="phone" value="{{ old('phone', $shop->phone) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fax">@awt('Fax')</label>
                        <input type="text" class="form-control" id="number2" placeholder="@awt('Fax')" value="{{ old('fax', $shop->fax) }}">
                        <input type="hidden" name="fax" id="fax" value="{{ old('fax', $shop->fax) }}">
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="facebook">@awt('Facebook page')</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="{{ old('facebook', $shop->facebook) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="twitter">@awt('Twitter page')</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="{{ old('twitter', $shop->twitter) }}">
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="address">@awt('Address')</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="{{ old('address', $shop->address) }}">
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">@awt('City')</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{ old('city', $shop->city) }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="country">@awt('State')</label>
                        <select id="country" name="country" class="custom-select select2"></select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="zip">@awt('Zip')</label>
                        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $shop->zip) }}">
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">@awt('Description')</label>
                        <textarea class="form-control" id="description" name="description" rows="20">{{ old('description', $shop->description) }}</textarea>
                    </div>
                </div>
    
                <button type="submit" class="btn btn-accent">@awt('Update Informations')</button>
            </form>
        </div>
    </div>
</div>
<!-- End Small Stats Blocks -->

<div class="row">

</div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/countries.js') }}"></script>

    <script>
    </script>

    <script>
        validatePhoneNumber('#form-informations', '#number', '#phone');
        validatePhoneNumber('#form-informations', '#number2', '#fax');
        
        $('.select2').select2();
    
        populateCountriesWithDefault("country", "{{ old('country', $shop->country) }}");


        function preview_image(event, outputSrc) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(outputSrc);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }


        tinymce.init({
            selector: 'textarea#description',
            // menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'image | removeformat | help'
        });
    </script>
@endsection