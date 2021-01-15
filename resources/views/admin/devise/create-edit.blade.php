@extends('admin.layouts.master')

@section('page-header', $isEdit?'Update Super Devise' : 'Create Super Devise')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                Update
                @else
                Create
                @endif
               Devise
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $devise->name) }}" id="name" placeholder="Name" name="name"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>


                <div class="form-group">
                    <input type="text" id="display_name" class="form-control @error('display_name') is-invalid @enderror"
                        name="display_name" value="{{ old('display_name', $devise->display_name) }}"  placeholder="Display name">
                    @error('display_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <input type="text" id="symbol" class="form-control @error('symbol') is-invalid @enderror"
                        name="symbol" value="{{ old('symbol', $devise->symbol) }}"  placeholder="Symbole">
                    @error('symbol')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <input type="number" id="factor" class="form-control @error('factor') is-invalid @enderror"
                        name="factor" value="{{ old('factor', $devise->factor) }}"  placeholder="Factor">
                    @error('factor')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <input type="number" id="precision" class="form-control @error('precision') is-invalid @enderror"
                        name="precision" value="{{ old('precision', $devise->precision) }}"  placeholder="Precision">
                    @error('precision')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                


                <div class="form-group">
                    <button type="submit" class="mb-2 btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                </div>   
            </form>
        </div>
    </div>
 </div>
@endsection