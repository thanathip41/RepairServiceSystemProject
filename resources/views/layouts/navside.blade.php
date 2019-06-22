<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Repair</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.iconfinder.com/data/icons/benefits-flat/125/flaticon_settings-512.png">

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

          @if (Auth::user()->role_id==0)
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/insert') }}">
          <i class="fa fa-wrench"></i>
          <span> แจ้งซ่อม</span></a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/accept') }}">
          <i class="fa fa-check"></i>
         <span> รับอุปกรณ์</span> <small class="badge badge-danger" style="vertical-align: top;border-radius:50%;">@foreach($s3 as $row) {{$row->number}}  @endforeach</small></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/history') }}">
          <i class="fa fa-history"></i>
          <span> ประวัติการแจ้งซ่อม</span></a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#QR">
        <i class="fas fa-robot"></i>
          <span> บอท</span></a>
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
                 
       @elseif (Auth::user()->role_id==1)
      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/datarepair') }}">
          <i class="fa fa-wrench"></i>
          <span> จัดการข้อมูลแจ้งซ่อม</span></a>
      </li> 
      <li class="nav-item">
      <a class="nav-link" href="{{ url('/mail') }}">
      <i class="fa fa-envelope"></i>
        <span> ส่ง E-mail</span></a>
    </li> 

        @elseif (Auth::user()->role_id==2)
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
          <i class="fa fa-database"></i>
          <span> จัดการข้อมูลการแจ้งซ่อม</span>
        </a>
        <div id="collapseone" class="collapse">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> จัดการข้อมูล : </h6>
            <a class="collapse-item" href="{{ url('/Check') }}"><i class="fa fa-wrench"></i> จัดการข้อมูลแจ้งซ่อม</a>
            <a class="collapse-item" href="{{ url('/restoreData') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลแจ้งซ่อม</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-users"></i>
          <span> จัดการข้อมูลผู้ใช้</span>
        </a>
        <div id="collapseTwo" class="collapse" >
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">จัดการผู้ใช้ : </h6>
            <a class="collapse-item" href="{{ url('/Role') }}"><i class="fa fa-user"></i> จัดการข้อมูลผู้ใช้</a>
            <a class="collapse-item" href="{{ url('/restoreUser') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลผู้ใช้</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetree" aria-expanded="true" aria-controls="collapsetree">
          <i class="fa fa-file"></i>
          <span> รายงาน </span>
        </a>
        <div id="collapsetree" class="collapse" >
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">รายงานผล : </h6>
            <a class="collapse-item" href="{{ url('/Piechart') }}"><i class="fas fa-chart-pie"></i> กราฟ</a>
            <a class="collapse-item"  href="{{ url('/stat') }}"><i class="fas fa-fw fa-chart-area"></i> สถิติ</a>
          </div>
        </div>
      </li>
      
      @endif
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
                @if (Auth::user()->role_id==2) 
                   <small>  Admin since  
                    {{date('M. Y',strtotime(Auth::user()->created_at))}}
                       <br><i class="fa fa-circle text-success"></i> กำลังใช้งาน
                         </small> 
                  @else 
                    <small>   Member since
                      {{date('M. Y',strtotime(Auth::user()->created_at))}}
                        <br> <i class="fa fa-circle text-success"></i> กำลังใช้งาน
                    </small> 
                @endif
                   </p>
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
      
          <main class="py-4">
            @yield('content')
        </main>
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
