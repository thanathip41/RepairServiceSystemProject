@extends('layouts.nav') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br> 
<h3 align="center">Table management</h3> <br />  

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif


<table class="table table-bordered table-striped"> 

<tr>
<th>รหัสแจ้งซ่อม</th> 
<th>รหัสผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหาที่พบ</th>
<th>ชื่อผู้แก้ไขปัญหา</th>
<th>วิธีแก้ไขปัญหา</th>
<th>เวลาแจ้ง/รับซ่อม</th>
<th>สถานะการซ่อม</th>
<th>Delete</th>
</tr> 

@foreach($admin as $row) <!-- ดึงข้อมูล data ใน datacontroller@index = $row -->
<tr>@if ($row['delete']==0)
<td>{{$row['id']}}</td> 
<td>{{$row['productCode']}}</td> 
<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> 
<td>{{$row['repairman']}}</td>
<td>{{$row['method']}}</td>
<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
    <p style="color:red;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
<td>{{$row->statusCheckname->status}}</td>
<td><button class="btn btn-danger"  data-toggle="modal" data-target="#m{{ $row['id']}}">Delete</button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
          <form method="post" action="{{action('AdminController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<input type="hidden"  name="delete" value="1"> Delete <br>
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
@endif
</tr>
@endforeach 
</table>

</div> 
</div>


<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
@stop