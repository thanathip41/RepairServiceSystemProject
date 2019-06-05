@extends('layouts.navside') 
@section('title','Home')
@section('content')
<div class="container">
<h3 align="center"> ข้อมูลผู้ใช้ </h3> <br /> 

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

<th>รหัสผู้ใช้</th>
<th>ชื่อ-นามสกุล /แผนก</th>
<th>E-mail</th>
<th>เวลาเริ่มใช้ /เลิกใช้</th>
<th>สถานะในระบบ</th>
<th>จัดการผู้ใข้งาน</th>


</tr> 
@foreach($users as $row) 
<tr>
		<td>{{$row['id']}}</td>
    <td>{{$row['name']}} <br> <div style="color:blue;">{{$row->departCheck->department}} </div></td> 
    <td>{{$row['email']}}</td>
    <td>{{date('d/M/Y',strtotime($row['created_at']))}} <br> <div style="color:red;"> 
    @if ($row['roleCheck']==3) 
    {{date('d/M/Y',strtotime($row['updated_at']))}} </div>
		@else <div style="color:green;">	ใช้งานในระบบ </div>		@endif</td>
		<td> {{$row->userCheck->roleCheck}}</td>
    <td> @include('admin/modalAdmin/adminAddUser') @include('admin/modalAdmin/adminDelUser')</td>

</tr>
@endforeach
</table>
{{$users->links()}}
</div> 
@stop
