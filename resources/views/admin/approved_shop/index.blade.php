@extends('admin.layouts.master')

@section('page-header', 'Approve Shop')

@section('content')
<div class="row">
 
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Shop</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0"> Name</th>
                          <th scope="col" class="border-0">Type Shop</th>
                          <th scope="col" class="border-0">Date Creation</th>
                          <th scope="col" class="border-0">Actions</th>
                         
                      </thead>
                      <tbody>
                       @foreach($shops as $shop)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$shop->name}}</td>
                          <td>{{$shop->type_shop->name}}</td>
                          <td>{{$shop->created_at}}</td>
                          <td>
                            <form  action="{{route('admin.approved_shop.destroy', $shop->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                             
                                <a href="{{route('admin.approved_shop.edit',$shop->id)}}"> 
                                  <button type="button"  class="btn btn-sm btn-outline-success">Boost Shop</button>
                                </a>
                                <button type="submit"  class="btn btn-sm btn-outline-warning">Approve Shop</button>
                                 <button type="submit" class="btn btn-sm btn-outline-danger">Desapprove Shop</button>

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