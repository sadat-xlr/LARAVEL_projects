@extends('layouts.app')

@section('content')
<div class="container">
@foreach ($posts as $post )
<div class="row">
    <div class="col-8 offset-2">
        <img src="/storage/{{ $post->image }}" class="w-100 h-100" alt="">
    </div>
</div>
<div class="row">
    <div class="col-8 offset-2">
    
        <div>
           <span><a href="/profile/{{ $post->user_id }}" style="text-decoration: none;" class="text-dark"><strong>{{ $post->user->profile->title }}</strong>&nbsp;</a></span>
            <p>{{ $post->caption }}</p>
           
        </div>
     
     
       
   </div>
</div>
    
@endforeach
<div class="row">
    <div class="col-12  align-center">
  

            {{ $posts->links() }}


       
       
    </div>
     
  

</div>




</div>


@endsection
