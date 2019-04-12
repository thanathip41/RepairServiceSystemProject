@extends('layouts.nav') 
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

<div align="right">
		<a href="{{url('/history')}}" class="btn btn-primary"  >history</a>
</div>


@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif 

<form method="post" action="{{action('OnlyuserController@store')}}" enctype="multipart/form-data"> {{csrf_field()}} 
<div class="form-group"> 
<label>อุปกรณ์</label>
      <select class="form-control" name="typename">
          <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
          <option value="โน๊ตบุ๊ค">โน๊ตบุ๊ค</option>
          <option value="เครื่องปริ้นซ์">เครื่องปริ้นซ์ </option>
          <option value="ระบบเครือข่าย">ระบบเครือข่าย </option>
      </select>
      </div>
<div class="form-group"> 
<input type="text" name="productCode" class="form-control" placeholder="รหัสผลิตภัณฑ์" />
</div> 
<div class="form-group"> 
<input type="text" name="problem" class="form-control" placeholder="สาเหตุ/ปัญหาที่พบ" /> 
</div>
 

<div class="form-group"> 
<button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save</button> 
</div> 
</form> 
</div> 
</div>
<div align="right"> 
<a href="{{url('/')}}" class="btn btn-primary">back</a>  
</div>
@endsection
