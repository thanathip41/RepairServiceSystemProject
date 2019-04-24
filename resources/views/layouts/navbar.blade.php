<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!--icon navbar-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- auto ref -->
<meta http-equiv="refresh" content="60">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i> </a>
<ul class="navbar-nav mr-auto">
                @if (Auth::user()->roleCheck==0)
                <a class="navbar-brand" href="{{ url('/insert') }}"> <i>Repairing</i>  </a>
                <a class="navbar-brand" href="{{ url('/history') }}"> <i>/ History</i> </a>
          
                @elseif (Auth::user()->roleCheck==1)
                <div class="container">
                <a class="navbar-brand" href="{{ url('/datarepair') }}"><i>Management Data</i></a>
                <a class="navbar-brand" href="{{ url('/Piechart') }}">   <i>/ Report Chart</i> </a>
             
 
                @elseif (Auth::user()->roleCheck==2)
                <a class="navbar-brand" href="{{ url('/Role') }}"><i>Management User</i></a>
                <a class="navbar-brand" href="{{ url('/Check') }}"><i>Management Data</i></a>
                 @endif
                 </ul>
      <ul class="nav navbar-nav navbar">
        <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         {{Auth::user()->username}}</a>
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
