@extends('layouts.navside') 
@section('title','Home')
@section('content')
<div class="container">
<h3 align="center"> Management Data </h3> <br /> 

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
<th>ชื่อ-นามสกุล</th>
<th>แผนก</th> 
<th>อีเมล</th>
<th>สถานะ</th>
<th>จัดการผู้ใข้งาน</th>


</tr> 
@foreach($users as $row) 
<tr>
    <td>{{$row['name']}}</td> 
		<td>{{$row->departCheck->department}}</td>
    <td>{{$row['email']}}</td>
		<td> {{$row->adminChecktest->role}}</td>
    <td> @include('modalCall/adminAdd') @include('modalCall/adminDelUser')</td>

	
</tr>
@endforeach
</table>
{{$users->links()}}
</div> 
@stop
