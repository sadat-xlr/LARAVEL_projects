
@extends('layouts.app')
@section('content')
  <div class="row align-items-center">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
               
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Date</th>
                
                
              </tr>
            </thead>
            <tbody>
                @foreach ($newses as $news )
                <tr>
                    
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->user->name }}</td>
                    
                    <td>{{ $news->created_at->format('d/m/Y') }}</td>
                  
                </tr>
                @endforeach
              
            
            </tbody>
          </table>
        </div>  
        <div class="col-md-4 offset-1">
          <h5>Add Event</h5>
          <form action="{{ route('store.news') }}" method="post">
             @csrf
              <div class="form-group ">
                  <label for="exampleInputPassword1">Event Title</label>
                  <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="text" name="description" class="form-control" >
                 
              </div>
                
                <div class="from-group pt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
     
       </div>
   

  </div>
    




@endsection
