@extends('admin.layouts.master')

@section('page-header', $isEdit ? awt('Update Category'): awt('Create Category'))


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
               @awt('Category')
            </strong>
               
            <form method="post"
               @if ($isEdit)
                  action="{{route('admin.categorie.update', $category->id)}}"
               @else
                  action="{{route('admin.categorie.store')}}"
               @endif>
               
               @csrf
               
               @if ($isEdit)
                  @method('PUT')
               @endif
                        
               <div class="form-group">
                  <label for="name">@awt('Name')</label>
                  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="@awt('Name')" name="name" value="{{ old('name', $category->name) }}"> 
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror     
               </div>

               <div class="form-group">
                  <label for="slug">@awt('Slug')</label>
                  <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="@awt('Slug')" name="slug" value="{{ old('slug', $category->slug) }}"> 
                  @error('slug')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror    
               </div>

               <div class="form-group">
                  <label for="description">@awt('Description')</label>
                  <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="@awt('Description')">{{ old('description', $category->description) }}</textarea>
                  @error('description')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror   
               </div>

               <div class="form-group">
                  <label for="super_category_id">@awt('Choose super category')</label>
                  <select class="custom-select @error('super_category_id') is-invalid @enderror" id="super_category_id" name="super_category_id" > 
                     <option value="">
                        @awt('Choose super category')
                     </option>
                     @foreach($superCategories as $item)
                     <option value="{{$item->id}}" @if($item->id == old('super_category_id', $category->super_category_id)) selected @endif>
                        {{$item->name}}
                     </option>
                     @endforeach
                  </select>
                  @error('super_category_id')
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