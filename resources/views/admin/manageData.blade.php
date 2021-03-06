@extends('layouts.navside') 
@section('title','Home')
@section('content')
<div class="container">
<h3 align="center">ข้อมูลการแจ้งซ่อม</h3> <br />  

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif
@if(count($errors) > 0) 
      <div class="alert alert-danger"> 
        <ul> @foreach($errors->all() as $error) 
          <li>{{$error}}</li> 
           @endforeach 
            </ul> 
             </div> 
             @endif 
<div class="container" align="center">
@include('admin/search/searchData')
</div> 

<table class="table table-bordered table-striped"> 
@if(isset($admin))
<tr>
<th>รหัสแจ้งซ่อม/ผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหาที่พบ</th>
<th>เวลาแจ้ง/รับซ่อม</th>
<th>สถานะการซ่อม</th>
<th>ลบข้อมูล</th>
<th>รายละเอียด</th>
</tr> 

@foreach($admin as $row) 
<tr>
<td>{{$row['id']}} <br> <p style="color:blue;"> {{$row['productCode']}}</td>  
<td>{{$row->typeCheck->device_id}}  <br> <p style="color:red;">{{$row['problem']}}</p></td> 
<td>{{date('d/M/Y',strtotime($row['created_at']))}} <br> 
    <p style="color:green;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
<td>{{$row->statusCheckname->status_id}} </td>
<td> @include('admin/modalAdmin/adminDelData')</td>
<td> <a class="btn btn-secondary" href="{{action('AdminDataRepairController@process',$row['id'])}}"><i class="fas fa-eye"></i> </a></td>
</tr>
@endforeach 
</table>
{{$admin->links()}}
</div> 
@endif

@if(isset($query))  
<div class="container">
		<table class="table table-bordered table-striped"> 
	<tr>
    <th>รหัสแจ้งซ่อม/ผลิตภัณฑ์</th> 
    <th>อุปกรณ์/ปัญหาที่พบ</th>
    <th>เวลาแจ้ง/รับซ่อม</th>
    <th>สถานะการซ่อม</th>
    <th>ลบข้อมูล</th>
    <th>รายละเอียด</th>
  </tr> 
		@foreach($query as $row)
    <tr>
        <td>{{$row['id']}} <br> <p style="color:blue;"> {{$row['productCode']}}</td>  
        <td>{{$row->typeCheck->device_id}}  <br> <p style="color:red;">{{$row['problem']}}</p></td> 
        <td>{{date('d/M/Y',strtotime($row['created_at']))}} <br> 
            <p style="color:green;">
            @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
            @else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
        <td>{{$row->statusCheckname->status_id}} </td>
        <td> @include('admin/modalAdmin/adminDelData')</td>
        <td><a href="{{action('AdminDataRepairController@process',$row['id'])}}">รายละเอียด</a></td>
    </tr>
		@endforeach 
		</table>
					@if($query) {{ $query->links()}}
					@endif
					@elseif(isset($message))
					<p>{{ $message }}</p>
@endif
</div> 
@stop