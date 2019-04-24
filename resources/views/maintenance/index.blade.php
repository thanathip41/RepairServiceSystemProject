@extends('layouts.navbar') 
@section('content')

<br> 
		<div class="container">
				@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
        <div class="alert alert-success"> 
        <p>{{ \Session::get('success') }}</p> 
        </div>  @endif 
		</div>

<div class="container">
@foreach($s1 as $row)
  <a class="d-inline p-2 bg-primary text-white" >รอคิวแจ้งซ่อม <span class="badge badge-danger"> {{$row->number}}</span></a>&nbsp;&nbsp;
		@endforeach
@foreach($s2 as $row)
  <a class="d-inline p-2 bg-primary text-white" >อยู่ระหว่างการดำเนินการ<span class="badge badge-danger"> {{$row->number}}</span></a>&nbsp;&nbsp;
		@endforeach
@foreach($s3 as $row)
  <a class="d-inline p-2 bg-primary text-white" >รอยืนยันจากผู้แจ้งซ่อม <span class="badge badge-danger"> {{$row->number}}</span></a>&nbsp;&nbsp;
		@endforeach
@foreach($s4 as $row)
  <a class="d-inline p-2 bg-primary text-white" >การดำเนินการเสร็จสิ้น <span class="badge badge-danger"> {{$row->number}}</span></a>&nbsp;&nbsp;
		@endforeach
@foreach($s5 as $row)
  <a class="d-inline p-2 bg-primary text-white" >การดำเนินการไม่สมบูรณ์ <span class="badge badge-danger"> {{$row->number}}</span></a>&nbsp;&nbsp;
		@endforeach
@foreach($sAll as $row)
  <a class="d-inline p-2 bg-primary text-white" >ข้อมูลในระบบ <span class="badge badge-danger"> {{$row->number}}</span></a>&nbsp;&nbsp;
		@endforeach
</div>
<br>


<div class="container" >
@include('modalCall/sendmail')
</div>
<br>
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
				@foreach($data as $row) <!-- ดึงข้อมูล data ใน MainDataRepaircontroller@index = row -->
			<tr>@if ($row['delete']==0)
				<td>{{$row['id']}}</td>  
				<td>{{$row['productCode']}}</td> 
				<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> <!--row->typeCheck->type_name -->
				<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
						@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
						@else {{date('d/M/Y',strtotime($row['updated_at']))}}@endif</p></td>
				<td>{{$row->statusCheckname->status}}</td>  
				<td> @include('modalCall/statusCheck')</td>
				<td> @include('modalCall/detaill')	</td> 
					@endif <!-- endif ของ delteted== 0-->
				</tr>
					@endforeach 
		</table>
</div>

<!-- For search-->
{{ $data->render()}}  <!-- รับ data สร้าง table สำหรับ search-->
@endif  <!-- if isset data -->
@if(isset($query))  <!-- check value search != null -->
<div class="container">
		<table class="table table-bordered table-striped"> 
		<tr>
			<th>รหัสแจ้งซ่อม</th> 
			<th>รหัสผลิตภัณฑ์</th> 
			<th>อุปกรณ์/ปัญหาที่พบ</th>
			<th>เวลาที่แจ้งซ่อม/รับซ่อม</th>
			<th>สถานะการซ่อม</th>
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
					'method'=>$row['method'],'repairman'=>$row['repairman'],'remark'=>$row['remark'],
					'department'=>$row->users->department
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
@stop