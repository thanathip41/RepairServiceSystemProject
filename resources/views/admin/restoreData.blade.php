@extends('layouts.navside') 
@section('title','Home')
@section('content')
<div class="container">
<h3 align="center">ข้อมูลการแจ้งซ่อมที่ถูกลบ</h3> <br />  

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


<table class="table table-bordered table-striped"> 

<tr>
<th>รหัสแจ้งซ่อม/ผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหาที่พบ</th>
<th>เวลาแจ้ง/รับซ่อม</th>
<th>สถานะการซ่อม</th>
<th>รายละเอียด</th>
<th>กู้ข้อมูล</th>
</tr> 

@foreach($admin as $row) <!-- ดึงข้อมูล data ใน datacontroller@index = $row -->
<tr>
<td>{{$row['id']}} <br> <p style="color:blue;"> {{$row['productCode']}}</td>  
<td>{{$row->typeCheck->type_name}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> 
<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
    <p style="color:red;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
<td>{{$row->statusCheckname->status}}</td>
<td><a href="{{action('AdminDataRepairController@process',$row['id'])}}">รายละเอียด</a></td>
<td> @include('admin/modalAdmin/adminDelData')</td>
</tr>
@endforeach 
</table>
{{$admin->links()}}
</div> 
</div>
@stop