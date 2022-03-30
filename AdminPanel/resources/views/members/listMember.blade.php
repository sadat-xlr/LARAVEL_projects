
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6 align-items-center">
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Designation</th>
          <th scope="col">Image</th>
         
          
        </tr>
      </thead>
      <tbody>
          @foreach ($members as $member )
          <tr>
              <th scope="row">{{ $member->id }}</th>
              <td>{{ $member->name}}</td>
              <td>{{ $member->designation }}</td>
              <td><img src="/storage/{{ $member->image}}" alt="" width="80"></td>
            
            </tr>
          @endforeach
        
      
      </tbody>
    </table>
  </div>
  <div class="col-md-4 offset-1">
    <h5>Add Member</h5>
    <form action="{{ route('store.member') }}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="form-group ">
            <label for="exampleInputPassword1">Event Title</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="designation" class="form-control" >
           
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <input type="file" name="image" class="form-control" >
         
      </div>
          <div class="from-group pt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          
      </form>
  </div>
</div>

@endsection