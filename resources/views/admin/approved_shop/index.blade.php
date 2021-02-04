@extends('admin.layouts.master')

@section('page-header', awt('Manage Shops'))

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">@awt('Manage Shops')</h6>
      </div>
      <div class="card-body p-0 pb-3">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">@awt('Name')</th>
              <th scope="col" class="border-0">@awt('Type Shop')</th>
              <th scope="col" class="border-0">@awt('Boost Level')</th>
              <th scope="col" class="border-0">@awt('Date of Creation')</th>
              <th scope="col" class="border-0"></th>
            </tr>
          </thead>

          <tbody>
            @foreach($shops as $shop)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $shop->name }}</td>
              <td>{{ $shop->type_shop->name }}</td>
              <td>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: {{ $shop->boost }}%">
                    {{ $shop->boost }}%
                  </div>
                </div>
              </td>
              <td>{{ formatDate($shop->created_at, 0, 0) }}</td>
              <td>
                <form  action="{{route('admin.approved_shop.destroy', $shop->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                
                  <div class="btn-group btn-group-sm">
                    <a class="btn btn-white" href="{{route('admin.approved_shop.edit',$shop->id)}}">
                      <span class="text-primary"><i class="material-icons">timeline</i></span> 
                      @awt('Boost')
                    </a>
                    @if($shop->status)
                      <button type="submit" class="btn btn-white">
                        <span class="text-danger"><i class="material-icons">clear</i></span>
                        @awt('Desapprove')
                      </button>
                    @else
                      <button type="submit" class="btn btn-white">
                        <span class="text-success"><i class="material-icons">done_all</i></span>
                        @awt('Approve')
                      </button>
                    @endif
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