
@extends('categorie.layout.tablelayout')

@section('button_create')
  <center><h3 >Liste des Catégories</h3></center>
 
   <div class="col mb-6">
       <button type="button" class="mb-2 btn btn-primary mr-2">Create Category</button>
    </div>
@endsection
@section('table')
<div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Category</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0"> Name</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">Super Category</th>
                          <th scope="col" class="border-0">Actions</th>
                         
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Ali</td>
                          <td>Kerry</td>
                          <td>Russian Federation</td>
                          <td>
                             <button type="button" class="mb-2 btn btn-success mr-2">Edit</button>

                             <button type="button" class="mb-2 btn btn-primary mr-2">Show</button>
                             <button type="button" class="mb-2 btn btn-danger mr-2">Delete</button>
                          </td>
                         
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection