@extends('layouts.nav') 
@section('title','Home')
@section('content')
<div class="container">
<div class="row"> 
<div class="col-md-12"> 
<br> 
<h3 align="center">Data repair</h3> <br />  

@if(\Session::has('success')) <!-- ถ้าบันทึกสำเร็จ ค่า succes ใน userController -->
<div class="alert alert-success"> 
<p>{{ \Session::get('success') }}</p> 
</div> 
@endif

<div class="container">
		<form action="{{action('dataController@searchID')}}" method="post" >
			{{ csrf_field() }}
			<div align="right">
				  <input type="text"  name="searchID"	placeholder="Search ID"  > 
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
			</div>
		</form>
</div>
<br>
<div class="container">
		<form action="{{action('dataController@searchCode')}}" method="post" >
			{{ csrf_field() }}
			<div align="right">
				  <input type="text"  name="searchCode"	placeholder="Search Code"  > 
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
			</div>
		</form>
</div>
<br>
<div class="container">
		<form action="{{action('dataController@searchDate')}}" method="post" >
			{{ csrf_field() }}
			<div align="right">
					<input name="searchDatefrom" type="date">
					 date to 
					<input name="searchDateto" type="date">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Srearch</button>
			</div>
		</form>
</div>

<table class="table table-bordered table-striped"> 
@if(isset($data))

<th>รหัสแจ้งซ่อม</th> 
<th>รหัสผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหาที่พบ</th>
<th>เวลาแจ้งซ่อม/รับซ่อม</th>
<th>สถานะการซ่อม</th>
<th>Verify</th> 
<th>รายละเอียด</th>
</tr> 

