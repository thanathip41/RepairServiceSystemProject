<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Service Repair  </title>
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.iconfinder.com/data/icons/benefits-flat/125/flaticon_settings-512.png">

  <!--bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.css" rel="stylesheet">
  <link href="{{asset('/navside/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('home/css/creative.css')}}" rel="stylesheet">

</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
<div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger text-uppercase" href="{{url('/')}}" style=" margin-left: 10%;">Computer Service Repair</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
        @if (Auth::user()->role_id==0)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/insert') }}"><i class="fa fa-wrench"></i> แจ้งซ่อม</a>
          </li>
        
          @foreach($s3 as $row)
          @if ($row->number==0)
          <li class="nav-item">
          <a class="nav-link">
          <i class="fa fa-bell"></i> <span class="badge badge-secondary"  style="vertical-align: top;border-radius: 50%;float:right;"> {{$row->number}} </span>
        </a>
          @else
        <li class="nav-item dropdown">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bell"></i><span class="badge badge-danger"  style="vertical-align:top;border-radius: 50%; float:right;"> {{$row->number}}  </span>
        </a>
        @endif
        @endforeach
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <h5 class="dropdown-header"><b>การแจ้งเตือน</b></h5>
        <div class="dropdown-divider" style="border-color:black;"></div>
        @foreach($noti as $row)
        @if ($row['img']=='')
        <small><a class="dropdown-item" href="{{ url('/accept') }}" > 
        <img src="{{asset('storage').'/'.$row->repairname->img}}"  style="border-radius: 50%;width:40px; height:40px;"/>
        
        <small> <b> {{$row->repairname->name}} ได้แจ้งเตือนถึงคุณ </b> <img src="{{asset('image/Qm.jpg')}}"style="border-radius: 50%;width:40px; height:40px;"> </small>
        <br/> <small style="margin-left: 25%"> {{$row->productCode}} ดำเนินการเสร็จสิ้น </small>
        </a> </small>  <div class="dropdown-divider" style="border-color:black;"></div>
        @else 
        <small><a class="dropdown-item" href="{{ url('/accept') }}" > 
        <img src="{{asset('storage').'/'.$row->repairname->img}}"  style="border-radius: 50%;width:40px; height:40px;"/>
        
        <small> <b> {{$row->repairname->name}} ได้แจ้งเตือนถึงคุณ </b> <img src="{{asset('storage').'/'.$row['img']}}"  style="border-radius: 50%;width:40px; height:40px;"> </small>
        <br/> <small style="margin-left: 25%"> {{$row->productCode}} ดำเนินการเสร็จสิ้น </small>
        </a> </small>  <div class="dropdown-divider" style="border-color:black;"></div>
        @endif
        @endforeach
        </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link scrollable-menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-history"></i> ประวัติการใช้งาน
        </a>
        <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
        <a href="{{'/history'}}" style="color:blue;float:right;font-size: 13px;"> <small> แสดงทั้งหมด</small></a>
        <div class="dropdown-header"><b>ประวัติแจ้งซ่อม</b></div>
        <div class="dropdown-divider" style="border-color:black;"></div>
        @foreach($notihistory as $row)
        <small><a class="dropdown-item" href="{{action('UserInsertRepairController@process',$row['id'])}}"> 
        {{$row->id}}  &nbsp;&nbsp; 
        @if ($row['img']=='')
        <img src="{{asset('image/Qm.jpg')}}"  style="border-radius: 50%;width:40px; height:40px;"> 
        <div class="text-left"> <small>{{$row->productCode}} ({{$row->typeCheck->device_id}})</small></div>
        </a> </small>  <div class="dropdown-divider" style="border-color:black;"></div>

        @else 
        <img src="{{asset('storage').'/'.$row['img']}}"  style="border-radius: 50%;width:40px; height:40px;"> 
         <div class="text-left"> <small>{{$row->productCode}} ({{$row->typeCheck->device_id}})</small></div>
        </a> </small>  <div class="dropdown-divider" style="border-color:black;"></div>
        @endif
        @endforeach
        <footer class="text-center" style="background-color: #63AED3">
        <a href="{{'/history'}}" style="color:blue;">แสดงทั้งหมด</a>
        </footer>
        </div>
        </li>
        
          
          @elseif (Auth::user()->role_id==1)
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/datarepair') }}"><i class="fa fa-wrench"></i> จัดการข้อมูลแจ้งซ่อม</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/mail') }}"><i class="fa fa-envelope"></i> ส่ง E-mail</a>
          </li>
          @elseif (Auth::user()->role_id==2)
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-database"></i> จัดการข้อมูลแจ้งซ่อม
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"href="{{ url('/Check') }}"><i class="fa fa-wrench"></i> จัดการข้อมูลแจ้งซ่อม</a>
          <a class="dropdown-item" href="{{ url('/restoreData') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลแจ้งซ่อม</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users"></i>  จัดการข้อมูลผู้ใช้
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/Role') }}"><i class="fas fa-user"></i> จัดการข้อมูลผู้ใช้</a>
          <a class="dropdown-item"href="{{ url('/restoreUser') }}"><i class="fas fa-trash-restore"></i> กู้ข้อมูลผู้ใช้</a>   
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-file"></i> รายงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/Piechart') }}"><i class="fas fa-chart-pie"></i>  กราฟ</a>
          <a class="dropdown-item" href="{{ url('/stat') }}"><i class="fas fa-fw fa-chart-area"></i> สถิติ</a> 
        </div>
      </li>
          @endif
          
        <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link dropdown" href="#" data-toggle="dropdown" 
              style="color : #FFFFFF;"> 
               @if (Auth::user()->img=="") 
                 <img src="{{('/image/user.png')}}" 
                  style="width:45px; height:45px; float:left;border-radius: 50%;margin-left:5px;"></a> 
              @else
                  <img src="{{asset('storage').'/'.Auth::user()->img}}" 
                   style="width:45px; height:45px; float:left;border-radius: 50%;margin-left:5px;"></a> 
              @endif
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" > 
                   <a class="dropdown-item" href="{{url('/profile')}}" style="background-color: #63AED3"  >                  
                     <div align="center">
                        {{Auth::user()->name}}<br>
                           @if (Auth::user()->role_id==2) 
                       <small>  Admin since  
                        {{date('M. Y',strtotime(Auth::user()->created_at))}}
                        <br><i class="fa fa-circle text-success"></i> กำลังใช้งาน
                       </small> 
                          @else 
                            <small>   Member since
                              {{date('M. Y',strtotime(Auth::user()->created_at))}}
                              <br> <i class="fa fa-circle text-success"></i> กำลังใช้งาน
                            </small> 
                           @endif
                      </div>
            </a>
                 <div class="dropdown-divider"></div>
                    <button  class="dropdown-item"  href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      <div align="right"> <h6><i class="fas fa-sign-out-alt"></i> Sign out</h6>  </div>
                    </button>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                      </form>
                </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text text-white font-weight-bold">Computer Service</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">
          ระบบแจ้งซ่อม สำหรับพนักงานในบริษัท สามารถติดตามสถานะงานซ่อมลำดับคิวที่ซ่อม ลำดับคิวทั้งหมด 
          ประวัติการซ่อม การแจ้งเตือนผ่าน E-mail และการแก้ไขปัญหาเบื้องต้นกับแชทบอท ฯลฯ
          </p>
          @if (Auth::user()->role_id==0)
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/insert')}}"> <i class="fa fa-wrench"></i> แจ้งซ่อมที่นี่</a>
         
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#"  
          data-toggle="modal" data-target="#QR"><i class="fa fa-robot"></i> แชทบอท</a>
          @include('user/modalUser/QR')
       
          @elseif (Auth::user()->role_id==1)
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/datarepair')}}">จัดข้อมูลแจ้งซ่อม</a>
          @elseif (Auth::user()->role_id==2)
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{url('/Check')}}">จัดการข้อมูล</a>
          @endif
        </div>
      </div>
    </div>
  </header>
  <footer class="bg-dark py-5">
    <div class="container">
      <h5><div class="small text-center text-muted">Copyright &copy; 2019 - Computer Service</div></h5>
    </div>
  </footer>
</body>

</html>
