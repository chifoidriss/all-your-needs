@extends('admin.layouts.master')

@section('page-header', awt('List of Categories'))

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.categorie.create') }}">
        <i class="fas fa-plus"></i>
        @awt('Create Category')
      </a>
    </div>
  </div>
  
  <div class="col-12">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">@awt('Active categories')</h6>
      </div>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">@awt('Name')</th>
              <th scope="col" class="border-0">@awt('Description')</th>
              <th scope="col" class="border-0">@awt('Super Category')</th>
              <th scope="col" class="border-0"></th>
            </tr>
          </thead>

          <tbody>
            @foreach($categories as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td>{{ awt($item->superCategory->name) }}</td>
              <td>
                <form  action="{{route('admin.categorie.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  
                  <div class="btn-group btn-group-sm">
                    <a href="{{route('admin.categorie.edit', $item->id)}}" class="btn btn-white">
                      <span class="text-success"><i class="material-icons">more_vert</i></span>
                      @awt('Edit')
                    </a>
  
                    <button class="btn btn-white" type="submit">
                      <span class="text-danger"><i class="material-icons">clear</i></span>
                      @awt('Delete')
                    </button>
                  </div>
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