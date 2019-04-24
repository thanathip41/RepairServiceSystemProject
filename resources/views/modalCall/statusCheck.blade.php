
@if ($row['statusCheck']==1) 
<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#one{{$row['id']}}">  ดำเนินการ</button>
<div class="modal fade" id="one{{$row['id']}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}} 
					<input type="hidden" name="_method" value="PATCH">
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

@elseif ($row['statusCheck']==2)
<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#two{{$row['id']}}">  การซ่อม</button> 
<div class="modal fade" id="two{{$row['id']}}" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH">
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
						<input type="hidden" name="repairman"  value="{{Auth::user()->name}}"> 
						</label>
				</div>
						<div class="form-group"> 
						<label> วิธีการแก้ไขปัญหา : </label>
						<textarea   name="method" class="form-control" value="{{$row['problem']}}" required></textarea>
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
<a class="text-dark">  รอการยืนยัน</a>
<button type="button" data-toggle="modal" data-target="#three{{$row['id']}}"><i class="fas fa-envelope"></i></button>
<div class="modal fade" id="three{{$row['id']}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<p class="text-center">
					<label>คุณต้องการส่ง E-mail : {{$row->users->email}} ใช่หรือไม่ </label>
      	<input type="hidden" name="email" value="{{$row->users->email}}">
				<input type="hidden" name="subject" value="การแจ้งซ่อม {{$row['id']}}">
				<input type="hidden" name="message" value=" เรียนคุณ {{$row->users->name}}  ขณะนี้การซ่อม {{$row['type_id']}} ดำเนินเสร็จสมบูรณ์"> 
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

@elseif ($row['statusCheck']==4)
<a class="text-success">  เสร็จสมบูรณ์</a>
<button type="button" data-toggle="modal" data-target="#four{{$row['id']}}"><i class="fas fa-envelope"></i></button>
<div class="modal fade" id="four{{$row['id']}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<p class="text-center">
      	<label>คุณต้องการส่ง E-mail : {{$row->users->email}} ใช่หรือไม่ </label>
      	<input type="hidden" name="email" value="{{$row->users->email}}">
				<input type="hidden" name="subject" value="การแจ้งซ่อม {{$row['id']}}">
				<input type="hidden" name="message" value=" เรียนคุณ {{$row->users->name}}  ขณะนี้การซ่อม {{$row['type_id']}} ดำเนินเสร็จสมบูรณ์"> 
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

@elseif ($row['statusCheck']==5)
<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#five{{$row['id']}}"> รายการใหม่</button> 
<div class="modal fade" id="five{{$row['id']}}"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH">
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
@endif