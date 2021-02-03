@extends('admin.layouts.master')
@section('page-header', $isEdit ? awt('Update Offer'): awt('Create Offer'))

@section('content')

 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                  @awt('Update')
                @else
                    @awt('Create')
                @endif
                @awt('Offer')
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.offre.update', $offer->id)}}"
                @else
                    action="{{route('admin.offre.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif        
                
                <div class="form-group">
                    <label for="name">@awt('Name')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="@awt('Name')"
                    name="name" value="{{ old('name', $offer->name) }}"> 
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="description">@awt('Description')</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" placeholder="@awt('Description')"
                    name="description">{{ old('description', $offer->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                </div>

                <div class="form-group">
                    <label for="price">@awt('Price')</label>
                    <input type="text" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="@awt('Price')"
                    name="price" value="{{ old('price', $offer->price) }}"> 
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="Period">@awt('Period')</label>
                    <input type="number" id="period" class="form-control @error('period') is-invalid @enderror" placeholder="@awt('Period')"
                    name="period" value="{{ old('period', $offer->period) }}"> 
                    @error('period')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
                        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">@awt('Submit')</button>
                    <button type="reset" class="btn btn-danger">@awt('Cancel')</button>
                </div>         
            </form>
        </div>
    </div>
 </div>
@endsection
