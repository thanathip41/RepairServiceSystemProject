@extends('layouts.nav') 
@section('content')

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

<div class="container" align="right">
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
@stop