@extends('admin.layouts.master')

@section('page-header', $isEdit ? awt('Update Type Shop'): awt('Create Type Shop'))

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
               @awt('Type Shop')
            </strong>

            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.type-shop.update', $typeShop->id)}}"
                @else
                    action="{{route('admin.type-shop.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">@awt('Name')</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="@awt('Name')"
                        name="name" value="{{ old('name', $typeShop->name) }}"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">@awt('Description')</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" placeholder="@awt('Description')"
                        name="description">{{ old('description', $typeShop->description) }}</textarea>
                    @error('description')
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