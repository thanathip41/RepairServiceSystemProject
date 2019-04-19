<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="{{ url('/') }}">
                 Repair </a>
                @if (Auth::user()->roleCheck==0)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                 User!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/insert') }}">Insert Data Repair</a>
                  <a class="dropdown-item" href="{{ url('/history') }}">Check list Repair</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              </ul>

                @elseif (Auth::user()->roleCheck==1)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Maintenance!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/datarepair') }}">Data repair</a>
                  <a class="dropdown-item" href="{{ url('/Piechart') }}"> Piechart</a>
                  <a class="dropdown-item" href="{{ url('/Barchart') }}"> Barchart</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/Barchart') }}">Something else here</a>
                </div>
              </li>
              </ul>

                @elseif (Auth::user()->roleCheck==2)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Admin!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/Role') }}">RoleUser</a>
                  <a class="dropdown-item" href="{{ url('/Check') }}">Data repair</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/') }}">Something else here</a>
                </div>
              </li>
              </ul> @endif
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
