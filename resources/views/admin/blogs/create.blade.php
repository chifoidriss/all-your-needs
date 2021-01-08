@extends('admin.layouts.master')

@section('page-header', 'Create Blog')

@section('content')

 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">Create Blog</strong>
                <form action="{{route('admin.blogs.store')}}" method="post"> 
                        @csrf        
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Slug" value="" name='slug'> 
                        
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" value="" name='name'> 
                        
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Description" value="" name='description'> 
                        
                    </div>

                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Content" value="" name='content'> 
                        
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" placeholder="Image" value="" name="image"> 
                        
                    </div>


                    <div class="form-group">
                         <label for="status">Approved</label>
                        <select name='approve'  class="form-control"> 
                            <option >choice a Approve </option > 
                             <option  class="form-control">  
                               1
                             </option> 
                        </select> 
                        
                    </div>

                    <div class="form-group">
                         <label for="status">Status</label>
                        <select name='status'  class="form-control"> 
                            <option >choice a status </option > 
                             <option  class="form-control">  
                               1
                             </option> 
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

@endsection