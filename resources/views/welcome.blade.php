<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- boostsrapc -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!--icon navbar-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
    </head>
    <body  background="{{('/image/x.jpg')}}">

    <!-- navbar -->
<nav class="navbar-fixed-top">
<div class="container-fluid">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> 
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"> <i class="fa fa-wrench"></i> Repair 
                
                </a>

                <a class="navbar-brand" href="#about"  > <i class="fas fa-info"></i>
                   About
                </a>

                <a class="navbar-brand" href="#contact"><i class="fa fa-fw fa-envelope"></i> 
                    Contact
                </a>

                @if (Auth::user()->roleCheck==0)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-briefcase"></i>
                 User!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/insert') }}">data</a>
                  <a class="dropdown-item" href="{{ url('/history') }}">Check list</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/user') }}">Something else here</a>
                </div>
              </li>
              </ul>

                @elseif (Auth::user()->roleCheck==1)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-briefcase"></i>
                 Maintenance!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/user') }}">Data repair</a>
                  <a class="dropdown-item" href="{{ url('/Piechart') }}">report</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/user') }}">Something else here</a>
                </div>
              </li>
              </ul>

                @elseif (Auth::user()->roleCheck==2)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-briefcase"></i>
                 Admin!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/Role') }}">RoleUser</a>
                  <a class="dropdown-item" href="{{ url('/Check') }}">Data repair</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/') }}">Something else here</a>
                </div>
              </li>
              </ul>@endif
              

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <i class="fa fa-fw fa-user"></i>
                                    {{ Auth::user()->username}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
                                    <a class="dropdown-item" href="{{url('/profile')}}" >
                                        {{ __('My Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
      </div>
</div>
</nav>
    <!-- start home page -->
    <div class="container-fluid" >
      <div class="mySlides">
    <a href="#"><img src="{{('/image/q.jpg')}}" width="100%" ></a>
      </div>
      <div class="mySlides">
    <a href="#"><img src="{{('/image/w.jpg')}}" width="100%"></a>
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
    <a href="{{url('/user')}}"><img src="{{('/image/7.jpg')}}" width="100%" ></a>
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
  <style>
  #about {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #contact {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  </style>

<div class="container-fluid">
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
  <section class="bg-primary" id="about">
    <div class="container">
      <h2 class="text-center text-uppercase">About</h2>
      <div class="row">
        <div class="col">
          <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
        </div>
        <div class="col">
          <p class="lead">Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
      </div>
    </div>
  </section>
</div>
<br>

<div class="container-fluid">
  <section class="bg-danger" id="contact">
    <div class="container">
      <h2 class="text-center text-uppercase">contact</h2>
      <div class="row">
        <div class="col">
          <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
        </div>
        <div class="col">
          <p class="lead">Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
        </div>
      </div>
    </div>
  </section>
</div>
<br>

<!-- carousel -->
<div class="container-fluid">
            <!-- Carousel
            ================================================== -->
          <div id="myCarousel" class="carousel slide">        
            <div class="carousel-inner">           
                    <div class="item active"> 
                    	<a href="#"><img src="{{('/image/6.jpg')}}" class="thumbnail" width="100%"></a>
                          <div class="carousel-caption d-none d-md-block">
                       	  <h4>kuyyyyyyyyyyyyyyyyyyyyyyyyyy</h4>
                          <p>kuyyyyyyyyyyyyyyyyyyyyyyyyyy</p>
                        </div>
                     </div>

                    <div class="item"> 
                    <a href="#"><img src="{{('/image/7.jpg')}}" class="thumbnail" width="100%"></a>
                        <div class="carousel-caption d-none d-md-block">
                        <h4>kuyyyyyyyyyyyyyyyyyyyyyyyyyy</h4>
                        <p>kuyyyyyyyyyyyyyyyyyyyyyyyyyy</p>
                        </div>                                                   
                    </div>  
                    <div class="item"> 
                    <a href="#"><img src="{{('/image/8.jpg')}}" class="thumbnail" width="100%"></a>
                      <div class="carousel-caption d-none d-md-block">
                      <h4>kuyyyyyyyyyyyyyyyyyyyyyyyyyy</h4>
                      <p>kuyyyyyyyyyyyyyyyyyyyyyyyyyy</p>
                     </div>                                                                                   
                   </div>
                 <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>     
            </div>                                                            
          </div><!-- End Carousel -->  
</div>

<script>
$('#myCarousel').carousel({
		interval:   2000
	});
</script>


<!-- Footer -->
<div class="container-fluid">
<footer class="jumbotron text-center" style="margin-bottom:0">

  <!-- Copyright -->
  <div class="col">
    <a> มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน | แผนที่และแผนผังวิทยาเขต | ผู้ดูแลระบบ : rdipwp@ku.ac.th
เลขที่ 1 หมู่ 6 ต.กำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140
โทรศัพท์ : 0 3434 1550-3 หรือ 0 2942 8003-19
กองบริหารวิชาการและนิสิต 0 3434 1545-7 Fax 0 3435 1395 line id @vvp8070s เพิ่มเพื่อน
แจ้งเหตุฉุกเฉิน โทร 0 3435 1151 ภายใน 3191 </a>
<div class="footer-copyright text-center py-3"><a href="{{url('/')}}">Copyright © Kasetsart University Kamphaeng Saen Campus </a>
  </div>
  </div>
  <!-- Copyright -->

</footer>
</div>
<!-- Footer -->
    </body>
</html>

          