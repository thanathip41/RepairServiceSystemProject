@if ($row['statusCheck']==1) 
<button type="button" class="btn btn-success btn-block"  data-toggle="modal" data-target="#one{{$row['id']}}"><i class="far fa-edit"></i>  ดำเนินการ</button>
<div class="modal fade" id="one{{$row['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}} 
					<input type="hidden" name="_method" value="PATCH"/>
	      			<div class="modal-body">
									<p class="text-center">
										<input type="hidden"  name="statusCheck" value="2"/> การต้องดำเนินการซ่อม <br/> ของคุณ {{$row->users->name}} ใช่หรือไม่
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
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#two{{$row['id']}}"><i class="far fa-edit"></i> จัดการ</button>
<div class="modal fade" id="two{{$row['id']}}"  tabindex="-1"role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
						<div> 
							<label>รหัสผลิตภัณท์ : {{$row['productCode']}}</label><br/>
							<label>สาเหตุ/ปัญหาที่พบ : {{$row['problem']}}</label><br/>
							<label>ชื่อผู้แก้ไขปัญหา : {{Auth::user()->name}}</label>
							<input type="hidden" name="repairman"  value="{{Auth::user()->name}}"/> 
						</div>
						<div class="form-group"> 
						<label> วิธีการแก้ไขปัญหา  </label> 
						<textarea   name="method" class="form-control" rows="4"  required></textarea>
						</div>
						<div class="form-group"> 
						<label> หมายเหตุ  </label>
						<textarea   name="remark" class="form-control"></textarea>
						</div>
						<input type="hidden"  name="statusCheck" value="3"/>
	     	  </div>
	      <div class="modal-footer">
				<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#twot{{$row['id']}}"><i class="fa fa-times"></i> ซ่อมไม่ได้</button> 
<div class="modal fade" id="twot{{$row['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}" > {{csrf_field()}}
					<input type="hidden" name="_method" value="PATCH"/>
					<div class="modal-body">
					<p class="text-center"> กรุณาตรวจสอบประกันของอุปกรณ์ก่อนยืนยัน <br/></p>
				<div class="col-md-12">
            <div class="row">
              <div class="col-6">
										<select onchange="typeAndproblem(this.value)" name="statusCheck" class="form-control">
									     <option value="6">มีประกัน</option>
										   <option value="7">หมดประกัน</option>
										</select>
									</div>
              	 <div class="col-6">
										<select id="s" name="method" class="form-control" >
											<option value="ส่งเคลม">เคลมอุปกรณ์</option>
											<option value="อื่นๆ">อื่นๆ</option>
										</select>
									</div>
							</div>
					</div>
										<script>
										function typeAndproblem(val) {
												var HTML = "";
												if(val == "6") {
														HTML += '<option value="ส่งเคลม">เคลมอุปกรณ์</option>';
														HTML += '<option value="อื่นๆ">อื่นๆ</option>';
												} else if(val == "7") {
													HTML += '<option value="ซื้ออุปกรณ์ใหม่">ซื้ออุปกรณ์ใหม่</option>';
													HTML += '<option value="อื่นๆ">อื่นๆ</option>'; 
													
												} 
												
												document.getElementById("s").innerHTML = HTML;
												// alert(document.getElementsById("show")[0].innerHTML);
										}
										</script>					
					<input type="hidden" name="repairman"  value="{{Auth::user()->name}}"/> 
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
<button class="btn btn-info btn-block" data-toggle="modal" data-target="#three{{$row['id']}}"><i class="fa fa-envelope"></i> ส่ง E-mail</button>
<div class="modal fade" id="three{{$row['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainMailController@post')}}">{{csrf_field()}}  
	      <div class="modal-body">
					<p class="text-center">
				 คุณต้องการส่ง E-mail : {{$row->users->email}} ใช่หรือไม่ 
					</p>
				<input type="hidden" name="email" value="{{$row->users->email}}"/>
				<input type="hidden" name="subject" value="การแจ้งซ่อม {{$row['id']}}"/>
				<input type="hidden" name="message" value=" เรียนคุณ {{$row->users->name}}  ขณะนี้การซ่อม {{$row->typeCheck->type_name}} ดำเนินเสร็จสมบูรณ์"/>
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

<p class="text-success" align="center">  เสร็จสมบูรณ์</p>

@elseif ($row['statusCheck']==5)
<button type="button" class="btn btn-danger btn-block"  data-toggle="modal" data-target="#five{{$row['id']}}"> รายการใหม่</button> 
<div class="modal fade" id="five{{$row['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>สถานะการซ่อม : </label>
					<input type="hidden"  name="statusCheck" value="2"/> อยู่ระหว่างการดำเนินการ<br/>
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
<a class="text-danger"> </a>
<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#six{{$row['id']}}"><i class="fa fa-wrench"></i>  เคลมอุปกรณ์
</button>
<div class="modal fade" id="six{{$row['id']}}"  tabindex="-1"role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
						<div> 
					ได้รับอุปกรณ์จากเคลมแล้ว
						</div>
						<input type="hidden"  name="statusCheck" value="3"/>
	     	  </div>
	      <div class="modal-footer">
				<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['statusCheck']==7) 

<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#seven{{$row['id']}}" ><i class="fas fa-shopping-cart"></i>  ซื้ออุปกรณ์ใหม่</i>
</button>
<div class="modal fade" id="seven{{$row['id']}}"  tabindex="-1"role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
			<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
				<form method="post" action="{{action('MainStatusRepairController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
						<div> 
					ซื้ออุปกรณ์ใหม่เรียบร้อยแล้ว
						</div>
						<input type="hidden"  name="statusCheck" value="3"/>
	     	  </div>
	      <div class="modal-footer">
				<button type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endif
