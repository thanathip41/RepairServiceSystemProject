@extends('user.master') 
@section('title','แก้ไขฐานข้อมูล')
@section('content')
 <div class="container">
<div class="row"> 
<div class="col-md-12"> <br /> 
<h3 align="center">แก้ไขข้อมูล</h3> <br/> 

@if(count($errors) > 0) 
<div class="alert alert-danger"> 
<ul> @foreach($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach 
</ul> 
</div> 
@endif 

<form method="post" action="{{action('dataController@update', $id)}}"> {{csrf_field()}}
<label> หมายเลขแจ้งซ่อม : {{$edit->id}}</label>
<div class="form-group"> 
<label> รหัสผลิตภัณท์ : {{$edit->productCode}}</label>
</div>
<div class="form-group"> 
<label> สาเหตุ/ปัญหาที่พบ : {{$edit->problem}}</label>
</div>
<div class="form-group"> 
<label> วิธีการแก้ไขปัญหา : 
<input type="text" name="method"  placeholder="วิธีการแก้ไขปัญหา" value="{{$edit->method}}"  /> 
</label>
</div>
<div class="form-group"> 
<label> ชื่อผู้แก้ไขปัญหา : 
<input type="text" name="repairman"  placeholder="ชื่อผู้แก้ไขปัญหา" value="{{$edit->repairman}}"  /> 
</label>
</div>

<label>สถานะการซ่อม</label>
      <select name="statusCheck">
          <option value="1">รอคิว</option>
          <option value="2">ซ่อมเสร็จเรียนร้อย</option>
          <option value="3">รออะไหล่</option> 
          <option value="4">ซ่อมไม่ได้</option> 
      </select>
    
      <div class="form-group"> 
<label> หมายเหตุ : 
<input type="text" name="remark"  placeholder="หมายเหตุ" value="{{$edit->remark}}"  /> 
</label>
</div>
<div class="form-group"> 
<input type="submit" class="btn btn-primary" value="อัพเดท"/> 
</div> 
<input type="hidden" name="_method" value="PATCH" /> 
</form> 
</div> 
</div> 
</div>
@endsection
