@extends('admin.layouts.master')

@section('page-header', $isEdit?'Update Super Category' : 'Create Super Category')


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
                @awt('Super Category')
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.super_cat.update', $superCategory->id)}}"
                @else
                    action="{{route('admin.super_cat.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="name">@awt('Name')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $superCategory->name) }}" id="name" placeholder="@awt('Name')" name="name"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="slug">@awt('Slug')</label>
                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="@awt('Slug')" name="slug" value="{{ old('slug',$superCategory->slug) }}"> 
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror    
                </div>

                <div class="form-group">
                    <label for="description">@awt('Description')</label>
                    <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="@awt('Description')" name="description">{{ old('description', $superCategory->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="collection_id">@awt('Choose collection')</label>
                    <select class="form-control @error('collection_id') is-invalid @enderror" name="collection_id" id="collection_id"> 
                        <option value="">
                            @awt('Choose collection')
                        </option>
                        @foreach($collections as $collection)
                        <option value="{{$collection->id}}" @if(old('collection_id', $superCategory->collection_id) == $collection->id) selected @endif>
                            {{ $collection->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('collection_id')
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