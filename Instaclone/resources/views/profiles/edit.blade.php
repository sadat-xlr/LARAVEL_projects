@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row col-6 offset-3">
            <div class="row"><h3>Edit Profile</h3></div>
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
        
                <div class="col-md-8">
                    <input  id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>
        
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        
                <div class="col-md-8">
                    <input  id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description}}"  autocomplete="description" autofocus>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('url') }}</label>
        
                <div class="col-md-8">
                    <input  id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>
        
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>
        
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
                <button class="btn btn-primary">Save Profile</button>
            </div>
        
           </div>     
       </form>
       

  
</div>
@endsection
