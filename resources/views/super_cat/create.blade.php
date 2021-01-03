@extends('categorie.layout.tablelayout')
<center>
<div class="container">
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Create Super Category</strong>
                <form action="{{action('SuperCategoryController@create')}}" method="post">
                      @csrf          
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name"> 
                        
                    </div>


                    <div class="form-group">
                        <textarea type="text" class="form-control" name="description" > 

                        </textarea>
                        
                    </div>

                     <div class="form-group">
                        <select class="form-control" name="collec" > 
                             <option>
                                Choisir une collection
                              </option>
                               @foreach($r_collec as $collec)
                               <option value="{{$collec->id}}">
                                   {{$collec->name}}
                                </option>
                                @endforeach
                        </select>
                        
                    </div>


                     <div class="col mb-6">
                        <button type="submit" class="mb-2 btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                    </div>   
                </form>
        </div>
    </div>
 </div>
</div>
</center>