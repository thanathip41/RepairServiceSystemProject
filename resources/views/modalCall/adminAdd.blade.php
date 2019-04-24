@if ($row['roleCheck']==0)
    <button class="btn btn-primary"  data-toggle="modal" data-target="#m{{ $row['id']}}">Add</button> 
<div class="modal modal-danger fade" id="m{{$row['id']}}"   role="dialog" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
          <form method="post" action="{{action('AdminRoleController@update',$row['id'])}}">{{csrf_field()}}  
					<input type="hidden" name="_method" value="PATCH"/>
	      <div class="modal-body">
					<p class="text-center">
					<label>คุณต้องการเพิ่มคุณ {{$row['name']}} พนักงานหรือไม่ </label>
					<input type="hidden"  name="roleCheck" value="1"> <br>
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
@elseif ($row['roleCheck']==1)
<a> IT is Maintenance </a>
@elseif ($row['roleCheck']==2)
<a> IT is Admin </a>
@endif