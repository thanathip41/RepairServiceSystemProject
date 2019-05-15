@extends('layouts.side') 
@section('content')
<br>
		<div class="container">
				@if(\Session::has('success')) 
        <div class="alert alert-success"> 
        <p>{{ \Session::get('success') }}</p> 
        </div>  @endif 
		</div>
		@if(count($errors) > 0) 
      <div class="alert alert-danger"> 
        <ul> @foreach($errors->all() as $error) 
          <li>{{$error}}</li> 
           @endforeach 
            </ul> 
             </div> 
             @endif 

 <div class="container">
<p class="text-right">
@include('modalCall/sendmail')
</p>
</div> 
<div class="container" align="center">
@include('search/search')
</div> 
<div class="container">
	<table class="table table-bordered table-striped"> 
		@if(isset($datarepair))
			<tr>
				<th>รหัสแจ้งซ่อม/ผลิตภัณฑ์</th> 
				<th>อุปกรณ์/ปัญหาที่พบ</th>
				<th>เวลาแจ้งซ่อม/รับซ่อม</th>
				<th>สถานะ</th>
				<th>ยืนยัน</th>
	
				<th>รายละเอียด</th>
			</tr> 
				@foreach($datarepair  as $row) 
			<tr>@if ($row['delete']==0)
				<td>{{$row['id']}} <br> <p style="color:red;"> {{$row['productCode']}}</td>  

				<td>{{$row->typeCheck->type_name}}  <br> <p style="color:red;">{{$row['problem']}}</p></td> 
				<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
						@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
						@else {{date('d/M/Y',strtotime($row['updated_at']))}}@endif</p></td>
				<td>{{$row->statusCheckname->status}}</td>  
				<td>@include('modalCall/statusCheck')</td>
				<!-- <td> @if ($row['img']=="")
				<a  href="#" >
          <img src="#" width="100" height="50"></a>
          @else
          <a  target="_blank" href="{{asset('storage').'/'.$row['img']}}" >
          <img src="{{asset('storage').'/'.$row['img']}}" width="100" height="50"></a></td>
          @endif -->
				<td><a href="{{action('MainStatusRepairController@process',$row['id'])}}">รายละเอียด</a></td> 
				</tr>
				@endif
					@endforeach 
		</table>
	{{$datarepair->links()}}
</div>
@endif 

@if(isset($query))  

<div class="container">
		<table class="table table-bordered table-striped"> 
		<tr>
				<th>รหัสแจ้งซ่อม/ผลิตภัณฑ์</th> 
				<th>อุปกรณ์/ปัญหาที่พบ</th>
				<th>เวลาแจ้งซ่อม/รับซ่อม</th>
				<th>สถานะ</th>
				<th>ยืนยัน</th>
				<th>รายละเอียด</th>
		
		</tr> 

		@foreach($query as $row)
		<tr>@if ($row['delete']==0)
				<td>{{$row['id']}} <br> <p style="color:red;"> {{$row['productCode']}}</td>  

				<td>{{$row->typeCheck->type_name}}  <br> <p style="color:red;">{{$row['problem']}}</p></td> 
				<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> <p style="color:red;">
						@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
						@else {{date('d/M/Y',strtotime($row['updated_at']))}}@endif</p></td>
				<td>{{$row->statusCheckname->status}}</td>  
				<td>@include('modalCall/statusCheck')</td>
				<td><a href="{{action('MainStatusRepairController@process',$row['id'])}}">รายละเอียด</a></td> 
				</tr>
		@endif
		@endforeach 
		</table>
					@if($query) {{ $query->links()}}
					@endif
					@elseif(isset($message))
					<p>{{ $message }}</p>
@endif
</div> 
@stop