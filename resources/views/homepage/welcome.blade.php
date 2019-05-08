<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>RepairServiceSystemProject</title>
       

          <!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="{{asset('/css/bodycolor.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--icon navbar-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
    </head>
    <body >

    <!-- navbar -->
<div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-info" >
           
                <a class="navbar-brand" href="{{ url('/') }}" style="color : #FFFFFF;"> <h3><i class="fa fa-home"></i></h3></a>

                @if (Auth::user()->roleCheck==0)
                <a class="navbar-brand" href="{{ url('/insert') }}" style="color : #FFFFFF;"> <i class="fa fa-wrench"> Repairing </i>  </a>
                <a class="navbar-brand" href="{{ url('/history') }}" style="color : #FFFFFF;"> <i class="fa fa-history" > History</i> </a>
                @include('modalCall/QR')


                @elseif (Auth::user()->roleCheck==1)
                <a class="navbar-brand" href="{{ url('/datarepair') }}" style="color : #FFFFFF;"><i class="fa fa-database"> Management</i></a>
                <a class="navbar-brand" href="{{ url('/Piechart') }}" style="color : #FFFFFF;"><i class="fas fa-chart-pie"> Chart</i>  </a>
                <a class="navbar-brand" href="{{ url('/stat') }}" style="color : #FFFFFF;"><i class="fa fa-table"> Stat </i> </a>
               
                @elseif (Auth::user()->roleCheck==2)
                <a class="navbar-brand" href="{{ url('/Role') }}" style="color : #FFFFFF;"><i class="fas fa-user-edit"> Management User</i></a>
                <a class="navbar-brand" href="{{ url('/Check') }}" style="color : #FFFFFF;"><i class="fa fa-database"> Management Data</i></a>
                 @endif
                
                <ul class="navbar-nav ml-auto">  <!-- mr ซ้าย-->
                  

                  @if (Auth::user()->roleCheck==0)
                    <li class="nav-item">
                          <a class="nav-link" href="{{url('/alertUser')}}" style="color : #FFFFFF;">
                          <i class="fa fa-bell"><span class="badge badge-danger" > @foreach($send as $row) {{$row->number}}</span></i>
                      </a>@endforeach
                      </li>
                      @endif
                  @if (Auth::user()->roleCheck==1 )
                      <li class="nav-item">
                          <a class="nav-link" href="{{url('/alertStatusone')}}" style="color : #FFFFFF;">
                          <i class="fa fa-bell"><span class="badge badge-danger" > @foreach($s1 as $row) {{$row->number}}</span></i>
                      </a>@endforeach
                      </li>
                    @endif
                    <li class="nav-item dropdown" style="color : #FFFFFF;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false" v-pre style="color : #FFFFFF;"> 
                                <i class="fa fa-fw fa-user" ></i> {{ Auth::user()->username}} </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" > 
                                    <a class="dropdown-item" href="{{url('/profile')}}" style="background-color: #63AED3"  >                  
                                        <p align="center">
                                        {{Auth::user()->name}}<br>
                                          <small>Member since
                                          {{date('M. Y',strtotime(Auth::user()->created_at))}}
                                          </small> </p>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <button  class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       <div align="right"> <i class="fas fa-sign-out-alt"></i> Sign out </div>
                                    </button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> 
                    </ul>
                </div>
        </nav>
</div>
<br>
    <!-- start home page -->
    <div class="container" >
      <div class="mySlides">
    <a href="#"><img src="{{('/image/q.jpg')}}" width="100%" ></a>
      </div>
      <div class="mySlides">
    <a href="#"><img src="{{('/image/w.jpg')}}" width="100%"></a>
      </div>
      <div class="mySlides">
    <a href="#"><img src="{{('/image/e.jpg')}}" width="100%"></a>
      </div>
    </div>
  </div>
  <!--
    @if (Auth::user()->roleCheck==0)
  <div class="container-fluid" >
      <div class="mySlides">
    <a href="{{url('/insert')}}"><img src="{{('/image/q.jpg')}}" width="100%" ></a>
      </div>
      <div class="mySlides">
    <a href="{{url('/history')}}"><img src="{{('/image/w.jpg')}}" width="100%"></a>
      </div>
    </div>
  </div>

  @elseif (Auth::user()->roleCheck==1)
  <div class="container-fluid" >
      <div class="mySlides">
    <a href="{{url('/datarepair')}}"><img src="{{('/image/7.jpg')}}" width="100%" ></a>
      </div>
      <div class="mySlides">
    <a href="{{url('/Piechart')}}"><img src="{{('/image/8.jpg')}}" width="100%"></a>
      </div>
    </div>
  </div>

  @elseif (Auth::user()->roleCheck==2)
  <div class="container-fluid" >
      <div class="mySlides">
    <a href="{{url('/Role')}}"><img src="{{('/image/6.jpg')}}" width="100%" ></a>
      </div>
      <div class="mySlides">
    <a href="{{url('/Check')}}"><img src="{{('/image/e.jpg')}}" width="100%"></a>
      </div>
    </div>
  </div>@endif -->

<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(0)"></span> 
  <span class="dot" onclick="currentSlide(1)"></span> 
</div>

<script>
var slideIndex = 0;
showSlides(slideIndex);
function currentSlide(n) {
  slideIndex = n;
}
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script> 
 <div class="container" >
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{('/image/6.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{('/image/7.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{('/image/8.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br>

<script>
$('#myCarousel').carousel({
		interval:2000
	});
</script>


<!-- Footer  -fluid-->
<div class="container">
<footer class="text-center" style=" background-color: #AFD0BF">

  <!-- Copyright -->
  <div class="col">
    <a> <h2>ระบบแจ้งซ่อมออนไลน์</h2>
ระบบแจ้งซ่อมออนไลน์ Web Application </a>
<div class="footer-copyright text-center py-3"><a href="{{url('/')}}">Copyright © ComputerRepair </a>
  </div>
  </div>
  <!-- Copyright -->

</footer>
</div>
<!-- Footer -->
    </body>
</html>

          