@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        </div>
                    @endif

                @if(Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน dataController -->
                <div class="alert alert-success"> 
                <p>{{Session::get('success') }}</p> 
                </div> 
                @endif 
                    <h3>Say Hi User login</h3>
                    Hello {{ Auth::user()->name}}
                    
                </div>
                <button class="btn btn-primary"  data-toggle="modal" data-target="#m">แจ้งซ่อม</button> 
<!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="m"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('OnlyuserController@store')}}">{{csrf_field()}}  
				
	      <div class="modal-body">
				<p class="text-center">
                <div>
				<input type="text" name="productCode" class="form-control" placeholder="รหัสผลิตภัณฑ์" required />
                </div> 
                <div class="form-group"> 
                <input type="text" name="problem" class="form-control" placeholder="สาเหตุ/ปัญหาที่พบ"  required /> 
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
				</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-danger">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>


                <br>
                <a href="{{url('history')}}" class="btn btn-warning">ประวัติการแจ้งซ่อม</a> 
                
            </div>
        </div>
    </div>
</div>
@endsection