@foreach($data as $row) <!-- ดึงข้อมูล data ใน datacontroller@index = $row -->
<tr>@if ($row['delete']==0)
<td>{{$row['id']}}</td> 
<td>{{$row['productCode']}}</td> 
<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p></td> <!--{$row->typeCheck->type_name -->
	<td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
    <p style="color:red;">
    @if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
		@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
    <td>{{$row->statusCheckname->status}}</td>  
<td> @if ($row['statusCheck']==1) <!-- อยู่ระหว่างการรอคิว --> <!--{{$row->statusCheckname->status}} -->
 <button class="btn btn-warning"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fas fa-edit"></i>  ยืนยันการดำเนินการ</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('statusController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>สถานะการซ่อม : </label>
					<input type="hidden"  name="statusCheck" value="2"> อยู่ระหว่างการดำเนินการ<br>
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>

	@elseif ($row['statusCheck']==2) <!-- รอการยืนยันการซ่อมจากผู้ดูแล -->
	<button class="btn btn-warning"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fas fa-edit"></i>  ยืนยันการซ่อม</button> 
<!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('statusController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
				<p class="text-center">
				<label> รหัสการแจ้งซ่อม : {{$row['id']}}</label> </p>
				<div class="form-group"> 
				<label> รหัสผลิตภัณท์ : {{$row['productCode']}}</label>
				</div>
				<div class="form-group"> 
				<label> สาเหตุ/ปัญหาที่พบ : {{$row['problem']}}</label>
				</div>
				<div class="form-group"> 
				<label> ชื่อผู้แก้ไขปัญหา : {{Auth::user()->name}}
				<input type="hidden" name="repairman"  value="{{Auth::user()->name}}" required /> 
				</label>
				</div>
				<div class="form-group"> 
				<label> วิธีการแก้ไขปัญหา : </label>
				<textarea   name="method" class="form-control" rows="3" required></textarea>
				</div>
				<div class="form-group" align="center" > 
				<input type="hidden"  name="statusCheck" value="3"><p style="color:red;">ยืนยันการซ่อมจากผู้ดูแล</p><br>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
	@elseif ($row['statusCheck']==3) 
<button class="btn btn-outline-dark"> <i class="fa fa-spinner" ></i>  wait</button>
	@elseif ($row['statusCheck']==4) 
<!-- <button class="btn btn-outline-success"> Success</button>-->
<button class="btn btn-warning"  data-toggle="modal" data-target="#h{{ $row['id']}}"><i class="fas fa-envelope"></i> SendMail</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="h{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('mailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<p class="text-center">
					<label>คุณต้องการส่ง E-mail : {{$row['email']}} ใช่หรือไม่ </label>
      	<input type="hidden" name="email" value="{{$row['email']}}">
				<input type="hidden" name="subject" value="การแจ้งซ่อม {{$row['id']}}"/>
				<input type="hidden" name="message" value=" เรียนคุณ {{$row['name']}}  ขณะนี้การซ่อม {{$row['type_id']}} ดำเนินเสร็จสมบูรณ์"/> 
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
</td> 

	@elseif ($row['statusCheck']==5) 
	<button class="btn btn-danger"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fas fa-edit"></i>  ทำรายการใหม่</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('statusController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>สถานะการซ่อม : </label>
					<input type="hidden"  name="statusCheck" value="2"> อยู่ระหว่างการดำเนินการ<br>
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
</td> 
@endif

<td><button class="btn btn-success"  data-toggle="modal" data-target="#full{{ $row['id']}}"><i class="fa fa-book"></i>  </button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="full{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<label> <h2>หมายเลขแจ้งซ่อม  {{$row['id']}}</h2></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form  action="{{action('dataController@downloadPDF', $row['id'])}}">
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
                <td> {{$row['name']}} </td>

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
					 <p class="text-center">
					<button type="submit" class="btn btn-success"> print </button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div></td>
@endif
</tr>
@endforeach 
</table>

<!-- For search-->
{{ $data->render()}}  <!-- รับ data สร้าง table สำหรับ search-->
@endif 
@if(isset($query))  <!-- check value search != null -->
<table class="table table-bordered table-striped"> 
<tr>
<tr>
<th>รหัสแจ้งซ่อม</th> 
<th>รหัสผลิตภัณฑ์</th> 
<th>อุปกรณ์/ปัญหาที่พบ</th>
<th>เวลาที่แจ้งซ่อม</th>
<th>Update</th> 
<th>รายละเอียด</th>
</tr> 

@foreach($query as $row)
<tr>@if ($row['delete']==0)
<td>{{$row['id']}}</td> 
<td>{{$row['productCode']}}</td> 
<td>{{$row['type_id']}} : <br> <p style="color:red;">{{$row['problem']}}</p></td>
<td>{{date('d/m/Y',strtotime($row['created_at']))}} </td>  <!--$row->statusCheckname->status -->

<td> @if ($row['statusCheck']==1) <!-- อยู่ระหว่างการรอคิว -->
 <button class="btn btn-warning"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fas fa-edit"></i>  ยืนยันการดำเนินการ</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('statusController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>สถานะการซ่อม : </label>
					<input type="hidden"  name="statusCheck" value="2"> อยู่ระหว่างการดำเนินการ<br>
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>

	@elseif ($row['statusCheck']==2) <!-- รอการยืนยันการซ่อมจากผู้ดูแล -->
	<button class="btn btn-warning"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fas fa-edit"></i>  ยืนยันการซ่อม</button> 
<!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('statusController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
				<p class="text-center">
				<label> หมายเลขแจ้งซ่อม : {{$row['id']}}</label> </p>
				<div class="form-group"> 
				<label> รหัสผลิตภัณท์ : {{$row['productCode']}}</label>
				</div>
				<div class="form-group"> 
				<label> สาเหตุ/ปัญหาที่พบ : {{$row['problem']}}</label>
				</div>
				<div class="form-group"> 
				<label> ชื่อผู้แก้ไขปัญหา : {{Auth::user()->name}}
				<input type="hidden" name="repairman"  value="{{Auth::user()->name}}" required /> 
				</label>
				</div>
				<div class="form-group"> 
				<label> วิธีการแก้ไขปัญหา : </label>
			<!--	<input type="text" name="method"  placeholder="วิธีการแก้ไขปัญหา" required /> -->
				<textarea   name="method" class="form-control" rows="3"></textarea>
				</div>
				<div class="form-group" align="center" > 
				<input type="hidden"  name="statusCheck" value="3"><p style="color:red;"><i class="fas fa-edit"></i>ยืนยันการซ่อมจากผู้ดูแล</p><br>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
	@elseif ($row['statusCheck']==3) <!-- รอการยืนยันการซ่อมจากผู้ดูแล-->
<a > wait</a>
	@elseif ($row['statusCheck']==4) <!-- การดำเนินการเสร็จสิ้น-->  <!--5 กับ 6 user check -->
<a >Complete</a>
	@elseif ($row['statusCheck']==5) <!-- การดำเนินการเสร็จสิ้น-->  <!--5 กับ 6 user check -->
	<button class="btn btn-warning"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fas fa-edit"></i>  ทำรายการใหม่</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('statusController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>สถานะการซ่อม : </label>
					<input type="hidden"  name="statusCheck" value="2"> อยู่ระหว่างการดำเนินการ<br>
					</p>
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-primary">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
</td> 
@endif
<td><button class="btn btn-success"  data-toggle="modal" data-target="#full{{ $row['id']}}"><i class="fa fa-book"></i> </button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal modal-danger fade" id="full{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<label> <h2>รหัสการแจ้งซ่อม  {{$row['id']}}</h2></label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form  action="{{action('dataController@downloadPDF', $row['id'])}}">
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
                <td>{{date('d/M/Y',strtotime($row['created_at']))}}</td>
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
                <td>{{date('d/M/Y',strtotime($row['created_at']))}} :<br> 
								<p style="color:red;">
								@if ($row['created_at']==$row['updated_at']) ไม่ได้ดำเนินการ
								@else {{date('d/M/Y',strtotime($row['updated_at']))}} @endif</p> </td>
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
					 <p class="text-center">
					<button type="submit" class="btn btn-success"><i class="fa fa-print"></i>  print </button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
</td>
@endif
</tr>
@endforeach 
</table>
			@if($query) {{ $query->render()}}
			@endif
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif

</div> 
</div>
<div align="right"> 
<a href=javascript:history.back(1) class="btn btn-primary">back</a> 
</div>
@stop