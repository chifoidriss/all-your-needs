@extends('admin.layouts.master')

@section('page-header', awt('List of Offers'))


@section('content')
<div class="row">
  <div class="col-12">
    <div class="text-right pb-3">
      <a class="btn btn-primary" href="{{ route('admin.offre.create') }}">
        <i class="fas fa-plus"></i>
        @awt('Create Offer')
      </a>
    </div>
  </div>

  <div class="col-12">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">@awt('Active Offers')</h6>
      </div>
      <div class="card-body p-0 pb-3">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">@awt('Name')</th>
              <th scope="col" class="border-0">@awt('Description')</th>
              <th scope="col" class="border-0">@awt('Price')</th>
              <th scope="col" class="border-0">@awt('Period')</th>
              <th scope="col" class="border-0"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($offers as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td>{{ getPrice($item->price) }}</td>
              <td>{{ $item->period }} @awt('Months')</td>
              <td>
                <form  action="{{route('admin.offre.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  
                  <div class="btn-group btn-group-sm">
                    <a href="{{route('admin.offre.edit', $item->id)}}" class="btn btn-white">
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