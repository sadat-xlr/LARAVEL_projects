@extends('layouts.app')
@section('content')
  <div class="row align-items-center">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
               
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                
                
              </tr>
            </thead>
            <tbody>
                @foreach ($services as $service )
                <tr>
                    
                    <td>{{ $service->service_title }}</td>
                    <td>{{ $service->service_description }}</td>
                    <td>{{ $service->created_at->format('d/m/Y') }}</td>
                  
                </tr>
                @endforeach
              
            
            </tbody>
          </table>
        </div>  
        <div class="col-md-4 offset-1">
          <h5>Add Service</h5>
          <form action="{{ route('store.service') }}" method="post">
             @csrf
              <div class="form-group ">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" name="service_title" class="form-control">
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Service Name</label>
                  <input type="text" name="service_description" class="form-control" >
                 
              </div>
                
                <div class="from-group pt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
     
       </div>
   

  </div>
    




@endsection
