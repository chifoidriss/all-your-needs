@extends('vendor.layouts.master')

@section('title', Auth::user()->shop->name)
@section('page-header', $isEdit?'Update Product':'Add new Product')

@section('css')
    <style>
        #preview-images {
            overflow-x: scroll;
        }
        #preview-images img {
            margin: 0.25rem 0.5rem;
            height: 140px;
        }
    </style>
@endsection

@section('content')
<!-- Small Stats Blocks -->
<div class="container-md">

    <div class="card card-small mb-4">
        {{-- <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <h6>
                    @if ($isEdit)
                        Update Product
                    @else
                        Add new Product
                    @endif
                </h6>
                <a href="{{ route('shop.product.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                    Back to products
                </a>
            </div>
        </div> --}}

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                @if ($isEdit)
                    action="{{ route('shop.product.update', $product->id) }}"
                @else
                    action="{{ route('shop.product.store') }}"
                @endif>

                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">@awt('Product Name')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="@awt('Product Name')" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collection">@awt('Collection')</label>
                        <select id="collection" class="custom-select" @if(!$isEdit) required @endif>
                            <option value="" selected>@awt('Select one')</option>
                            @foreach ($collections as $item)
                            <option value="{{ $item->id }}" @if(old('collection') == $item->id) selected @endif>
                                {{ awt($item->name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="super_category">@awt('Super Category')</label>
                        <select id="super_category" class="custom-select" disabled @if(!$isEdit) required @endif>
                            <option value="" selected>@awt('Choose collection')...</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="category">@awt('Category')</label>
                        <select id="category" name="category[]" class="custom-select @error('category') is-invalid @enderror"
                        disabled @if(!$isEdit) required @endif>
                            <option value="" selected>@awt('Choose super category')...</option>
                            @foreach ($product->categories as $item)
                            <option value="{{ $item->id }}" @if(old('category') == $item->id) selected @endif>
                                {{ awt($item->name) }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="price">@awt('Price')</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="@awt('Price')" value="{{ old('price', $product->price) }}" required>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="old_price">@awt('Old Price')</label>
                        <input type="number" class="form-control @error('old_price') is-invalid @enderror" name="old_price" id="old_price" placeholder="@awt('Old Price')" value="{{ old('old_price', $product->old_price) }}">
                        @error('old_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="qty">@awt('Quantity')</label>
                        <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty" placeholder="@awt('Quantity')" value="{{ old('qty', $product->qty) }}" required>
                        @error('qty')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">@awt('Description')</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="image">@awt('Product Image')</label>
                    <div class="custom-file">
                        <input id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                        type="file" accept="image/*" onchange="preview_image(event)" @if(!$isEdit) required @endif>
                        <label for="image" class="custom-file-label">@awt('Select Image')</label>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2">
                        <img src="" id="preview-image" class="img" height="140px">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="images">@awt('Images')</label>
                    <div class="custom-file">
                        <input id="images" name="images[]" class="custom-file-input @error('images') is-invalid @enderror"
                        type="file" accept="image/*" onchange="preview_images();" multiple>
                        <label for="images" class="custom-file-label">@awt('Select multiples Images')</label>
                        @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2 d-flex" id="preview-images"></div>
                </div>
    
                <div class="form-group d-flex justify-content-between flex-wrap">
                    <button type="submit" class="btn btn-accent">
                        @if ($isEdit)
                            @awt('Update')
                        @else
                            @awt('Save')
                        @endif
                    </button>
    
                    <a href="{{ route('shop.product.index') }}" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-left"></i>
                        @awt('Back to products')
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Small Stats Blocks -->

<div class="row">

</div>
@endsection

@section('js')
    <script>
        $('#collection').change(function () {
            $('#super_category').empty();
            $('#category').empty();
            $('#super_category').attr('disabled', true);
            $('#category').attr('disabled', true);

            var id = $(this).val();
            
            if(id > 0) {
                $.get('/my-shop/collections/'+id, function (result) {
                    var defaultValue = new Option('Select One...', '');
                    $('#super_category').append(defaultValue);

                    result.forEach(element => {
                        var option = new Option(element.name, element.id);
                        $('#super_category').append(option);
                    });

                    $('#super_category').attr('disabled', false);
                });
            }
        });
        
        $('#super_category').change(function () {
            $('#category').empty();
            $('#category').attr('disabled', true);
            
            var id = $(this).val();

            if (id > 0) {
                $.get('/my-shop/categories/'+id, function (result) {
                    var defaultValue = new Option('Select One...', '');
                    $('#category').append(defaultValue);

                    result.forEach(element => {
                        var option = new Option(element.name, element.id);
                        $('#category').append(option);
                    });

                    $('#category').attr('disabled', false);
                });
            }
        });


        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_images() {
            $('#preview-images').empty();
            var total_file = document.getElementById("images").files.length;
            for(var i=0;i<total_file;i++) {
                var img = new Image();
                img.src = URL.createObjectURL(event.target.files[i]);
                // $('#preview-images').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
                $('#preview-images').append(img);
            }
        }
    </script>
@endsection