@extends('admin.layouts.master')

@section('page-header', $isEdit ? awt('Update Collection'): awt('Create Collection'))


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
                @awt('Colllection')
            </strong>
            
            <form enctype="multipart/form-data" method="post"
                @if ($isEdit)
                    action="{{route('admin.collections.update', $collection->id)}}"
                @else
                    action="{{route('admin.collections.store')}}"
                @endif>
                
                @csrf
                
                @if ($isEdit)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="name">@awt('Name')</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="@awt('Name')"
                    name="name" value="{{ old('name',$collection->name) }}" required> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror    
                </div>
                
                <div class="form-group">
                    <label for="slug">@awt('Slug')</label>
                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="@awt('Slug')"
                    name="slug" value="{{ old('slug',$collection->slug) }}" required> 
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">@awt('Description')</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" placeholder="@awt('Description')"
                    name="description" required>{{ old('description',$collection->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="image">@awt('Image')</label>
                    <div class="custom-file">
                        <input id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                            type="file" accept="image/*" onchange="preview_image(event)" @if(!$isEdit) required @endif>
                        <label for="image" class="custom-file-label">@awt('Select Image')</label>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2">
                        <img src="@if($isEdit) {{ asset('uploads/'.$collection->image) }} @endif"
                            id="preview-image" class="img" height="140px">
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
@endsection

@section('js')
    <script>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection