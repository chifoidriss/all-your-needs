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
                        <input type="text" class="form-control" placeholder="Name" name="name"> 
                        
                    </div>


                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea type="text" class="form-control" name="description" > 

                        </textarea>
                        
                    </div>

                     <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" placeholder="Price" name="price"> 
                        
                    </div>

                     <div class="form-group">
                        <label for="Period">Period</label>
                        <input type="number" class="form-control" placeholder="Period" name="period"> 
                        
                    </div>

                     <div class="form-group">
                       <label for="status">Status</label>
                        <select name='status'  class="form-control"> 
                            <option > Choisir le statut </option > 
                             <option  class="form-control">  
                               1
                             </option> 
                        <select > 
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
