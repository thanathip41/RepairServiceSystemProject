@if ($row['activated']==1)
<button class="btn btn-danger"  data-toggle="modal" data-target="#del{{ $row['id']}}"><i class="fa fa-trash"></i></button> 
<div class="modal fade" id="del{{$row['id']}}" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminDelUserController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body" align="center">
					คุณต้องการลบคุณ {{$row['name']}} ออกจากระบบ ใช่หรือไม่
					<input type="hidden"  name="activated" value="0">
	     	  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
	        <button  type="submit" class="btn btn-danger">Yes </button> 
	      </div>
      </form>
    </div>
  </div>
</div>
@elseif ($row['activated']==0)
<button class="btn btn-danger"  data-toggle="modal" data-target="#dd{{ $row['id']}}"><i class="fas fa-trash-restore"></i></button> 
<div class="modal fade" id="dd{{$row['id']}}" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminDelUserController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body" align="center">
					คุณต้องการกู้ข้อมูลของ {{$row['name']}} เข้าในระบบ ใช่หรือไม่
					<input type="hidden"  name="activated" value="1">
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