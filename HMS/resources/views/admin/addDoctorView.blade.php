
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.header')
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
     
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       {{-- Top naviagtion menu  --}}
        @include('admin.topNav')
       
        
      
       
       {{-- Top navigation menu end --}}
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
           <div class="container mt-5 ">
               <div class="row">
                   <div class="col-md-6">
                    <div class="pb-5"><h3>Add Dcotor</h3> </div>
                 
                        <form action="{{ route('addDoctor') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="doctotName" class="form-label">Doctor's Name</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="doctotName" name="name" placeholder="Enter doctor's name" style="color:#caaeae" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="bg-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                              <div class="form-group ">
                                <label for="doctorPhone" class="form-label">Phone No</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="doctorPhone" name="phone" placeholder="Enter Phone Number" style="color:#caaeae">
                                    @error('phone')
                                    <span class="bg-danger">{{ $message }}</span>
                                    @enderror 

                                </div>
                                
                            </div>
                              
                              <div class="form-group ">
                                <label for="speciality" class="form-label">Speciality</label>
                               <div class="d-flex">
                                <select class="form-control" name="speciality" id=""  style="background-color: #2A3038;color:#caaeae">
                                    <option value="">---</option>
                                    <option value="skin">Cardiology</option>
                                    <option value="dental">Dental</option>
                                    <option value="skin">Skin</option>
                                    <option value="child">Child Care</option>
                                </select>
                                @error('speciality')
                                 <span class="bg-danger">{{ $message }}</span>
                                @enderror
                               </div>
                              </div>
                              <div class="form-group">
                                <label for="doctorRoom" class="form-label">Room No</label>
                                <div class="d-flex">
                                    <input type="number" class="form-control" id="doctorRoom" name="room" placeholder="Enter Room Number" style="color:#caaeae">
                                    @error('room')
                                    <span class="bg-danger">{{ $message }}</span>
                                    @enderror 
                                </div>
                            </div>
                            
                        
                              <div class="form-group ">
                                <label for="doctorImage" class="form-label">Add Image</label>
                                <input type="file" class="form-control" id="doctorImage" name="image" >
                                @error('image')
                                 <span class="bg-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="text-center" >
                                <button type="submit" class="btn btn-primary">Submit</button> 
                              </div>
                             
                        </form>
                   
                    
                   </div>
               </div>
              
           </div>
       </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
   @include('admin.footer')
   @include('sweetalert::alert')
  </body>
</html>