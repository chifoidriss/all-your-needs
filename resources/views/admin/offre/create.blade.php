@extends('admin.layouts.master')
@section('page-header', 'Create Offert')

@section('content')

 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Create Offert</strong>
                <form action="{{route('admin.offre.store')}}" method="post">
                      @csrf          
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id='name' placeholder="Name" name="name"> 
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>


                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea type="text"id='description' class="form-control @error('description') is-invalid @enderror" name="description" > 

                        </textarea>
                         @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror 
                    </div>

                     <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id ='price' class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price"> 
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>

                     <div class="form-group">
                        <label for="Period">Period</label>
                        <input type="number" id='period' class="form-control @error('period') is-invalid @enderror" placeholder="Period" name="period"> 
                        @error('period')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror  
                    </div>

                     <div class="form-group">
                       <label for="status">Status</label>
                        <select name='status' id='status' class="form-control @error('status') is-invalid @enderror"> 
                            <option > Choisir le statut </option > 
                             <option  class="form-control">  
                               1
                             </option> 
                        <select > 
                         @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror 
                    </div>
                            
                    <div class="col mb-6">
                        <button type="submit" class="mb-2 btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                    </div>           
                </form>
        </div>
    </div>
 </div>
@endsection
