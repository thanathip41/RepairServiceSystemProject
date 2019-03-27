@extends('registration.master') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
<div class="row"> 
<div class="col-md-12"> <br /> 
<h3 align="center">สมัครข้อมูล</h3> <br/> 

@if(count($errors) > 0) 
<div class="alert alert-danger"> 
<ul> @foreach($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach 
</ul> 
</div> 
@endif 

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif 


<form method="post" action="{{url('registration')}}"> {{csrf_field()}} 
<div class="form-group"> 
<input type="text" name="name" class="form-control" placeholder="ป้อนชื่อ" />
</div> 
<div class="form-group"> 
<input type="text" name="email" class="form-control" placeholder="e-mail" /> 
</div> 
<div class="form-group"> 
<input type="password" class="form-control"  name="password" placeholder="password">
</div> 
<div class="form-group"> 
<input type="submit" class="btn btn-primary" value="บันทึก"/> 
</div> 
</form> 
</div> 
</div> 
</div>
@endsection
