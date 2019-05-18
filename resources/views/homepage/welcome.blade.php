<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Freelancer - Start Bootstrap Theme</title>

 <!--bootstrap 4-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

  <!-- Custom styles for this template -->
  <link href="{{asset('home/css/freelancer.css')}}" rel="stylesheet">
  <link href="{{asset('/navside/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary  " id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Service Repair</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        @if (Auth::user()->roleCheck==0)
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/insert') }}"><i class="fa fa-wrench"></i>แจ้งซ้อม</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/history') }}"><i class="fa fa-history"></i>ประวัติการใช้งาน</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
          @include('modalCall/QR')
          </li>
          @elseif (Auth::user()->roleCheck==1)
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/datarepair') }}"><i class="fa fa-wrench"></i> จัดการข้อมูล</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/Piechart') }}"><i class="fas fa-chart-pie"></i>  กราฟแจ้งซ่อม</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/stat') }}"><i class="fas fa-fw fa-chart-area"></i> สถิติแจ้งซ่อม</a>
          </li>
          @elseif (Auth::user()->roleCheck==2)
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/Check') }}"><i class="fa fa-wrench"></i> จัดการข้อมูลข้อมูล</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/Role') }}"><i class="fas fa-users"></i> จัดการข้อมูลผู้ใช้</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/restoreData') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลแจ้งซ่อม</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ url('/restoreUser') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลผู้ใช้</a>
          </li>
          @endif
          <li class="nav-item dropdown mx-0 mx-lg-1">
           <a id="navbarDropdown" class="nav-link dropdown-toggle py-3 px-0 px-lg-3" href="#" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false" v-pre style="color : #FFFFFF;"> 
                                <i class="fa fa-fw fa-user" ></i> {{ Auth::user()->username}} </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" > 
                                    <a class="dropdown-item" href="{{url('/profile')}}" style="background-color: #63AED3"  >                  
                                        <p align="center">
                                        {{Auth::user()->name}}<br>
                                          <small>Member since
                                          {{date('M. Y',strtotime(Auth::user()->created_at))}}
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{('/image/e.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{('/image/w.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{('/image/q.jpg')}}" alt="Third slide">
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


<script>
$('#myCarousel').carousel({
		interval:2000
	});
</script>
<section id="contact">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      
        
        <div class="col-md-12">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, open source Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>


</body>

</html>
