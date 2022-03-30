
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
        @include('admin.mainPanel')
        
       
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.footer')
  </body>
</html>