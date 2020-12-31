@extends('categorie.layout.tablelayout')
<center>
<div class="container">
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Edit Type Shop</strong>
             @foreach($recup as $rep)
                <form action="{{action('TypeShopController@update',$rep->id)}}" method="POST">
                     @csrf           
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$rep->name}}"> 
                        
                    </div>


                    <div class="form-group">
                        <textarea type="text" class="form-control" name="description"  value="{{$rep->description}}" > 

                        </textarea>
                        
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
</div>
</center>