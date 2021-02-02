@extends('admin.layouts.master')

@section('page-header', 'Edit  Category')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Edit  Category</strong>
            
            <form action="{{ route('admin.categorie.update',$recup->id) }}" method="POST">
                @csrf   
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{$recup->name}}"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" value="{{ old('slug') }}"> 
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror    
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"  value="{{$recup->description}}">
                      {{ old('description', $recup->description) }}
                    </textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <select class="form-control" name="super_category_id"> 
                        <option value="">
                            Choice a super category
                        </option>
                        @foreach($collection as $collec)
                        <option value="{{$collec->id}}"  @if(old('super_category_id', $recup->super_category_id) == $collec->id) selected @endif>
                            {{$collec->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="mb-2 btn btn-primary mr-2">Edit</button>
                    <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                </div>           
            </form>
        </div>
    </div>
 </div>
@endsection