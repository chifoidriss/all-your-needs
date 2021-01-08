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
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$recup->name}}"> 
                        
                    </div>


                    <div class="form-group">
                        <textarea type="text" class="form-control" name="description"  value="{{$recup->description}}" > 

                        </textarea>
                        
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Price" name="price" value="{{$recup->price}}"> 
                        
                    </div>

                     <div class="form-group">
                        <input type="number" class="form-control" placeholder="Period" name="period" value="{{$recup->period}}"> 
                        
                    </div>

                     <div class="form-group">
                        <select name='status'  class="form-control" > 
                            <option > Choisir le statut </option value="{{$recup->status}}"> 
                             <option  class="form-control"  >  
                               1
                             </option> 
                        <select > 
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