@extends('layouts.navbar') 
@section('content')
<br> 
<br> 
<br> 
		<div class="container">
				@if(\Session::has('success')) 
        <div class="alert alert-success"> 
        <p>{{ \Session::get('success') }}</p> 
        </div>  @endif 
		</div>

<div class="container" >
@include('modalCall/sendmail')
</div>
<br>
<div class="container" align="center">
@include('search/search')
</div>

<div class="container">
	<table class="table table-bordered table-striped"> 
			<tr>
				<th>รหัสแจ้งซ่อม</th> 
				<th>รหัสผลิตภัณฑ์</th> 
				<th>อุปกรณ์/ปัญหาที่พบ</th>
				<th>เวลาแจ้งซ่อม/รับซ่อม</th>
				<th>สถานะ</th>
				<th>ยืนยัน</th>
				<th>รายละเอียด</th>
			</tr> 
				@foreach($data as $row) 
			<tr>@if ($row['delete']==0 && $row['statusCheck']==6)
				<td>{{$row['id']}}</td>  
				<td>{{$row['productCode']}}</td> 
				<td>{{$row->typeCheck->type_name}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> 
				<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
						@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
						@else {{date('d/M/Y',strtotime($row['updated_at']))}}@endif</p></td>
				<td>{{$row->statusCheckname->status}}</td>  
				<td>@include('modalCall/statusCheck')</td>
				<td>@include('modalCall/detaill')</td> 
					@endif 
				</tr>
					@endforeach 
		</table>
</div>
@stop