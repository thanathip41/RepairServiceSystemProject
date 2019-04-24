@extends('layouts.navbar') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
 <br>

@if(count($errors) > 0) 
<div class="alert alert-danger"> 
<ul> @foreach($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach 
</ul> 
</div> 
@endif 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
            <div class="alert alert-success"> 
            <p>{{ \Session::get('success') }}</p> 
            </div> 
            @endif 
                <div class="card-header">Insert Data</div>

                <div class="card-body">
                <form method="post" action="{{action('UserInsertRepairController@store')}}" > {{csrf_field()}}
              
                <div class="form-group row">
                 <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{date('d-m-Y')}} </h5></label>
                        </div>
  
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">อุปกรณ์</label>

                            <div class="col-md-6">
                            <select class="form-control" name="typename">
                                <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
                                <option value="โน๊ตบุ๊ค">โน๊ตบุ๊ค</option>
                                <option value="เครื่องปริ้นซ์">เครื่องปริ้นซ์ </option>
                                <option value="ระบบเครือข่าย">ระบบเครือข่าย </option>
                            </select>
                                                    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">รหัสผลิตภัณฑ์</label>

                            <div class="col-md-6">
                            <input type="text" name="productCode" class="form-control" placeholder="รหัสผลิตภัณฑ์" />
                                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">สาเหตุ/ปัญหาที่พบ</label>

                            <div class="col-md-6">
    
                            <textarea type="text" name="problem" class="form-control" placeholder="สาเหตุ/ปัญหาที่พบ" > </textarea>
                                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--
<form method="post" action="{{action('UserInsertRepairController@store')}}" enctype="multipart/form-data"> {{csrf_field()}} 
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
</div> -->
</div>
@endsection
