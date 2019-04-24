<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RepairServiceSystemProject</title>

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
<div class="container">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> 
            <div class="container">
            
                </a>
                @if (Auth::user()->roleCheck==0)
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-briefcase"></i>
                 User!Only
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/insert') }}"><i class="fa fa-pencil"></i> Insert Data Repair</a>
                  <a class="dropdown-item" href="{{ url('/history') }}"><i class="fa fa-list"></i> Check list</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
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
                  <a class="dropdown-item" href="{{ url('/datarepair') }}"><i class="fa fa-database"></i> Data repair</a>
                  <a class="dropdown-item" href="{{ url('/Piechart') }}"><i class="fa fa-area-chart"></i>  Piechart</a>
                  <a class="dropdown-item" href="{{ url('/Barchart') }}"><i class="fa fa-bar-chart"></i> Barchart</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/Barchart') }}">Something else here</a>
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
                  <a class="dropdown-item" href="#">Something else here</a>
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
</nav>


<br> 
<h3 align="center">Data repair</h3> <br>  

<div class="container">
@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div>
</div>
@endif

<div class="container" align="right">
		<a href="{{url('/mail')}}" class="btn btn-primary" >   Write Mail</a>
</div>
<div class="container">
@include('search/search')
</div>

<div class="container">
<table class="table table-bordered table-striped"> 
@if(isset($data))
<tr>
	<th>รหัสแจ้งซ่อม</th> 
	<th>รหัสผลิตภัณฑ์</th> 
	<th>อุปกรณ์/ปัญหาที่พบ</th>
	<th>เวลาแจ้งซ่อม/รับซ่อม</th>
	<th>สถานะการซ่อม</th>
	<th>Verify</th>
	<th>รายละเอียด</th>
</tr> 

@foreach($data as $row) <!-- ดึงข้อมูล data ใน MainDataRepaircontroller@index = $row -->
<tr>@if ($row['delete']==0)
	<td>{{$row['id']}}
		</td>  
	<td>{{$row['productCode']}}
		</td> 
	<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p>
		</td> <!--{$row->typeCheck->type_name -->
	<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
			@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
			@else {{date('d/M/Y',strtotime($row['updated_at']))}} 
			@endif</p>
		</td>
	<td>{{$row->statusCheckname->status}}
		</td>  <!-- อยู่ระหว่างการรอคิว --> <!--{{$row->statusCheckname->status}} -->
	<td> @include('modalCall/statusCheck',[
				'id'=>$row['id'],'problem'=>$row['problem'],
				'productCode'=>$row['productCode'],'created_at'=>$row['created_at'],
				'updated_at'=>$row['updated_at'],'name'=>$row->users->name,
				'status'=>$row->statusCheckname->status,'method'=>$row['method'],
				'repairman'=>$row['repairman'],'remark'=>$row['remark'],
				'emailUser'=>$row->users->email,'type_id'=>$row['type_id'],
				])
		</td>
	<td> @include('modalCall/detaill',[
				'id'=>$row['id'],'problem'=>$row['problem'],'productCode'=>$row['productCode'],
				'created_at'=>$row['created_at'],'updated_at'=>$row['updated_at'],
				'name'=>$row->users->name,'status'=>$row->statusCheckname->status,
				'method'=>$row['method'],'repairman'=>$row['repairman'],'remark'=>$row['remark']
				])
		</td> 
@endif <!-- endif ของ delteted== 0-->
</tr>
@endforeach 
</table>
</div>

<!-- For search-->
{{ $data->render()}}  <!-- รับ data สร้าง table สำหรับ search-->
@endif  <!-- if(isset($data)) -->
@if(isset($query))  <!-- check value search != null -->
<div class="container">
<table class="table table-bordered table-striped"> 
<tr>
	<th>รหัสแจ้งซ่อม</th> 
	<th>รหัสผลิตภัณฑ์</th> 
	<th>อุปกรณ์/ปัญหาที่พบ</th>
	<th>เวลาที่แจ้งซ่อม/รับซ่อม</th>
	<th>Verify</th> 
	<th>รายละเอียด</th>
</tr> 

@foreach($query as $row)
<tr>@if ($row['delete']==0)
<td>{{$row['id']}}
		</td> 
<td>{{$row['productCode']}}
		</td> 
<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p>
		</td>
<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> 
		</td> 
<td> @include('modalCall/statusCheck',[
			'id'=>$row['id'],'problem'=>$row['problem'],
			'productCode'=>$row['productCode'],'created_at'=>$row['created_at'],
			'updated_at'=>$row['updated_at'],'name'=>$row->users->name,
			'status'=>$row->statusCheckname->status,'method'=>$row['method'],
			'repairman'=>$row['repairman'],'remark'=>$row['remark'],
			'emailUser'=>$row->users->email,'type_id'=>$row['type_id'],
			])
		</td>
<td>
@include('modalCall/detaill',[
			'id'=>$row['id'],'problem'=>$row['problem'],'productCode'=>$row['productCode'],
			'created_at'=>$row['created_at'],'updated_at'=>$row['updated_at'],
			'name'=>$row->users->name,'status'=>$row->statusCheckname->status,
			'method'=>$row['method'],'repairman'=>$row['repairman'],'remark'=>$row['remark']
			])
</td>
@endif <!-- endif ของ delteted== 0-->
</tr>
@endforeach 
</table>
			@if($query) {{ $query->render()}}
			@endif
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
</div> 

<div class="container" align="right">
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>

    </body>
</html>

          