@extends('admin.layouts.master')

@section('page-header',  'Boost Shop')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               Boost Shop
            </strong>
            
            <form method="post" action="{{route('admin.approved_shop.update', $approved_shop->id)}}">
                 @csrf
                    @method('PUT')
                <div class='row  ' id='quantity'>
                <div>
                    <button class="btn btn-primary " id='decrement-btn' type='button'>
                    <span class=''>-</span>
                    </button>
                </div>
                <div class="form-group col-6">
                    <input type="number" min='0' max='100' class=" form-control "
                        value="{{$approved_shop->boost}}" id="boost-input"  name="boost" disabled='true'> 
                    
                </div>

                <div class=''>
                    <button class="btn btn-primary " type='button' id='increment-btn'>
                    <span >+</span>
                    </button>
                </div>
               
                </div>
                <div class="form-group">
                    <button type="submit" class="mb-2 btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                </div>   
            </form>
        </div>
    </div>
 </div>

 <script>
          
</script>
@endsection