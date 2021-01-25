@extends('admin.layouts.master')

@section('page-header', $isEdit?'Update Subscription' : 'Create Subscription')




@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                Update
                @else
                Create
                @endif
                Subscription
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.subscription.update', $subscription->id)}}"
                @else
                    action="{{route('admin.subscription.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="shop_id">Shop</label>
                    <select class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" id='shop_id'> 
                        <option>
                            Choice Shop
                        </option>
                        @foreach($shop_id as $item)
                        <option value="{{$item->id}}" @if(old('shop_id', $subscription->shop_id == $item->id)) selected @endif>
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('shop_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                </div>

                <div class="form-group">
                    <label for="offer_id">Offer</label>
                    <select class="form-control @error('offer_id') is-invalid @enderror" name="offer_id" id='offer_id'> 
                        <option>
                            Choice offer
                        </option>
                        @foreach($offer_id as $item)
                        <option value="{{$item->id}}" @if(old('offer_id', $subscription->offer_id == $item->id)) selected @endif>
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('offer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                        value="{{ old('amount', $subscription->amount) }}" id="amount" placeholder="Amount" name="amount"> 
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="start">Date Start</label>
                    <input type="date" class="form-control @error('start') is-invalid @enderror"
                        value="{{ old('start', $subscription->start) }}" id="start" placeholder="Date Start" name="start"> 
                    @error('start')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="form-group">
                <label for="start">Date End</label>
                    <input type="date" class="form-control @error('end') is-invalid @enderror"
                        value="{{ old('end', $subscription->end) }}" id="end" placeholder="Date End" name="end"> 
                    @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>
                <div class="form-group">
                    <button type="submit" class="mb-2 btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="mb-2 btn btn-danger mr-2">Cancel</button>
                </div>   
            </form>
        </div>
    </div>
 </div>
@endsection