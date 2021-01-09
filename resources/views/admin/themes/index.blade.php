@extends('admin.layouts.master')

@section('page-header', 'List Themes')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.type-shop.create') }}">
        <i class="fas fa-plus"></i>
        Create Theme
      </a>
    </div>
  </div>
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Theme's</h6>
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
                            <form  action="{{url('deletetheme',$collec->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                              <a href="{{url('edit_theme',$collec->id)}}"><button type="button"  class="btn btn-sm btn-outline-primary">Edit</button></a>

                             <button type="submit"  class="btn btn-sm btn-outline-warning">Show</button>
                             <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

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