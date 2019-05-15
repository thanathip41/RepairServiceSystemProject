
@if ($row['statusCheck']==1) 
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#one{{$row['id']}}">  ดำเนินการ</button>
<div class="modal fade" id="one{{$row['id']}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}} 
					<input type="hidden" name="_method" value="PATCH">
	      			<div class="modal-body">
									<p class="text-center">
										<input type="hidden"  name="statusCheck" value="2"> การต้องดำเนินการซ่อม <br> ของคุณ {{$row->users->name}} ใช่หรือไม่
									</p>
							</div>
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Yes </button> 
								<button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
								
	      			</div>
      </form>
    </div>
  </div>
</div>

@elseif ($row['statusCheck']==2)

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#two{{$row['id']}}">จัดการ</i></button>
<div class="modal fade" id="two{{$row['id']}}"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH">
	      <div class="modal-body">
						<div > 
						<p>รหัสผลิตภัณท์ : {{$row['productCode']}}</p>
						<p>สาเหตุ/ปัญหาที่พบ : {{$row['problem']}}</p>
						<p>ชื่อผู้แก้ไขปัญหา : {{Auth::user()->name}}</p>
						<input type="hidden" name="repairman"  value="{{Auth::user()->name}}"> 
						</div>
						<div class="form-group"> 
						<p> วิธีการแก้ไขปัญหา : </p> 
						<textarea   name="method" class="form-control"  required></textarea>
						</div>
						<div class="form-group"> 
						<p> หมายเหตุ : </p>
						<textarea   name="remark" class="form-control"></textarea>
						</div>
						<input type="hidden"  name="statusCheck" value="3">
	     	  </div>
	      <div class="modal-footer">
				<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#twot{{$row['id']}}">ซ่อมไม่ได้</button> 
<div class="modal fade" id="twot{{$row['id']}}" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}" > {{csrf_field()}}
					<input type="hidden" name="_method" value="PATCH">
					<div class="modal-body">
					<p class="text-center">
					<a> กรุณาตรวจสอบประกันของอุปกรณ์ก่อนยืนยัน</a><br>
					<input type="hidden" name="repairman"  value="{{Auth::user()->name}}"> 

				 <select onchange="typeAndproblem(this.value)" name="statusCheck">
                 <option value="6">มีประกัน</option>
                  <option value="7">หมดประกัน</option>
									</select>
                  <select id="show" name="method" >
                     <option value="ส่งเคลม">เคลมอุปกรณ์</option>
										 <option value="อื่นๆ">อื่นๆ</option>
                   </select>   												
										<script>
										function typeAndproblem(val) {
												var HTML = "";
												if(val == "6") {
														HTML += '<option value="ส่งเคลม">เคลมอุปกรณ์</option>';
														HTML += '<option value="อื่นๆ">อื่นๆ</option>';
												} else if(val == "7") {
													HTML += '<option value="ซื้ออุปกรณ์ใหม่">ซื้ออุปกรณ์ใหม่</option>';
													HTML += '<option value="อื่นๆ">อื่นๆ</option>'; 
													
												} document.getElementById("show").innerHTML = HTML;
										}
										</script>	 

					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Yes </button>   
					<button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
					</div>                
				</form>
		</div>
	</div>
</div>

@elseif ($row['statusCheck']==3)
<a class="text-dark">  รอการยืนยัน</a>
<button type="button" data-toggle="modal" data-target="#three{{$row['id']}}"><i class="fa fa-envelope"></i></button>
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
				<input type="hidden" name="message" value=" เรียนคุณ {{$row->users->name}}  ขณะนี้การซ่อม {{$row->typeCheck->type_name}} ดำเนินเสร็จสมบูรณ์"> 
					</p>
	     	  </div>
	      <div class="modal-footer">
					<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>

@elseif ($row['statusCheck']==4)
<a class="text-success">  เสร็จสมบูรณ์</a>
<button type="button" data-toggle="modal" data-target="#four{{$row['id']}}"><i class="fa fa-envelope"></i></button>
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
				<input type="hidden" name="message" value=" เรียนคุณ {{$row->users->name}}  ขณะนี้การซ่อม {{$row->typeCheck->type_name}} ดำเนินเสร็จสมบูรณ์">
					</p>
	     	  </div>
	      <div class="modal-footer">
					<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
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
					<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>

@elseif ($row['statusCheck']==6) 
<a class="text-danger">  เคลมอุปกรณ์</a>
@elseif ($row['statusCheck']==7) 
<a class="text-danger"> ซื้ออุปกรณ์ใหม่</a>
@endif
