<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Service repair</title>

 <!--bootstrap 4-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

  <!-- Custom styles for this template -->
  <link href="{{asset('home/css/freelancer.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{asset('/navside/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-primary " id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#" >Service Repair</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        @if (Auth::user()->roleCheck==0)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/insert') }}"><i class="fa fa-wrench"></i> แจ้งซ้อม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url('/history') }}"><i class="fa fa-history"></i> ประวัติการใช้งาน</a>
          </li>
          <li class="nav-item">
          @include('modalCall/QR')
          </li>
          <li class="nav-item">
            <a class="nav-link" 
            href="{{ url('/alertUser') }}"><i class="fa fa-bell"></i>
            <span class="badge badge-danger">@foreach($s3 as $row) {{$row->number}} @endforeach</span></a>
          </li>
       
          @elseif (Auth::user()->roleCheck==1)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/datarepair') }}"><i class="fa fa-wrench"></i> จัดการข้อมูล</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/mail') }}"><i class="fa fa-envelope"></i> ส่งE-mail</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/Piechart') }}"><i class="fas fa-chart-pie"></i>  กราฟแจ้งซ่อม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/stat') }}"><i class="fas fa-fw fa-chart-area"></i> สถิติแจ้งซ่อม</a>
          </li>
          @elseif (Auth::user()->roleCheck==2)
          <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-database"></i> จัดการข้อมูล
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"href="{{ url('/Check') }}"><i class="fa fa-wrench"></i> จัดการข้อมูลข้อมูล</a>
          <a class="dropdown-item" href="{{ url('/Role') }}"><i class="fas fa-users"></i> จัดการข้อมูลผู้ใช้</a>
        </div>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-trash-restore"></i>  กู้ข้อมูล
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"href="{{ url('/restoreUser') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลผู้ใช้</a>
          <a class="dropdown-item" href="{{ url('/restoreData') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลแจ้งซ่อม</a>
        </div>
      </li>
          @endif
          <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false" v-pre style="color : #FFFFFF;"> 
                                @if (Auth::user()->img=="") 
                                    <img src="{{('/image/user.png')}}" 
                                    style="width:45px; height:45px; float:left;border-radius: 50%;margin-left:5px;"></a> 
                                    @else
                                    <img src="{{asset('storage').'/'.Auth::user()->img}}" 
                                    style="width:45px; height:45px; float:left;border-radius: 50%;margin-left:5px;"></a> 
                                    @endif

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

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      
        
        <div class="col-md-12">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, open source Bootstrap theme created by
           
        </div>
      </div>
    </div>
  </footer>
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Computer Service Repair</small>
    </div>
  </div>
</body>

</html>
