@extends('admin.layouts.master')

@section('page-header', 'List User Role')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.manager_user.create') }}">
        <i class="fas fa-plus"></i>
        Create User Role
      </a>
    </div>
  </div>
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active User Role</h6>
                  </div>
                  <div class="card-body p-0 pb-3">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0"> User</th>
                          <th scope="col" class="border-0">Role</th>
                          
                          <th scope="col" class="border-0">Actions</th>
                         
                      </thead>
                      <tbody>
                       @foreach($managerusers as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->role->name}}</td>
                          
                          <td>
                            <form  action="{{route('admin.manager_user.destroy',$item->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                              <a href="{{route('admin.manager_user.edit',$item->id)}}">
                                <button type="button"  class="btn btn-sm btn-outline-primary">Edit</button>
                              </a>

                             <button  class="btn btn-sm btn-outline-danger" type="submit" >Delete</button>

                            </form>
                          </td>
                         
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection