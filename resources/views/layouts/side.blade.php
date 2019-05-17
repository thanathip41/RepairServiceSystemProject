<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Service Computer Repair</title>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/homepage/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/homepage/dist/css/sidebar.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/homepage/dist/js/sidebar.js')}}"></script>

  <!-- chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

   <!-- swlalert-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg navbar-light bg-primary border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      @if (Auth::user()->roleCheck==1)
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" 
      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color : #FFFFFF;">
        @foreach($sAll as $row)
          <i class="fa fa-wrench"> <span class="badge badge-danger navbar-badge"> {{$row->number}}</span></i>
        </a> @endforeach
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"  style="background-color: #2989D8">
                  <div align="right">
                        <a class="dropdown-item" href="{{url('/alertStatusone')}}"> รอคิว @foreach($s1 as $row)
                         <span class="badge badge-danger" >{{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatustwo')}}">ระหว่างการดำเนินการ @foreach($s2 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatusthree')}}">รอยืนยันจากผู้แจ้งซ่อม @foreach($s3 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatusfour')}}">ดำเนินการสำเร็จ @foreach($s4 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatusfive')}}">รอดำเนินการใหม่ @foreach($s5 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatussix')}}">ส่งเคลม @foreach($s6 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a> 
                         <a class="dropdown-item" href="{{url('/alertStatusseven')}}">ซื้ออุปกรณ์ใหม่ @foreach($s7 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a> 
                  </div>
        </div>
      </li>@endif
      <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color : #FFFFFF;">
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
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('image/service.png')}}"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Service Repair</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="{{asset('/homepage/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#">{{Auth::user()->name}}
          <small> <br> @if (Auth::user()->activated==1) <i class="fa fa-circle text-success"></i> Activated
                   @elseif (Auth::user()->activated==0) <i class="fa fa-circle text-danger"></i> Inactivated @endif
                   </small>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Auth::user()->roleCheck==0)
               <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Service
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/insert') }}" class="nav-link">
                <i class="fa fa-wrench"></i>
                  <p>Repairing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/history') }}" class="nav-link">
                <i class="fa fa-history" > </i>
                  <p> history</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#QR">
                <i class="fa fa-android"></i>
                  <p>Bot </p>
                </a>
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
              </li>
            </ul>
            @elseif (Auth::user()->roleCheck==1)
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/datarepair') }}" class="nav-link">
                  <i class="fa fa-database"> </i>
                  <p>Repair Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/Piechart') }}" class="nav-link">
                <i class="fa fa-pie-chart"></i>
                  <p> Chart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/stat') }}" class="nav-link">
                <i class="fa fa-table"></i>
                  <p>Stat </p>
                </a>
              </li>
            </ul>
             @elseif (Auth::user()->roleCheck==2)
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/Role') }}" class="nav-link">
                  <i class="fa fa-database"> </i>
                  <p>Management User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/Check') }}" class="nav-link">
                <i class="fa fa-user"></i>
                  <p> Management Data</p>
                </a>
              </li>
            </ul>
          
          @endif
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
      <div class="container-fluid">
      </div>
    </div> -->
    <!-- Main content -->
    <section class="content">
          <main class="py-4">
            @yield('content')
        </main>
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
