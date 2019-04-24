@extends('layouts.navbar') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br> 
<h3 align="center">Table management</h3> <br />  

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif


<table class="table table-bordered table-striped"> 

<tr>
<th>รหัสแจ้งซ่อม</th> 
<th>รหัสผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหาที่พบ</th>
<th>เวลาแจ้ง/รับซ่อม</th>
<th>สถานะการซ่อม</th>
<th>Detaill/Delete</th>
</tr> 

@foreach($admin as $row) <!-- ดึงข้อมูล data ใน datacontroller@index = $row -->
<tr>@if ($row['delete']==0)
<td>{{$row['id']}}</td> 
<td>{{$row['productCode']}}</td> 
<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> 
<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
    <p style="color:red;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
<td>{{$row->statusCheckname->status}}</td>
<td>
@include('modalCall/adminDetaill')@include('modalCall/adminDel')
</td>
@endif
</tr>
@endforeach 
</table>

</div> 
</div>
<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
@stop