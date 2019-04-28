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
                            <select class="form-control" name="type_id">
                                <option value=1>คอมพิวเตอร์</option>
                                <option value=2>ปริ้นเตอร์/สแกนเนอร์ </option>
                                <option value=3>ระบบเครือข่าย </option>
                            </select>
                                                    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">รหัสผลิตภัณฑ์</label>

                            <div class="col-md-6">
                            <input type="text" name="productCode" class="form-control" placeholder="รหัสผลิตภัณฑ์" required />
                                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" required>สาเหตุ/ปัญหาที่พบ </label>

                            <div class="col-md-6">
    
                            <textarea type="text" name="problem" class="form-control" placeholder="สาเหตุ/ปัญหาที่พบ" required > </textarea>
                                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button  onclick="validation();"  type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @foreach($s1 as $row)	
<script type="text/javascript">
function validation()
{ Swal.fire({
  type: 'success',
  title: 'มีคิวก่อนหน้าคุณจำนวน {{$row->number}} คน',
})
}
</script>
@endforeach
@endsection
