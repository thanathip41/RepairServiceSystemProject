<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Repair</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('/navside/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('/navside/css/navside.css')}}" rel="stylesheet">
  
<!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

  <!-- chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

   <!-- swlalert-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-desktop"></i> &nbsp;
        </div>
        <div class="sidebar-brand-text"> Service Repair</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
          <i class="fas fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

          @if (Auth::user()->roleCheck==0)
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/insert') }}">
          <i class="fa fa-wrench"></i>
          <span> แจ้งซ่อม</span></a>
      </li> 
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/history') }}">
          <i class="fa fa-history"></i>
          <span> ประวัติการแจ้งซ่อม</span></a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#QR">
        <i class="fas fa-robot"></i>
          <span>บอท</span></a>
      </li>
       <div class="modal fade" id="QR"  role="dialog">
                    <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="modal-title"> <img src="{{('image/qrbot.jpg')}}">Line Id : @612ldsae </div>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      </div>
                    </div>
                  </div>
                 
       @elseif (Auth::user()->roleCheck==1)
      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/datarepair') }}">
          <i class="fa fa-wrench"></i>
          <span>จัดการข้อมูลแจ้งซ่อม</span></a>
      </li> 
      <li class="nav-item">
      <a class="nav-link" href="{{ url('/mail') }}">
      <i class="fa fa-envelope"></i>
        <span>ส่ง E-mail</span></a>
    </li> 

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Piechart') }}">
        <i class="fas fa-chart-pie"></i> 
          <span>กราฟ</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/stat') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>สถิติการใข้งาน</span></a>
      </li> 
      
        @elseif (Auth::user()->roleCheck==2)
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/Check') }}">
        <i class="fa fa-wrench"></i> 
          <span>จัดการข้อมูลการแจ้งซ่อม</span></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Role') }}">
        <i class="fas fa-users"></i>
          <span>จัดการสมาชิก</span></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/restoreData') }}">
        <i class="fas fa-trash-restore"></i>
          <span>กู้ข้อมูลแจ้งซ่อม</span></a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/restoreUser') }}">
        <i class="fas fa-trash-restore"></i>
          <span>กู้ข้อมูลสมาชิก</span></a>
      </li> 
      @endif
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

     
      </ul>
    
   
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
                 
            
             
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color : #FFFFFF;">
          @if (Auth::user()->img=="") 
          <img src="{{('/image/user.png')}}" 
          style="width:45px; height:45px; float:left;border-radius: 50%;margin-left:5px;"></a> 
          @else
           <img src="{{asset('storage').'/'.Auth::user()->img}}" 
           style="width:45px; height:45px; float:left;border-radius: 50%;margin-left:5px;"></a> 
           @endif
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" > 
             <a class="dropdown-item" href="{{url('/profile')}}" style="background-color: #63AED3"  >                  
                <p align="center"> {{Auth::user()->name}}<br>
                   <small>Member since {{date('M. Y',strtotime(Auth::user()->created_at))}}
                   <br> @if (Auth::user()->activated==1) <i class="fa fa-circle text-success"></i>Activated
                   @elseif (Auth::user()->activated==0) <i class="fa fa-circle text-danger"></i>Inactivated @endif
                   </small> </p>
              </a>
                                    <div class="dropdown-divider"></div>
                                    <button  class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       <div align="right"> <i class="fas fa-sign-out-alt"></i> Sign out </div>
                                    </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                </form>
            </div>
        </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

        
              <div class="card">
                <!-- Card Header - Dropdown -->
                <div class="card-header ">
                  <h6 class="text-primary">Earnings Overview</h6>
                
                <!-- Card Body -->
                <div class="card-body">
              
                  dddd
                 <br>
                 dd
                </div>
            

          

        </div>
        <!-- /.container-fluid -->

      </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

   <!-- Custom scripts for all pages-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="{{asset('/navside/js/navside.min.js')}}"></script> 

</body>

</html>
