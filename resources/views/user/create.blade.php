@extends('user.master') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
<div class="row"> 
<div class="col-md-12"> <br /> 
<h3 align="center">เพิ่มข้อมูล</h3> <br/> 

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
<p>{{ \Session::get('user') }}</p> 
</div> 
@endif 


<form method="post" action="{{url('user')}}">{{csrf_field()}} 
<div class="form-group"> 
<input type="text" name="productCode" class="form-control" placeholder="รหัสผลิตภัณฑ์" />
</div> 
<div class="form-group"> 
<input type="text" name="problem" class="form-control" placeholder="สาเหตุ/ปัญหาที่พบ" /> 
</div>
 
<label>ประเภท</label>
      <select class="form-control" name="typename">
          <option value="จอภาพ">จอภาพ</option>
          <option value="คีย์บอร์ด">คีย์บอร์ด</option>
          <option value="เมาส์">เมาส์</option>
          <option value="CPU">CPU </option>
          <option value="CD/DVD">CD/DVD</option>
          <option value="เครื่องปริ้นซ์">เครื่องปริ้นซ์ </option>
          
      </select>

<div class="form-group"> 
<input type="submit" class="btn btn-primary" value="บันทึก"/> 
</div> 
</form> 
</div> 
</div>
<div align="right"> 
<a href="{{url('/')}}" class="btn btn-primary">back</a>  
</div>
@endsection
