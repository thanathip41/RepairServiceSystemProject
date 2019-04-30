@extends('layouts.navbar') 
@section('content')

<br> 
		<div class="container">
				@if(\Session::has('success')) 
        <div class="alert alert-success"> 
        <p>{{ \Session::get('success') }}</p> 
        </div>  @endif 
		</div>

<div class="container" >
<p class="text-right">
@include('modalCall/sendmail')
</p>
</div>
<br>
<div class="container" align="center">
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
				<th>สถานะ</th>
				<th>ยืนยัน</th>
				<th>รายละเอียด</th>
			</tr> 
				@foreach($data as $row) 
			<tr>@if ($row['delete']==0)
				<td>{{$row['id']}}</td>  
				<td>{{$row['productCode']}}</td> 
				<td>{{$row->typeCheck->type_name}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> 
				<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
						@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
						@else {{date('d/M/Y',strtotime($row['updated_at']))}}@endif</p></td>
				<td>{{$row->statusCheckname->status}}</td>  
				<td>@include('modalCall/statusCheck')</td>
				<td><a href="{{action('MainStatusRepairController@process',$row['id'])}}">รายละเอียด</a></td>
					@endif 
				</tr>
					@endforeach 
		</table>
	{{$data->links()}}
</div>
@endif 
@if(isset($query))  

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
		<td>{{$row->typeCheck->type_name}} : <br> <p style="color:red;">{{$row['problem']}}</p>
				</td>
		<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
				@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
				@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> 
				<td>{{$row->statusCheckname->status}}</td>  
				<td>@include('modalCall/statusCheck')</td>
				<td><a href="{{action('MainStatusRepairController@process',$row['id'])}}">รายละเอียด</a></td>
				
		@endif 
		</tr>
		@endforeach 
		</table>
					@if($query) {{ $query->render()}}
					@endif
					@elseif(isset($message))
					<p>{{ $message }}</p>
					@endif
</div> 
@stop