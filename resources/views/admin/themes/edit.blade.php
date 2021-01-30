@extends('admin.layouts.master')

@section('page-header', 'Create Theme')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Create Theme</strong>
             @foreach($recup as $rep)
                <form action="{{route('admin.themes.update',$rep->id)}}" method="POST">
                     @csrf 
                     @method('PUT')          
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id='name' placeholder="Name" name="name" value="{{$rep->name}}"> 
                       @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>


                    <div class="form-group">
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id='description' name="description"  value="{{$rep->description}}" > 

                        </textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror 
                    </div>

                   
                            
                    <div class="col mb-6">
                        <button type="submit" class="mb-2 btn btn-primary mr-2">Edit</button>
                        <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                    </div>           
                </form>
            @endforeach
        </div>
    </div>
 </div>
@endsection