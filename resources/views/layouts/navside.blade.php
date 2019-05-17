<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SB Admin 2 - Blank</title>

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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
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
          <i class="fas fa-fw fa-chart-area"></i>
          <span>แจ้งซ่อม</span></a>
      </li> 
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/history') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>ประวัติการแจ้งซ่อม</span></a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#QR">
          <i class="fas fa-fw fa-chart-area"></i>
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          @foreach($sAll as $row)
          <span>ข้อมูลแจ้งซ่อม </span> <span class="badge badge-danger"> {{$row->number}} @endforeach</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
         
            <p class="collapse-header" align="center">สถานะในระบบ: </p>
            <div align="right">
            @foreach($s1 as $row)
            <a class="collapse-item" href="{{url('/alertStatusone')}}">รอคิว <span class="badge badge-danger"> {{$row->number}} @endforeach </span> </a>
            @foreach($s2 as $row)
            <a class="collapse-item" href="{{url('/alertStatustwo')}}">ระหว่างการดำเนินการ <span class="badge badge-danger" > {{$row->number}} @endforeach </span> </a>
            @foreach($s3 as $row)
            <a class="collapse-item" href="{{url('/alertStatusthree')}}">รอยืนยันจากผู้แจ้งซ่อม <span class="badge badge-danger" > {{$row->number}} @endforeach </span> </a>
            @foreach($s4 as $row)
            <a class="collapse-item" href="{{url('/alertStatusfour')}}">ดำเนินการสำเร็จ <span class="badge badge-danger" > {{$row->number}} @endforeach </span> </a>
            @foreach($s5 as $row)
            <a class="collapse-item" href="{{url('/alertStatusfive')}}">รอดำเนินการใหม่ <span class="badge badge-danger" > {{$row->number}} @endforeach </span> </a>
            @foreach($s6 as $row)
            <a class="collapse-item" href="{{url('/alertStatussix')}}">ส่งเคลม <span class="badge badge-danger" > {{$row->number}} @endforeach </span> </a>
            @foreach($s7 as $row)
            <a class="collapse-item" href="{{url('/alertStatusseven')}}">ซื้ออุปกรณ์ใหม่ <span class="badge badge-danger" > {{$row->number}} @endforeach </span> </a>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/datarepair') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>จัดการข้อมูลแจ้งซ่อม</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Piechart') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>กราฟ</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/stat') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>สถิติการใข้งาน</span></a>
      </li> 
      
        @elseif (Auth::user()->roleCheck==2)
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Role') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>จัดการสมาชิก</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Check') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>จัดการข้อมูลการแจ้งซ่อม</span></a>
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
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color : #000000;">
         <i class="fa fa-fw fa-user"></i>{{Auth::user()->username}}</a>
           
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
                                       <div align="right"> <i class="fa fa-sign-out"></i> Sign out </div>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
   <!-- Custom scripts for all pages-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="{{asset('/navside/js/navside.min.js')}}"></script> 

</body>

</html>
