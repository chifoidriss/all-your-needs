@extends('admin.layouts.master')

@section('page-header', $isEdit? awt('Update User Role') : awt('Create User Role'))

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection

@section('content')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
                @if ($isEdit)
                    @awt('Update')
                @else
                    @awt('Create')
                @endif
                @awt('User Role')
            </strong>
            
            <form method="post"
                @if ($isEdit)
                    action="{{route('admin.manager_user.update', $user->id)}}"
                @else
                    action="{{route('admin.manager_user.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="email">@awt('User Email')</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $user->email) }}">    
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                </div>

                <div class="form-group">
                    <label for="roles_id">@awt('Choose roles')</label>
                    <select name="roles_id[]" id="roles_id" class="form-control select2 @error('roles_id') is-invalid @enderror" multiple> 
                        @foreach($roles as $item)
                        <option class="form-control select2" value="{{$item->id }}"
                            @if(in_array($item->id, old('roles_id', $user->roles->pluck('id')->toArray()))) selected @endif>  
                            {{$item->name }}
                        </option>
                        @endforeach
                    <select> 
                    @error('roles_id')
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