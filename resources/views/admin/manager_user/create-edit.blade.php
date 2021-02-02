@extends('admin.layouts.master')

@section('page-header', $isEdit?'Update User Role' : 'Create User Role')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                Update
                @else
                Create
                @endif
               User Role
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.manager_user.update', $manageruser->id)}}"
                @else
                    action="{{route('admin.manager_user.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                       <label for="status">Users</label>
                        <select name='user_id' id='user_id' class="form-control @error('user_id') is-invalid @enderror"> 
                            <option > Choice Users </option > 
                            @foreach($users as $item)
                             <option  class="form-control" value=" {{$item->id }}">  
                               {{$item->name }}
                             </option> 
                            @endforeach
                        <select > 
                         @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror 
                    </div>


                    <div class="form-group">
                       <label for="role_id">Role</label>
                        <select name='role_id' id='role_id' class="form-control @error('role_id') is-invalid @enderror"> 
                            <option > Choice role </option > 
                            @foreach($roles as $item)
                             <option  class="form-control" value=" {{$item->id }}">  
                             {{$item->name }}
                             </option> 
                             @endforeach
                        <select > 
                         @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror 
                    </div>
               

                <div class="form-group">
                    <button type="submit" class="mb-2 btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                </div>   
            </form>
        </div>
    </div>
 </div>
@endsection