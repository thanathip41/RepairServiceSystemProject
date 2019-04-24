<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <!--boostap4 -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--icon navbar-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Repair Service </div>
      <div class="list-group list-group-flush">
        <a href="{{url('/')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <i class="fa fa-fw fa-user"></i>
               {{ Auth::user()->username}}</a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/profile')}}" >My Profile </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-signout"></i> Logout</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                             </form>
                     </div>
              </li>
          </ul>
        </div>
      </nav> 

      <div class="container-fluid">
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
	</td>  <!-- {{$row->users->email}} -->
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
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
