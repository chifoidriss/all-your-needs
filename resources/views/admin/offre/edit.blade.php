@extends('admin.layouts.master')

@section('page-header', 'Edit Offert')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Edit Offert</strong>
             
                <form action="{{route('admin.offre.update',$recup->id)}}" method="POST">
                     @csrf     
                     @method('PUT')     
                    <div class="form-group">
                        <input type="text" id='name' class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{$recup->name}}"> 
                       @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror   
                    </div>


                    <div class="form-group">
                        <textarea type="text" id='description' class="form-control @error('description') is-invalid @enderror" name="description"  value="{{$recup->description}}" > 

                        </textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>

                    <div class="form-group">
                        <input type="text" id='price' class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{$recup->price}}"> 
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>

                     <div class="form-group">
                        <input type="number" id='period'class="form-control @error('period') is-invalid @enderror" placeholder="Period" name="period" value="{{$recup->period}}"> 
                        @error('period')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>

                     <div class="form-group">
                        <select name='status'  id='status' class="form-control @error('status') is-invalid @enderror" > 
                            <option > Choisir le statut </option value="{{$recup->status}}"> 
                             <option  class="form-control"  >  
                               1
                             </option> 
                        <select >
                         @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>
                            
                    <div class="col mb-6">
                        <button type="submit" class="mb-2 btn btn-primary mr-2">Edit</button>
                        <button type="reset" class="mb-2 btn btn-danger mr-2">Cancelt</button>
                    </div>           
                </form>
           
        </div>
    </div>
 </div>
@endsection