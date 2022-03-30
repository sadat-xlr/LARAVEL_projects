@extends('layouts.app')

@section('content')
<div class="container">
   <form action="/p" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="row col-6 offset-3">
        <div class="row"><h3>Add New Post</h3></div>
        <div class="row mb-3">
            <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>
    
            <div class="col-md-8">
                <input  id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>
    
                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
    
            <div class="col-md-8">
                <input  id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>
    
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row pt-4">
            <button class="btn btn-primary">Add New Post</button>
        </div>
    
       </div>     
   </form>
  


</div>
@endsection
