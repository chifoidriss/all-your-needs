@extends('admin.layouts.master')

@section('page-header', $isEdit ? awt('Update Subscription'): awt('Create Subscription'))

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection

@section('content')
<div class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                  @awt('Update')
                @else
                    @awt('Create')
                @endif
                @awt('Subscription')
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
                    <label for="shop_id">@awt('Shop')</label>
                    <select class="custom-select select2 @error('shop_id') is-invalid @enderror" name="shop_id" id='shop_id'> 
                        <option value="">
                            @awt('Choose Shop')
                        </option>
                        @foreach($shops as $item)
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
                    <label for="offer_id">@awt('Offer')</label>
                    <select class="custom-select select2 @error('offer_id') is-invalid @enderror" name="offer_id" id='offer_id'> 
                        <option value="">
                            @awt('Choose offer')
                        </option>
                        @foreach($offers as $item)
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
                    <label for="amount">@awt('Amount')</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                        value="{{ old('amount', $subscription->amount) }}" id="amount" placeholder="@awt('Amount')" name="amount"> 
                    @error('amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="start">@awt('Date Start')</label>
                    <input type="datetime-local" class="form-control @error('start') is-invalid @enderror"
                        value="{{ old('start', $subscription->start) }}" id="start" placeholder="@awt('Date Start')" name="start"> 
                    @error('start')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>

                <div class="form-group">
                <label for="end">@awt('Date End')</label>
                    <input type="datetime-local" class="form-control @error('end') is-invalid @enderror"
                        value="{{ old('end', $subscription->end) }}" id="end" placeholder="@awt('Date End')" name="end"> 
                    @error('end')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">@awt('Submit')</button>
                    <button type="reset" class="btn btn-danger">@awt('Cancel')</button>
                </div>   
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
<script>
    $('.select2').select2();
</script>
@endsection