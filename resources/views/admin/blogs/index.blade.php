@extends('admin.layouts.master')

@section('page-header', 'List Blog')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.blogs.create') }}">
        <i class="fas fa-plus"></i>
        Create Blog
      </a>
    </div>
  </div>
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Blog's</h6>
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
                     
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <form  action="" method="post">
                               @csrf
                                @method('DELETE')
                              <a href=""><button type="button"  class="btn btn-sm btn-outline-primary">Edit</button></a>

                             <button type="submit"  class="btn btn-sm btn-outline-warning">Show</button>
                             <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                            </form>
                          </td>
                         
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection