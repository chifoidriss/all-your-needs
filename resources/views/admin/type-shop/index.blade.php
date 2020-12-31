@extends('admin.layouts.master')

@section('page-header', 'List Type Shop')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.type-shop.create') }}">
        <i class="fas fa-plus"></i>
        Create Type Shop
      </a>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Active Type Shop</h6>
      </div>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0"> Name</th>
              <th scope="col" class="border-0">Description</th>
              <th scope="col" class="border-0">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recup_collection as $collec)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{$collec->name}}</td>
              <td>{{$collec->description}}</td>
              <td>
                <a class="btn btn-sm btn-outline-warning" href="{{ route('admin.type-shop.edit', $collec->id) }}">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-sm btn-outline-danger call-to-action-form" href="#">
                  <i class="fas fa-trash"></i>
                </a>
                <form hidden action="{{ route('admin.type-shop.destroy', $collec->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
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