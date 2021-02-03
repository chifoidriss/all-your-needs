@extends('admin.layouts.master')

@section('page-header', $isEdit ? awt('Update Currency'): awt('Create Currency'))




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
                @awt('Currency')
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.devise.update', $devise->id)}}"
                @else
                    action="{{route('admin.devise.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="name">@awt('Name')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $devise->name) }}" id="name" placeholder="@awt('Name')" name="name"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>


                <div class="form-group">
                    <label for="display_name">@awt('Display name')</label>
                    <input type="text" id="display_name" class="form-control @error('display_name') is-invalid @enderror"
                        name="display_name" value="{{ old('display_name', $devise->display_name) }}"  placeholder="@awt('Display name')">
                    @error('display_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="symbol">@awt('Symbol')</label>
                    <input type="text" id="symbol" class="form-control @error('symbol') is-invalid @enderror"
                        name="symbol" value="{{ old('symbol', $devise->symbol) }}"  placeholder="@awt('Symbol')">
                    @error('symbol')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="">@awt('Factor')</label>
                    <input type="number" id="factor" class="form-control @error('factor') is-invalid @enderror"
                        name="factor" value="{{ old('factor', $devise->factor) }}"  placeholder="@awt('Factor')">
                    @error('factor')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="precision">@awt('Precision')</label>
                    <input type="number" id="precision" class="form-control @error('precision') is-invalid @enderror"
                        name="precision" value="{{ old('precision', $devise->precision) }}" placeholder="@awt('Precision')">
                    @error('precision')
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