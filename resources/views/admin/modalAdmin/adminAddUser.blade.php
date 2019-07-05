@if ($row['role_id']==0)
<button class="btn btn-primary"  data-toggle="modal" data-target="#add{{ $row['id']}}"> <i class="fa fa-user-plus"></i></button> 
<div class="modal modal-danger fade" id="add{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
		<div class="modal-header bg-info text-white">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body"  align="center">
					
					คุณต้องการเพิ่มคุณ {{$row['name']}} เป็นช่างซ่อมบำรุงใช่หรือไม่
					<input type="hidden"  name="role_id" value="1"> <br>
					
	     	  </div>
	      <div class="modal-footer">
				<button  type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['role_id']==1)
<button class="btn btn-warning" data-toggle="modal" data-target="#down{{ $row['id']}}"><i class="fa fa-user" ></i></button>  
<div class="modal modal-danger fade" id="down{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
    <div class="modal-header bg-info text-white">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body"  align="center">
					
					คุณต้องการถอนคุณ {{$row['name']}} ออกจากช่างซ่อมบำรุงใช่หรือไม่
					<input type="hidden"  name="role_id" value="0"> <br>
					
	     	  </div>
	      <div class="modal-footer">
				<button  type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
 @elseif ($row['role_id']==3)
 <button class="btn btn-primary"  data-toggle="modal" data-target="#add{{ $row['id']}}"> <i class="fa fa-user-plus"></i></button> 
<div class="modal modal-danger fade" id="add{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
		<div class="modal-header bg-info text-white">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body"  align="center">
					
					คุณต้องการเพิ่มคุณ {{$row['name']}} เป็น <br>ผู้ใช้งานทั่วไป / ช่างซ่อมบำรุง ใช่หรือไม่ <br>
					<input type="radio" name="role_id" value="0"> ผู้ใช้งานทั่วไป<br>
					<input type="radio" name="role_id" value="1"> ช่างซ่อมบำรุง<br>
					
	     	  </div>
	      <div class="modal-footer">
				<button  type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endif
