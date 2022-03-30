<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!--Bootstrap css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="css/normalize.css">
  
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="css/dashboard.css">

  <link rel="stylesheet" href="css/customSelect.css">
</head>

<body>
   
    <!--Header start-->
    <header class="position-fixed py-3 w-100">
        <div class="mx-auto px-3 maxContainer">
            <div class="d-inline-block text-center text-sm-start logo">
                <button id="navToggler" class="d-md-none border-0 bg-transparent">
                    <img src="img/hamburger.png" class="img-fluid">
                </button>

                <a class="navbar-brand" href="index.html">
                   Admin Panel
                </a>

                <button id="headerMenuToggler" class="d-sm-none ms-1 border-0 rounded bg-secondary text-light">+</button>
            </div>

            <div class="float-sm-end pt-3 pt-sm-0 menuList">
                <ul class="float-sm-start list-unstyled text-center text-sm-start headerMenuItems">
                 
                    <li class="float-sm-start darkToggler">
                        <img src="img/dashboard/sun.svg">

                        <label class="position-relative mb-4 switchBtnLabel">
                            <input class="position-absolute switchChk" type="checkbox">
                            <span class="position-absolute rounded-pill transition border border-secondary switchButton"></span>
                        </label>
                    </li>

                </ul>

              
            </div>
        </div>
    </header>
    <!--Header end-->



    <div class="mx-auto px-3 maxContainer">
       
        <!--Nav start-->
        <nav id="mainNav" class="pe-2 position-fixed position-md-static">
            <ul class="list-unstyled mt-sm-5">
                <li class="my-1">
                    <a href="#" class="d-block pe-3 py-2 rounded text-decoration-none dashboard active">
                        <span class="ms-2 pt-1">Admin Overview</span>
                    </a>
                </li>
        
                <li class="my-1">
                    <a href="{{ route('list.service') }}" class="d-block pe-3 py-2 rounded text-decoration-none usrMngmt">
                        <span class="ms-2 pt-1">Services</span>
                    </a>
                </li>
        
                <li class="my-1">
                    <a href="{{ route('list.notice') }}" class="d-block pe-3 py-2 rounded text-decoration-none deposMngmt">
                        <span class="ms-2 pt-1">Notices</span>
                    </a>
                </li>
        
                <li class="my-1">
                    <a href="{{ route('list.event') }}" class="d-block pe-3 py-2 rounded text-decoration-none withMngmt">
                        <span class="ms-2 pt-1">Events</span>
                    </a>
                </li>
        
                <li class="my-1">
                    <a href="{{ route('list.news') }}" class="d-block pe-3 py-2 rounded text-decoration-none financeMngmt">
                        <span class="ms-2 pt-1">News</span>
                    </a>
                </li>
        
                <li class="my-1">
                    <a href="{{ route('list.member') }}" class="d-block pe-3 py-2 rounded text-decoration-none ps">
                        <span class="ms-2 pt-1">Members</span>
                    </a>
                </li>
        
              
            </ul>
            
        
            <div class="mt-5 pt-4 menuBottom">
               
                
                <a href="{{ route('logout') }}" class="text-decoration-none text-start btn mt-4 text-white w-100 logout" 
                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                   
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            
        </nav> 
        
        
        <!--Nav end-->
    
        <!--Main start-->
        <main class="mt-4 ms-auto">
            <!--Spacer-->
            <div class="spacer"></div>
            <!--Spacer-->

            <div class="pageHeading">
                <h2 class="m-0">Dashboard</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>

       
            
            <!--Statistics section start-->
            
           @yield('content')
            <!--Statistics section end-->
        </main>
        <!--Main end-->

    </div>
  
  <!--Bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!--JQuery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="js/vendor/modernizr-3.11.2.min.js"></script>

  <!--ddtf js-->
  <script src="js/vendor//ddtf.js"></script>

  <!--apexcharts js-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <script src="js/customSelect.js"></script>

  <script src="js/dashboard.js"></script>

 
</body>

</html>
