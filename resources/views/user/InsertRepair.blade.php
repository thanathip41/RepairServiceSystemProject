@extends('layouts.navside') 
@section('title','จัดการฐานข้อมูล')
@section('content')
 <div class="container">
 <br>
 <div class="container" align="center" style="margin-left:24% ;">
@foreach($s1 as $row)
 <i class="fa fa-users" aria-hidden="true"></i> จำนวนคิวมีทั้งหมด {{$row->number}} คน
@endforeach
<?php

echo (date("H:i:s"));
?>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                <div class="card-header" align="center"><h3>แจ้งซ่อมอุปกรณ์</h3></div>

                <div class="card-body">
               
                <form method="post" action="{{action('UserInsertRepairController@store')}}" enctype="multipart/form-data" > {{csrf_field()}}
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">รหัสผลิตภัณฑ์</label>

                            <div class="col-md-8">
                            <div class="row">
                                <div class="col-3"><input class="form-control" value="  NPC" disabled></div>
                                <div class="col-1"><h3>-</h3></div>
                                <div class="col-4"> <input type="text" name="productCode" id="productCode" class="form-control" minlength="6" maxlength="6"  placeholder="123456"  /></div>
                            </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">รายการแจ้งซ่อม</label>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-6">
                                <select onchange="typeAndproblem(this.value)" name="device_id" class="form-control">
                                    <option value=1>คอมพิวเตอร์</option>
                                    <option value=2>ปริ้นเตอร์/สแกนเนอร์</option>
                                    <option value=3>ระบบเครือข่าย</option>
                                </select>
                                    </div>
                                    <div class="col-6">
                                <select id="sel2" name="problem" class="form-control">
                                    <option value="เปิดไม่ติด">เปิดไม่ติด</option>
                                    <option value="รีสตาร์ท/ดับเอง">รีสตาร์ท/ดับเอง</option>
                                    <option value="เครื่องค้าง">เครื่องค้าง</option>
                                    <option  value="จอฟ้า/จอดำ">จอฟ้า/จอดำ</option>
                                    <option  value="ลงโปรแกรมใหม่">ลงโปรแกรมใหม่</option>
                                    <option  value="ลง window ใหม่">ลง window ใหม่</option>
                                    <option  value="เมาส์/คีย์บอร์ด">เมาส์/คีย์บอร์ด</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                            </select>            
                                    </div>
                                </div>
                            
                                
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">เลือกไฟล์เพื่ออัพโหลด</label>
                            
                            <div class="col-md-8"><input type="file" name="img" accept="image/*"/> <br><span class="text-muted">รองรับไฟล์นามสกุล jpg, png </span></div>
                        </div>
                    
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button  onclick="check();"  type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
  function typeAndproblem(val) {
     var HTML = "";
    if(val == "1") {
         HTML += '<option value="เปิดไม่ติด">เปิดไม่ติด</option>';
         HTML += '<option  value="รีสตาร์ท/ดับเอง">รีสตาร์ท/ดับเอง</option>';
         HTML += '<option  value="เครื่องค้าง">เครื่องค้าง</option>';  
         HTML += '<option  value="จอฟ้า/จอดำ">จอฟ้า/จอดำ</option>';
         HTML += '<option  value="ลงโปรแกรมใหม่">ลงโปรแกรมใหม่</option>';
         HTML += '<option  value="ลง window ใหม่">ลง window ใหม่</option>';
        HTML += '<option  value="เมาส์/คีย์บอร์ด">เมาส์/คีย์บอร์ด</option>'; 
        HTML += '<option  value="อื่นๆ">อื่นๆ</option>'; 
    } else if(val == "2") {
      HTML += '<option value="ปริ้นเตอร์ไม่ทำงาน">ปริ้นเตอร์ไม่ทำงาน</option>'; 
      HTML += '<option value="ปริ้นไม่ได้">ปริ้นไม่ได้</option>';
      HTML += '<option value="สแกนเนอร์ไม่ทำงาน">สแกนเนอร์ไม่ทำงาน</option>';
      HTML += '<option  value="อื่นๆ">อื่นๆ</option>'; 
    } else if(val == "3") {
      HTML += '<option value="อินเทอร์เน็ต">อินเทอร์เน็ต</option>';
      HTML += '<option value="ระบบเครือข่าย">ระบบเครือข่าย</option>';
      HTML += '<option value="ระบบ LAN">ระบบ LAN</option>';
      HTML += '<option value="ระบบ Wi-Fi">ระบบ Wi-Fi</option>';
      HTML += '<option  value="อื่นๆ">อื่นๆ</option>'; 
    }document.getElementById("sel2").innerHTML = HTML;
}
</script>        
 @foreach($s1 as $row)	
<script type="text/javascript">
function check(){

    var productCode=document.getElementById("productCode").value;
    //console.log(productCode);
    if (productCode.length == 6){
        validation();
    }
}

function validation()
{ Swal.fire({
  type: 'success',
  title: 'ขณะนี้คุณเป็นคิวที่ <?php echo $row->number + 1  ?> ',
  showConfirmButton: false,
})
}
</script>
@endforeach
@endsection
