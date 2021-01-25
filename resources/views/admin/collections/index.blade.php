@extends('admin.layouts.master')

@section('page-header', 'List Collections')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.collections.create') }}">
        <i class="fas fa-plus"></i>
        Create Collection
      </a>
    </div>
  </div>
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Collection</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0"> Name</th>
                          <th scope="col" class="border-0">Description</th>
                          
                          <th scope="col" class="border-0">Actions</th>
                         
                      </thead>
                      <tbody>
                       @foreach($recup_collection as $collec)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{$collec->name}}</td>
                          <td>{{$collec->description}}</td>
                         
                          <td>
                            <form  action="{{route('admin.collections.destroy',$collec->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                              <a   href="{{route('admin.collections.edit',$collec->id)}}"><button class="btn btn-sm btn-outline-primary" type="button" >Edit</button></a>

                             <button   class="btn btn-sm btn-outline-warning" type="submit" class="mb-2 btn btn-primary mr-2">Show</button>
                             <button  class="btn btn-sm btn-outline-danger" type="submit">Delete</button>

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