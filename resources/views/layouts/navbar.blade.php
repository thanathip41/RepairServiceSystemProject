<!DOCTYPE html>
<html lang="en">
<head>
  <title>Service Repair</title>
  <meta charset="utf-8">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- swlalert-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- css -->
  <link rel="stylesheet" type="text/css" href="{{asset('/css/bodycolor.css')}}">
<!--icon navbar-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- auto ref -->
<!-- <meta http-equiv="refresh" content="120"> -->
  <!-- chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
<body >
<div class="container">

<!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
<a class="navbar-brand" href="{{ url('/') }}" style="color : #FFFFFF;"><h3><i class="fa fa-home"> </i></h3> </a>
<ul class="navbar-nav mr-auto">
                @if (Auth::user()->roleCheck==0)
                <a class="navbar-brand" href="{{ url('/insert') }}" style="color : #FFFFFF;"><i class="fa fa-wrench"> Repairing </i> </a>
                <a class="navbar-brand" href="{{ url('/history') }}" style="color : #FFFFFF;"> <i class="fa fa-history" > History</i></a>
                @include('modalCall/QR')
                
          
                @elseif (Auth::user()->roleCheck==1)
                <div class="container">
                <a class="navbar-brand" href="{{ url('/datarepair') }}" style="color : #FFFFFF;"><i class="fa fa-database"> Management Data</i></a>
                <a class="navbar-brand" href="{{ url('/Piechart') }}" style="color : #FFFFFF;"><i class="fas fa-chart-pie"> Chart</i>  </a>
                <a class="navbar-brand" href="{{ url('/stat') }}" style="color : #FFFFFF;"><i class="fa fa-table"> Stat repair</i> </a>
              
                @elseif (Auth::user()->roleCheck==2)
                <a class="navbar-brand" href="{{ url('/Role') }}" style="color : #FFFFFF;"><i class="fas fa-user-edit"> Management User</i></a>
                <a class="navbar-brand" href="{{ url('/Check') }}" style="color : #FFFFFF;"><i class="fa fa-database"> Management Data</i></a>
                 @endif
                 </ul>
               
             
                <ul class="navbar-nav ml-auto" >
                @if (Auth::user()->roleCheck==1)
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" 
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color : #FFFFFF;">
                      <i class="fa fa-wrench">@foreach($sAll as $row) <span class="badge badge-danger"> {{$row->number}}</span></i> @endforeach
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown"  >
                        <div align="right">
                        <a class="dropdown-item" href="{{url('/alertStatusone')}}" > รอคิว @foreach($s1 as $row)
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
                <p align="center">{{Auth::user()->name}}<br>
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
    </div>
  </div>
</nav>
</div>
        <main>
            @yield('content')
        </main>
  
</body>
</html>
