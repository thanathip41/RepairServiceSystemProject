
@if ($row['statusCheck']==1) 
<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#one{{$id}}"><i class="fas fa-edit"></i>  ดำเนินการ</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal  fade" id="one{{$id}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$id)}}">{{csrf_field()}}  <!--$row['id']-->
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

@elseif ($row['statusCheck']==2)
<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#two{{ $id}}"><i class="fas fa-edit"></i>  การซ่อม</button> 
<div class="modal fade" id="two{{$id}}"   role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('MainStatusRepairController@update',$id)}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
						<p class="text-center">
						<label> รหัสการแจ้งซ่อม : {{$id}}</label> </p>
						<div class="form-group"> 
						<label> รหัสผลิตภัณท์ : {{$productCode}}</label>
						</div>
						<div class="form-group"> 
						<label> สาเหตุ/ปัญหาที่พบ : {{$problem}}</label>
						</div>
						<div class="form-group"> 
						<label> ชื่อผู้แก้ไขปัญหา : {{Auth::user()->name}}
						<input type="hidden" name="repairman"  value="{{Auth::user()->name}}" required /> 
						</label>
				</div>
						<div class="form-group"> 
						<label> วิธีการแก้ไขปัญหา : </label>
						<textarea   name="method" class="form-control" vlue="{{$problem}}" required></textarea>
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
<a class="text-dark"> <i class="fa fa-spinner" ></i>  Wait</a>
<button type="button" data-toggle="modal" data-target="#three{{$id}}"><i class="fas fa-envelope"></i></button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal fade" id="three{{$id}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<p class="text-center">
					<label>คุณต้องการส่ง E-mail : {{$emailUser}} ใช่หรือไม่ </label>
      	<input type="hidden" name="email" value="{{$emailUser}}">
				<input type="hidden" name="subject" value="การแจ้งซ่อม {{$id}}"/>
				<input type="hidden" name="message" value=" เรียนคุณ {{$name}}  ขณะนี้การซ่อม {{$type_id}} ดำเนินเสร็จสมบูรณ์"/> 
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
<a class="text-success"> Success</a>
<button  type="button" data-toggle="modal" data-target="#four{{ $id}}"><i class="fas fa-envelope"></i></button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal fade" id="four{{$row['id']}}"  role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
				<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<p class="text-center">
					<label>คุณต้องการส่ง E-mail : {{$emailUser}} ใช่หรือไม่ </label>
      	<input type="hidden" name="email" value="{{$emailUser}}">
				<input type="hidden" name="subject" value="การแจ้งซ่อม {{$id}}"/>
				<input type="hidden" name="message" value=" เรียนคุณ {{$name}}  ขณะนี้การซ่อม {{$type_id}} ดำเนินเสร็จสมบูรณ์"/> 
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
<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#five{{$id}}"><i class="fas fa-edit"></i> รายการใหม่</button> <!-- data-tartget หา ID แต่ละตัวเพื่อส่งค่าไปให้ modal -->
<div class="modal" id="five{{$id}}"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$id)}}">{{csrf_field()}}  
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
</div>@endif