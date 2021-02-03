@extends('admin.layouts.master')

@section('page-header',  awt('Boost Shop'))


@section('content')
<div class="d-flex justify-content-center">
    <div  class="card card-small" style="min-width:500px">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               @awt('Boost Shop')
            </strong>
            
            <form method="post" action="{{route('admin.approved_shop.update', $approved_shop->id)}}">
                @csrf
                @method('PUT')
                
                <div class="form-group input-group" id="quantity">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary" id="decrement-btn">
                            <span class=''>-</span>
                        </button>
                    </div>

                    <input type="number" class="form-control" value="{{$approved_shop->boost}}" id="boost-input" name="boost" readonly> 
                    
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" id="increment-btn">
                            <span >+</span>
                        </button>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">@awt('Submit')</button>
                    <button type="reset" class="btn btn-danger">@awt('Cancel')</button>
                </div>   
            </form>
        </div>
    </div>
 </div>
</div>

 <script>
          
</script>
@endsection