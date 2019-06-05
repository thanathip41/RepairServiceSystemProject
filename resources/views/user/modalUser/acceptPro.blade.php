@if ($row['statusCheck']==3)
    <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#m{{ $row['id']}}"><i class="fa fa-check"></i> ยืนยัน</button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header bg-info text-white">
		<div class="modal-title">หมายเลขแจ้งซ่อม  {{$row['id']}}</div>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
				<form method="post" action="{{action('UserRepairVerifyController@update',$row['id'])}}">{{csrf_field()}}  
				<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
				<p class="text-center">
				<label>เลือกสถานะการซ่อม  </label><br>
				<div class="btn-group-toggle" data-toggle="buttons">
				
				<label class="btn btn-success" style="margin-left:3%">
					<input type="radio"  name="statusCheck" value="4" required autocomplete="off">ยืนยัน (กรณีเสร็จสมบูรณ์)<br>
					</label>
				<label class="btn btn-danger ">
					<input type="radio"  name="statusCheck" value="5" required autocomplete="off">ปฏิเสธ (กรณีไม่สามารถใช้งานได้)<br>
					</label>
					<input  type="hidden" name="pro_return" value="{{$row['pro_return']}}"/>
			</div>
				</p>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Yes </button> 
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['statusCheck']==1)
<a class="text-dark">  รอดำเนินการ</a>
@elseif ($row['statusCheck']==2)
<a class="text-dark">  รอดำเนินการ</a>
@elseif ($row['statusCheck']==4)
<a class="text-success"> เสร็จเรียบร้อย</a>
@elseif ($row['statusCheck']==5)
<a class="text-dark">  รอดำเนินการ</a>

@elseif ($row['statusCheck']==6) 
<a class="text-danger">  ส่งเคลม</a>
@elseif ($row['statusCheck']==7) 
<a class="text-danger">  ซื้ออุปกรณ์ใหม่</a>
@endif