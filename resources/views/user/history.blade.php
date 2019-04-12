@extends('layouts.nav') 
@section('content')
<div class="container">
<nav class="navbar-fixed-top">
<h3 align="center"> รายการการแจ้งซ่อม</h3> <br /> 


<div align="right">
		<a href="{{url('/insert')}}" class="btn btn-primary"  >แจ้งซ่อม</a>
</div>
<br>
@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif

<table class="table table-bordered table-striped"> 
<tr>
<th>รหัสแจ้งซ่อม</th>
<th>รหัสผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหา</th>
<th>เวลาแจ้งซ่อม/รับซ่อม</th>
<th>สถานะ</th>
<th>ยืนยันการซ่อม</th>
<th>รายละเอียด </th>
</tr> 
@foreach($history as $row)
@if  ($row['name']==Auth::user()->name) 
<tr> @if ($row['delete']==0)
    <td>{{$row['id']}}</td> 
    <td>{{$row['productCode']}}</td> 
    <td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p></td>
    <td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
    <p style="color:red;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
    <td>{{$row->statusCheckname->status}}</td>
    <td> @if ($row['statusCheck']==3)
    <button class="btn btn-primary"  data-toggle="modal" data-target="#m{{ $row['id']}}"> ยืนยันการซ่อม</button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('statusUserController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
				<p class="text-center">
				<label>สถานะการซ่อม : </label><br>
				<input type="radio"  name="statusCheck" value="4" required>ยืนยันการซ่อมจากผู้แจ้งซ่อม<br>
                <input type="radio"  name="statusCheck" value="5" required>ปฏิเสธการซ่อมจากผู้แจ้งซ่อม<br>
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
@elseif ($row['statusCheck']==1)
<button class="btn btn-outline-dark"> <i class="fa fa-spinner" ></i>  wait</button>
@elseif ($row['statusCheck']==2)
<button class="btn btn-outline-dark"> <i class="fa fa-spinner" ></i>  wait</button>
@elseif ($row['statusCheck']==4)
<button class="btn btn-outline-success"> Success</button>
@elseif ($row['statusCheck']==5)
<button class="btn btn-outline-dark"> <i class="fa fa-spinner" ></i>  wait</button>
@endif</td>

<td><button class="btn btn-success"  data-toggle="modal" data-target="#full{{ $row['id']}}">  <i class="fa fa-book"></i> </button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="full{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<label> <h2>หมายเลขแจ้งซ่อม  {{$row['id']}}</h2></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
	      <div class="modal-body">
				<table class="table">
            <thead class="table-primary">
						<tr>
                <th>ข้อมูลการแจ้งซ่อม</th>
								<th></th>
              </tr>
            </thead>
            <tbody >
              <tr class="table-light">
								<td>สาเหตุ/ปัญหาที่พบ :</td>
                <td>{{$row['problem']}}</td>
              </tr>
							<tr class="table-light">
								<td > รหัสผลิตภัณท์ :</td>
                <td>{{$row['productCode']}}</td>
              </tr>
							<tr class="table-light">
								<td>เวลาแจ้งซ่อม</td>
                <td>{{date('d/m/Y',strtotime($row['created_at']))}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อ-นามสกุล :</td>
                <td>{{$row['name']}}</td>
              </tr>
            </tbody> <br>
						<thead class="table-primary">
              <tr>
                <th>ข้อมูลการซ่อม</th>
								<th></th>
              </tr>
            </thead>

            <tbody>
              <tr class="table-light">
								<td > สถานะการซ่อม : </td>
                <td>{{$row->statusCheckname->status}}</td>
              </tr>
							<tr class="table-light">
								<td> เวลาดำเนินการ:</td>
                <td>@if ($row['created_at']==$row['updated_at'])  
							@else {{date('d/m/Y',strtotime($row['updated_at']))}} @endif</td>
              </tr>
							<tr class="table-light">
								<td>วิธีแก้ไขปัญหา : </td>
                <td>{{$row['method']}}</td>
              </tr>
							<tr class="table-light">
								<td> ชื่อผู้แก้ไขปัญหา : </td>
                <td>{{$row['repairman']}}</td>
              </tr>
							<tr class="table-light">
								<td> หมายเหตุ : </td>
                <td>{{$row['remark']}}</td>
              </tr>
            </tbody>
          </table>			
	     	  </div>
					 <p class="text-right">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
    </div>
  </div>
</div></td>

    @endif
</tr>
@endif
@endforeach
</table> 
<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
</div>
</div> 
@stop
