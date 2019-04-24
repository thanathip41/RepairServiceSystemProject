@extends('layouts.navbar') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br>
<h3 align="center"> Management Data </h3> <br /> 

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif

<table class="table table-bordered table-striped"> 
<tr>
<th>Name</th>
<th>Department</th> 
<th>E-mail</th>
<th>Role</th>
<th>Addmaintenance</th>
<th>Deleted</th>

</tr> 
@foreach($users as $row) 
<tr>@if ($row['roleCheck']!=2)
    <td>{{$row['name']}}</td> 
		<td>{{$row['department']}}</td>
    <td>{{$row['email']}}</td>
		<td> {{$row->adminChecktest->role}}</td>
    <td> @include('modalCall/adminAdd')</td>
		<td>@include('modalCall/adminDelUser')</td>
</tr>@endif
@endforeach
</table> 
<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
</div>
</div> 
@stop
