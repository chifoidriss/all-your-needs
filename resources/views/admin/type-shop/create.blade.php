@extends('admin.layouts.master')

@section('page-header', 'Create Type Shop')

@section('content')
<div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Create Type Shop</strong>
            <form action="{{ route('admin.type-shop.store') }}" method="post">
                @csrf          
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name"> 

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" placeholder="description" name="description"></textarea>
                    @error('description')
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