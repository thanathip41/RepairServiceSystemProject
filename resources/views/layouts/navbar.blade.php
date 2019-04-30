<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maintenace</title>
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

<!--icon navbar-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- auto ref -->
<meta http-equiv="refresh" content="120">
  <!-- chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 

 
</head>
<body  background="{{('/image/x.jpg')}}">
<div class="container">

<!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i> </a>
<ul class="navbar-nav mr-auto">
                @if (Auth::user()->roleCheck==0)
                <a class="navbar-brand" href="{{ url('/insert') }}"> <i>Repairing</i>  </a>
                <a class="navbar-brand" href="{{ url('/history') }}"> <i> History</i> </a>
          
                @elseif (Auth::user()->roleCheck==1)
                <div class="container">
                <a class="navbar-brand" href="{{ url('/datarepair') }}"><i>Management Data</i></a>
                <a class="navbar-brand" href="{{ url('/Piechart') }}"><i> Report Chart</i> </a>
                <a class="navbar-brand" href="{{ url('/stat') }}"><i> Stat repair</i> </a>
              
                @elseif (Auth::user()->roleCheck==2)
                <a class="navbar-brand" href="{{ url('/Role') }}"><i>Management User</i></a>
                <a class="navbar-brand" href="{{ url('/Check') }}"><i> Management Data</i></a>
                 @endif
                 </ul>
               
             
                <ul class="navbar-nav ml-auto">
                @if (Auth::user()->roleCheck==1)
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        สถานะการซ่อม @foreach($sAll as $row) <span class="badge badge-danger"> {{$row->number}}</span>@endforeach
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/alertStatusone')}}">รอคิว @foreach($s1 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatustwo')}}">ระหว่างการดำเนินการ @foreach($s2 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatusthree')}}">รอยืนยันจากผู้แจ้งซ่อม @foreach($s3 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatusfour')}}">ดำเนินการสำเร็จ @foreach($s4 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatusfive')}}">ดำเนินการไม่สำเร็จ @foreach($s5 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                         <a class="dropdown-item" href="{{url('/alertStatussix')}}">ส่งเคลม @foreach($s6 as $row)
                         <span class="badge badge-danger"> {{$row->number}}</span>@endforeach </a>
                      </div>
                    </li>@endif
        <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <i class="fa fa-fw fa-user"></i>{{Auth::user()->username}}</a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{url('/profile')}}" >My Profile </a>
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
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
