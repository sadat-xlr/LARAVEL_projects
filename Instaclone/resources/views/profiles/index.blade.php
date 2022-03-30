@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 pe-5">
           <img class="rounded-circle w-100" src="{{ $user->profile->profileImage() }}" height="200">
       </div>
       <div class="col-9 pe-5">
            <div class="d-flex justify-content-between align-items-baseline">
               <div class="d-flex align-items-center">
                <h1>{{ $user->username }}</h1>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
               </div>
               @can('update',$user->profile)
               <a href="/p/create">Add Post</a>
               @endcan
               
            </div>
            @can('update',$user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
           
            <div class="d-flex">
                
                <div class="pe-5"><strong class="pe-1">{{ $postCount; }}</strong>posts</div>
                <div class="pe-5"><strong class="pe-1">{{ $followerCount }}</strong>followers</div>
                <div class="pe-5"><strong class="pe-1">{{ $followingCount }}</strong>following</div>
            </div>
         
         <div class="pt-5 pe-5"><strong>{{ $user->profile->title }}</strong></div>
         <div>{{ $user->profile->description }}</div>
         <div><a href="#">{{ $user->profile->url }}</a></div>


             
    
           
        </div>
   </div>
   <div class="row pt-5">
       @foreach ($user->posts as $post )
      
       <div class="col-4 pt-4">
        <a href="/p/{{ $post->id }}">
            <img class="h-100 rounded_border img-thumbnail" height="400px" width="400px" src="/storage/{{ $post->image }}"  alt="image">
        </a>
       </div>
     
   
           
       @endforeach
    </div>
       

  
</div>
@endsection
