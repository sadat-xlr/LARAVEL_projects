@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
     <div class="col-8">
         <img src="/storage/{{ $post->image }}" class="w-100 h-100" alt="">
     </div>
     <div class="col-4 ">
         <div class="d-flex align-items-center">
             <div class="pe-3"><img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 50px" alt=""></div>
             
            <div class="d-flex align-items-center">
              
                    <a href="/profile/{{ $post->user_id }}" style="text-decoration: none;" class="text-dark"><h6><strong>{{ $post->user->profile->title }}</strong></h6></a>
                    <a style="text-decoration: none;" class="ps-3 pb-2 font-weight-bold" href="#"><strong>Follow</strong> </a>
                
                
            </div>
           
        
       
            
   
        
         </div>
         <hr>
         <div>
            <span><a href="/profile/{{ $post->user_id }}" style="text-decoration: none;" class="text-dark"><strong>{{ $post->user->profile->title }}</strong>&nbsp;</a></span>
             <p>{{ $post->caption }}</p>
            
         </div>
      
      
        
    </div>
 </div>
  


</div>
@endsection
