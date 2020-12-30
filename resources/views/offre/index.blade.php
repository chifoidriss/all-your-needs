
@extends('categorie.layout.tablelayout')

@section('button_create')
  <center><h3 >List's Offert</h3></center>
 
   <div class="col mb-6">
       <a href="{{url('create_offert')}}"> <button type="button" class="mb-2 btn btn-primary mr-2">Create Offert</button></a >
    </div>
@endsection
@section('table')
<div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Offer's</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0"> Name</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">Price</th>
                          <th scope="col" class="border-0">Period</th>
                          <th scope="col" class="border-0">Status</th>
                          <th scope="col" class="border-0">Actions</th>
                         
                      </thead>
                      <tbody>
                       @foreach($recup_collection as $collec)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{$collec->name}}</td>
                          <td>{{$collec->description}}</td>
                          <td>{{$collec->price}}</td>
                          <td>{{$collec->period}}</td>
                          <td>{{$collec->status}}</td>
                          <td>
                            <form  action="{{url('deleteoffert',$collec->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                              <a href="{{url('edit_offert',$collec->id)}}"><button type="button" class="mb-2 btn btn-success mr-2">Edit</button></a>

                             <button type="submit" class="mb-2 btn btn-primary mr-2">Show</button>
                             <button type="submit" class="mb-2 btn btn-danger mr-2">Delete</button>

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