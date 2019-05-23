@if ($row['roleCheck']==0)
<button class="btn btn-primary"  data-toggle="modal" data-target="#add{{ $row['id']}}"> <i class="fa fa-user-plus"></i></button> 
<div class="modal modal-danger fade" id="add{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body"  align="center">
					
					คุณต้องการเพิ่มคุณ {{$row['name']}} พนักงานใช่หรือไม่
					<input type="hidden"  name="roleCheck" value="1"> <br>
					
	     	  </div>
	      <div class="modal-footer">
				<button  type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['roleCheck']==1)
<button class="btn btn-warning" data-toggle="modal" data-target="#down{{ $row['id']}}"><i class="fa fa-user" ></i></button>  
<div class="modal modal-danger fade" id="down{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body"  align="center">
					
					คุณต้องการถอดคุณ {{$row['name']}} ออกจากพนักงานใช่หรือไม่
					<input type="hidden"  name="roleCheck" value="0"> <br>
					
	     	  </div>
	      <div class="modal-footer">
				<button  type="submit" class="btn btn-primary">Yes </button> 
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['roleCheck']==3)
<button class="btn btn-primary"  data-toggle="modal" data-target="#add{{ $row['id']}}"> <i class="fa fa-user-plus"></i></button> 
<div class="modal modal-danger fade" id="add{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body"  align="center">
					
					คุณต้องการเพิ่มคุณ {{$row['name']}} พนักงานใช่หรือไม่
					<input type="hidden"  name="roleCheck" value="1"> <br>
					
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
