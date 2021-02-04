@extends('admin.layouts.master')

@section('page-header', awt('List of Collections'))

@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.collections.create') }}">
        <i class="fas fa-plus"></i>
        @awt('Create Collection')
      </a>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">@awt('Active Collections')</h6>
      </div>
      <div class="card-body p-0 pb-3">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">@awt('Image')</th>
              <th scope="col" class="border-0">@awt('Name')</th>
              <th scope="col" class="border-0">@awt('Description')</th>
              <th scope="col" class="border-0"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($collections as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <img src="{{ asset('uploads/'. $item->image) }}" height="64px" alt="{{ $item->name }}">
              </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              
              <td>
                <form  action="{{route('admin.collections.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  
                  <div class="btn-group btn-group-sm">
                    <a href="{{route('admin.collections.edit', $item->id)}}" class="btn btn-white">
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